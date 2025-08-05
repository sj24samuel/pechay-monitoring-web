    <form action="{{ route('disease.store') }}" method="POST">
        @csrf
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-black">Disease Name</label>
                <input type="text" name="name" id="name"
                    class="bg-transparent border border-[#A7D129] text-black text-sm rounded-lg outline-none focus:border-[#1ED760] block w-full p-2.5"
                    placeholder="Enter disease name" required>
            </div>
            <div>
                <label for="scanned-date" class="block mb-2 text-sm font-medium text-black">Scanned Date</label>
                <input type="date" name="scanned-date" id="brand"
                    class="bg-transparent border border-[#A7D129] text-black text-sm rounded-lg outline-none focus:border-[#1ED760] block w-full p-2.5"
                    placeholder="Enter scanned date" required>
            </div>
            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-black">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="block p-2.5 w-full text-sm text-black bg-transparent border border-[#A7D129] rounded-lg outline-none focus:border-[#1ED760]"
                    placeholder="Write description here"></textarea>
            </div>
        </div>
        <button type="submit"
            class="text-black bg-[#A7D129] hover:bg-[#CDEB8B] font-medium rounded-lg text-sm px-5 py-2.5">
            Add Disease
        </button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const submitBtn = document.getElementById("submitBtn");

            submitBtn.addEventListener("click", function() {
                submitBtn.disabled = true; // Disable button
                submitBtn.innerText = "Processing..."; // Change button text (optional)
            });
        });
    </script>
