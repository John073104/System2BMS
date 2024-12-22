@extends('layouts.user_sidebar')

@section('content')
<div class="ml-54 mt-8 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">My Requests</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md mt-4">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b">Type</th>
                <th class="py-2 px-4 border-b">Details</th>
                <th class="py-2 px-4 border-b">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">{{ $request->type }}</td>
                    <td class="py-2 px-4 border-b">{{ $request->details }}</td>
                    <td class="py-2 px-4 border-b capitalize">{{ $request->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
