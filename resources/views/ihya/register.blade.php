<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>Register | Ihya</title>
</head>

<body class="">


    <section>
        <div class="flex relative place-content-center flex-col items-center ">
            <img class="mr-[50%]" src="{{ asset('assets/src/IHYA logo png 1.png') }}" alt="IHYA">

            <h1 class="text-3xl my-6 font-semibold">Enter your basic details</h1>
            <form action="#"
                class="bg-[#FFFAD7] flex flex-col items-center place-content-center rounded-xl px-16 p-5 md:w-[50%] lg:w-[35%] xl:[15%]">
                <ul class=" flex flex-col place-content-center items-center w-full">
                    <li class="my-2">
                        <label class="ml-2 block">Email</label>
                        <input class="bg-[#D9D9D9] my-1 border-[#AC802D] border-solid border-2 rounded-xl px-4 py-2 "
                            type="email" name="" id="" placeholder="Enter your valid email id">
                    </li>
                    <li class="my-2">
                        <label class="ml-2 block">Address</label>
                        <input class="bg-silver w-full my-1 border-[#AC802D] border-solid border-2 rounded-lg p-4 "
                            type="email" name="" id="" placeholder="Enter your valid email id">
                    </li>


                    <!-- Drop down -->

                    <div class=" flex items-center justify-center w-full">
                        <div class="relative z-20 group w-full">
                            <button id="dropdown-button"
                                class="inline-flex justify-between w-full px-4 py-2 mt-2  font-medium bg-silver border-2 border-gold-dark rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-gold-bg-dark">
                                <span class="mr-2">Select your Mahall</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="dropdown-menu"
                                class="hidden absolute w-full right-0 mt-2 rounded-md shadow-lg bg-silver ring-1 ring-black ring-opacity-5 p-1 space-y-1">
                                <!-- Search input -->
                                <input id="search-input"
                                    class="block w-full px-4 py-2 bg-silver border-gray-400 text-gray-800 border rounded-md focus:outline-none"
                                    type="text" placeholder="Search items" autocomplete="off">
                                <!-- Dropdown content goes here -->
                                <a href=""
                                    class="block px-4 py-2 text-black hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Uppercase</a>
                                <a href=""
                                    class="block px-4 py-2 text-black hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Lowercase</a>
                                <a href=""
                                    class="block px-4 py-2 text-black hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Camel
                                    Case</a>
                                <a href=""
                                    class="block px-4 py-2 text-black hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Kebab
                                    Case</a>
                            </div>
                        </div>
                    </div>



                    <!-- Drop down end -->









                    <p class="text-center mb-2 mt-0 text-sm">If Your Mahall is not listed, <a href="">click
                            here</a></p>

                    <li class="my-2 flex place-content-between gap-2">

                        <!-- Drop down -->

                        <div class=" flex items-center place-content-center justify-center w-full my-2">
                            <div class="relative z-10 group w-full">
                                <button id="dropdown-button-2"
                                    class="inline-flex justify-between w-full px-4 py-2  font-medium bg-silver border-2 border-gold-dark rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-gold-bg-dark">
                                    <span class="mr-2">Select your state</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div id="dropdown-menu-2"
                                    class="hidden absolute w-full right-0 mt-2 rounded-md shadow-lg bg-silver ring-1 ring-black ring-opacity-5 p-1 space-y-1">
                                    <!-- Search input -->
                                    <input id="search-input-2"
                                        class="block w-full border-gray-400 bg-silver px-4 py-2 text-gray-800 border rounded-md   focus:outline-none"
                                        type="text" placeholder="Search items" autocomplete="off">
                                    <!-- Dropdown content goes here -->
                                    <a href="#"
                                        class="block px-4 py-2 bg-silver text-black hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Uppercase</a>
                                    <a href="#"
                                        class="block px-4 py-2 bg-silver text-black hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Lowercase</a>
                                    <a href="#"
                                        class="block px-4 py-2 bg-silver text-black hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Camel
                                        Case</a>
                                    <a href="#"
                                        class="block px-4 py-2 bg-silver text-black hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Kebab
                                        Case</a>
                                </div>
                            </div>
                        </div>

                        <!-- Drop down end -->

                    </li>

                    <li class="my-2 flex place-content-between gap-2">

                        <div
                            class="flex flex-grow place-content-center items-center gap-2 bg-[#D9D9D9]  border-[#AC802D] border-solid border-2 rounded-xl  px-4 w-[11.5rem]">

                            <p class="font-medium">Gender</p>

                            <form action="">

                                <div>
                                    <input type="radio" name="Gender" id="male" class=" hidden peer">
                                    <label for="male"
                                        class=" peer-checked:text-white  text-gray-900 peer-checked:*:bg-[#D39C32] ">
                                        <div
                                            class="px-3 text-sm font-medium border-2 bg-[#F2E4CA] 200 border-solid border-[#AC802D] rounded-lg focus:z-10 focus:ring-2 text-[15px] h-6 ">
                                            M</div>
                                    </label>
                                </div>


                                <div>
                                    <input type="radio" name="Gender" id="female" class=" hidden peer">
                                    <label for="female"
                                        class=" peer-checked:text-white  text-gray-900 peer-checked:*:bg-[#D39C32] ">
                                        <div
                                            class="px-3 text-[15px] font-medium border-2 200 bg-[#F2E4CA] border-solid border-[#AC802D] rounded-lg focus:z-10 focus:ring-2 h-6">
                                            F</div>
                                    </label>
                                </div>
                            </form>





                        </div>


                        <div
                            class=" flex flex-grow w-[50%] px-3 py-1 text-sm font-medium items-center border-2 gap-2 bg-silver border-solid border-[#AC802D] rounded-xl focus:z-10 focus:ring-2">

                            <label id="dob" for="">Date of Birth</label>
                            <input type="date" class=" sr-only bg-silver placeholder-white" name=""
                                id="dateInput">
                            <button class="bg-gold-bg-dark border-2 border-gold-dark rounded-lg"
                                id="openDatePicker"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                </svg>
                            </button>
                        </div>




        </div>

        </li>

        <div class="flex place-content-center pt-5"><button
                class="bg-[#D39C32] rounded-xl px-8  w-[30%] py-1.5 my-2 text-white text-xl font-semibold text-nowrap"
                type="submit ">Next</button></div>
        </ul>


        </form>
        </div>

    </section>


    <footer class="bg-[#D39C32] mt-16">
        <ul class="flex sticky place-content-center items-center gap-6 text-white h-10">
            <li>About Us</li>
            <li>Contact Us</li>
            <li>FAQs</li>
            <li>Terms and Conditions</li>
        </ul>
    </footer>



    <script>
        function setupDropdown(dropdownButtonId, dropdownMenuId, searchInputId) {
            const dropdownButton = document.getElementById(dropdownButtonId);
            const dropdownMenu = document.getElementById(dropdownMenuId);
            const searchInput = document.getElementById(searchInputId);
            const dropdownItems = dropdownMenu.querySelectorAll('a');
            let isOpen = false;

            // Function to toggle the dropdown state
            function toggleDropdown() {
                isOpen = !isOpen;
                dropdownMenu.classList.toggle('hidden', !isOpen);
            }

            // Add event listener for the button
            dropdownButton.addEventListener('click', (event) => {
                event.preventDefault();
                toggleDropdown();
            });

            // Add event listener to filter items based on input
            searchInput.addEventListener('input', () => {
                const searchTerm = searchInput.value.toLowerCase();
                dropdownItems.forEach((item) => {
                    const text = item.textContent.toLowerCase();
                    item.style.display = text.includes(searchTerm) ? 'block' : 'none';
                });
            });

            // Add event listener to close the dropdown when any item is clicked
            dropdownItems.forEach((item) => {
                item.addEventListener('click', (event) => {
                    event.preventDefault();
                    toggleDropdown();
                });
            });
        }

        // Initialize both dropdowns
        setupDropdown('dropdown-button', 'dropdown-menu', 'search-input');
        setupDropdown('dropdown-button-2', 'dropdown-menu-2', 'search-input-2');
    </script>
    <script>
        const dateInput = document.getElementById("dateInput");
        const openDatePicker = document.getElementById("openDatePicker");
        const dob = document.getElementById('dob');

        // Open the date picker when the button is clicked
        openDatePicker.addEventListener("click", (event) => {
            event.preventDefault();
            dateInput.showPicker(); // Opens the date picker
        });

        // Update button or other UI elements when a date is selected
        dateInput.addEventListener("change", () => {
            const selectedDate = dateInput.value;
            if (selectedDate) {
                const formattedDate = new Date(selectedDate).toLocaleDateString("en-GB");
                dob.textContent = formattedDate;
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</body>

</html>
