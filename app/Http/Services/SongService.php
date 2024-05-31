<?php
namespace App\Http\Services;

use App\Models\Song;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SongService {
    public function insert($request) {
        try {
            Song::create([
                'name' => $request->input('name'),
                'artist' => $request->input('artist'),
                'url_img' => $request->input('url_img'),
                'album' => $request->input('album'),
                'genre' => $request->input('genre'),
                'path' => $request->input('path'),
            ]);
            Session::flash('success', 'Thêm song thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Thêm thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function getAll() {
        return Song::orderBy('id', 'asc')->paginate(15);
    }

    public function update($request, $id) {
        try {
            $id->fill([
                'name' => $request->input('name'),
                'artist' => $request->input('artist'),
                'url_img' => $request->input('url_img'),
                'album' => $request->input('album'),
                'genre' => $request->input('genre'),
                'path' => $request->input('path'),
            ]);
            $id->save();
            Session::flash('success', 'Cập nhật song thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Cập nhật thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request) {
        $id = $request->input('id');
        $value = Song::where('id', $id)->first();
        if ($value) {
            return Song::where('id', $id)->delete();
        }
        return false;
    }

    public function get() {
        return Song::select('id', 'name')->orderBy('id', 'asc')->get();
    }

    public function getSong() {
        return Song::join('playlist_songs', 'playlist_songs.song_id', '=', 'songs.id')->join('playlists', 'playlists.id', '=', 'playlist_songs.playlist_id')->leftJoin('favorites', 'favorites.song_id', '=', 'songs.id')->select('songs.*', 'playlists.name as playlist_name', 'favorites.user_id as user_id')->orderBy('id', 'asc')->get();;
    }
}
