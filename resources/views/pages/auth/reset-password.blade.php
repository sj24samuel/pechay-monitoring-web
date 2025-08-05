<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Login</title>
    <style>
        input:-internal-autofill-selected {
            background-color: #FFFFFF !important;
            -webkit-box-shadow: 0 0 0px 1000px #FFFFFF inset !important;
            border-color: #A7D129 !important;
        }

        input:-internal-autofill-selected,
        input:-internal-autofill-selected::first-line {
            color: black !important;
            -webkit-text-fill-color: black !important;
            size: 15px;
        }
    </style>
</head>

<body class="bg-white">
    <div class="flex flex-col lg:flex-row min-h-screen">
        <!-- Left Section (Login Form) -->
        <section class="bg-[#FFFFFF] flex items-center justify-center w-full lg:w-1/2 px-6 py-8">
            <div class="max-w-md w-full">
                <img class="w-auto h-20 mx-auto mb-4" src="/img/logo-green.png" alt="logo">
                <h2 class="text-black text-2xl font-bold text-center">Disease Monitoring System</h2>
                @include('pages.auth.components.password-reset-form')
                <!-- Right Section (Background Image) -->
                <div class="hidden lg:block lg:w-1/2 bg-cover bg-right"
                    style="background-image: url('/img/agriculture-industry.jpg');">
                </div>
            </div>
        </section>
    </div>
</body>

</html>
