<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>マイページ</title>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        * {
            box-sizing: border-box;
        }

        body {

            margin: 0;

            min-height: 100vh;

            padding-bottom: 100px;

            font-family: Arial, sans-serif;

            color: white;

            background:
                radial-gradient(
                    circle at 20% 10%,
                    #3d1b67 0%,
                    transparent 35%
                ),

                radial-gradient(
                    circle at 90% 20%,
                    #123b67 0%,
                    transparent 35%
                ),

                #080d24;
        }

        .container {

            max-width: 600px;

            margin: auto;

            padding: 25px 18px;
        }


        /* =========================
           ヘッダー
        ========================= */

        .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
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


        /* =========================
           プロフィール
        ========================= */

        .profile-card {

            background:
                linear-gradient(
                    135deg,
                    rgba(37, 43, 87, .95),
                    rgba(22, 27, 61, .95)
                );

            border: 1px solid #343c72;

            border-radius: 20px;

            padding: 22px;

            margin-bottom: 20px;

            box-shadow:
                0 10px 30px rgba(0,0,0,.2);
        }

        .profile-icon {

            font-size: 45px;

            margin-bottom: 10px;
        }

        .profile-name {

            font-size: 20px;

            font-weight: bold;

            margin-bottom: 5px;
        }

        .profile-email {

            color: #a8b0d0;

            font-size: 14px;
        }


        /* =========================
           スコアカード
        ========================= */

        .stats {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 12px;

            margin-bottom: 20px;
        }

        .stat-card {

            background: rgba(20, 26, 56, .95);

            border: 1px solid #343c72;

            border-radius: 18px;

            padding: 20px;

            text-align: center;
        }

        .stat-title {

            color: #929bbb;

            font-size: 13px;

            margin-bottom: 8px;
        }

        .stat-value {

            font-size: 30px;

            font-weight: bold;

            background:
                linear-gradient(
                    135deg,
                    #ff4fc3,
                    #7df9ff
                );

            -webkit-background-clip: text;

            -webkit-text-fill-color: transparent;
        }

        .stat-unit {

            font-size: 13px;

            color: #a8b0d0;
        }


        /* =========================
           グラフカード
        ========================= */

        .chart-card {

            background: rgba(20, 26, 56, .95);

            border: 1px solid #343c72;

            border-radius: 20px;

            padding: 20px;

            margin-bottom: 18px;
        }

        .chart-title {

            font-size: 17px;

            font-weight: bold;

            margin-bottom: 15px;
        }

        .chart-wrapper {

            position: relative;

            height: 250px;
        }


        /* =========================
           お気に入り
        ========================= */

        .menu {

            display: flex;

            flex-direction: column;

            gap: 12px;

            margin-top: 20px;
        }

        .menu-item {

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 18px;

            text-decoration: none;

            color: white;

            background: rgba(20, 26, 56, .95);

            border: 1px solid #343c72;

            border-radius: 18px;
        }

        .menu-left {

            display: flex;

            align-items: center;

            gap: 14px;
        }

        .menu-icon {

            font-size: 25px;
        }

        .menu-title {

            font-weight: bold;
        }

        .menu-description {

            margin-top: 4px;

            color: #929bbb;

            font-size: 12px;
        }

        .arrow {

            color: #ff4fc3;

            font-size: 22px;
        }

        .favorite {

            border-color:
                rgba(237, 38, 155, .35);
        }


        /* =========================
           ログアウト
        ========================= */

        .logout-button {

            width: 100%;

            padding: 15px;

            margin-top: 20px;

            border: none;

            border-radius: 15px;

            background:
                linear-gradient(
                    135deg,
                    #ff4f81,
                    #ff2d55
                );

            color: white;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;

            box-shadow:
                0 0 18px
                rgba(255, 79, 129, .3);
        }


        /* =========================
           下部ナビ
        ========================= */

        .bottom-nav {

            position: fixed;

            bottom: 0;

            left: 0;

            right: 0;

            height: 75px;

            background:
                rgba(9, 13, 35, .97);

            border-top: 1px solid #30375f;

            display: flex;

            justify-content: space-around;

            align-items: center;

            z-index: 100;
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

            background:
                linear-gradient(
                    135deg,
                    #ff3dbd,
                    #8d5cff
                );

            color: white;

            font-size: 28px;

            box-shadow:
                0 0 20px
                rgba(255, 61, 189, .45);
        }

        .settings-button {
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    background: rgba(255, 255, 255, 0.08);
    color: white;
    text-decoration: none;
    font-size: 22px;
    transition: 0.3s;
}

.settings-button:hover {
    background: rgba(255, 255, 255, 0.15);
    transform: rotate(30deg);
}

    </style>

</head>


<body>


<div class="container">


    <!-- ヘッダー -->

    <header class="header">
    <div>
        <div class="logo">KARAOKE RECORD</div>
        <h1>👤 マイページ</h1>
    </div>

    <a href="{{ route('settings') }}" class="settings-button">⚙️</a>
