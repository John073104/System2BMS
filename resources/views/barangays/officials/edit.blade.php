@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold">Edit Barangay Official</h1>
    <form action="{{ route('barangay.officials.update', $official->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $official->name }}" required>
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ $official->position }}" required>
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Area</label>
            <input type="text" class="form-control" id="area" name="area" value="{{ $official->area }}" required>
        </div>
        <div class="mb-3">
            <label for="contact_info" class="form-label">Contact Info</label>
            <input type="text" class="form-control" id="contact_info" name="contact_info" value="{{ $official->contact_info }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Official</button>
    </form>
</div>
@endsection