<?php

namespace App\Http\Controllers;

use App\Http\Services\SongService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $song;

    public function __construct(SongService $song) {
        $this->song = $song;
    }

    public function index() {
        $values = $this->song->getSong();
        if ($values) {
            return response()->json([
                'values' => $values,
                'errors' => true,
            ]);
        }
        return response()->json([ 'errors' => false ]);
    }
}
