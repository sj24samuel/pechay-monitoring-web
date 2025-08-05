@extends('pages.layout.index')

@section('content')
<div class="mx-auto w-full max-w-6xl">
    <div class="bg-gray-50 border border-gray-100 sm:rounded-lg overflow-hidden mt-10 w-full">
        <!-- Page Header -->
        <div class="text-left p-4">
            <h1 class="text-3xl font-bold text-black">Disease Data Bank (Pechay)</h1>
            <p class="text-gray-400 text-sm mt-2">
                Comprehensive database of known diseases affecting pechay.
            </p>
        </div>

        {{-- Search Bar --}}
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full">
                <form action="{{ route('disease.databank') }}" method="GET" class="flex items-center">
                    <label for="disease-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 
                                      4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" name="search" id="disease-search"
                               class="bg-transparent text-black text-sm rounded-lg outline-none border focus:border-[#A7D129] block w-full pl-10 p-2"
                               placeholder="Search disease..." value="{{ request('search') }}">
                    </div>
                </form>
            </div>
        </div>

        {{-- Table --}}
        <div class="container text-black w-full p-4">
            <div class="relative overflow-x-auto sm:rounded-lg">
                @if ($diseases && count($diseases) > 0)
                    <table class="w-full text-left text-black rtl:text-right">
                        <thead class="text-[14px] uppercase bg-[#A7D129]">
                            <tr>
                                <th scope="col" class="px-6 py-3">#</th>
                                <th scope="col" class="px-6 py-3">Disease Name</th>
                                <th scope="col" class="px-6 py-3 text-right">
                                    <span class="sr-only">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diseases as $index => $disease)
                                <tr class="bg-transparent border-b border-gray-200 text-black hover:bg-gray-100">
                                    <td class="px-6 py-4">
                                        {{ $index + 1 }}
                                    </td>
                                    <td class="px-6 py-4 font-medium whitespace-nowrap font-bold">
                                        {{ $disease['disease_name'] ?? 'Unnamed Disease' }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('disease.databank.view', $disease['id']) }}"
                                           class="text-green-600 font-medium hover:underline">
                                            Read More →
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-black text-center py-4">No disease records found.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