</header>


    <!-- プロフィール -->

    <div class="profile-card">

        <div class="profile-icon">
            🎤
        </div>

        <div class="profile-name">

            🎤 {{ $user->name }}

        </div>

        <div class="profile-email">

            {{ $user->email }}

        </div>

    </div>


    <!-- =====================
         最高点・平均点
    ====================== -->

    <div class="stats">


        <div class="stat-card">

            <div class="stat-title">
                🏆 最高点
            </div>

            <div class="stat-value">
                {{ number_format($highest, 1) }}
            </div>

            <div class="stat-unit">
                点
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-title">
                📊 平均点
            </div>

            <div class="stat-value">
                {{ number_format($average, 1) }}
            </div>

            <div class="stat-unit">
                点
            </div>

        </div>


    </div>


    <!-- =====================
         ① スコア推移
    ====================== -->

    <div class="chart-card">

        <div class="chart-title">
            📈 スコア推移
        </div>

        <div class="chart-wrapper">

            <canvas id="scoreChart"></canvas>

        </div>

    </div>


    <!-- =====================
         ② ジャンル別
    ====================== -->

    <div class="chart-card">

        <div class="chart-title">
            🎵 ジャンル別の歌唱回数
        </div>

        <div class="chart-wrapper">

            <canvas id="genreChart"></canvas>

        </div>

    </div>


    <!-- =====================
         ④ 月ごとの歌唱回数
    ====================== -->

    <div class="chart-card">

        <div class="chart-title">
            🎤 月ごとの歌唱回数
        </div>

        <div class="chart-wrapper">

            <canvas id="monthChart"></canvas>

        </div>

    </div>


    <!-- お気に入り -->

    <div class="menu">

        <a href="{{ route('favorites.index') }}"
           class="menu-item favorite">

            <div class="menu-left">

                <div class="menu-icon">
                    ❤️
                </div>

                <div>

                    <div class="menu-title">
                        お気に入り曲
                    </div>

                    <div class="menu-description">
                        お気に入りに登録した曲を見る
                    </div>

                </div>

            </div>

            <div class="arrow">
                >
            </div>

        </a>

    </div>


    <!-- ログアウト -->

    <form method="POST"
          action="{{ route('logout') }}">

        @csrf

        <button type="submit"
                class="logout-button">

            🚪 ログアウト

        </button>

    </form>


</div>


<!-- =========================
     下部ナビ
========================= -->

<div class="bottom-nav">


    <a href="{{ route('home') }}"
       class="nav-item">

        <span class="nav-icon">
            ⌂
        </span>

        ホーム

    </a>


    <a href="{{ route('records.index') }}"
       class="nav-item">

        <span class="nav-icon">
            ♫
        </span>

        履歴

    </a>


    <a href="{{ route('songs.create') }}"
       class="nav-item">

        <span class="nav-icon plus">
            +
        </span>

    </a>


    <a href="{{ route('ranking') }}"
       class="nav-item">

        <span class="nav-icon">
            🏆
        </span>

        ランキング

    </a>


    <a href="{{ route('mypage') }}"
       class="nav-item active">

        <span class="nav-icon">
            👤
        </span>

        マイページ

    </a>


</div>


<!-- =========================
     グラフ
========================= -->

<script>

    // PHP → JavaScript

    const scoreLabels =
        @json($scoreLabels);

    const scoreData =
        @json($scoreData);


    const genreLabels =
        @json($genreLabels);

    const genreCounts =
        @json($genreCounts);


    const monthLabels =
        @json($monthLabels);

    const monthCounts =
        @json($monthCounts);


    /*
    |--------------------------------------------------------------------------
    | ① スコア推移
    |--------------------------------------------------------------------------
    */

    new Chart(
        document.getElementById('scoreChart'),
        {

            type: 'line',

            data: {

                labels: scoreLabels,

                datasets: [{

                    label: '点数',

                    data: scoreData,

                    tension: 0.35,

                    fill: true,

                    borderWidth: 3,

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                scales: {

                    y: {

                        min: 0,

                        max: 100,

                        ticks: {

                            color: '#a8b0d0'

                        },

                        grid: {

                            color:
                                'rgba(255,255,255,.08)'

                        }

                    },

                    x: {

                        ticks: {

                            color: '#a8b0d0'

                        },

                        grid: {

                            display: false

                        }

                    }

                },

                plugins: {

                    legend: {

                        labels: {

                            color: 'white'

                        }

                    }

                }

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | ② ジャンル別
    |--------------------------------------------------------------------------
    */

    new Chart(
        document.getElementById('genreChart'),
        {

            type: 'doughnut',

            data: {

                labels: genreLabels,

                datasets: [{

                    data: genreCounts,

                    borderWidth: 0

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {

                        position: 'bottom',

                        labels: {

                            color: 'white',

                            padding: 15

                        }

                    }

                }

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | ④ 月ごとの歌唱回数
    |--------------------------------------------------------------------------
    */

    new Chart(
        document.getElementById('monthChart'),
        {

            type: 'bar',

            data: {

                labels: monthLabels,

                datasets: [{

                    label: '歌唱回数',

                    data: monthCounts,

                    borderRadius: 8,

                    borderWidth: 0

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                scales: {

                    y: {

                        beginAtZero: true,

                        ticks: {

                            color: '#a8b0d0',

                            stepSize: 1

                        },

                        grid: {

                            color:
                                'rgba(255,255,255,.08)'

                        }

                    },

                    x: {

                        ticks: {

                            color: '#a8b0d0'

                        },

                        grid: {

                            display: false

                        }

                    }

                },

                plugins: {

                    legend: {

                        labels: {

                            color: 'white'

                        }

                    }

                }

            }

        }
    );

</script>


</body>

</html>