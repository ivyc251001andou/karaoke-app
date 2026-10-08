<?php

namespace App\Http\Controllers;

use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::with('song')
            ->where('user_id', 1)
            ->latest()
            ->get();

        return view('favorites.index', compact('favorites'));
    }
}