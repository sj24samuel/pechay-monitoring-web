@extends('pages.layout.index')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">✏️ Edit Disease Information</h1>

    <form action="{{ route('disease.databank.update', $disease['id']) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Disease Name --}}
        <div>
            <label class="block text-gray-700 font-semibold text-lg mb-1">Disease Name</label>
            <input type="text" name="disease_name" value="{{ $disease['disease_name'] }}" required
                class="w-full p-4 text-lg border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        {{-- Symptoms --}}
        <div>
            <label class="block text-gray-700 font-semibold text-lg mb-1">Symptoms (one per line)</label>
            <textarea name="symptoms" rows="6"
                class="w-full p-4 text-lg border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 min-h-[150px]">{{ implode("\n", $disease['symptoms'] ?? []) }}</textarea>
        </div>

        {{-- Condition --}}
        <div>
            <label class="block text-gray-700 font-semibold text-lg mb-1">Condition (one per line)</label>
            <textarea name="condition" rows="6"
                class="w-full p-4 text-lg border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 min-h-[150px]">{{ implode("\n", $disease['condtion'] ?? []) }}</textarea>
        </div>

        {{-- Control --}}
        <div>
            <label class="block text-gray-700 font-semibold text-lg mb-1">Control (one per line)</label>
            <textarea name="control" rows="6"
                class="w-full p-4 text-lg border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 min-h-[150px]">{{ implode("\n", $disease['control'] ?? []) }}</textarea>
        </div>

        {{-- References --}}
        <div>
            <label class="block text-gray-700 font-semibold text-lg mb-1">References (one per line)</label>
            <textarea name="references" rows="4"
                class="w-full p-4 text-lg border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 min-h-[120px]">{{ implode("\n", $disease['references'] ?? []) }}</textarea>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between mt-6">
            <a href="{{ route('disease.databank') }}"
                class="px-5 py-3 bg-gray-500 text-white text-lg rounded-lg hover:bg-gray-600 transition">← Cancel</a>

            <button type="submit"
                class="px-6 py-3 bg-blue-600 text-white text-lg font-semibold rounded-lg hover:bg-blue-700 transition">
                💾 Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
