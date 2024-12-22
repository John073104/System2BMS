@extends('layouts.user_sidebar')

@section('content')
<div class="ml-54 mt-8 p-6 bg-white shadow-md rounded-lg max-w-lg">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Submit a Request</h1>
    <form action="{{ route('user.requests.store') }}" method="POST" class="space-y-4">
        @csrf
        <div class="flex flex-col">
            <label for="type" class="text-gray-600 font-medium">Request Type</label>
            <select id="type" name="type" required 
                class="mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="medicine">Medicine</option>
                <option value="appointment">Appointment</option>
            </select>
        </div>
        <div class="flex flex-col">
            <label for="details" class="text-gray-600 font-medium">Details</label>
            <textarea id="details" name="details" required 
                class="mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
        </div>
        <div class="flex justify-end">
            <button type="submit" 
                class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-md transition">
                Submit Request
            </button>
        </div>
    </form>
</div>
@endsection
