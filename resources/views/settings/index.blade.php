<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>設定 | KARAOKE RECORD</title>

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
                radial-gradient(circle at top left, #342060, transparent 35%),
                radial-gradient(circle at bottom right, #24135c, transparent 35%),
                #090b1a;
        }

        .container {
            width: min(900px, 92%);
            margin: 0 auto;
            padding: 30px 0 50px;
        }

        .header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .back-button {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: rgba(255,255,255,0.08);
            color: white;
            text-decoration: none;
            font-size: 22px;
        }

        .logo {
            color: #b9a7ff;
            font-size: 12px;
            letter-spacing: 2px;
        }

        h1 {
            margin: 3px 0 0;
            font-size: 28px;
        }

        .settings-card {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 20px;
            padding: 22px;
            margin-bottom: 18px;
        }

        .settings-card h2 {
            margin: 0 0 8px;
            font-size: 18px;
        }

        .settings-card p {
            margin: 0 0 18px;
            color: #aaaabd;
            font-size: 14px;
        }

        .setting-button {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px;
            border: none;
            border-radius: 14px;
            background: rgba(255,255,255,0.06);
            color: white;
            text-decoration: none;
            font-size: 15px;
            cursor: pointer;
            margin-top: 10px;
        }

        .setting-button:hover {
            background: rgba(255,255,255,0.12);
        }

        .arrow {
            color: #aaa;
            font-size: 20px;
        }

        .logout-button {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 14px;
            background: rgba(255,80,120,0.15);
            color: #ff8da8;
            font-size: 15px;
            cursor: pointer;
        }

        .user-info {
            color: #aaaabd;
            font-size: 14px;
            line-height: 1.8;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <a href="{{ route('mypage') }}" class="back-button">
            ←
        </a>

        <div>
            <div class="logo">KARAOKE RECORD</div>
            <h1>⚙️ 設定</h1>
        </div>

    </div>


    <!-- アカウント情報 -->
    <div class="settings-card">

        <h2>👤 アカウント</h2>

        <p>登録しているユーザー情報</p>

        <div class="user-info">
            ユーザー名：{{ $user->name }}<br>
            メールアドレス：{{ $user->email }}<br>

            生年月日：
            @if($user->birth_date)
                {{ $user->birth_date->format('Y年m月d日') }}
            @else
                未設定
            @endif
        </div>

    </div>


    <!-- プロフィール編集 -->
    <div class="settings-card">

        <h2>✏️ プロフィール</h2>

        <p>ユーザー情報を変更できます。</p>

        <a href="{{ route('profile.edit') }}" class="setting-button">
    プロフィール編集
    <span class="arrow">></span>
</a>
    </div>


    <!-- パスワード -->
    <div class="settings-card">

        <h2>🔒 セキュリティ</h2>

        <p>アカウントのセキュリティ設定</p>

        <a href="{{ route('password.edit') }}" class="setting-button">
    パスワード変更
    <span class="arrow">></span>
</a>

    </div>


    <!-- ログアウト -->
    <div class="settings-card">

        <h2>🚪 アカウント</h2>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="logout-button">
                ログアウト
            </button>
        </form>

    </div>

</div>

</body>
</html>