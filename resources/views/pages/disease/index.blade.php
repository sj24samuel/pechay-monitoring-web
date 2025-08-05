@extends('pages.layout.index')

@section('content')
<div class="max-w-7xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-extrabold mb-8 text-gray-800">🧪 Detection Results</h1>

    @if (count($results) > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse rounded-lg overflow-hidden shadow-sm">
                <thead class="bg-gray-200 text-gray-700 text-sm uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-4 border-b">Scanned By</th>
                        <th class="px-6 py-4 border-b">Disease Name</th>
                        <th class="px-6 py-4 border-b">Scanned Date</th>
                        <th class="px-6 py-4 border-b text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach($results as $result)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 border-b whitespace-nowrap">
                                {{ $result['user_name'] ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 border-b whitespace-nowrap">
                                {{ $result['disease'] ?? 'Unknown Disease' }}
                            </td>
                            <td class="px-6 py-4 border-b whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($result['timestamp'] ?? now())->toDayDateTimeString() }}
                            </td>
                            <td class="px-6 py-4 border-b text-center">
                                <a href="{{ route('disease.view', ['id' => $result['id']]) }}"
                                   class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded shadow">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-500">No detection results found.</p>
    @endif
</div>
@endsection
