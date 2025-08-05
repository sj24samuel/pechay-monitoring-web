<form id="userForm" action="{{ route('user.store') }}" method="POST" class="hidden">
    @csrf
    <div class="grid gap-4 mb-4 sm:grid-cols-2">
        <div>
            <label for="firstname" class="block mb-2 text-sm font-medium text-black">First Name</label>
            <input type="text" name="firstname" id="firstname"
                class="bg-transparent border border-[#A7D129] text-black text-sm rounded-lg outline-none focus:border-[#1ED760] block w-full p-2.5"
                placeholder="Enter firstname" required>
        </div>
        <div>
            <label for="middlename" class="block mb-2 text-sm font-medium text-black">Middle Name</label>
            <input type="text" name="middlename" id="middlename"
                class="bg-transparent border border-[#A7D129] text-black text-sm rounded-lg outline-none focus:border-[#1ED760] block w-full p-2.5"
                placeholder="Enter middlename" required>
        </div>
        <div>
            <label for="lastname" class="block mb-2 text-sm font-medium text-black">Last Name</label>
            <input type="text" name="lastname" id="lastname"
                class="bg-transparent border border-[#A7D129] text-black text-sm rounded-lg outline-none focus:border-[#1ED760] block w-full p-2.5"
                placeholder="Enter lastname" required>
        </div>
        <div>
            <label for="age" class="block mb-2 text-sm font-medium text-black">Age</label>
            <input type="number" name="age" id="age"
                class="bg-transparent border border-[#A7D129] text-black text-sm rounded-lg outline-none focus:border-[#1ED760] block w-full p-2.5"
                placeholder="Enter age" required>
        </div>
    </div>

    <button type="submit"
        class="text-black bg-[#A7D129] hover:bg-[#CDEB8B] font-medium rounded-lg text-sm px-5 py-2.5">
        Save Changes
    </button>

    <button type="button" id="cancelButton"
        class="text-white bg-red-500 hover:bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5 ml-2">
        Cancel
    </button>
</form>
