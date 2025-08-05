@extends('pages.layout.index')

@section('content')
    <div
        class="mx-auto grid max-w-screen-xl rounded-lg bg-gray-50 p-4 dark:bg-gray-800 md:p-8 lg:grid-cols-12 lg:gap-8 lg:p-16 xl:gap-16 mb-5 mt-5">
        <div class="lg:col-span-2 lg:mt-0">
            <a href="#">
                <img src="/img/user-profile.svg" alt="">
            </a>
        </div>
        <div class="me-auto place-self-center lg:col-span-7">
            <h1 class="mb-3 text-xl font-bold leading-tight tracking-tight text-gray-900 ">
                User Information
            </h1>
            <div id="userView">
                <p class="text-gray-700 dark:text-gray-300"><strong>First Name:</strong> <span id="viewFirstname">John</span>
                </p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Middle Name:</strong> <span
                        id="viewMiddlename">Doe</span></p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Last Name:</strong> <span id="viewLastname">Smith</span>
                </p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Age:</strong> <span id="viewAge">30</span></p>

                <button id="editButton"
                    class="mt-4 px-5 py-2.5 text-white bg-blue-600 hover:bg-blue-700 rounded-lg font-medium">
                    Edit
                </button>
            </div>
            @include('pages.auth.components.user-profile-form')
        </div>
    </div>
    <div class="mx-auto grid max-w-screen-xl rounded-lg bg-gray-50 p-4">

        @include('pages.auth.components.password-reset-form')
    </div>
    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            document.getElementById('userView').classList.add('hidden'); // Hide read mode
            document.getElementById('userForm').classList.remove('hidden'); // Show edit form
        });

        document.getElementById('cancelButton').addEventListener('click', function() {
            document.getElementById('userView').classList.remove('hidden'); // Show read mode
            document.getElementById('userForm').classList.add('hidden'); // Hide edit form
        });
    </script>
@endsection
