<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Record;

class HomeController extends Controller
{
    public function index()
    {
        // ログイン中のユーザーの歌唱履歴だけ取得
        $records = Record::with('song')
            ->where('user_id', auth()->id())
            ->latest('sung_at')
            ->take(5)
            ->get();

        // ログイン中のユーザーの記録だけで集計
        $userRecords = Record::where('user_id', auth()->id());

        $average = $userRecords->avg('score');
        $highest = $userRecords->max('score');
        $count = $userRecords->count();

        return view('home', [
            'songs' => $records,
            'average' => $average,
            'highest' => $highest,
            'count' => $count,
        ]);
    }
}