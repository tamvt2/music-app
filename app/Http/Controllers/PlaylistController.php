<?php

namespace App\Http\Controllers;

use App\Http\Services\PlaylistService;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    protected $playlist;

    public function __construct(PlaylistService $playlist) {
        $this->playlist = $playlist;
    }

    public function create() {
        return view('admin/playlist/add');
    }

    public function store(Request $request) {
        $result = $this->playlist->insert($request);
        if ($result) {
            return redirect('/admin/playlist/list');
        }
        return redirect()->back();
    }

    public function index() {
        return view('admin/playlist/list', [
            'values' => $this->playlist->getAll()
        ]);
    }

    public function show(Playlist $id) {
        return view('admin/playlist/edit', [
            'value' => $id
        ]);
    }

    public function update(Request $request, Playlist $id) {
        $result = $this->playlist->update($request, $id);
        if ($result) {
            return redirect('/admin/playlist/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request) {
        $result = $this->playlist->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa playlist thành công!'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa playlist thất bại!'
        ]);
    }
}
