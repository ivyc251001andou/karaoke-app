<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>検索 | KARAOKE RECORD</title>

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

        .search-box {
            margin: 0 20px 25px;
        }

        .search-form {
            display: flex;
            gap: 10px;
        }

        .search-input {
            flex: 1;
            padding: 15px;
            border: none;
            border-radius: 15px;
            background: #171a38;
            color: white;
            font-size: 16px;
            outline: none;
        }

        .search-input:focus {
            box-shadow: 0 0 0 2px #ff2d8d;
        }

        .search-button {
            padding: 0 20px;
            border: none;
            border-radius: 15px;
            background: linear-gradient(135deg, #ff2d8d, #a83fe4);
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .result-title {
            margin: 0 20px 15px;
            font-size: 18px;
            font-weight: bold;
        }

        .song-card {
            margin: 10px 20px;
            padding: 18px;
            border-radius: 20px;
            background: rgba(25, 28, 60, 0.9);
            border: 1px solid rgba(255,255,255,0.08);
        }

        .song-title {
            font-size: 19px;
            font-weight: bold;
        }

        .artist {
            color: #aaa;
            margin-top: 6px;
        }

        .song-info {
            display: flex;
            gap: 8px;
            margin-top: 12px;
            flex-wrap: wrap;
        }

        .tag {
            padding: 5px 10px;
            border-radius: 20px;
            background: #22264d;
            color: #aaa;
            font-size: 12px;
        }

        .score {
            margin-top: 12px;
            color: #5ee7ff;
            font-size: 22px;
            font-weight: bold;
        }

        .stats {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .stat {
            flex: 1;
            padding: 12px 8px;
            border-radius: 12px;
            background: #171a38;
            text-align: center;
        }

        .stat-label {
            display: block;
            color: #aaa;
            font-size: 11px;
            margin-bottom: 6px;
        }

        .stat-value {
            display: block;
            color: #5ee7ff;
            font-size: 15px;
            font-weight: bold;
        }

        .favorite-button {
            width: 100%;
            margin-top: 15px;
            padding: 12px;
            border: none;
            border-radius: 12px;
            background: #22264d;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        .favorite-button.active {
            background: linear-gradient(135deg, #ff2d8d, #a83fe4);
        }

        .empty {
            margin: 30px 20px;
            padding: 30px;
            text-align: center;
            border-radius: 20px;
            background: rgba(25, 28, 60, 0.8);
            color: #aaa;
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
  
        .page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
}

.page-header h1 {
    margin: 0;
    font-size: 28px;
}

.home-button {
    flex-shrink: 0;
    padding: 9px 13px;
    border-radius: 12px;
    color: white;
    text-decoration: none;
    font-size: 12px;
    font-weight: bold;
    background: linear-gradient(135deg, #7b5cff, #a855f7);
    box-shadow: 0 0 15px rgba(123, 92, 255, 0.25);
    white-space: nowrap;
}

.home-button:hover {
    opacity: 0.9;
}
    </style>
</head>

<body>

    <div class="header">

    <div class="page-header">

        <h1>🔎 曲を検索</h1>

        <a href="{{ route('home') }}" class="home-button">
            🏠 ホーム
        </a>

    </div>

    <p>曲名や歌手名から探そう</p>

</div>

    <div class="search-box">

        <form action="{{ route('search') }}" method="GET" class="search-form">

            <input
                type="text"
                name="keyword"
                class="search-input"
                placeholder="曲名・歌手名を入力"
                value="{{ $keyword ?? '' }}"
            >

            <button type="submit" class="search-button">
                検索
            </button>

        </form>

    </div>

    @if($keyword)

        <div class="result-title">
            「{{ $keyword }}」の検索結果
        </div>

        @forelse($songs as $song)

            <div class="song-card">

                <div class="song-title">
                    {{ $song->title }}
                </div>

                <div class="artist">
                    {{ $song->artist }}
                </div>

                <div class="song-info">

                    @if($song->era)
                        <span class="tag">
                            {{ $song->era }}
                        </span>
                    @endif

                    @if($song->genre)
                        <span class="tag">
                            {{ $song->genre }}
                        </span>
                    @endif

                </div>

                {{-- お気に入りボタン --}}
                @if(
                    \App\Models\Favorite::where('user_id', auth()->id())
                        ->where('song_id', $song->id)
                        ->exists()
                )

                    <form action="{{ route('favorites.destroy', $song->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="favorite-button active">
                            ❤️ お気に入り解除
                        </button>

                    </form>

                @else

                    <form action="{{ route('favorites.store') }}" method="POST">

                        @csrf

                        <input
                            type="hidden"
                            name="song_id"
                            value="{{ $song->id }}"
                        >

                        <button type="submit" class="favorite-button">
                            ♡ お気に入りに追加
                        </button>

                    </form>

                @endif

                {{-- 曲の統計 --}}
                @php
                    $scores = $song->records->pluck('score');

                    $highest = $scores->max();
                    $average = $scores->avg();
                    $count = $scores->count();
                @endphp

                <div class="stats">

                    <div class="stat">

                        <span class="stat-label">
                            🏆 最高得点
                        </span>

                        <span class="stat-value">
                            {{ $highest !== null ? number_format($highest, 1) . '点' : '-' }}
                        </span>

                    </div>

                    <div class="stat">

                        <span class="stat-label">
                            📊 平均点
                        </span>

                        <span class="stat-value">
                            {{ $average !== null ? number_format($average, 1) . '点' : '-' }}
                        </span>

                    </div>

                    <div class="stat">

                        <span class="stat-label">
                            🎤 歌唱回数
                        </span>

                        <span class="stat-value">
                            {{ $count }}回
                        </span>

                    </div>

                </div>

            </div>

        @empty

            <div class="empty">
                「{{ $keyword }}」に一致する曲がありません
            </div>

        @endforelse

    @else

        <div class="empty">
            曲名または歌手名を入力して検索してください
        </div>

    @endif


    {{-- 下部ナビゲーション --}}
    <div class="bottom-nav">

        <a href="{{ route('home') }}" class="nav-item">

            <span class="nav-icon">
                ⌂
            </span>

            ホーム

        </a>

        <a href="{{ route('records.index') }}" class="nav-item">

            <span class="nav-icon">
                ♫
            </span>

            履歴

        </a>

        <a href="{{ route('songs.create') }}" class="nav-item">

            <span class="nav-icon plus">
                +
            </span>

        </a>

        <a href="{{ route('ranking') }}" class="nav-item">

            <span class="nav-icon">
                🏆
            </span>

            ランキング

        </a>

        <a href="{{ route('mypage') }}" class="nav-item">

            <span class="nav-icon">
                👤
            </span>

            マイページ

        </a>

    </div>

</body>
</html>