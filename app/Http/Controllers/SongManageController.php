<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongManageController extends Controller
{
    // 曲一覧
    public function index()
    {
        $songs = Song::orderBy('title')->get();

        return view('songs.manage', compact('songs'));
    }

    // 編集画面
    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    // 更新処理
    public function update(Request $request, Song $song)
    {
        $request->validate([
            'title' => 'required|max:255',
            'artist' => 'required|max:255',
            'era' => 'nullable|max:50',
            'genre' => 'nullable|max:100',
        ]);

        $song->update([
            'title' => $request->title,
            'artist' => $request->artist,
            'era' => $request->era,
            'genre' => $request->genre,
        ]);

        return redirect()
            ->route('songs.manage')
            ->with('success', '曲情報を更新しました！');
    }
}