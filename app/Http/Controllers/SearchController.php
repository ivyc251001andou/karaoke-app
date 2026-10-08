<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $songs = collect();

        if ($keyword) {
            $songs = Song::with('records')
    ->where('title', 'like', '%' . $keyword . '%')
    ->orWhere('artist', 'like', '%' . $keyword . '%')
    ->orderBy('title')
    ->get();
        }

        return view('search.index', compact('songs', 'keyword'));
    }
}