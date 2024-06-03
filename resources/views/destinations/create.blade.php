@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-semibold mb-4">Add New Destination</h1>
        <form method="POST" action="{{ route('destinations.store') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="country" class="block text-sm font-medium text-gray-700">Country:</label>
                <input type="text" id="country" name="country" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="planned_year" class="block text-sm font-medium text-gray-700">Planned Year:</label>
                <input type="number" id="planned_year" name="planned_year" min="1900" max="2100" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            </div>
            <div class="mb-4">
                <label for="image_url" class="block text-sm font-medium text-gray-700">Image URL:</label>
                <input type="url" id="image_url" name="image_url" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <button type="submit" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Save Destination</button>
            </div>
        </form>
    </div>
</div>
@endsection


