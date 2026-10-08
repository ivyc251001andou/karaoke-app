<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>曲情報編集 | KARAOKE RECORD</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px 20px 100px;
            background:
                radial-gradient(circle at top left, #24145c, transparent 35%),
                radial-gradient(circle at bottom right, #35104f, transparent 35%),
                #080b24;
            color: white;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .card {
            background: rgba(24, 28, 65, 0.9);
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(168, 63, 228, 0.2);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 14px;
            border: 1px solid #454b80;
            border-radius: 12px;
            background: #111633;
            color: white;
            font-size: 15px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #a83fe4;
            box-shadow: 0 0 10px rgba(168, 63, 228, 0.4);
        }

        .error {
            margin-bottom: 20px;
            padding: 12px;
            border-radius: 10px;
            background: #5a1738;
            color: #ff9ac8;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .save-button,
        .back-button {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 12px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            font-size: 15px;
        }

        .save-button {
            background: linear-gradient(135deg, #ff2d8d, #a83fe4);
            color: white;
        }

        .back-button {
            background: #22264d;
            color: white;
        }

        .save-button:hover,
        .back-button:hover {
            opacity: 0.85;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>🎵 曲情報を編集</h1>

    <div class="card">

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('songs.update', $song->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>曲名</label>
                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $song->title) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label>アーティスト</label>
                <input
                    type="text"
                    name="artist"
                    value="{{ old('artist', $song->artist) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label>年代</label>
                <select name="era">
                    <option value="">選択してください</option>

                    <option value="昭和"
                        {{ old('era', $song->era) === '昭和' ? 'selected' : '' }}>
                        昭和
                    </option>

                    <option value="平成"
                        {{ old('era', $song->era) === '平成' ? 'selected' : '' }}>
                        平成
                    </option>

                    <option value="令和"
                        {{ old('era', $song->era) === '令和' ? 'selected' : '' }}>
                        令和
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label>ジャンル</label>
                <input
                    type="text"
                    name="genre"
                    value="{{ old('genre', $song->genre) }}"
                    placeholder="例：J-POP"
                >
            </div>

            <div class="buttons">

                <a href="{{ route('songs.manage') }}" class="back-button">
                    キャンセル
                </a>

                <button type="submit" class="save-button">
                    💾 保存する
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>