@extends('layouts.app')

@section('title', 'Clearance Requests')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Clearance Requests</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form to Add New Clearance Request -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Add New Clearance</h2>
        <form action="{{ route('clearances.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="border-gray-300 rounded-lg shadow-sm w-full" required>
            </div>
            <div class="mb-4">
                <label for="purpose" class="block text-sm font-medium text-gray-700">Purpose</label>
                <input type="text" name="purpose" id="purpose" class="border-gray-300 rounded-lg shadow-sm w-full" required>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="border-gray-300 rounded-lg shadow-sm w-full" required>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Add Clearance</button>
        </form>
    </div>

    <!-- List of all clearance requests for the admin -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Purpose</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($clearances as $index => $clearance)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $clearance->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $clearance->purpose }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ ucfirst($clearance->status) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <form action="{{ route('clearances.updateStatus', $clearance->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="border-gray-300 rounded-lg shadow-sm" onchange="this.form.submit()">
                                    <option value="pending" {{ $clearance->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $clearance->status === 'approved' ? 'selected' : '' }}>Approve</option>
                                    <option value="rejected" {{ $clearance->status === 'rejected' ? 'selected' : '' }}>Reject</option>
                                </select>
                            </form>

                            <!-- Release Date -->
                            <form action="{{ route('clearances.updateReleaseDate', $clearance->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <input type="date" name="release_date" class="border-gray-300 rounded-lg shadow-sm" required>
                                <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Set Release Date</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
