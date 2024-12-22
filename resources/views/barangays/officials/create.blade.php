@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold">Add Barangay Official</h1>
    <form action="{{ route('barangay.officials.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control" id="position" name="position" required>
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Area</label>
            <input type="text" class="form-control" id="area" name="area" required>
        </div>
        <div class="mb-3">
            <label for="contact_info" class="form-label">Contact Info</label>
            <input type="text" class="form-control" id="contact_info" name="contact_info">
        </div>
        <button type="submit" class="btn btn-primary">Add Official</button>
    </form>
</div>
@endsection