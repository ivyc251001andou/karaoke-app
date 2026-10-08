<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Record;
use Carbon\Carbon;

class RankingController extends Controller
{
    public function index()
    {
        $type = request('type', 'all');

        // 成長率ランキング
        if ($type === 'growth') {

            $records = Record::with('song')
                ->orderBy('sung_at')
                ->get();

            $growthSongs = [];

            foreach ($records->groupBy('song_id') as $songRecords) {

                // 歌った回数が2回未満なら成長率を計算できない
                if ($songRecords->count() < 2) {
                    continue;
                }

                $first = $songRecords->first();
                $latest = $songRecords->last();

                // 初回スコアが0点の場合は計算しない
                if ($first->score <= 0) {
                    continue;
                }

                // 成長率を計算
                $growthRate =
                    (($latest->score - $first->score) / $first->score) * 100;

                $growthSongs[] = (object) [
                    'title' => $first->song->title,
                    'artist' => $first->song->artist,
                    'first_score' => $first->score,
                    'latest_score' => $latest->score,
                    'growth_rate' => $growthRate,
                ];
            }

            // 成長率が高い順
            usort($growthSongs, function ($a, $b) {
                return $b->growth_rate <=> $a->growth_rate;
            });

            return view('ranking', [
                'songs' => collect($growthSongs),
                'type' => $type,
            ]);
        }

        $query = Song::query();

        // 今週
        if ($type === 'week') {
    $songIds = Record::whereBetween('sung_at', [
        Carbon::now()->startOfWeek()->toDateString(),
        Carbon::now()->endOfWeek()->toDateString(),
    ])->pluck('song_id');

    $query->whereIn('id', $songIds);
}

        // 今月
        if ($type === 'month') {
    $songIds = Record::whereBetween('sung_at', [
        Carbon::now()->startOfMonth()->toDateString(),
        Carbon::now()->endOfMonth()->toDateString(),
    ])->pluck('song_id');

    $query->whereIn('id', $songIds);
}

        // 昭和
        if ($type === 'showa') {
            $query->where('era', '昭和');
        }

        // 平成
        if ($type === 'heisei') {
            $query->where('era', '平成');
        }

        // 令和
        if ($type === 'reiwa') {
            $query->where('era', '令和');
        }

        // 曲別ランキング
        if ($type === 'song') {

            $songs = $query
                ->whereNotNull('score')
                ->selectRaw('title, artist, MAX(score) as score')
                ->groupBy('title', 'artist')
                ->orderByDesc('score')
                ->get();

        } else {

            $songs = $query
                ->whereNotNull('score')
                ->orderByDesc('score')
                ->get();
        }

        return view('ranking', compact('songs', 'type'));
    }
}