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

<body>
    <div class="flex min-h-screen">
        <section class="bg-[#FFFFFF] flex-1">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <img class="w-auto h-30 mr-2" src="/img/logo-green.png" alt="logo">
                <h2 class="text-black text-2xl font-bold">Disease Monitoring System</h2>
                <div class="w-full md:mt-0 sm:max-w-md xl:p-0">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <form class="space-y-4 md:space-y-6 text-black" action="{{ route('login') }}" method="POST">
                            @csrf
                            {{-- Display authentication error --}}
                            @if ($errors->has('login'))
                                <div class="text-red-500 text-xs mb-2 text-center">
                                    {{ $errors->first('login') }}
                                </div>
                            @endif
                            @if ($errors->has('auth'))
                                <div class="text-red-500 text-xs mb-2 text-center">
                                    {{ $errors->first('auth') }}
                                </div>
                            @endif
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-black">Email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-[#FFFFFF] border-[#CDEB8B] focus:border-[#A7D129] outline-none border text-[15px] text-black rounded-lg block w-full p-2.5 "
                                    placeholder="name@company.com" required>
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-black">Password</label>
                                <input type="password" name="password" id="password" placeholder="Password"
                                    class="bg-[#FFFFFF] border-[#CDEB8B] focus:border-[#A7D129] outline-none border text-[15px] text-black rounded-lg block w-full p-2.5"
                                    required>

                            </div>
                            <button type="submit"
                                class=" cursor-pointer w-full h-[50px] text-black bg-[#CDEB8B] hover:bg-[#A7D129] font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Sign in
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div
            class="bg-[url(img/agriculture-industry.jpg)] flex-1 bg-cover bg-center flex items-center justify-center relative">

        </div>

    </div>


</body>

</html>
