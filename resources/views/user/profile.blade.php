@extends('layouts.user_sidebar')

@section('content')
<div class="ml-64 mt-8 p-6 bg-white shadow-md rounded-lg max-w-lg">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">User Profile</h1>
    <div class="mb-4">
        <p class="text-gray-600"><span class="font-medium text-gray-800">Name:</span> {{ $user->name }}</p>
        <p class="text-gray-600"><span class="font-medium text-gray-800">Email:</span> {{ $user->email }}</p>
    </div>

    <div class="flex space-x-4">
    <a href="{{ route('user.edit', $user->id) }}" 
   class="bg-blue-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-md transition">
   Edit
</a>

        <form action="{{ route('user.profile.delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');" class="inline">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded transition">
                Delete Account
            </button>
        </form>
    </div>
</div>
@endsection
