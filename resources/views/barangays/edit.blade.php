@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4 ml-54">Edit Barangay</h1>
    <form action="{{ route('barangays.update', $barangay) }}" method="POST" class="space-y-4 ml-54">
        @csrf
        @method('PUT')
        
        <div class="flex flex-col">
            <label for="name" class="text-sm font-medium text-gray-700">Name:</label>
            <input type="text" name="name" value="{{ $barangay->name }}" required class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
        </div>
        
        <div class="flex flex-col">
            <label for="position" class="text-sm font-medium text-gray-700">Position:</label>
            <input type="text" name="position" value="{{ $barangay->position }}" required class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
        </div>
        
        <div class="flex flex-col">
            <label for="contact" class="text-sm font-medium text-gray-700">Contact:</label>
            <input type="text" name="contact" value="{{ $barangay->contact }}" required class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
        </div>
        
        <div class="flex flex-col">
            <label for="area" class="text-sm font-medium text-gray-700">Area:</label>
            <input type="text" name="area" value="{{ $barangay->area }}" required class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
        </div>
        
        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">Update</button>
    </form>
</div>
@endsection