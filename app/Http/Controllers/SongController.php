<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'file' => 'required|mimes:mp3,wav,ogg|max:20480',
        ]);

        $path = $request->file('file')->store('songs');

        $song = new Song();
        $song->title = $request->title;
        $song->artist = $request->artist;
        $song->file_path = $path;
        $song->save();

        return redirect()->back();
    }

    public function show($id)
    {
        $song = Song::findOrFail($id);
        return view('songs.show', compact('song'));
    }

    public function download($id)
    {
        $song = Song::findOrFail($id);
        return Storage::download($song->file_path);
    }
}
