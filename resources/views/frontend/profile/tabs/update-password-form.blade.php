<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>
    <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf

        {{-- Current Password --}}
        <x-frontend.form.input  name="current_password"      col="" type="password" label="Current Password" autocomplete="current-password" />
        <x-frontend.form.input-error :messages="$errors->updatePassword->get('current_password') ? trans('messages.current_password') : ''" class="mt-2" />

        {{-- New Password --}}
        <x-frontend.form.input  name="password"              col="" type="password" label="New Password"     autocomplete="new-password" />
        <x-frontend.form.input-error :messages="$errors->updatePassword->get('password') ? trans('messages.password') : ''" class="mt-2" />

        {{-- Confirm Password --}}
        <x-frontend.form.input  name="password_confirmation" col="" type="password" label="Confirm Password" autocomplete="new-password"  />
        <x-frontend.form.input-error :messages="$errors->updatePassword->get('password_confirmation') ? trans('messages.password_confirmation') : ''" class="mt-2" />

        <x-frontend.form.button type="submit">Update Password</x-frontend.form.button>
    </form>
</section>
