<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    // 歌唱履歴一覧
    public function index(Request $request)
{
    $keyword = $request->input('keyword');

    $records = Record::with('song')
        ->where('user_id', auth()->id())
        ->when($keyword, function ($query) use ($keyword) {
            $query->whereHas('song', function ($songQuery) use ($keyword) {
                $songQuery->where('title', 'like', "%{$keyword}%")
                    ->orWhere('artist', 'like', "%{$keyword}%");
            });
        })
        ->latest('sung_at')
        ->get();

    return view('records.index', compact('records', 'keyword'));
}

    // 歌唱履歴編集画面
    public function edit(Record $record)
    {
        // 自分の記録か確認
        abort_unless($record->user_id === auth()->id(), 403);

        $record->load('song');

        $songs = Song::orderBy('title')->get();

        return view('records.edit', compact('record', 'songs'));
    }

    // 歌唱履歴更新
    public function update(Request $request, Record $record)
    {
        // 自分の記録か確認
        abort_unless($record->user_id === auth()->id(), 403);

        $request->validate([
            'song_id' => 'required|exists:songs,id',
            'score' => 'required|numeric|min:0|max:100',
            'comment' => 'nullable',
            'sung_at' => 'required|date',
        ]);

        $record->update([
            'song_id' => $request->song_id,
            'score' => $request->score,
            'comment' => $request->comment,
            'sung_at' => $request->sung_at,
        ]);

        return redirect()
            ->route('records.index')
            ->with('success', '歌唱履歴を更新しました！');
    }

    // 歌唱履歴削除
    public function destroy(Record $record)
    {
        // 自分の記録か確認
        abort_unless($record->user_id === auth()->id(), 403);

        $record->delete();

        return redirect()
            ->route('records.index')
            ->with('success', '歌唱履歴を削除しました！');
    }
}