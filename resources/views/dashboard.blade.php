@extends('layouts.app')

@section('content')
<div class="bg-cover bg-center h-screen" style="background-image: url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0');">
    <div class="container mx-auto flex items-center justify-center h-full">
        <div class="bg-white bg-opacity-90 rounded-lg shadow-lg p-6 max-w-3xl w-full">
            <div class="card">
                <div class="card-header text-center text-2xl font-bold bg-gray-800 text-white rounded-t-lg">
                    {{ __('Dashboard') }}
                </div>

                <div class="card-body p-4">
                    <div class="row mb-4">
                        <!-- Button to Create Post -->
                        <div class="col-md-12 text-center">
                            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                                Create Post
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Profile Picture and Bio -->
                        <div class="col-md-4 text-center mb-4">
                            <img src="{{ Auth::user()->avatar ? asset('avatars/' . Auth::user()->avatar) : asset('images/default-avatar.png') }}" alt="Profile Picture" class="rounded-full mb-3 border-4 border-white shadow-lg" style="width: 150px; height: 150px;">
                            <h4 class="text-xl font-semibold">{{ Auth::user()->name }}</h4>
                            <p class="text-gray-600">{{ Auth::user()->email }}</p>
                        </div>

                        <!-- User Information and Activity -->
                        <div class="col-md-8">
                            <h5 class="font-semibold text-lg">Bio</h5>
                            <p class="text-gray-700">{{ Auth::user()->bio ?? 'No bio available. Add your bio in the profile settings!' }}</p>

                            <h5 class="mt-4 font-semibold text-lg">Recent Activity</h5>
                            <ul class="list-group">
                                <li class="list-group-item">You updated your profile picture</li>
                                <li class="list-group-item">You changed your password</li>
                                <!-- Add more activity items as needed -->
                            </ul>

                            <!-- Displaying Posts -->
                            <h5 class="mt-4 font-semibold text-lg">Posts</h5>
                            @foreach ($posts as $post)
                                <div class="border p-2 mb-2 rounded">
                                    <h6 class="font-semibold">{{ $post->user->name }}</h6>
                                    <p>{{ $post->content }}</p>
                                    <form method="POST" action="{{ route('likes.store', $post->id) }}">
                                        @csrf
                                        <button type="submit" class="text-sm text-blue-500">Like</button>
                                    </form>

                                    <div class="mt-2">
                                        <form method="POST" action="{{ route('comments.store', $post->id) }}">
                                            @csrf
                                            <input type="text" name="comment" placeholder="Add a comment" class="form-control mb-2" required>
                                            <button type="submit" class="btn btn-secondary btn-sm">Comment</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Dropdown -->
    <div class="absolute top-0 right-0 mt-4 mr-4">
        <div class="relative inline-block text-left">
            <div>
                <button id="dropdown-button" type="button" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none" aria-haspopup="true" aria-expanded="true">
                    <img src="{{ Auth::user()->avatar ? asset('avatars/' . Auth::user()->avatar) : asset('images/default-avatar.png') }}" class="w-8 h-8 rounded-full mr-2" alt="Profile Image">
                    {{ Auth::user()->name }}
                </button>
            </div>

            <!-- Dropdown Menu -->
            <div id="dropdown-menu" class="absolute right-0 z-10 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                <div class="py-1" role="none">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">{{ __('Profile Edit') }}</a>
                    <form method="POST" action="{{ route('logout') }}" role="none">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">{{ __('Log Out') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('dropdown-button');
    const menu = document.getElementById('dropdown-menu');

    button.addEventListener('click', function () {
        menu.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function (event) {
        if (!button.contains(event.target) && !menu.contains(event.target)) {
            menu.classList.add('hidden');
        }
    });
});
</script>

@endsection
