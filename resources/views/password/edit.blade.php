<div class="password-page">

    <div class="password-container">

        {{-- 戻る --}}
        <a href="{{ route('settings') }}" class="back-button">
            ←
        </a>

        {{-- タイトル --}}
        <div class="title-area">
            <div class="logo">
                KARAOKE RECORD
            </div>

            <h1>パスワード変更</h1>

            <p>
                アカウントのパスワードを変更できます
            </p>
        </div>


        {{-- パスワード変更カード --}}
        <div class="password-card">

            <div class="card-title">
                <div class="title-icon">
                    🔒
                </div>

                <div>
                    <h2>パスワード変更</h2>
                    <p>新しいパスワードを設定してください</p>
                </div>
            </div>


            {{-- Breezeのパスワード変更フォーム --}}
            @include('profile.partials.update-password-form')

        </div>

    </div>

</div>


<style>

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        background: #08091a;
    }


    .password-page {
        min-height: 100vh;

        padding: 35px 18px 60px;

        color: #ffffff;

        background:
            radial-gradient(
                circle at 10% 0%,
                rgba(100, 70, 255, 0.22),
                transparent 35%
            ),
            radial-gradient(
                circle at 90% 20%,
                rgba(230, 40, 210, 0.14),
                transparent 35%
            ),
            #08091a;
    }


    .password-container {
        width: min(700px, 100%);
        margin: 0 auto;
    }


    /* 戻るボタン */

    .back-button {
        width: 44px;
        height: 44px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 20px;

        border-radius: 14px;

        background: rgba(255,255,255,0.07);

        border: 1px solid rgba(255,255,255,0.08);

        color: white;

        text-decoration: none;

        font-size: 22px;
    }


    /* タイトル */

    .title-area {
        margin-bottom: 25px;
    }


    .logo {
        color: #a998ff;

        font-size: 11px;

        font-weight: 700;

        letter-spacing: 2px;
    }


    .title-area h1 {
        margin: 5px 0;

        font-size: 28px;

        color: #ffffff;
    }


    .title-area p {
        margin: 0;

        color: #777a98;

        font-size: 13px;
    }


    /* カード */

    .password-card {
        padding: 26px;

        border-radius: 24px;

        background:
            linear-gradient(
                145deg,
                rgba(24,25,52,0.96),
                rgba(12,13,32,0.98)
            );

        border: 1px solid rgba(110,90,255,0.22);

        box-shadow:
            0 20px 50px rgba(0,0,0,0.35),
            0 0 35px rgba(100,70,255,0.06);
    }


    /* カードタイトル */

    .card-title {
        display: flex;
        align-items: center;

        gap: 13px;

        margin-bottom: 25px;
    }


    .title-icon {
        width: 48px;
        height: 48px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 15px;

        background:
            linear-gradient(
                135deg,
                #5968ff,
                #d53bdf
            );

        font-size: 22px;

        box-shadow:
            0 8px 25px rgba(120,70,255,0.3);
    }


    .card-title h2 {
        margin: 0;

        color: white;

        font-size: 19px;
    }


    .card-title p {
        margin: 4px 0 0;

        color: #777a98;

        font-size: 12px;
    }


    /* Breezeの見出しを非表示 */

    .password-card section header {
        display: none;
    }


    /* ラベル */

    .password-card label {
        color: #b8b9cf !important;

        font-size: 13px;

        font-weight: 600;
    }


    /* 入力 */

    .password-card input {
        width: 100%;

        margin-top: 7px;

        padding: 14px 15px;

        border-radius: 13px !important;

        border: 1px solid rgba(255,255,255,0.10) !important;

        background: #101126 !important;

        color: white !important;

        box-shadow: none !important;

        outline: none;
    }


    .password-card input:focus {
        border-color: #875cff !important;

        box-shadow:
            0 0 0 3px rgba(135,92,255,0.12) !important;
    }


    /* 変更ボタン */

    .password-card button {
        border: none;

        border-radius: 14px;

        padding: 13px 27px;

        background:
            linear-gradient(
                135deg,
                #5867ff,
                #a93cff,
                #ed35b8
            ) !important;

        color: white !important;

        font-size: 14px;

        font-weight: 700;

        box-shadow:
            0 8px 25px rgba(180,50,255,0.25);

        transition: 0.2s;
    }


    .password-card button:hover {
        transform: translateY(-1px);
    }


    /* 成功メッセージ */

    .password-card .text-gray-600 {
        color: #7ff0ad !important;
    }


    /* エラー */

    .password-card .text-red-600 {
        color: #ff709e !important;
    }


    @media (max-width: 600px) {

        .password-page {
            padding: 25px 14px 50px;
        }

        .password-card {
            padding: 20px;
        }

        .title-area h1 {
            font-size: 23px;
        }

    }

</style>