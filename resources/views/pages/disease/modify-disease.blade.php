@extends('pages.layout.index')

@section('content')
    @if (isset($id) && !empty($id))
        <div class="flex items-center space-x-4 mb-4">
            <a href="{{ url()->previous() }}"
                class="text-black bg-gray-100 hover:bg-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mt-10">
                ← Back
            </a>
        </div>

        <div class="mx-auto w-full max-w-6xl mt-10">
            <div class="sm:rounded-lg overflow-hidden p-4">
                <h1 class="text-3xl font-bold text-black">Edit Disease Record</h1>
                <p class="text-gray-400 text-sm mt-2">
                    Track and manage disease records efficiently.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-4 mt-6">

                <form action="{{ route('disease.update', ['disease' => $id]) }}" method="POST" class="p-4 w-full">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-black">Disease Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-transparent border border-[#A7D129] text-black text-sm rounded-lg outline-none focus:border-[#1ED760] block w-full p-2.5"
                                placeholder="Enter disease name" value="{{ old('name', $data['name'] ?? '') }}" required>
                        </div>
                        <div>
                            <label for="scanned-date" class="block mb-2 text-sm font-medium text-black">Scanned Date</label>
                            <input type="date" name="scanned-date" id="scanned-date"
                                class="bg-transparent border border-[#A7D129] text-black text-sm rounded-lg outline-none focus:border-[#1ED760] block w-full p-2.5"
                                placeholder="Enter scanned date"
                                value="{{ old('scanned-date', $data['scanned-date'] ?? '') }}" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-black">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="block p-2.5 w-full text-sm text-black bg-transparent border border-[#A7D129] rounded-lg outline-none focus:border-[#1ED760]"
                                placeholder="Write description here">{{ old('description', $data['description'] ?? '') }}</textarea>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="text-black bg-[#A7D129] hover:bg-[#CDEB8B] font-medium rounded-lg text-sm px-5 py-2.5">
                            Save Changes
                        </button>
                    </div>
                </form>
                <form action="{{ route('disease.destroy', ['disease' => $id]) }}" method="POST" id="deleteForm"
                    class="p-4 flex items-center">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="deleteButton"
                        class="text-red-600 inline-flex items-center hover:text-black border border-red-600 hover:bg-red-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Delete
                    </button>
                </form>

            </div>


        </div>
    @else
        <p>Debug ID: {{ $id ?? 'Not found' }}</p>
    @endif
    <script>
        document.getElementById("deleteButton").addEventListener("click", function() {
            if (confirm("Are you sure you want to delete this record?")) {
                document.getElementById("deleteForm").submit();
            }
        });
    </script>
@endsection
