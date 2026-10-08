<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KARAOKE RECORD - ログイン</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(123, 92, 255, 0.25), transparent 35%),
                radial-gradient(circle at bottom right, rgba(255, 70, 150, 0.18), transparent 35%),
                #080b1c;
            color: white;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            max-width: 430px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* ロゴ */

        .logo {
            text-align: center;
            margin-top: 35px;
            margin-bottom: 45px;
        }

        .logo h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 800;
            letter-spacing: 3px;
            background: linear-gradient(90deg, #ff4f9a, #9b7cff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .logo p {
            margin-top: 10px;
            color: #9da3c7;
            font-size: 13px;
            letter-spacing: 1px;
        }

        /* ログインカード */

        .login-card {
            background: rgba(18, 22, 50, 0.88);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 30px 25px;
            box-shadow:
                0 15px 45px rgba(0, 0, 0, 0.35),
                0 0 30px rgba(124, 92, 255, 0.08);
            backdrop-filter: blur(10px);
        }

        .login-title {
            margin: 0 0 25px;
            font-size: 22px;
            text-align: center;
        }

        /* 入力欄 */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #c8cce5;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #30365f;
            border-radius: 13px;
            background: #0e1229;
            color: white;
            font-size: 15px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #9b7cff;
            box-shadow: 0 0 12px rgba(155, 124, 255, 0.2);
        }

        /* ログインボタン */

        .login-button {
            width: 100%;
            padding: 15px;
            margin-top: 5px;
            border: none;
            border-radius: 15px;
            background: linear-gradient(135deg, #ff4f9a, #8d6cff);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 0 20px rgba(255, 79, 154, 0.25);
        }

        .login-button:hover {
            opacity: 0.9;
        }

        /* パスワード忘れ */

        .forgot {
            text-align: center;
            margin-top: 20px;
        }

        .forgot a {
            color: #9da3c7;
            font-size: 13px;
            text-decoration: none;
        }

        .forgot a:hover {
            color: #c5b8ff;
        }

        /* 新規登録 */

        .register-area {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            text-align: center;
        }

        .register-area p {
            margin: 0 0 12px;
            color: #8f95b8;
            font-size: 13px;
        }

        .register-button {
            display: block;
            width: 100%;
            padding: 14px;
            border: 1px solid #555b87;
            border-radius: 15px;
            color: white;
            text-decoration: none;
            font-size: 15px;
            background: rgba(255, 255, 255, 0.03);
        }

        .register-button:hover {
            background: rgba(255, 255, 255, 0.07);
        }

        /* エラー */

        .error-message {
            margin-bottom: 20px;
            padding: 12px 15px;
            border-radius: 12px;
            background: rgba(255, 70, 100, 0.12);
            border: 1px solid rgba(255, 70, 100, 0.25);
            color: #ff8ba7;
            font-size: 13px;
        }

        /* スマホ */

        @media (max-width: 480px) {

            .container {
                padding: 25px 15px;
            }

            .logo {
                margin-top: 20px;
                margin-bottom: 30px;
            }

            .logo h1 {
                font-size: 27px;
            }

            .login-card {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- ロゴ -->

    <div class="logo">
        <h1>KARAOKE RECORD</h1>
        <p>歌って、記録して、成長しよう。</p>
    </div>


    <!-- ログイン -->

    <div class="login-card">

        <h2 class="login-title">
            ログイン
        </h2>


        <!-- エラーメッセージ -->

        @if ($errors->any())

            <div class="error-message">

                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach

            </div>

        @endif


        <form method="POST" action="{{ route('login') }}">

            @csrf


            <!-- メールアドレス -->

            <div class="form-group">

                <label for="email">
                    メールアドレス
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="メールアドレスを入力"
                >

            </div>


            <!-- パスワード -->

            <div class="form-group">

                <label for="password">
                    パスワード
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="パスワードを入力"
                >

            </div>


            <!-- ログインボタン -->

            <button type="submit" class="login-button">
                ログイン
            </button>


            <!-- パスワードを忘れた -->

            @if (Route::has('password.request'))

                <div class="forgot">

                    <a href="{{ route('password.request') }}">
                        パスワードを忘れた場合
                    </a>

                </div>

            @endif

        </form>


        <!-- 新規登録 -->

        <div class="register-area">

            <p>
                アカウントを持っていませんか？
            </p>

            <a href="{{ route('register') }}" class="register-button">
                新規登録
            </a>

        </div>

    </div>

</div>

</body>
</html>