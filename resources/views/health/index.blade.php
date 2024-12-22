@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Health and Sanitation</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Medicines Section --}}
    <h2 class="text-2xl font-semibold mt-6">Medicines</h2>
    <a href="{{ route('health.medicine.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-3 inline-block">Add Medicine</a>
    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Description</th>
                <th class="py-2 px-4 border-b">Quantity</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicines as $medicine)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">{{ $medicine->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $medicine->description }}</td>
                    <td class="py-2 px-4 border-b">{{ $medicine->quantity }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('health.medicine.edit', $medicine) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('health.medicine.destroy', $medicine) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Personnel Section --}}
    <h2 class="text-2xl font-semibold mt-6">Health Personnel</h2>
    <a href="{{ route('health.personnel.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-3 inline-block">Add Personnel</a>
    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Role</th>
                <th class="py-2 px-4 border-b">Contact</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personnels as $personnel)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">{{ $personnel->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $personnel->role }}</td>
                    <td class="py-2 px-4 border-b">{{ $personnel->contact }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('health.personnel.edit', $personnel) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('health.personnel.destroy', $personnel) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="text-2xl font-semibold mt-6">User  Requests</h2>

<table class="w-full border border-gray-300 rounded-lg overflow-hidden shadow-lg">
    <thead class="bg-gray-100">
        <tr>
            <th>Type</th>
            <th>Details</th>
            <th>Status</th>
            <th>Submitted At</th>
            <th>Release Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($requests as $request)
            <tr>
                <td>{{ $request->type }}</td>
                <td>{{ $request->details }}</td>
                <td>{{ $request->status }}</td>
                <td>{{ $request->created_at->format('Y-m-d H:i:s') }}</td>
                <td>{{ $request->release_date ? $request->release_date->format('Y-m-d H:i:s') : 'N/A' }}</td>
                <td>
                <form action="{{ route('admin.request.approve', $request->id) }}" method="POST" style="display:inline;">
        @csrf
        <input type="datetime-local" name="release_date" required>
        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded action-button">Approve</button>
    </form>
    <form action="{{ route('admin.request.reject', $request->id) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Reject</button>
    </form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No requests found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

</div>
@endsection
