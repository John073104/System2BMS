@extends('layouts.app')

@section('title', 'Edit Paper')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Paper</h1>
    <form action="{{ route('papers.update', $paper->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="type" class="block font-medium text-gray-700">Paper Type</label>
            <input 
                type="text" 
                id="type" 
                name="type" 
                value="{{ $paper->type }}" 
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300" 
                required
            >
        </div>
        <div>
            <label for="description" class="block font-medium text-gray-700">Description</label>
            <input 
                type="text" 
                id="description" 
                name="description" 
                value="{{ $paper->description }}" 
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300" 
                required
            >
        </div>
        <button type="submit" 
                class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-500">
            Update Paper
        </button>
    </form>
</div>
@endsection
