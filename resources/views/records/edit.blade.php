<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>歌唱履歴を編集</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family:
                "Noto Sans JP",
                "Yu Gothic",
                "Meiryo",
                sans-serif;

            background:
                radial-gradient(
                    circle at top left,
                    rgba(255, 60, 180, 0.18),
                    transparent 35%
                ),
                radial-gradient(
                    circle at top right,
                    rgba(110, 70, 255, 0.18),
                    transparent 35%
                ),
                #080a1c;

            color: white;
            min-height: 100vh;
            padding-bottom: 100px;
        }

        .header {
            padding: 28px 22px 20px;
        }

        .header-small {
            color: #9b9db7;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 800;
        }

        .header h1 span {
            background:
                linear-gradient(
                    90deg,
                    #ff4db8,
                    #8c6cff
                );

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .container {
            width: min(680px, 92%);
            margin: auto;
        }

        .form-card {
            background: rgba(19, 22, 48, 0.92);

            border: 1px solid rgba(255, 255, 255, 0.08);

            border-radius: 20px;

            padding: 22px;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.22);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;

            margin-bottom: 8px;

            color: #aaaec6;

            font-size: 13px;

            font-weight: bold;
        }

        select,
        input,
        textarea {
            width: 100%;

            padding: 14px;

            border-radius: 12px;

            border: 1px solid #292d50;

            background: #0e1129;

            color: white;

            font-size: 14px;

            outline: none;
        }

        select:focus,
        input:focus,
        textarea:focus {
            border-color: #ff4db8;

            box-shadow:
                0 0 10px rgba(255, 77, 184, 0.15);
        }

        textarea {
            min-height: 120px;

            resize: vertical;
        }

        .error {
            margin-top: 6px;

            color: #ff6b8a;

            font-size: 12px;
        }

        .button-area {
            display: flex;

            gap: 10px;

            margin-top: 25px;
        }

        .save-button {
            flex: 1;

            padding: 15px;

            border: none;

            border-radius: 14px;

            background:
                linear-gradient(
                    135deg,
                    #ff4db8,
                    #8b5cff
                );

            color: white;

            font-weight: 800;

            font-size: 14px;

            cursor: pointer;
        }

        .back-button {
            flex: 1;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 14px;

            background: #171a36;

            border: 1px solid #292d50;

            color: #aaaec6;

            text-decoration: none;

            font-weight: bold;

            font-size: 14px;
        }

        .bottom-nav {
            position: fixed;

            left: 0;
            right: 0;
            bottom: 0;

            height: 76px;

            display: flex;

            align-items: center;
            justify-content: space-around;

            background:
                rgba(10, 12, 31, 0.96);

            border-top:
                1px solid rgba(255, 255, 255, 0.08);

            backdrop-filter: blur(15px);

            z-index: 100;
        }

        .nav-item {
            width: 70px;

            text-align: center;

            color: #777b98;

            font-size: 11px;

            text-decoration: none;
        }

        .nav-icon {
            display: block;

            font-size: 21px;

            margin-bottom: 3px;
        }

        .nav-record {
            width: 58px;
            height: 58px;

            margin-top: -25px;

            display: flex;

            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #ff4db8,
                    #8b5cff
                );

            border-radius: 50%;

            color: white;

            font-size: 27px;

            text-decoration: none;

            border: 5px solid #080a1c;

            box-shadow:
                0 8px 25px rgba(255, 77, 184, 0.35);
        }
    </style>
</head>

<body>

<header class="header">

    <div class="header-small">
        KARAOKE RECORD
    </div>

    <h1>
        ✏️ <span>歌唱履歴を編集</span>
    </h1>

</header>


<main class="container">

    <div class="form-card">

        <form
            action="{{ route('records.update', $record) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            {{-- 曲 --}}

            <div class="form-group">

                <label class="form-label">
                    曲
                </label>

                <select name="song_id">

                    @foreach ($songs as $song)

                        <option
                            value="{{ $song->id }}"
                            {{ $record->song_id == $song->id ? 'selected' : '' }}
                        >
                            {{ $song->title }} / {{ $song->artist }}
                        </option>

                    @endforeach

                </select>

                @error('song_id')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- 点数 --}}

            <div class="form-group">

                <label class="form-label">
                    点数
                </label>

                <input
                    type="number"
                    name="score"
                    value="{{ old('score', $record->score) }}"
                    min="0"
                    max="100"
                    step="0.1"
                    required
                >

                @error('score')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- 歌唱日 --}}

            <div class="form-group">

                <label class="form-label">
                    歌唱日
                </label>

                <input
                    type="date"
                    name="sung_at"
                    value="{{ old('sung_at', $record->sung_at->format('Y-m-d')) }}"
                    required
                >

                @error('sung_at')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- コメント --}}

            <div class="form-group">

                <label class="form-label">
                    メモ・コメント
                </label>

                <textarea
                    name="comment"
                    placeholder="コメントを入力してください"
                >{{ old('comment', $record->comment) }}</textarea>

                @error('comment')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="button-area">

                <a
                    href="{{ route('records.index') }}"
                    class="back-button"
                >
                    キャンセル
                </a>

                <button
                    type="submit"
                    class="save-button"
                >
                    更新する
                </button>

            </div>

        </form>

    </div>

</main>


<nav class="bottom-nav">

    <a
        href="{{ route('home') }}"
        class="nav-item"
    >
        <span class="nav-icon">⌂</span>
        ホーム
    </a>


    <a
        href="{{ route('records.index') }}"
        class="nav-item active"
    >
        <span class="nav-icon">♫</span>
        履歴
    </a>


    <a
        href="{{ route('songs.create') }}"
        class="nav-record"
    >
        +
    </a>


    <a
        href="{{ route('ranking') }}"
        class="nav-item"
    >
        <span class="nav-icon">🏆</span>
        ランキング
    </a>


    <a
        href="#"
        class="nav-item"
    >
        <span class="nav-icon">●</span>
        マイページ
    </a>

</nav>

</body>
</html>