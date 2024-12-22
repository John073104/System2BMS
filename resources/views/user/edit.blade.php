@extends('layouts.user_sidebar')

@section('content')
@if(session('success'))
    <div class="mb-4 p-4 bg-green-200 text-green-800 border border-green-400 rounded-md">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="mb-4 p-4 bg-red-200 text-red-800 border border-red-400 rounded-md">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="ml-54 mt-8 p-6 bg-white shadow-md rounded-lg max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Profile</h1>
    <form action="{{ route('user.profile.update') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
            <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
            <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">New Password:</label>
            <input type="password" name="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password:</label>
            <input type="password" name="password_confirmation" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition duration-200">Update Profile</button>
    </form>
</div>
@endsection