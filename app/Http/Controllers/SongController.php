<?php

namespace App\Http\Controllers;

use App\Http\Services\SongService;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    protected $song;

    public function __construct(SongService $song) {
        $this->song = $song;
    }

    public function create() {
        return view('admin/song/add');
    }

    public function store(Request $request) {
        $result = $this->song->insert($request);
        if ($result) {
            return redirect('/admin/song/list');
        }
        return redirect()->back();
    }

    public function index() {
        return view('admin/song/list', [
            'values' => $this->song->getAll()
        ]);
    }

    public function show(Song $id) {
        return view('admin/song/edit', [
            'value' => $id
        ]);
    }

    public function update(Song $id, Request $request) {
        $result = $this->song->update($request, $id);
        if ($result) {
            return redirect('/admin/song/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request) {
        $result = $this->song->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa song thành công!'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa song thất bại!'
        ]);
    }
}
