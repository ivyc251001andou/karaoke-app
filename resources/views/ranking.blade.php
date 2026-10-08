<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ランキング | KARAOKE RECORD</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding-bottom: 100px;
            background:
                radial-gradient(circle at top, #24134f 0%, #0b1026 45%, #050816 100%);
            color: white;
            font-family: Arial, "Noto Sans JP", sans-serif;
            min-height: 100vh;
        }

        .header {
            padding: 30px 20px 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
        }

        .header p {
            color: #aaa;
            margin-top: 8px;
        }

        .tabs {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding: 10px 20px 20px;
        }
        .growth {
    color: #7df9ff;
    font-size: 20px;
    font-weight: bold;
    text-shadow: 0 0 10px rgba(125, 249, 255, 0.4);
}

.growth-detail {
    margin-top: 6px;
    color: #8f94b8;
    font-size: 12px;
}

        .tab {
    white-space: nowrap;
    padding: 10px 18px;
    border-radius: 20px;
    background: #171a38;
    color: #aaa;
    text-decoration: none;
    display: block;
}

        .tab.active {
            background: #ff2d8d;
            color: white;
        }

        .ranking-card {
            margin: 10px 20px;
            padding: 18px;
            border-radius: 20px;
            background: rgba(25, 28, 60, 0.9);
            border: 1px solid rgba(255,255,255,0.08);
        }

        .rank {
            font-size: 28px;
            font-weight: bold;
            color: #ff4fa3;
        }

        .song-title {
            font-size: 19px;
            font-weight: bold;
            margin-top: 8px;
        }

        .artist {
            color: #aaa;
            margin-top: 5px;
        }

        .score {
            margin-top: 12px;
            font-size: 26px;
            font-weight: bold;
            color: #5ee7ff;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 80px;
            background: rgba(8, 10, 28, 0.97);
            display: flex;
            justify-content: space-around;
            align-items: center;
            border-top: 1px solid rgba(255,255,255,0.1);
            z-index: 100;
        }

        .nav-item {
            color: #aaa;
            text-decoration: none;
            text-align: center;
            font-size: 12px;
        }

        .nav-item.active {
            color: #ff3d98;
        }

        .nav-icon {
            display: block;
            font-size: 24px;
            margin-bottom: 4px;
        }

        .plus {
            font-size: 34px;
            color: #ff3d98;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>🏆 ランキング</h1>
        <p>みんなの最高得点ランキング</p>
    </div>

    <div class="tabs">

    <a href="{{ route('ranking', ['type' => 'all']) }}"
       class="tab {{ $type === 'all' ? 'active' : '' }}">
        最高得点
    </a>

    <a href="{{ route('ranking', ['type' => 'song']) }}"
       class="tab {{ $type === 'song' ? 'active' : '' }}">
        曲別
    </a>

    <a href="{{ route('ranking', ['type' => 'week']) }}"
       class="tab {{ $type === 'week' ? 'active' : '' }}">
        今週
    </a>

    <a href="{{ route('ranking', ['type' => 'month']) }}"
       class="tab {{ $type === 'month' ? 'active' : '' }}">
        今月
    </a>

    <a href="{{ route('ranking', ['type' => 'showa']) }}"
       class="tab {{ $type === 'showa' ? 'active' : '' }}">
        昭和
    </a>

    <a href="{{ route('ranking', ['type' => 'heisei']) }}"
       class="tab {{ $type === 'heisei' ? 'active' : '' }}">
        平成
    </a>

    <a href="{{ route('ranking', ['type' => 'reiwa']) }}"
       class="tab {{ $type === 'reiwa' ? 'active' : '' }}">
        令和
    </a>
    <a href="{{ route('ranking', ['type' => 'growth']) }}"
   class="tab {{ $type === 'growth' ? 'active' : '' }}">
    成長率
</a>

</div>

</div>

   @forelse ($songs as $index => $song)

    <div class="ranking-card">

        <div class="rank">
            {{ $index + 1 }}
        </div>

        <div class="song-info">

            <div class="song-title">
                {{ $song->title }}
            </div>

            <div class="artist">
                {{ $song->artist }}
            </div>

            @if($type === 'growth')
                <div class="growth-detail">
                    {{ number_format($song->first_score, 1) }}点
                    →
                    {{ number_format($song->latest_score, 1) }}点
                </div>
            @endif

        </div>

        <div class="score">

            @if($type === 'growth')

                <span class="growth">
                    +{{ number_format($song->growth_rate, 1) }}%
                </span>

            @else

                {{ number_format($song->score, 1) }}点

            @endif

        </div>

    </div>

@empty

    <div class="empty">
        まだランキングデータがありません
    </div>

@endforelse

    <div class="bottom-nav">

        <a href="{{ route('home') }}" class="nav-item">
            <span class="nav-icon">⌂</span>
            ホーム
        </a>

        <a href="{{ route('records.index') }}" class="nav-item">
            <span class="nav-icon">♫</span>
            履歴
        </a>

        <a href="{{ route('songs.create') }}" class="nav-item">
            <span class="nav-icon plus">+</span>
        </a>

        <a href="{{ route('ranking') }}" class="nav-item active">
            <span class="nav-icon">🏆</span>
            ランキング
        </a>

        <a href="{{ route('mypage') }}" class="nav-item">
    <span class="nav-icon">👤</span>マイページ
</a>

    </div>

</body>
</html>