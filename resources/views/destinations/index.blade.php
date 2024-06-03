@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-semibold mb-4">Pending Destinations</h1>
        <ul class="list-disc list-inside mb-6">
            @foreach($pending as $destination)
                <li class="mb-2">
                    <span class="font-bold">{{ $destination->name }}</span> - {{ $destination->country }} ({{ $destination->planned_year }}) 
                    <form method="POST" action="{{ route('destinations.toggleVisited', $destination) }}" class="inline">
                        @csrf
                        <button type="submit" class="text-blue-500 hover:text-blue-700">Mark as Visited</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <h1 class="text-2xl font-semibold mb-4">Visited Destinations</h1>
        <ul class="list-disc list-inside mb-6">
            @foreach($visited as $destination)
                <li class="mb-2">
                    <span class="font-bold">{{ $destination->name }}</span> - {{ $destination->country }} ({{ $destination->planned_year }}) 
                    <form method="POST" action="{{ route('destinations.toggleVisited', $destination) }}" class="inline">
                        @csrf
                        <button type="submit" class="text-blue-500 hover:text-blue-700">Mark as Pending</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <a href="{{ route('destinations.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Destination</a>
    </div>
</div>
@endsection



