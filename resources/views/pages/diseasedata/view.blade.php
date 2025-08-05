@extends('pages.layout.index')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md relative">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $disease['disease_name'] ?? 'Disease Details' }}</h1>

    {{-- Action Buttons --}}
    <div class="absolute top-6 right-6 flex space-x-2">
        <a href="{{ route('disease.databank.edit', $disease['id']) }}" 
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm transition">
            ✏️ Edit
        </a>
        <button onclick="window.print()" 
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm transition">
            🖨️ Print
        </button>
    </div>

    {{-- Disease Info --}}
    <div id="print-content" class="space-y-6 text-gray-700">
        <div>
            <h2 class="text-xl font-semibold text-gray-700">Symptoms</h2>
            <ul class="list-disc ml-6 mt-2">
                @forelse($disease['symptoms'] ?? [] as $symptom)
                    <li>{{ $symptom }}</li>
                @empty
                    <li>No symptoms listed.</li>
                @endforelse
            </ul>
        </div>

        <div>
            <h2 class="text-xl font-semibold text-gray-700">Condition</h2>
            <ul class="list-disc ml-6 mt-2">
                @forelse($disease['condition'] ?? [] as $condition)
                    <li>{{ $condition }}</li>
                @empty
                    <li>No conditions listed.</li>
                @endforelse
            </ul>
        </div>

        <div>
            <h2 class="text-xl font-semibold text-gray-700">Control</h2>
            <ul class="list-disc ml-6 mt-2">
                @forelse($disease['control'] ?? [] as $control)
                    <li>{{ $control }}</li>
                @empty
                    <li>No controls listed.</li>
                @endforelse
            </ul>
        </div>

        <div>
            <h2 class="text-xl font-semibold text-gray-700">References</h2>
            <ul class="list-disc ml-6 mt-2">
                @forelse($disease['references'] ?? [] as $ref)
                    <li>{{ $ref }}</li>
                @empty
                    <li>No references listed.</li>
                @endforelse
            </ul>
        </div>
    </div>

    {{-- Back Button --}}
    <div class="mt-8">
        <a href="{{ route('disease.databank') }}" 
           class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            ← Back to Data Bank
        </a>
    </div>
</div>

{{-- Optional: Print Styles --}}
@push('styles')
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #print-content, #print-content * {
            visibility: visible;
        }
        #print-content {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
@endpush
@endsection
