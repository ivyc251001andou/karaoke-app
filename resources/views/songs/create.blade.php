<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>曲を記録する</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            padding-bottom: 100px;
            background:
                radial-gradient(circle at 50% 0%, #171b3d 0%, #080b20 45%, #050719 100%);
            color: #eeeef8;
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                "Noto Sans JP",
                sans-serif;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            padding: 24px 26px 30px;
        }

        /* ヘッダー */
        .header {
            margin-bottom: 24px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 800;
        }

        .header p {
            margin: 7px 0 0;
            color: #9296b8;
            font-size: 14px;
        }

        /* カード */
        .card {
            background: rgba(20, 23, 49, 0.92);
            border: 1px solid #272c54;
            border-radius: 24px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .card-title {
            margin: 0 0 16px;
            color: #a0a4c5;
            font-size: 18px;
            font-weight: 700;
        }

        /* 入力欄 */
        .input-group {
            margin-bottom: 18px;
        }

        .input-group:last-child {
            margin-bottom: 0;
        }

        label {
            display: block;
            margin-bottom: 9px;
            color: #a0a4c5;
            font-size: 14px;
            font-weight: 600;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            border: 1px solid #30355e;
            border-radius: 20px;
            background: #1b1f40;
            color: #f0f0fa;
            font-size: 16px;
            outline: none;
            padding: 15px 18px;
            transition: 0.2s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: #9d43df;
            box-shadow: 0 0 15px rgba(157, 67, 223, 0.25);
        }

        textarea {
            height: 128px;
            resize: none;
            font-size: 17px;
        }

        textarea::placeholder,
        input::placeholder {
            color: #777b9d;
        }

        /* スコア */
        .score-input {
            position: relative;
        }

        .score-input input {
            font-size: 28px;
            font-weight: 800;
            text-align: center;
            padding-right: 55px;
        }

        .score-unit {
            position: absolute;
            right: 22px;
            top: 50%;
            transform: translateY(-50%);
            color: #999dbd;
            font-size: 18px;
            font-weight: 700;
        }

        /* ラジオボタン */
        .options {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .option input {
            display: none;
        }

        .option span {
            display: block;
            padding: 10px 18px;
            border-radius: 30px;
            background: #1c2043;
            border: 1px solid #292e55;
            color: #969aba;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s;
        }

        .option input:checked + span {
            border-color: #009fd0;
            background: #112c4a;
            color: #00bff0;
            box-shadow: 0 0 12px rgba(0, 191, 240, 0.15);
        }

        /* メモ */
        .memo-card {
            padding-bottom: 24px;
        }

        .memo-label {
            font-size: 18px;
            font-weight: 700;
            color: #a0a4c5;
        }

        /* お気に入り */
        .favorite-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 24px;
        }

        .favorite-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .heart {
            font-size: 31px;
            color: #9da1c0;
            line-height: 1;
        }

        .favorite-text {
            font-size: 19px;
            font-weight: 700;
        }

        /* トグル */
        .toggle {
            position: relative;
            width: 70px;
            height: 38px;
        }

        .toggle input {
            display: none;
        }

        .slider {
            position: absolute;
            inset: 0;
            background: #1d2246;
            border-radius: 40px;
            cursor: pointer;
        }

        .slider::before {
            content: "";
            position: absolute;
            width: 24px;
            height: 24px;
            left: 5px;
            top: 7px;
            border-radius: 50%;
            background: white;
            transition: 0.25s;
        }

        .toggle input:checked + .slider {
            background: linear-gradient(90deg, #ed269b, #a83fe4);
        }

        .toggle input:checked + .slider::before {
            transform: translateX(36px);
        }

        /* 保存ボタン */
        .save-button {
            width: 100%;
            border: none;
            border-radius: 24px;
            padding: 19px;
            background: linear-gradient(90deg, #74104f, #552784);
            color: #b4a4bb;
            font-size: 23px;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(176, 45, 202, 0.2);
            transition: 0.2s;
        }

        .save-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(176, 45, 202, 0.35);
        }

        .save-button:active {
            transform: translateY(0);
        }

        /* 成功メッセージ */
        .success {
            background: rgba(20, 120, 100, 0.18);
            border: 1px solid #247f70;
            color: #7ce8d0;
            padding: 14px 18px;
            border-radius: 16px;
            margin-bottom: 20px;
        }

        /* 下部ナビ */
        .bottom-nav {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            height: 90px;
            background: rgba(13, 16, 37, 0.98);
            border-top: 1px solid #202546;
            display: flex;
            align-items: center;
            justify-content: space-around;
            z-index: 100;
        }

        .nav-item {
            width: 20%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 5px;
            color: #8f94b7;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
        }

        .nav-icon {
            font-size: 26px;
            line-height: 1;
        }

        .nav-item.active {
            color: #ec2b9e;
        }

        /* 真ん中の＋ */
        .nav-center {
            position: relative;
        }

        .nav-plus {
            width: 84px;
            height: 84px;
            margin-top: -40px;
            border-radius: 25px;
            background: linear-gradient(135deg, #e729a0, #ad48e9);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 43px;
            font-weight: 300;
            box-shadow: 0 12px 30px rgba(207, 48, 192, 0.4);
        }

        .nav-label {
            margin-top: 2px;
            color: #ec2b9e;
        }

        @media (max-width: 500px) {
            .container {
                padding: 20px 16px 30px;
            }

            .card {
                padding: 20px;
            }

            .options {
                gap: 9px;
            }

            .option span {
                padding: 9px 15px;
                font-size: 14px;
            }

            .nav-plus {
                width: 76px;
                height: 76px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>🎤 曲を記録する</h1>
        <p>今日歌った曲を記録しよう</p>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('songs.store') }}" method="POST">
        @csrf

        <!-- 曲情報 -->
        <div class="card">
            <h2 class="card-title">曲情報</h2>

            <div class="input-group">
                <label for="title">曲名</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    placeholder="曲名を入力"
                    value="{{ old('title') }}"
                    required
                >
            </div>

            <div class="input-group">
                <label for="artist">アーティスト</label>
                <input
                    type="text"
                    id="artist"
                    name="artist"
                    placeholder="アーティスト名を入力"
                    value="{{ old('artist') }}"
                    required
                >
            </div>
        </div>

        <!-- スコア -->
        <div class="card">
            <h2 class="card-title">⭐ スコア</h2>

            <div class="score-input">
                <input
                    type="number"
                    id="score"
                    name="score"
                    min="0"
                    max="100"
                    step="0.1"
                    placeholder="0.0"
                    value="{{ old('score') }}"
                    required
                >
                <span class="score-unit">点</span>
            </div>
        </div>

        <!-- 時代 -->
        <div class="card">
            <h2 class="card-title">時代</h2>

            <div class="options">

                <label class="option">
                    <input type="radio" name="era" value="昭和"
                        {{ old('era') === '昭和' ? 'checked' : '' }}>
                    <span>昭和</span>
                </label>

                <label class="option">
                    <input type="radio" name="era" value="平成"
                        {{ old('era') === '平成' ? 'checked' : '' }}>
                    <span>平成</span>
                </label>

                <label class="option">
                    <input type="radio" name="era" value="令和"
                        {{ old('era') === '令和' ? 'checked' : '' }}>
                    <span>令和</span>
                </label>

            </div>
        </div>

        <!-- ジャンル -->
        <div class="card">
            <h2 class="card-title">ジャンル</h2>

            <div class="options">

                <label class="option">
                    <input type="radio" name="genre" value="J-POP"
                        {{ old('genre', 'J-POP') === 'J-POP' ? 'checked' : '' }}>
                    <span>J-POP</span>
                </label>

                <label class="option">
                    <input type="radio" name="genre" value="アニソン"
                        {{ old('genre') === 'アニソン' ? 'checked' : '' }}>
                    <span>アニソン</span>
                </label>

                <label class="option">
                    <input type="radio" name="genre" value="K-POP"
                        {{ old('genre') === 'K-POP' ? 'checked' : '' }}>
                    <span>K-POP</span>
                </label>

                <label class="option">
                    <input type="radio" name="genre" value="演歌"
                        {{ old('genre') === '演歌' ? 'checked' : '' }}>
                    <span>演歌</span>
                </label>

                <label class="option">
                    <input type="radio" name="genre" value="歌謡曲"
                        {{ old('genre') === '歌謡曲' ? 'checked' : '' }}>
                    <span>歌謡曲</span>
                </label>

                <label class="option">
                    <input type="radio" name="genre" value="洋楽"
                        {{ old('genre') === '洋楽' ? 'checked' : '' }}>
                    <span>洋楽</span>
                </label>

                <label class="option">
                    <input type="radio" name="genre" value="R&B"
                        {{ old('genre') === 'R&B' ? 'checked' : '' }}>
                    <span>R&B</span>
                </label>

                <label class="option">
                    <input type="radio" name="genre" value="ロック"
                        {{ old('genre') === 'ロック' ? 'checked' : '' }}>
                    <span>ロック</span>
                </label>

            </div>
        </div>

        <!-- メモ -->
        <div class="card memo-card">
            <h2 class="memo-label">メモ（任意）</h2>

            <textarea
                name="comment"
                placeholder="高音が出やすかった、サビを練習したい...">{{ old('comment') }}</textarea>
        </div>

        <!-- お気に入り -->
        <div class="card favorite-card">

            <div class="favorite-left">
                <span class="heart">♡</span>
                <span class="favorite-text">お気に入りに追加</span>
            </div>

            <label class="toggle">
                <input type="checkbox" name="favorite" value="1">
                <span class="slider"></span>
            </label>

        </div>

        <!-- 保存 -->
        <button type="submit" class="save-button">
            記録を保存する
        </button>

    </form>

</div>


<!-- 下部ナビ -->
<div class="bottom-nav">

    <a href="{{ route('home') }}" class="nav-item">
        <span class="nav-icon">⌂</span>
        <span>ホーム</span>
    </a>

    <a href="{{ route('records.index') }}" class="nav-item">
        <span class="nav-icon">↶</span>
        <span>履歴</span>
    </a>

    <a href="{{ route('songs.create') }}" class="nav-item nav-center active">
        <span class="nav-plus">+</span>
        <span class="nav-label">記録</span>
    </a>

    <a href="{{ route('ranking') }}" class="nav-item">
        <span class="nav-icon">♜</span>
        <span>ランキング</span>
    </a>

    <a href="#" class="nav-item">
        <span class="nav-icon">♙</span>
        <span>マイページ</span>
    </a>

</div>

</body>
</html>