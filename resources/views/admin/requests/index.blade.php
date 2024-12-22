<!-- resources/views/admin/requests.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Requests</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td>{{ $request->status }}</td>
                <td>
                   <!-- resources/views/admin/requests.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Requests</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td>{{ $request->status }}</td>
                <td>
                    <form action="{{ route('admin.request.approve', $request->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="datetime-local" name="release_date" required>
                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Approve</button>
                    </form>
                    <form action="{{ route('admin.request.reject', $request->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Reject</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection