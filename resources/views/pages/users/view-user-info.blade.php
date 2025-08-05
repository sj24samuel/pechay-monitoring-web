@extends('pages.layout.index')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <div class="flex items-center mb-6">
        @if (!empty($user['profile_picture']))
            <img src="{{ $user['profile_picture'] }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover shadow mr-6">
        @else
            <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center mr-6 text-gray-500">
                <span class="text-3xl">👤</span>
            </div>
        @endif
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">User Profile</h1>
            <p class="text-gray-500">{{ $user['email'] ?? 'No email' }}</p>
        </div>
    </div>

    <div class="space-y-4 text-gray-700">
        <div>
            <p class="text-sm text-gray-500">Full Name</p>
            <p class="text-lg font-medium">
                {{ $user['first_name'] ?? '' }} {{ $user['middle_initial'] ?? '' }} {{ $user['last_name'] ?? '' }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-500">Age</p>
                <p class="text-lg">{{ $user['age'] ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Sex</p>
                <p class="text-lg">{{ $user['sex'] ?? 'N/A' }}</p>
            </div>
        </div>

        <div>
            <p class="text-sm text-gray-500">Address</p>
            <p class="text-lg">{{ $user['address'] ?? 'N/A' }}</p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('users') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">← Back to Users</a>
    </div>
</div>
@endsection
