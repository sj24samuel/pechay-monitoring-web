@extends('pages.layout.index')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">🩺 Disease Detection Details</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="mb-2"><strong class="text-gray-700">Disease:</strong> {{ $data['disease'] ?? 'N/A' }}</p>
            <p class="mb-2"><strong class="text-gray-700">Scanned By:</strong> {{ $data['user_name'] ?? 'N/A' }}</p>
            <p class="mb-2"><strong class="text-gray-700">Date:</strong> {{ $data['timestamp'] ?? 'N/A' }}</p>
            <p class="mb-2"><strong class="text-gray-700">Latitude:</strong> {{ $data['latitude'] ?? 'N/A' }}</p>
            <p class="mb-2"><strong class="text-gray-700">Longitude:</strong> {{ $data['longitude'] ?? 'N/A' }}</p>
        </div>

        <div>
            <strong class="text-gray-700 block mb-2">Scanned Image:</strong>
            @if (!empty($data['imageUrl']))
                <img src="{{ $data['imageUrl'] }}" alt="Scanned Image" class="rounded border shadow w-64 h-64 object-cover mx-auto">
            @else
                <div class="text-gray-500 italic">No image available.</div>
            @endif
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('detection.results') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            ← Back to Results
        </a>
    </div>
</div>
@endsection
