<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お気に入り曲</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding-bottom: 90px;
            font-family: Arial, sans-serif;
            color: white;
            background:
                radial-gradient(circle at top left, rgba(168, 63, 228, 0.18), transparent 35%),
                radial-gradient(circle at top right, rgba(237, 38, 155, 0.15), transparent 35%),
                #080b24;
        }

        .header {
            padding: 25px 20px 15px;
        }

        .header h1 {
            margin: 0;
            font-size: 25px;
        }

        .header p {
            margin: 8px 0 0;
            color: #aeb3d8;
            font-size: 13px;
        }

        .container {
            padding: 10px 16px;
        }

        .empty {
            padding: 40px 20px;
            text-align: center;
            color: #9da3ca;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 18px;
        }

        .favorite-card {
            position: relative;
            margin-bottom: 14px;
            padding: 18px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.055);
            border: 1px solid rgba(168, 63, 228, 0.25);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .favorite-card::before {
            content: "♥";
            position: absolute;
            top: 15px;
            right: 18px;
            color: #ed269b;
            font-size: 22px;
        }

        .song-title {
            margin: 0 45px 7px 0;
            font-size: 18px;
            font-weight: bold;
        }

        .artist {
            margin-bottom: 12px;
            color: #b8bce0;
            font-size: 14px;
        }

        .info {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .tag {
            padding: 5px 9px;
            border-radius: 8px;
            background: rgba(125, 249, 255, 0.08);
            border: 1px solid rgba(125, 249, 255, 0.18);
            color: #7df9ff;
            font-size: 11px;
        }

        .bottom-nav {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 10;
            display: flex;
            justify-content: space-around;
            padding: 10px 5px 12px;
            background: rgba(7, 9, 30, 0.96);
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
        }

        .nav-item {
            color: #8f95bb;
            text-decoration: none;
            text-align: center;
            font-size: 11px;
        }

        .nav-item span {
            display: block;
            margin-bottom: 3px;
            font-size: 20px;
        }

        .nav-item.active {
            color: #ed269b;
        }

        .nav-center {
            width: 48px;
            height: 48px;
            margin-top: -25px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: linear-gradient(135deg, #ed269b, #a83fe4);
            color: white;
            font-size: 25px;
            box-shadow: 0 0 18px rgba(237, 38, 155, 0.45);
        }
        
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.page-header h1 {
    margin: 0;
}
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
}

.page-header h1 {
    margin: 0;
    font-size: 25px;
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

<header class="header">

    <div class="page-header">

        <h1>❤️ お気に入り曲</h1>

        <a href="{{ route('home') }}" class="home-button">
            🏠 ホーム
        </a>

    </div>

    <p>お気に入りに登録した曲</p>

</header>

<main class="container">

    @if ($favorites->isEmpty())

        <div class="empty">
            <div style="font-size: 40px;">♡</div>
            <p>まだお気に入り曲がありません</p>
            <p style="font-size: 12px;">
                曲を登録するときに<br>
                「お気に入りに追加」をONにしてみよう！
            </p>
        </div>

    @else

        @foreach ($favorites as $favorite)

            <div class="favorite-card">

                <h2 class="song-title">
                    {{ $favorite->song->title }}
                </h2>

                <div class="artist">
                    {{ $favorite->song->artist }}
                </div>

                <div class="info">

                    @if ($favorite->song->era)
                        <span class="tag">
                            {{ $favorite->song->era }}
                        </span>
                    @endif

                    @if ($favorite->song->genre)
                        <span class="tag">
                            {{ $favorite->song->genre }}
                        </span>
                    @endif

                </div>

            </div>

        @endforeach

    @endif

</main>

<nav class="bottom-nav">

    <a href="{{ route('home') }}" class="nav-item">
        <span>⌂</span>
        ホーム
    </a>

    <a href="{{ route('records.index') }}" class="nav-item">
        <span>📋</span>
        履歴
    </a>

    <a href="{{ route('songs.create') }}" class="nav-item nav-center">
        +
    </a>

    <a href="{{ route('ranking') }}" class="nav-item">
        <span>🏆</span>
        ランキング
    </a>

    <a href="{{ route('favorites.index') }}" class="nav-item active">
        <span>♡</span>
        お気に入り
    </a>

</nav>

</body>
</html>