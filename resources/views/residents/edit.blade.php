@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Resident</h1>
    
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">{{ session('success') }}</div>
    @endif
    
    <form action="{{ route('residents.update', $resident->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="bg-white shadow-md rounded-lg mb-4">
            <div class="px-6 py-4 border-b">
                <h5 class="text-lg font-semibold">Resident Information</h5>
            </div>
            <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" id="first_name" name="first_name" value="{{ $resident->first_name }}" required>
                </div>
                <div class="mb-4">
                    <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle Name</label>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" id="middle_name" name="middle_name" value="{{ $resident->middle_name }}">
                </div>
                <div class="mb-4">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" id="last_name" name="last_name" value="{{ $resident->last_name }}" required>
                </div>
                <div class="mb-4">
                    <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                    <input type="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" id="birthdate" name="birthdate" value="{{ $resident->birthdate }}" required>
                </div>
                <div class="mb-4">
                    <label for="place_of_birth" class="block text-sm font-medium text-gray-700">Place of Birth</label>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" id="place_of_birth" name="place_of_birth" value="{{ $resident->place_of_birth }}" required>
                </div>
                <div class="mb-4">
                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" id="age" name="age" value="{{ $resident->age }}" required>
                </div>
                <div class="mb-4">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" id="gender" name="gender" required>
                        <option value="male" {{ $resident->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $resident->gender == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ $resident->gender == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="civil_status" class="block text-sm font-medium text-gray-700">Civil Status</label>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" id="civil_status" name="civil_status" value="{{ $resident->civil_status }}" required>
                </div>
                <div class="mb-4">
                    <label for="purok" class="block text-sm font-medium text-gray-700">Purok</label>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" id="purok" name="purok" value="{{ $resident->purok }}" required>
                </div>
                <div class="mb-4">
                    <label for="four_ps_beneficiary" class="block text-sm font-medium text-gray-700">4Ps Beneficiary</label>
                    <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" id="four_ps_beneficiary" name="four_ps_beneficiary" required>
                        <option value="1" {{ $resident->four_ps_beneficiary ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$resident->four_ps_beneficiary ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" id="nationality" name="nationality" value="{{ $resident->nationality }}" required>
                </div>
                <div class="mb-4">
                    <label for="national_id" class="block text-sm font-medium text-gray-700">National ID</label>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" id="national_id" name="national_id" value="{{ $resident->national_id }}" required>
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" id="address" name="address" value="{{ $resident->address }}" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" id="email" name="email" value="{{ $resident->email }}" required>
                </div>
                <div class="mb-4">
                    <label for="image_upload" class="block text-sm font-medium text-gray-700">Upload Image</label>
                    <input type="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" id="image_upload" name="image_upload">
                    <small class="text-gray-500">Leave blank to keep the current image.</small>
                </div>
            </div>
        </div>
        
        <div class="flex justify-center space-x-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update Resident</button>
        </div>
    </form>

    <form action="{{ route('residents.destroy', $resident->id) }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <div class="flex justify-center">
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete Resident</button>
        </div>
    </form>

    <div class="flex justify-center mt-3">
        <a href="{{ route('residents.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Back to Residents List</a>
    </div>
</div>
@endsection