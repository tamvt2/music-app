<?php

namespace App\Http\Controllers;

use App\Http\Services\DownloadService;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    protected $download;

    public function __construct(DownloadService $download) {
        $this->download = $download;
    }

    public function store(Request $request) {
        $result = $this->download->insert($request);
        if ($result) {
            return response()->json([
                'error' => false
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }

    public function index() {
        return view('admin/download/list', [
            'values' => $this->download->getAll(),
        ]);
    }
}
