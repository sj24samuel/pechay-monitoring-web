<nav class="fixed top-0 z-50 min-w-screen bg-white border border-[#F5F5F5]">
    <div class="w-full px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center justify-start w-full">
                <a href="/dashboard" class="flex ms-2 md:me-24">
                    <img src="/img/logo-green.png" class="h-15 w-auto me-3" alt="DMS Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-black">
                        Disease Monitoring System
                    </span>
                </a>
            </div>
            @if (session('firebase_user'))
                <div class="flex items-center">
                    <span class="text-gray-800 font-medium text-sm w-90">
                        Hello, {{ session('firebase_user.name') }}
                    </span>
                </div>
            @endif
        </div>
    </div>
</nav>


<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-30 transition-transform -translate-x-full sm:translate-x-0 bg-white border border-[#F5F5F5] "
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 rounded-lg group 
                    {{ request()->is('dashboard*') ? 'bg-[#A7D129] text-white' : 'text-[#A8B3CF] hover:bg-[#CDEB8B]' }}">

                    <img src="{{ request()->is('dashboard*') ? '/img/dashboard.svg' : '/img/dashboard-inactive.svg' }}"
                        alt="Dashboard Icon" class="shrink-0 w-5 h-5 transition duration-75">

                    <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('disease.databank') }}"
                    class="flex items-center p-2 rounded-lg group 
                {{ request()->is('disease-databank*') ? 'bg-[#A7D129] text-white' : 'text-[#A8B3CF] hover:bg-[#CDEB8B]' }}">

                    <img src="{{ request()->is('disease-databank*') ? '/img/disease.svg' : '/img/disease-inactive.svg' }}"
                        alt="Disease Icon" class="shrink-0 w-5 h-5 transition duration-75">

                    <span class="flex-1 ms-3 whitespace-nowrap">Disease Databank</span>
                </a>

            </li>

            <li>
                <a href="{{ route('detection.results') }}"
                    class="flex items-center p-2 rounded-lg group 
                {{ request()->is('detection-results*') ? 'bg-[#A7D129] text-white' : 'text-[#A8B3CF] hover:bg-[#CDEB8B]' }}">

                    <img src="{{ request()->is('detection-results*') ? '/img/disease.svg' : '/img/disease-inactive.svg' }}"
                        alt="Disease Icon" class="shrink-0 w-5 h-5 transition duration-75">

                    <span class="flex-1 ms-3 whitespace-nowrap">Scanned Disease</span>
                </a>

            </li>

            <li>
                <a href="{{ route('users') }}"
                    class="flex items-center p-2 rounded-lg group 
                    {{ request()->is('users*') ? 'bg-[#A7D129] text-white' : 'text-[#A8B3CF] hover:bg-[#CDEB8B]' }}">

                    <img src="{{ request()->is('users*') ? '/img/users.svg' : '/img/users-inactive.svg' }}"
                        alt="Users Icon" class="shrink-0 w-5 h-5 transition duration-75">

                    <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                </a>
            </li>

            <li>
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit"
                        class="flex items-center text-left w-full p-2 rounded-lg text-[#A8B3CF] hover:bg-[#CDEB8B] group">
                        <img src="/img/log-out-inactive.svg"
                            class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-black">
                        <span class="flex-1 ms-3 whitespace-nowrap text-[#A8B3CF]">Log Out</span>
                    </button>
                </form>
            </li>
            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                <li>
                    <a href="{{ route('profile') }}"
                        class="flex items-center p-2 rounded-lg group 
                    {{ request()->is('profile*') ? 'bg-[#A7D129] text-white' : 'text-[#A8B3CF] hover:bg-[#CDEB8B]' }}">
                        <img src="{{ request()->is('profile*') ? '/img/setting.svg' : '/img/setting-inactive.svg' }}"
                            alt="Users Icon" class="shrink-0 w-5 h-5 transition duration-75">
                        <span class="ms-3">User Profile</span>
                    </a>
                </li>

            </ul>

        </ul>

    </div>
</aside>
