<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Record;
use App\Models\Favorite;
use Illuminate\Http\Request;

class SongController extends Controller
{
    // 曲登録画面を表示
    public function create()
    {
        return view('songs.create');
    }

    // 曲をデータベースに登録
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'artist' => 'required|max:255',
        'score' => 'required|numeric|min:0|max:100',
        'era' => 'nullable|max:50',
        'genre' => 'nullable|max:100',
        'comment' => 'nullable',
        'favorite' => 'nullable|boolean',
    ]);

    // 同じ曲がすでに登録されているか確認
    $song = Song::where('title', $request->title)
        ->where('artist', $request->artist)
        ->first();

    // 曲がなければ新しく登録
    if (!$song) {
        $song = new Song();

        $song->title = $request->title;
        $song->artist = $request->artist;
        $song->era = $request->era;
        $song->genre = $request->genre;
    } else {
        // 既存曲なら情報を更新
        $song->era = $request->era;
        $song->genre = $request->genre;
    }

    // 曲テーブルには最新スコアを保存
    $song->score = $request->score;
    $song->favorite = $request->boolean('favorite');
    $song->save();

    // 歌唱記録を保存
    Record::create([
    'user_id' => auth()->id(),
    'song_id' => $song->id,
    'score' => $request->score,
    'comment' => $request->comment,
    'sung_at' => now()->toDateString(),
]);
    // お気に入りに追加
if ($request->has('favorite')) {
    Favorite::firstOrCreate([
        'user_id' => auth()->id(),
        'song_id' => $song->id,
    ]);
}

    return redirect()
        ->route('songs.create')
        ->with('success', '曲を登録しました！');
    }
}