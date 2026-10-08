<section>

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            パスワード変更
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            アカウントのパスワードを変更できます。
        </p>
    </header>


    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">

        @csrf
        @method('put')


        {{-- 現在のパスワード --}}
        <div>
            <x-input-label
                for="current_password"
                value="現在のパスワード"
            />

            <x-text-input
                id="current_password"
                name="current_password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="current-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="mt-2"
            />
        </div>


        {{-- 新しいパスワード --}}
        <div>
            <x-input-label
                for="password"
                value="新しいパスワード"
            />

            <x-text-input
                id="password"
                name="password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="mt-2"
            />
        </div>


        {{-- 新しいパスワード（確認） --}}
        <div>
            <x-input-label
                for="password_confirmation"
                value="新しいパスワード（確認）"
            />

            <x-text-input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2"
            />
        </div>


        {{-- 保存 --}}
        <div class="flex items-center gap-4">

            <x-primary-button>
                パスワードを変更する
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >
                    パスワードを変更しました。
                </p>
            @endif

        </div>

    </form>

</section>