<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>歌唱履歴</title>

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

        .summary {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .summary-card {
            flex: 1;

            background: rgba(19, 22, 48, 0.92);

            border:
                1px solid rgba(255, 255, 255, 0.08);

            border-radius: 18px;
            padding: 18px;

            text-align: center;
        }

        .summary-label {
            color: #8589a5;
            font-size: 12px;
            margin-bottom: 7px;
        }

        .summary-number {
            font-size: 24px;
            font-weight: 800;
        }

        .record-card {
            background: rgba(19, 22, 48, 0.92);

            border:
                1px solid rgba(255, 255, 255, 0.08);

            border-radius: 20px;

            padding: 20px;

            margin-bottom: 14px;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.22);
        }

        .record-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
        }

        .song-title {
            font-size: 17px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .artist {
            color: #9b9db7;
            font-size: 13px;
        }

        .score {
            font-size: 25px;
            font-weight: 900;

            background:
                linear-gradient(
                    90deg,
                    #ff4db8,
                    #8c6cff
                );

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            white-space: nowrap;
        }

        .record-info {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;

            margin-top: 15px;
        }

        .tag {
            padding: 6px 10px;

            background: #0e1129;

            border:
                1px solid #292d50;

            border-radius: 20px;

            color: #aaaec6;

            font-size: 11px;
        }

        .date {
            color: #777b98;
            font-size: 11px;
            margin-left: auto;
        }

        /* 削除ボタン */

        .action-buttons {
    display: flex;
    gap: 8px;
    margin-left: auto;
}

.edit-button {
    display: inline-block;

    padding: 7px 13px;

    border-radius: 10px;

    background: rgba(125, 249, 255, 0.10);

    border: 1px solid rgba(125, 249, 255, 0.25);

    color: #7df9ff;

    text-decoration: none;

    font-size: 12px;

    font-weight: bold;
}

.edit-button:hover {
    background: rgba(125, 249, 255, 0.20);
}
        .record-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            padding-top: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .delete-button {
            border: none;
            background: rgba(255, 60, 100, 0.12);
            border: 1px solid rgba(255, 60, 100, 0.3);
            color: #ff6b8a;
            padding: 7px 13px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
        }

        .delete-button:hover {
            background: rgba(255, 60, 100, 0.22);
        }

        .empty {
            text-align: center;
            padding: 60px 20px;

            color: #777b98;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        /* 成功メッセージ */

        .success-message {
            background: rgba(50, 220, 150, 0.12);
            border: 1px solid rgba(50, 220, 150, 0.3);
            color: #65e6b0;
            padding: 13px 16px;
            border-radius: 14px;
            margin-bottom: 18px;
            text-align: center;
            font-size: 13px;
        }

        /* 検索フォーム */
.search-form {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.search-input {
    flex: 1;
    padding: 13px 15px;
    background: rgba(19, 22, 48, 0.92);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 14px;
    color: white;
    font-size: 14px;
    outline: none;
}

.search-input::placeholder {
    color: #777b98;
}

.search-input:focus {
    border-color: rgba(255, 77, 184, 0.6);
}

.search-button {
    padding: 13px 18px;
    border: none;
    border-radius: 14px;
    background: linear-gradient(135deg, #ff4db8, #8b5cff);
    color: white;
    font-size: 13px;
    font-weight: bold;
    cursor: pointer;
}

.search-button:hover {
    opacity: 0.9;
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

        .nav-item.active {
            color: #ff5fbc;
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

        @media (max-width: 480px) {

            .header {
                padding: 24px 18px 16px;
            }

            .container {
                width: 94%;
            }

            .summary-card {
                padding: 14px 8px;
            }

            .summary-number {
                font-size: 20px;
            }

            .record-card {
                padding: 17px;
            }

            .score {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

<header class="header">

    <div class="header-small">
        KARAOKE RECORD
    </div>

    <h1>
        📋 <span>歌唱履歴</span>
    </h1>

</header>


<main class="container">

    {{-- 削除成功メッセージ --}}

    @if (session('success'))

        <div class="success-message">
            {{ session('success') }}
        </div>

    @endif


    {{-- 集計 --}}
    {{-- 検索 --}}

<form method="GET" action="{{ route('records.index') }}" class="search-form">

    <input
        type="text"
        name="keyword"
        value="{{ $keyword ?? '' }}"
        placeholder="曲名・歌手名を入力"
        class="search-input"
    >

    <button type="submit" class="search-button">
        🔍 検索
    </button>

</form>

    <div class="summary">

        <div class="summary-card">

            <div class="summary-label">
                歌唱回数
            </div>

            <div class="summary-number">
                {{ $records->count() }}
            </div>

        </div>


        <div class="summary-card">

            <div class="summary-label">
                平均点
            </div>

            <div class="summary-number">

                @if ($records->count() > 0)

                    {{ number_format($records->avg('score'), 1) }}

                @else

                    --

                @endif

            </div>

        </div>

    </div>


    {{-- 履歴 --}}

    @forelse ($records as $record)

        <div class="record-card">

            <div class="record-top">

                <div>

                    <div class="song-title">

                        {{ $record->song->title }}

                    </div>

                    <div class="artist">

                        {{ $record->song->artist }}

                    </div>

                </div>


                <div class="score">

                    {{ number_format($record->score, 1) }}

                </div>

            </div>


            <div class="record-info">

                @if ($record->song->era)

                    <span class="tag">
                        📅 {{ $record->song->era }}
                    </span>

                @endif


                @if ($record->song->genre)

                    <span class="tag">
                        🎶 {{ $record->song->genre }}
                    </span>

                @endif


                <span class="date">

                    {{ $record->sung_at->format('Y/m/d') }}

                </span>

            </div>


 <div class="record-bottom">

    <div class="action-buttons">

        {{-- 編集 --}}
        <a
            href="{{ route('records.edit', $record) }}"
            class="edit-button"
        >
            ✏️ 編集
        </a>


        {{-- 削除 --}}
        <form
            action="{{ route('records.destroy', $record) }}"
            method="POST"
            onsubmit="return confirm('この歌唱履歴を削除しますか？');"
        >

            @csrf

            @method('DELETE')

            <button
                type="submit"
                class="delete-button"
            >
                🗑 削除
            </button>

        </form>

    </div>

</div>

        </div>

    @empty

        <div class="record-card">

            <div class="empty">

                <div class="empty-icon">
                    🎤
                </div>

                <p>
                    まだ歌唱履歴がありません
                </p>

            </div>

        </div>

    @endforelse

</main>


<nav class="bottom-nav">

    <a href="{{ route('home') }}" class="nav-item">

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


    <a href="{{ route('ranking') }}" class="nav-item">

        <span class="nav-icon">🏆</span>

        ランキング

    </a>


    <a href="#" class="nav-item">

        <span class="nav-icon">●</span>

        マイページ

    </a>

</nav>

</body>
</html>