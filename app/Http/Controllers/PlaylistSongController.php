<?php

namespace App\Http\Controllers;

use App\Http\Services\PlaylistService;
use App\Http\Services\PlaylistSongService;
use App\Http\Services\SongService;
use App\Models\Playlist_song;
use Illuminate\Http\Request;

class PlaylistSongController extends Controller
{
    protected $playlistSong, $playlist, $song;

    public function __construct(PlaylistSongService $playlistSong, PlaylistService $playlist, SongService $song) {
        $this->playlistSong = $playlistSong;
        $this->playlist = $playlist;
        $this->song = $song;
    }

    public function create() {
        return view('admin/playlist_song/add', [
            'songs' => $this->song->get(),
            'playlists' => $this->playlist->get(),
        ]);
    }

    public function store(Request $request) {
        $result = $this->playlistSong->insert($request);
        if ($result) {
            return redirect('/admin/playlist_song/list');
        }
        return redirect()->back();
    }

    public function index() {
        return view('admin/playlist_song/list', [
            'values' => $this->playlistSong->getAll()
        ]);
    }

    public function show(Playlist_song $id) {
        return view('admin/playlist_song/edit', [
            'value' => $id,
            'songs' => $this->song->get(),
            'playlists' => $this->playlist->get(),
        ]);
    }

    public function update(Playlist_song $id, Request $request) {
        $result = $this->playlistSong->update($request, $id);
        if ($result) {
            return redirect('/admin/playlist_song/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request) {
        $result = $this->playlistSong->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa playlist song thành công!'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa playlist song thất bại!'
        ]);
    }
}
