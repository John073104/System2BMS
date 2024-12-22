@extends('layouts.user_sidebar')

@section('content')
<div class="ml-54 p-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Health & Sanitation</h1>

    {{-- Medicines Section --}}
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Medicines</h2>
    <table class="w-full border border-gray-300 rounded-lg overflow-hidden shadow-lg mb-8">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-2 text-gray-700 font-medium">Name</th>
                <th class="text-left px-4 py-2 text-gray-700 font-medium">Description</th>
                <th class="text-left px-4 py-2 text-gray-700 font-medium">Quantity</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($medicines as $medicine)
                <tr>
                    <td class="px-4 py-2">{{ $medicine->name }}</td>
                    <td class="px-4 py-2">{{ $medicine->description }}</td>
                    <td class="px-4 py-2">{{ $medicine->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Personnel Section --}}
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Health Personnel</h2>
    <table class="w-full border border-gray-300 rounded-lg overflow-hidden shadow-lg mb-8">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left px-4 py-2 text-gray-700 font-medium">Name</th>
                <th class="text-left px-4 py-2 text-gray-700 font-medium">Role</th>
                <th class="text-left px-4 py-2 text-gray-700 font-medium">Contact</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($personnels as $personnel)
                <tr>
                    <td class="px-4 py-2">{{ $personnel->name }}</td>
                    <td class="px-4 py-2">{{ $personnel->role }}</td>
                    <td class="px-4 py-2">{{ $personnel->contact }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="text-2xl font-semibold text-gray-700 mb-4">User  Requests</h2>

{{-- Button to add new request --}}
<a href="{{ route('user.requests.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
    Add New Request
</a>

<table class="w-full border border-gray-300 rounded-lg overflow-hidden shadow-lg">
    <thead class="bg-gray-100">
        <tr>
            <th class="text-left px-4 py-2 text-gray-700 font-medium">Type</th>
            <th class="text-left px-4 py-2 text-gray-700 font-medium">Details</th>
            <th class="text-left px-4 py-2 text-gray-700 font-medium">Status</th>
            <th class="text-left px-4 py-2 text-gray-700 font-medium">Submitted At</th>
            <th class="text-left px-4 py-2 text-gray-700 font-medium">Release Date</th> <!-- New column for release date -->
        </tr>
    </thead>
    <tbody>
    @forelse($requests as $request)
        <tr>
            <td>{{ $request->type }}</td>
            <td>{{ $request->details }}</td>
            <td>{{ $request->status }}</td>
            <td>{{ $request->created_at->format('Y-m-d H:i:s') }}</td>
            <td>{{ $request->release_date ? $request->release_date->format('Y-m-d H:i:s') : 'N/A' }}</td> <!-- Display release date -->
        </tr>
    @empty
        <tr>
            <td colspan="5">No requests found.</td>
        </tr>
    @endforelse
    </tbody>
</table>
</div>
@endsection
