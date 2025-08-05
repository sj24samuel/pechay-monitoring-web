@extends('pages.layout.index');
@section('content')
    <div class="mx-auto w-full max-w-6xl">
        <div class="bg-gray-50 border border-gray-100 sm:rounded-lg overflow-hidden mt-10 w-full">
            <!-- Page Header -->
            <div class="text-left p-4">
                <h1 class="text-3xl font-bold text-black">Users Record</h1>
                <p class="text-gray-400 text-sm mt-2">
                    Track and manage disease records efficiently.
                </p>
            </div>
            @if (session('success'))
                <div id="successBanner"
                    class="bg-yellow-200 text-black px-4 py-2 rounded-lg shadow-lg fixed top-5 right-5 z-50 transition-opacity duration-500">
                    {{ session('success') }}
                    <button id="closeBanner" class="ml-4 text-black font-bold">✕</button>
                </div>
            @endif
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full">
                    <form action="{{ route('users') }}" method="GET" class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name="search" id="simple-search"
                                class="bg-transparent text-black text-black text-sm rounded-lg outline-none border focus:border-[#A7D129] block w-full pl-10 p-2"
                                placeholder="Search User..." value="{{ request('search') }}">
                        </div>
                    </form>
                </div>
            </div>

            <div class="container text-black w-full p-4">
                <div class="relative overflow-x-auto sm:rounded-lg">
                    @if ($users && count($users) > 0)
                        <table class="w-full text-left text-black rtl:text-right">
                            <thead class="text-[14px] uppercase bg-[#A7D129]">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Full name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Age
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Username
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $users)
                                    <tr class="bg-transparent border-b border-gray-200 text-black hover:bg-gray-100">

                                        <td scope="row"
                                            class="px-6 py-4 font-medium whitespace-nowrap  cursor-pointer font-bold"
                                            title="View User">
                                            <a href="/users/{{ $users['id'] }}/view" class="group"
                                                data-id="{{ $users['id'] }}"> 
                                                {{ ($users['last_name'] ?? '') . ', ' . ($users['first_name'] ?? '') . ' ' . ($users['middle_initial'] ?? '. ') }}
                                            </a>

                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $users['age'] }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $users['email'] }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="/users/{{ $users['id'] }}/view" class="text-blue-500 hover:underline">View</a>



                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-black text-center py-4">No Users records found.</p>
                    @endif
                </div>
            </div>
        </div>
        {{-- Add Form --}}
        <div id="defaultModal" tabindex="-1" aria-hidden="true"
            class="hidden fixed inset-0 w-full h-full bg-opacity-30 backdrop-blur-xs flex justify-center items-center z-50">
            <div class="relative p-6 w-full max-w-2xl bg-gray-50 border border-gray-100 rounded-lg shadow-lg">
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b">
                    <h3 class="text-lg font-semibold text-black">Add Users Record</h3>
                    <button id="closeModal"
                        class="text-gray-400 hover:bg-gray-200 hover:text-black rounded-lg text-sm p-1.5">
                        ✕
                    </button>
                </div>
                @include('pages.users.components.add-users')
            </div>
        </div>

    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const openModalBtn = document.getElementById("openModal");
            const addModal = document.getElementById("defaultModal");
            const closeModalBtn = document.getElementById("closeModal");

            // Open Add Modal
            if (openModalBtn && addModal) {
                openModalBtn.addEventListener("click", function() {
                    addModal.classList.remove("hidden");
                });
            } else {
                console.error("Modal or Open Button not found!");
            }

            // Close Add Modal
            if (closeModalBtn && addModal) {
                closeModalBtn.addEventListener("click", function() {
                    addModal.classList.add("hidden");
                });
            }

            // Close modal when clicking outside content
            if (addModal) {
                addModal.addEventListener("click", function(event) {
                    if (event.target === addModal) {
                        addModal.classList.add("hidden");
                    }
                });
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alert = document.getElementById("successBanner");
            const closeBtn = document.getElementById("closeBanner");

            if (alert) {
                // Auto-hide after 3 seconds
                setTimeout(() => {
                    alert.classList.add("opacity-0");
                    setTimeout(() => alert.remove(), 500);
                }, 3000);

                // Close when clicking the button
                closeBtn.addEventListener("click", function() {
                    alert.classList.add("opacity-0");
                    setTimeout(() => alert.remove(), 500);
                });
            }
        });
    </script>
@endsection
