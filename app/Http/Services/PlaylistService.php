<?php
namespace App\Http\Services;

use App\Models\Playlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PlaylistService {
    public function insert($request) {
        try {
            Playlist::create([
                'name' => $request->input('name'),
                'user_id' => Auth::id(),
            ]);
            Session::flash('success', 'Thêm chương thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Thêm thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function getAll() {
        return Playlist::join('users', 'users.id', '=', 'playlists.user_id')->select('playlists.*', 'users.name as username')->orderBy('id', 'asc')->paginate(15);
    }

    public function update($request, $id) {
        try {
            $id->fill([
                'name' => $request->input('name'),
            ]);
            $id->save();
            Session::flash('success', 'Cập nhật truyện thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Cập nhật thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request) {
        $id = $request->input('id');
        $value = Playlist::where('id', $id)->first();
        if ($value) {
            return Playlist::where('id', $id)->delete();
        }
        return false;
    }
}
