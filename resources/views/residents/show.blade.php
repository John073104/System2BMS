@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4 text-center">Resident Details</h1>
    
    <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto">
        <!-- Image Container -->
        @if($resident->image)
            <div class="flex justify-center mb-6">
                <img src="{{ asset('public/images' . $resident->image) }}" alt="Resident Image" class="rounded-full w-32 h-32 object-cover border-4 border-gray-300">
            </div>
        @else
            <div class="flex justify-center mb-6">
                <span class="w-32 h-32 flex items-center justify-center bg-gray-200 rounded-full text-gray-500">No Image</span>
            </div>
        @endif

        <h5 class="text-lg font-semibold">First Name: {{ $resident->first_name }}</h5>
        <h5 class="text-lg font-semibold">Middle Name: {{ $resident->middle_name }}</h5>
        <h5 class="text-lg font-semibold">Last Name: {{ $resident->last_name }}</h5>
        <h5 class="text-lg font-semibold">Birthdate: {{ $resident->birthdate }}</h5>
        <h5 class="text-lg font-semibold">Place of Birth: {{ $resident->place_of_birth }}</h5>
        <h5 class="text-lg font-semibold">Age: {{ $resident->age }}</h5>
        <h5 class="text-lg font-semibold">Gender: {{ ucfirst($resident->gender) }}</h5>
        <h5 class="text-lg font-semibold">Civil Status: {{ ucfirst($resident->civil_status) }}</h5>
        <h5 class="text-lg font-semibold">Purok: {{ $resident->purok }}</h5>
        <h5 class="text-lg font-semibold">4Ps Beneficiary: {{ $resident->four_ps_beneficiary ? 'Yes' : 'No' }}</h5>
        <h5 class="text-lg font-semibold">Nationality: {{ $resident->nationality }}</h5>
        <h5 class="text-lg font-semibold">National ID: {{ $resident->national_id }}</h5>
        <h5 class="text-lg font-semibold">Address: {{ $resident->address }}</h5>
        <h5 class="text-lg font-semibold">Email: {{ $resident->email }}</h5>
    </div>

    <a href="{{ route('residents.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mt-4 inline-block">Back to Residents List</a>
</div>
@endsection
