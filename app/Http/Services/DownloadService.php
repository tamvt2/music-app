<?php

namespace App\Http\Services;

use App\Models\Download;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class DownloadService {
    public function insert($request) {
        try {
            Download::create([
                'user_id' => Auth::id(),
                'song_id' => $request->input('song_id'),
            ]);
            Session::flash('success', 'Thêm download thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Thêm thất bại');
            Log::info($e->getMessage());
            return false;
        }
    }

    public function getAll() {
        return Download::join('users', 'users.id', '=', 'downloads.user_id')->join('songs', 'songs.id', '=', 'downloads.song_id')->select('downloads.id', 'users.name as username', 'songs.name as song_name')->orderBy('downloads.id', 'asc')->paginate(15);
    }
}
