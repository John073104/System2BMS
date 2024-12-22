@extends('layouts.user_sidebar')

@section('content')
<div class="container mx-auto px-4 py-6 ml-54">
    <h1 class="text-2xl font-bold mb-4">Barangay Officials</h1>

    <div class="overflow-x-auto mt-6">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Position</th>
                    <th class="py-3 px-6 text-left">Contact</th>
                    <th class="py-3 px-6 text-left">Area</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse ($barangays as $barangay)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $barangay->name }}</td>
                        <td class="py-3 px-6">{{ $barangay->position }}</td>
                        <td class="py-3 px-6">{{ $barangay->contact }}</td>
                        <td class="py-3 px-6">{{ $barangay->area }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-3 px-6 text-center text-gray-500">No barangay officials found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
