@extends('layouts.app')

@section('content')
<div class="bg-cover bg-center h-screen" style="background-image: url('https://images.unsplash.com/photo-1517174017328-1c5ccf88852e');">
    <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
        <div class="card w-full max-w-md bg-white rounded-lg shadow-lg">
            <div class="card-header text-center text-2xl font-bold py-4">
                {{ __('Login') }}
            </div>

            <div class="card-body p-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror w-full p-2 border border-gray-300 rounded" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror w-full p-2 border border-gray-300 rounded" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4 flex items-center">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label ml-2" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div class="flex justify-between mb-0">
                        <button type="submit" class="btn btn-primary w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="text-blue-600 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
