<?php

namespace App\Http\Controllers;

use App\Http\Services\FavoriteService;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    protected $favorite;

    public function __construct(FavoriteService $favorite) {
        $this->favorite = $favorite;
    }

    public function store(Request $request) {
        $result = $this->favorite->Favorite($request);
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
        return view('admin/favorite/list', [
            'values' => $this->favorite->getAll(),
        ]);
    }
}
