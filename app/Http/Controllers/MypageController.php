<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MypageController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // 自分の歌唱履歴
        $records = Record::with('song')
            ->where('user_id', $user->id)
            ->orderBy('sung_at')
            ->get();

        // 最高点
        $highest = $records->max('score') ?? 0;

        // 平均点
        $average = $records->avg('score') ?? 0;

        // --------------------------------
        // ① スコア推移
        // --------------------------------

        $scoreLabels = $records->map(function ($record) {
            return Carbon::parse($record->sung_at)->format('n/j');
        })->values();

        $scoreData = $records->map(function ($record) {
            return (float) $record->score;
        })->values();

        // --------------------------------
        // ② ジャンル別の歌唱回数
        // --------------------------------

        $genreData = $records
            ->groupBy(function ($record) {
                return $record->song->genre ?? '未設定';
            })
            ->map(function ($records) {
                return $records->count();
            });

        $genreLabels = $genreData->keys()->values();
        $genreCounts = $genreData->values();

        // --------------------------------
        // ④ 月ごとの歌唱回数
        // 過去6ヶ月
        // --------------------------------

        $monthLabels = [];
        $monthCounts = [];

        for ($i = 5; $i >= 0; $i--) {

            $month = Carbon::now()->subMonths($i);

            $monthLabels[] = $month->format('n月');

            $count = $records->filter(function ($record) use ($month) {

                return Carbon::parse($record->sung_at)->format('Y-m')
                    === $month->format('Y-m');

            })->count();

            $monthCounts[] = $count;
        }

        return view('mypage.index', compact(
            'user',
            'highest',
            'average',
            'scoreLabels',
            'scoreData',
            'genreLabels',
            'genreCounts',
            'monthLabels',
            'monthCounts'
        ));
    }
}