@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4"> <!-- Center the container -->
<!-- Added ml-64 -->
    <h1 class="text-2xl font-bold mb-4">Barangays</h1>
    <a href="{{ route('barangays.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create New Barangay</a>

    <div class="overflow-x-auto mt-6">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100 text-gray- 600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Position</th>
                    <th class="py-3 px-6 text-left">Contact</th>
                    <th class="py-3 px-6 text-left">Area</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($barangays as $barangay)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $barangay->name }}</td>
                        <td class="py-3 px-6">{{ $barangay->position }}</td>
                        <td class="py-3 px-6">{{ $barangay->contact }}</td>
                        <td class="py-3 px-6">{{ $barangay->area }}</td>
                        <td class="py-3 px-6">
                            <a href="{{ route('barangays.edit', $barangay) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action="{{ route('barangays.destroy', $barangay) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection