{{-- User List Blade --}}
@extends('layouts.user_sidebar')

@section('content')
<div class="ml-54 mt-8 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">User List</h1>
    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-white text-left shadow-sm rounded-lg">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">Name</th>
                    <th class="py-3 px-6">Email</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($users as $user)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $user->name }}</td>
                    <td class="py-3 px-6">{{ $user->email }}</td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex justify-center space-x-4">
                            <a href="{{ route('user.show', $user->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded text-sm transition">View</a>
                            <a href="{{ route('user.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-sm transition">Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm transition">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
