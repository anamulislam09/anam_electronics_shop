<div class="container border p-5 mt-5">
  <h2 class="text-center">Login Form</h2>
  <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email Address -->
      <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full form-control" placeholder="Enter your email" type="email"
          name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full form-control" placeholder="Enter your password"
          type="password" name="password" required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      {{-- <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
          <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
          </a>
        @endif

        <x-primary-button class="ml-3 btn-primary">
          {{ __('Log in') }}
        </x-primary-button>
        <button class="btn btn-primary m-5">{{ __('Log in') }}</button>
        <a href="{{ route('register') }}">Registration first</a> --}}

      <div class="flex items-center justify-end mt-4">
        <a style="margin-right:50px"
          class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          href="{{ route('register') }}">
          Registration first
        </a>


        <button class="btn btn-primary ml-5">{{ __('Log in') }}</button>
      </div>


</div>
</form>
</x-guest-layout>
</div>
