@extends('pages.layout.index')

@section('content')
    <section class="bg-white dark:bg-gray-900 py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="flex flex-col lg:flex-row items-start gap-8">
            <div class="lg:w-1/3 text-center lg:text-left lg:sticky top-0 lg:h-screen flex flex-col justify-start">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Disease Name</h2>
                <div class="flex flex-col">

                    <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
                        Explore the whole collection of open-source web components and elements built with the utility
                        classes
                        from Tailwind.
                    </p>
                    <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
                        Total Scans for this disease : 10
                    </p>
                </div>
                <input type="text" id="search" placeholder="Search User..."
                    class="mt-4 px-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>


            <div class="flex-1 max-h-[100vh] w-full flex flex-col space-y-6 pb-4 " id="teamContainer">
                <h5 class="text-lg font-bold text-gray-400 dark:text-white">

                    Users who scanned this disease
                </h5>
                <div
                    class="team-card flex items-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-full max-w-lg p-4">
                    <img class="w-32 h-32 rounded-lg object-cover"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                        alt="Bonnie Avatar">
                    <div class="ml-4 flex flex-col">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Bonnie Green</a>
                        </h3>
                        <div class="flex flex-col">
                            <span class="text-gray-500 dark:text-gray-400">Role | Department of Agriculture</span>
                            <span class="text-gray-500 dark:text-gray-200">Scanned Date: June 05, 2020</span>
                        </div>
                    </div>
                </div>

                <div
                    class="team-card flex items-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-full max-w-lg p-4">
                    <img class="w-32 h-32 rounded-lg object-cover"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Avatar">
                    <div class="ml-4 flex flex-col">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Jese Leos</a>
                        </h3>
                        <div class="flex flex-col">
                            <span class="text-gray-500 dark:text-gray-400">Role | Department of Agriculture</span>
                            <span class="text-gray-500 dark:text-gray-200">Scanned Date: June 05, 2020</span>
                        </div>
                    </div>
                </div>

                <div
                    class="team-card flex items-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-full max-w-lg p-4">
                    <img class="w-32 h-32 rounded-lg object-cover"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                        alt="Bonnie Avatar">
                    <div class="ml-4 flex flex-col">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Bonnie Green</a>
                        </h3>
                        <div class="flex flex-col">
                            <span class="text-gray-500 dark:text-gray-400">Role | Department of Agriculture</span>
                            <span class="text-gray-500 dark:text-gray-200">Scanned Date: June 05, 2020</span>
                        </div>
                    </div>
                </div>

                <div
                    class="team-card flex items-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-full max-w-lg p-4">
                    <img class="w-32 h-32 rounded-lg object-cover"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Avatar">
                    <div class="ml-4 flex flex-col">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Jese Leos</a>
                        </h3>
                        <div class="flex flex-col">
                            <span class="text-gray-500 dark:text-gray-400">Role | Department of Agriculture</span>
                            <span class="text-gray-500 dark:text-gray-200">Scanned Date: June 05, 2020</span>
                        </div>
                    </div>
                </div>

                <div
                    class="team-card flex items-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-full max-w-lg p-4">
                    <img class="w-32 h-32 rounded-lg object-cover"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                        alt="Bonnie Avatar">
                    <div class="ml-4 flex flex-col">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Bonnie Green</a>
                        </h3>
                        <div class="flex flex-col">
                            <span class="text-gray-500 dark:text-gray-400">Role | Department of Agriculture</span>
                            <span class="text-gray-500 dark:text-gray-200">Scanned Date: June 05, 2020</span>
                        </div>
                    </div>
                </div>

                <div
                    class="team-card flex items-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-full max-w-lg p-4">
                    <img class="w-32 h-32 rounded-lg object-cover"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Avatar">
                    <div class="ml-4 flex flex-col">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Jese Leos</a>
                        </h3>
                        <div class="flex flex-col">
                            <span class="text-gray-500 dark:text-gray-400">Role | Department of Agriculture</span>
                            <span class="text-gray-500 dark:text-gray-200">Scanned Date: June 05, 2020</span>
                        </div>
                    </div>
                </div>

                <div
                    class="team-card flex items-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-full max-w-lg p-4">
                    <img class="w-32 h-32 rounded-lg object-cover"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                        alt="Bonnie Avatar">
                    <div class="ml-4 flex flex-col">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Bonnie Green</a>
                        </h3>
                        <div class="flex flex-col">
                            <span class="text-gray-500 dark:text-gray-400">Role | Department of Agriculture</span>
                            <span class="text-gray-500 dark:text-gray-200">Scanned Date: June 05, 2020</span>
                        </div>
                    </div>
                </div>

                <div
                    class="team-card flex items-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-full max-w-lg p-4">
                    <img class="w-32 h-32 rounded-lg object-cover"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Avatar">
                    <div class="ml-4 flex flex-col">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Jese Leos</a>
                        </h3>
                        <div class="flex flex-col">
                            <span class="text-gray-500 dark:text-gray-400">Role | Department of Agriculture</span>
                            <span class="text-gray-500 dark:text-gray-200">Scanned Date: June 05, 2020</span>
                        </div>
                    </div>
                </div>

                <div
                    class="team-card flex items-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-full max-w-lg p-4">
                    <img class="w-32 h-32 rounded-lg object-cover"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                        alt="Bonnie Avatar">
                    <div class="ml-4 flex flex-col">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Bonnie Green</a>
                        </h3>
                        <div class="flex flex-col">
                            <span class="text-gray-500 dark:text-gray-400">Role | Department of Agriculture</span>
                            <span class="text-gray-500 dark:text-gray-200">Scanned Date: June 05, 2020</span>
                        </div>
                    </div>
                </div>

                <div
                    class="team-card flex items-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-full max-w-lg p-4">
                    <img class="w-32 h-32 rounded-lg object-cover"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                        alt="Jese Avatar">
                    <div class="ml-4 flex flex-col">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Jese Leos</a>
                        </h3>
                        <div class="flex flex-col">
                            <span class="text-gray-500 dark:text-gray-400">Role | Department of Agriculture</span>
                            <span class="text-gray-500 dark:text-gray-200">Scanned Date: June 05, 2020</span>
                        </div>
                    </div>
                </div>

                <div
                    class="team-card flex items-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-full max-w-lg p-4">
                    <img class="w-32 h-32 rounded-lg object-cover"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                        alt="Bonnie Avatar">
                    <div class="ml-4 flex flex-col">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Bonnie Green</a>
                        </h3>
                        <div class="flex flex-col">
                            <span class="text-gray-500 dark:text-gray-400">Role | Department of Agriculture</span>
                            <span class="text-gray-500 dark:text-gray-200">Scanned Date: June 05, 2020</span>
                        </div>
                    </div>
                </div>

                <div
                    class="team-card flex items-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-full max-w-lg p-4">
                    <img class="w-32 h-32 rounded-lg object-cover"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                        alt="Jese Avatar">
                    <div class="ml-4 flex flex-col">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Jese Leos</a>
                        </h3>
                        <div class="flex flex-col">
                            <span class="text-gray-500 dark:text-gray-400">Role | Department of Agriculture</span>
                            <span class="text-gray-500 dark:text-gray-200">Scanned Date: June 05, 2020</span>
                        </div>
                    </div>
                </div>

                <div
                    class="team-card flex items-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-full max-w-lg p-4">
                    <img class="w-32 h-32 rounded-lg object-cover"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                        alt="Bonnie Avatar">
                    <div class="ml-4 flex flex-col">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Bonnie Green</a>
                        </h3>
                        <div class="flex flex-col">
                            <span class="text-gray-500 dark:text-gray-400">Role | Department of Agriculture</span>
                            <span class="text-gray-500 dark:text-gray-200">Scanned Date: June 05, 2020</span>
                        </div>
                    </div>
                </div>

                <div
                    class="team-card flex items-center bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-full max-w-lg p-4">
                    <img class="w-32 h-32 rounded-lg object-cover"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                        alt="Jese Avatar">
                    <div class="ml-4 flex flex-col">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Jese Leos</a>
                        </h3>
                        <div class="flex flex-col">
                            <span class="text-gray-500 dark:text-gray-400">Role | Department of Agriculture</span>
                            <span class="text-gray-500 dark:text-gray-200">Scanned Date: June 05, 2020</span>
                        </div>
                    </div>
                </div>

                <!-- Add more team members as needed -->
            </div>
        </div>
    </section>

    <script>
        document.getElementById("search").addEventListener("input", function() {
            let filter = this.value.toLowerCase();
            let teamCards = document.querySelectorAll(".team-card");

            teamCards.forEach(card => {
                let name = card.querySelector("h3").textContent.toLowerCase();
                if (name.includes(filter)) {
                    card.style.display = "flex";
                } else {
                    card.style.display = "none";
                }
            });
        });
    </script>
@endsection
