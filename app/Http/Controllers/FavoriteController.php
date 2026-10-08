<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    // お気に入り一覧
    public function index()
    {
        $favorites = Favorite::with('song')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('favorites.index', compact('favorites'));
    }

    // お気に入り登録
    public function store(Request $request)
    {
        $request->validate([
            'song_id' => 'required|exists:songs,id',
        ]);

        Favorite::firstOrCreate([
            'user_id' => auth()->id(),
            'song_id' => $request->song_id,
        ]);

        return back()->with('success', 'お気に入りに追加しました！');
    }

    // お気に入り解除
    public function destroy($songId)
    {
        Favorite::where('user_id', auth()->id())
            ->where('song_id', $songId)
            ->delete();

        return back()->with('success', 'お気に入りから解除しました！');
    }
}