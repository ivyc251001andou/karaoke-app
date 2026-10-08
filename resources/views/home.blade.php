<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KARAOKE RECORD</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            color: white;
            background:
                radial-gradient(circle at 20% 10%, #3d1b67 0%, transparent 35%),
                radial-gradient(circle at 90% 20%, #123b67 0%, transparent 35%),
                #080d24;
            padding-bottom: 100px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 25px 18px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header p {
            color: #a8b0d0;
            margin: 0 0 5px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
        }

        .search-link {
    display: block;
    margin-top: 15px;
    padding: 15px;
    border-radius: 15px;
    background: linear-gradient(135deg, #ff2d8d, #a83fe4);
    color: white;
    text-align: center;
    text-decoration: none;
    font-weight: bold;
}

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: rgba(25, 31, 65, 0.9);
            border: 1px solid #343c72;
            border-radius: 18px;
            padding: 18px 8px;
            text-align: center;
        }

        .stat-title {
            font-size: 12px;
            color: #aab2d2;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 22px;
            font-weight: bold;
        }

        .score {
            color: #ff4fc3;
        }

        .highest {
            color: #7df9ff;
        }

        .count {
            color: #ffb347;
        }

        .section-title {
            font-size: 20px;
            margin: 25px 0 12px;
        }

        .history-card {
            background: rgba(20, 26, 56, 0.95);
            border: 1px solid #343c72;
            border-radius: 18px;
            padding: 16px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .song-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .artist {
            color: #929bbb;
            font-size: 13px;
        }

        .song-score {
            font-size: 22px;
            font-weight: bold;
            color: #ff4fc3;
        }

        .empty {
            text-align: center;
            color: #929bbb;
            padding: 30px;
        }

        .add-button {
            display: block;
            text-align: center;
            text-decoration: none;
            color: white;
            font-weight: bold;
            background: linear-gradient(90deg, #ff3dbd, #8d5cff);
            padding: 16px;
            border-radius: 16px;
            margin-top: 20px;
            box-shadow: 0 0 20px rgba(255, 61, 189, .25);
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 75px;
            background: rgba(9, 13, 35, .97);
            border-top: 1px solid #30375f;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .nav-item {
            text-decoration: none;
            color: #8f97b8;
            text-align: center;
            font-size: 12px;
        }

        .nav-item.active {
            color: #ff4fc3;
        }

        .nav-icon {
            display: block;
            font-size: 22px;
            margin-bottom: 3px;
        }

        .plus {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #ff3dbd, #8d5cff);
            color: white;
            font-size: 28px;
            box-shadow: 0 0 20px rgba(255, 61, 189, .45);
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <p>KARAOKE RECORD</p>
        <h1>🎤 ホーム</h1>
        <a href="{{ route('search') }}" class="search-link">
    🔎 曲を検索する
</a>
    </div>

    <div class="stats">

        <div class="stat-card">
            <div class="stat-title">平均点</div>
            <div class="stat-value score">
                {{ number_format($average ?? 0, 1) }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-title">最高得点</div>
            <div class="stat-value highest">
                {{ number_format($highest ?? 0, 1) }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-title">歌った回数</div>
            <div class="stat-value count">
                {{ $count ?? 0 }}
            </div>
        </div>

    </div>

   <h2 class="section-title">最近の歌唱履歴</h2>

@if($songs->count() > 0)

    @foreach($songs as $song)

        <div class="history-card">

            <div>
                <div class="song-title">
                    {{ $song->song->title }}
                </div>

                <div class="artist">
                    {{ $song->song->artist }}
                </div>
            </div>

            <div class="song-score">
                {{ number_format($song->score, 1) }}点
            </div>

        </div>

    @endforeach

@else

    <div class="history-card empty">
        まだ歌唱履歴がありません
    </div>

@endif

<a href="{{ route('songs.create') }}" class="add-button">
    + 曲を記録する
</a>

</div>

<div class="bottom-nav"> 
 
    <a href="{{ route('home') }}" class="nav-item active"> 
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