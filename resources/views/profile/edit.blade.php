
    <div class="profile-page">

        <div class="profile-container">

            {{-- ヘッダー --}}
            <div class="profile-header">

                <a href="{{ route('settings') }}" class="back-button">
                    ←
                </a>

                <div>
                    <div class="logo">
                        KARAOKE RECORD
                    </div>

                    <h1>プロフィール編集</h1>

                    <p>プロフィール情報を変更できます</p>
                </div>

            </div>


            {{-- プロフィール編集 --}}
            <div class="profile-card">

                <div class="card-title">
                    <div class="title-icon">
                        👤
                    </div>

                    <div>
                        <h2>基本情報</h2>
                        <p>アカウント情報を編集してください</p>
                    </div>
                </div>


                @include('profile.partials.update-profile-information-form')

            </div>

        </div>

    </div>


    <style>

        * {
            box-sizing: border-box;
        }

        .profile-page {
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


        .profile-container {
            width: min(700px, 100%);
            margin: 0 auto;
        }


        /* ヘッダー */

        .profile-header {
            display: flex;
            align-items: center;
            gap: 14px;

            margin-bottom: 25px;
        }


        .back-button {
            width: 44px;
            height: 44px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background: rgba(255,255,255,0.07);

            border: 1px solid rgba(255,255,255,0.08);

            color: white;

            text-decoration: none;

            font-size: 22px;
        }


        .logo {
            color: #a998ff;

            font-size: 11px;

            font-weight: 700;

            letter-spacing: 2px;
        }


        .profile-header h1 {
            margin: 4px 0 3px;

            font-size: 27px;

            color: #ffffff;

            font-weight: 700;
        }


        .profile-header p {
            margin: 0;

            color: #777a98;

            font-size: 13px;
        }


        /* メインカード */

        .profile-card {
            padding: 25px;

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

            font-size: 23px;

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


        /* Breezeの見出しを隠す */

        .profile-card section header {
            display: none;
        }


        .profile-card section {
            color: white;
        }


        /* 入力欄 */

        .profile-card label {
            color: #b8b9cf !important;

            font-size: 13px;

            font-weight: 600;
        }


        .profile-card input {
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


        .profile-card input:focus {
            border-color: #875cff !important;

            box-shadow:
                0 0 0 3px rgba(135,92,255,0.12) !important;
        }


        /* 保存ボタン */

        .profile-card button {
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


        .profile-card button:hover {
            transform: translateY(-1px);
        }


        /* 保存成功 */

        .profile-card .text-gray-600 {
            color: #7ff0ad !important;
        }


        /* エラー */

        .profile-card .text-red-600 {
            color: #ff709e !important;
        }


        @media (max-width: 600px) {

            .profile-page {
                padding: 25px 14px 50px;
            }

            .profile-card {
                padding: 20px;
            }

            .profile-header h1 {
                font-size: 23px;
            }

        }

    </style>
