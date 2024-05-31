<?php
namespace App\Http\Services;

use App\Models\Playlist_song;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PlaylistSongService {
    public function insert($request) {
        try {
            Playlist_song::create([
                'playlist_id' => $request->input('playlist_id'),
                'song_id' => $request->input('song_id'),
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
        return Playlist_song::join('playlists', 'playlists.id', '=', 'playlist_songs.playlist_id')->join('songs', 'songs.id', '=', 'playlist_songs.song_id')->select('playlist_songs.id', 'playlists.name as playlist_name', 'songs.name as song_name')->orderBy('playlist_songs.id', 'asc')->paginate(15);
    }

    public function update($request, $id) {
        try {
            $id->fill([
                'playlist_id' => $request->input('playlist_id'),
                'song_id' => $request->input('song_id'),
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
        $value = Playlist_song::where('id', $id)->first();
        if ($value) {
            return Playlist_song::where('id', $id)->delete();
        }
        return false;
    }
}
