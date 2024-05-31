<?php

namespace App\Http\Services;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class FavoriteService {
    public function Favorite($request) {
        $song_id = $request->input('song_id');
        $user_id = Auth::id();

        $result = Favorite::where('user_id', $user_id)->where('song_id', $song_id)->first();
        if ($result) {
            return Favorite::where('user_id', $user_id)->where('song_id', $song_id)->delete();
        } else {
            try {
                Favorite::create([
                    'user_id' => $user_id,
                    'song_id' => $song_id,
                ]);
                Session::flash('success', 'Thêm favorite thành công');
            } catch (\Exception $e) {
                Session::flash('error', 'Thêm thất bại');
                Log::info($e->getMessage());
                return false;
            }
        }
        return false;
    }

    public function getAll() {
        return Favorite::join('users', 'users.id', '=', 'favorites.user_id')->join('songs', 'songs.id', '=', 'favorites.song_id')->select('favorites.id', 'users.name as username', 'songs.name as song_name')->orderBy('favorites.id', 'asc')->paginate(15);
    }
}
