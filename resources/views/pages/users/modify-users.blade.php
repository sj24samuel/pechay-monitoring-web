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
                <h1 class="text-3xl font-bold text-black">Edit User Record</h1>
                <p class="text-gray-400 text-sm mt-2">
                    Track and manage disease records efficiently.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-4 mt-6">

                <form action="{{ route('user.update', ['user' => $id]) }}" method="POST" class="p-4">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="firstname" class="block mb-2 text-sm font-medium text-black">First Name</label>
                            <input type="text" name="firstname" id="firstname"
                                class="bg-transparent border border-[#A7D129] text-black text-sm rounded-lg outline-none focus:border-[#1ED760] block w-full p-2.5"
                                placeholder="Enter First Name" value="{{ old('firstname', $data['firstname'] ?? '') }}"
                                required>
                        </div>
                        <div>
                            <label for="middlename" class="block mb-2 text-sm font-medium text-black">Middle Name</label>
                            <input type="text" name="middlename" id="middlename"
                                class="bg-transparent border border-[#A7D129] text-black text-sm rounded-lg outline-none focus:border-[#1ED760] block w-full p-2.5"
                                placeholder="Enter Middle Name" value="{{ old('middlename', $data['middlename'] ?? '') }}"
                                required>
                        </div>
                        <div>
                            <label for="lastname" class="block mb-2 text-sm font-medium text-black">Last Name</label>
                            <input type="text" name="lastname" id="lastname"
                                class="bg-transparent border border-[#A7D129] text-black text-sm rounded-lg outline-none focus:border-[#1ED760] block w-full p-2.5"
                                placeholder="Enter Last Name" value="{{ old('lastname', $data['lastname'] ?? '') }}"
                                required>
                        </div>
                        <div>
                            <label for="age" class="block mb-2 text-sm font-medium text-black">Age</label>
                            <input type="number" name="age" id="age"
                                class="bg-transparent border border-[#A7D129] text-black text-sm rounded-lg outline-none focus:border-[#1ED760] block w-full p-2.5"
                                placeholder="Enter Age" value="{{ old('age', $data['age'] ?? '') }}" required>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="text-black bg-[#A7D129] hover:bg-[#CDEB8B] font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Save Changes
                        </button>

                    </div>
                </form>
                <form action="{{ route('user.destroy', ['user' => $id]) }}" method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="deleteButton"
                        class="text-red-600 inline-flex items-center hover:text-black border border-red-600 hover:bg-red-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-black dark:hover:bg-red-600 dark:focus:ring-red-900">
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
