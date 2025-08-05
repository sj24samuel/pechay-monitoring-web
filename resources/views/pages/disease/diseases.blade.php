@extends('pages.layout.index')

@section('content')
    <div class="mx-auto w-full max-w-6xl">
        <div class="bg-gray-50 border border-gray-100 s sm:rounded-lg overflow-hidden mt-10 w-full">
            <!-- Page Header -->
            <div class="text-left p-4">
                <h1 class="text-3xl font-bold text-black">Disease Records</h1>
                <p class="text-gray-600 text-sm mt-2">
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
                    <form action="{{ route('diseases') }}" method="GET" class="flex items-center">
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
                                class="bg-transparent text-black text-sm rounded-lg outline-none border focus:border-[#A7D129] block w-full pl-10 p-2"
                                placeholder="Search Disease..." value="{{ request('search') }}">
                        </div>
                    </form>

                </div>
                <div
                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <button type="button" id="openModal"
                        class="flex items-center justify-center text-black bg-[#A7D129] hover:bg-[#CDEB8B] font-medium rounded-lg text-sm px-4 py-2">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add New Disease
                    </button>

                </div>
            </div>

            <div class="container text-black w-full p-4">
                <div class="relative overflow-x-auto sm:rounded-lg">
                    @if ($diseases && count($diseases) > 0)
                        <table class="w-full text-left text-black rtl:text-right">
                            <thead class="text-[14px] uppercase bg-[#A7D129]">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Disease name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Scanned Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diseases as $diseases)
                                    <tr class="bg-transparent border-b border-gray-200 text-black hover:bg-gray-100">
                                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap"
                                            title="View Disease">
                                            <a href="/diseases/{{ $diseases['id'] }}/view" class="group"
                                                data-id="{{ $diseases['id'] }}">
                                                {{ $diseases['name'] }}
                                            </a>
                                        </th>
                                        <td class="px-6
                                                py-4">
                                            {{ $diseases['description'] }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $diseases['scanned-date'] }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="/diseases/{{ $diseases['id'] }}/edit" id="openEditModal" class="group"
                                                data-id="{{ $diseases['id'] }}">
                                                <img src="/img/edits.svg" alt=""
                                                    class="w-auto h-4 group-hover:hidden">
                                                <img src="/img/edits-active.svg" alt=""
                                                    class="w-auto h-4 hidden group-hover:block">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-black text-center py-4">No Disease records found.</p>
                    @endif
                </div>
            </div>
        </div>
        {{-- Add Form --}}
        <div id="defaultModal" tabindex="-1" aria-hidden="true"
            class="hidden fixed inset-0 w-full h-full bg-opacity-30 backdrop-blur-xs flex justify-center items-center z-50">
            <div class="relative p-6 w-full max-w-2xl bg-gray-50 border border-gray-100 rounded-lg shadow-lg">
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b">
                    <h3 class="text-lg font-semibold text-black">Add Disease Record</h3>
                    <button id="closeModal"
                        class="text-gray-400 hover:bg-gray-200 hover:text-black rounded-lg text-sm p-1.5">
                        ✕
                    </button>
                </div>
                @include('pages.disease.components.add-disease')
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
