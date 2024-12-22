@extends('layouts.user_sidebar')

@section('title', 'Clearance Requests')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Clearance Requests</h1>

    <!-- Form to submit a new clearance request -->
    <form action="{{ route('clearances.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6 mb-6">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="purpose" class="block text-sm font-medium text-gray-700">Purpose</label>
            <input type="text" name="purpose" id="purpose" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Submit Request</button>
    </form>

    <!-- List of clearance requests for the user -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Your Pending Requests</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Purpose</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($clearances as $index => $clearance)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $clearance->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $clearance->purpose }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <span class="text-{{ $clearance->status === 'pending' ? 'yellow' : ($clearance->status === 'approved' ? 'green' : 'red') }}-600">
                                {{ ucfirst($clearance->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
