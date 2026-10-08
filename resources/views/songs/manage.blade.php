<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>曲管理 | KARAOKE RECORD</title>

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

        .song-card {
            margin: 12px 20px;
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
            margin-top: 6px;
            color: #aaa;
        }

        .tags {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-top: 12px;
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
            font-size: 20px;
            font-weight: bold;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .edit-button,
        .delete-button {
            flex: 1;
            padding: 11px;
            border: none;
            border-radius: 12px;
            text-align: center;
            text-decoration: none;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        .edit-button {
            background: #25295a;
        }

        .delete-button {
            background: #7d214d;
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
    </style>
</head>

<body>

    <div class="header">
        <h1>🎵 曲管理</h1>
        <p>登録した曲を管理できます</p>
    </div>

    @forelse($songs as $song)

        <div class="song-card">

            <div class="song-title">
                {{ $song->title }}
            </div>

            <div class="artist">
                {{ $song->artist }}
            </div>

            <div class="tags">

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

            @if($song->score !== null)
                <div class="score">
                    {{ number_format($song->score, 1) }}点
                </div>
            @endif

            <div class="actions">

                <a href="{{ route('songs.edit', $song->id) }}" class="edit-button">
    編集
</a>

                <form action="#" method="POST" style="flex: 1;">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="delete-button"
                        onclick="return confirm('この曲を削除しますか？')">
                        削除
                    </button>
                </form>

            </div>

        </div>

    @empty

        <div class="empty">
            まだ曲が登録されていません
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

        <a href="{{ route('ranking') }}" class="nav-item">
            <span class="nav-icon">🏆</span>
            ランキング
        </a>

        <a href="{{ route('mypage') }}" class="nav-item">
            <span class="nav-icon">👤</span>
            マイページ
        </a>

    </div>

</body>
</html>