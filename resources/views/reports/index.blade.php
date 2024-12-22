@extends('layouts.app')

@section('title', 'Reports')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Reports</h1>

    <!-- Section: Clearance Report -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        @if(isset($clearances) && $clearances->count() > 0)
            <ul>
                <li>Total Clearances Issued: {{ $clearances->count() }}</li>
                <li>Total Released: {{ $clearances->where('status', 'released')->count() }}</li>
                <li>Total Cancelled: {{ $clearances->where('status', 'cancelled')->count() }}</li>
            </ul>
        @else
            <p>No clearance data available.</p>
        @endif
    </div>

    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">Clearance Report</h1>

        <!-- Print Button -->
        <div class="mb-4">
            <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded">Print Report</button>
        </div>

        <!-- Residents List Section -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Residents List</h2>
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($residents as $index => $resident)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $resident->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $resident->address }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Barangay Officials Section -->
        <!-- <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Barangay Officials</h2>
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
    @foreach ($officials as $index => $official)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $official->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $official->position }}</td>
        </tr>
    @endforeach
</tbody> -->

            </table>
        </div>
    </div>
</div>
@endsection
