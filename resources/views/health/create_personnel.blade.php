@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Add Personnel</h1>

    <form action="{{ route('health.personnel.store') }}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Personnel Name</label>
            <input type="text" name="name" id="name" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:ring-blue-300" required>
        </div>

        <div class="mb-4">
            <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role</label>
            <input type="text" name="role" id="role" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:ring-blue-300" required>
        </div>

        <div class="mb-4">
            <label for="contact" class="block text-gray-700 text-sm font-bold mb-2">Contact Information</label>
            <input type="text" name="contact" id="contact" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:ring-blue-300" required>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Personnel</button>
    </form>
</div>
@endsection