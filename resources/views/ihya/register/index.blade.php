<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Register | Ihya</title>
</head>

<body>
    <div class="flex place-content-center">
        <div id="toast-danger"
            class="hidden flex absolute items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal" id="toast_text">Item has been deleted.</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-danger" aria-label="Close" onclick="hideToast()">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>
    <div class="hidden" id="toast-danger"
        class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
        role="alert">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="ms-3 text-sm font-normal" id="toast-content">Some fields are required</div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
            data-dismiss-target="#toast-danger" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>

    <section id="section1">
        <div class="flex relative place-content-center flex-col items-center mt-8">
            <img class="mr-[55%] hidden md:block" src="{{ asset('assets/src/IHYA logo png 1.png') }}" alt="IHYA Logo">

            <h1 class="text-3xl my-2 font-semibold text-center mb-5">Start with creating an account</h1>
            <p class="pb-2">Already have an account? <a href="{{ route('login') }}" class="text-gold">Sign in</a></p>
            <form method="post" id="form"
                class="bg-[#FFFAD7] flex flex-col items-center place-content-center rounded-xl px-16 p-5 md:w-[50%] lg:w-[35%] xl:[15%]">
                <ul class=" flex flex-col place-content-center items-center">
                    <li class="my-1">
                        <label class="ml-2">Name</label><br>
                        <input
                            class="bg-[#D9D9D9] my-1 border-[#AC802D] border-solid border-2 rounded-xl px-4 py-2 w-80"
                            type="text" name="name" id="" placeholder="Enter your full name">
                    </li>
                    <li class="my-1">
                        <label class="ml-2">Email</label><br>
                        <input
                            class="bg-[#D9D9D9] my-1 border-[#AC802D] border-solid border-2 rounded-xl px-4 py-2 w-80"
                            type="email" name="email" id="" placeholder="Enter your valid email id">
                    </li>
                    <li class="my-1">
                        <label class="ml-2">Phone number</label><br>
                        <input
                            class="bg-[#D9D9D9]  my-1 border-[#AC802D] border-solid border-2 rounded-xl px-4 py-2 w-80"
                            type="tel" name="phone_number" id=""
                            placeholder="Phone number with country code">
                    </li>
                    <li class="my-1">
                        <label class="ml-2">Create Password</label><br>
                        <input
                            class="bg-[#D9D9D9]  my-1 border-[#AC802D] border-solid border-2 rounded-xl px-4 py-2 w-80"
                            type="password" name="password" id="" placeholder="Create a strong password">
                    </li>
                    <li class="my-1">
                        <label class="ml-2">Confirm Password</label><br>
                        <input
                            class="bg-[#D9D9D9]  my-1 border-[#AC802D] border-solid border-2 rounded-xl px-4 py-2 w-80"
                            type="password" name="password_confirmation" id=""
                            placeholder="Create a strong password">
                    </li>

                </ul>


        </div>
        <div class="flex place-content-center pt-5"><button
                class="bg-[#D39C32] rounded-xl px-8  w-[30%] py-1.5 my-2 text-white text-xl font-semibold text-nowrap"
                type="button" id="sec1-btn">Next</button></div>

    </section>



    <section id="sec2" class="hidden">
        <div class="flex relative place-content-center flex-col items-center ">
            <img class="mr-[50%]" src="{{ asset('assets/src/IHYA logo png 1.png') }}" alt="IHYA">

            <h1 class="text-3xl my-6 font-semibold">Enter your basic details</h1>

            <div class="bg-gold-bg  flex flex-col items-center place-content-center w-[600px] rounded-xl my-4 p5">
                <ul class="my-6">
                    {{-- <li class="my-2">
                        <label class="ml-2 block">Email</label>
                        <input class="bg-silver my-1 w-full border-[#AC802D] border-solid border-2 rounded-xl p-2 px-4"
                            type="email" name="" id="" placeholder="Enter your valid email id">
                    </li> --}}


                    <!-- Drop down -->

                    <div class=" flex items-center justify-center w-full">
                        <div class="relative z-20 group w-full">
                            <button id="dropdown-button" type="button"
                                class="inline-flex justify-between w-full px-4 py-2 mt-2  font-medium bg-silver border-2 border-gold-dark rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-gold-bg-dark">
                                <span class="mr-2">Select your Mahall</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
                                @foreach ($mahalls as $id => $mahall)
                                    <a href="javascript:void(0)" data-id="{{ $id }}"
                                        class="get-mahall block px-4 py-2 text-black hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">{{ $mahall }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Drop down end -->









                    <p class="text-center mb-2 mt-0 text-sm">If Your Mahall is not listed, <a href="#">click
                            here</a></p>

                    <li class="my-2 flex place-content-between gap-2">

                        <!-- Drop down -->

                        <div class=" hidden items-center place-content-center justify-center w-full my-2">
                            <div class="relative z-10 group w-full">
                                <button id="dropdown-button-2" type="button"
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
                                    <a href="javascript:void(0)"
                                        class="block px-4 py-2 bg-silver text-black hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Uppercase</a>
                                    <a href="javascript:void(0)"
                                        class="block px-4 py-2 bg-silver text-black hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Lowercase</a>
                                    <a href="javascript:void(0)"
                                        class="block px-4 py-2 bg-silver text-black hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Camel
                                        Case</a>
                                    <a href="javascript:void(0)"
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



                            <div>
                                <input type="radio" name="gender" id="male" value="male"
                                    class=" hidden peer">
                                <label for="male"
                                    class=" peer-checked:text-white  text-gray-900 peer-checked:*:bg-[#D39C32] ">
                                    <div
                                        class="px-3 text-sm font-medium border-2 bg-[#F2E4CA] 200 border-solid border-[#AC802D] rounded-lg focus:z-10 focus:ring-2 text-[15px] h-6 ">
                                        M</div>
                                </label>
                            </div>


                            <div>
                                <input type="radio" value="female" name="gender" id="female"
                                    class=" hidden peer">
                                <label for="female"
                                    class=" peer-checked:text-white  text-gray-900 peer-checked:*:bg-[#D39C32] ">
                                    <div
                                        class="px-3 text-[15px] font-medium border-2 200 bg-[#F2E4CA] border-solid border-[#AC802D] rounded-lg focus:z-10 focus:ring-2 h-6">
                                        F</div>
                                </label>
                            </div>






                        </div>


                        <div
                            class=" flex flex-grow w-[50%] px-3 py-1 text-sm font-medium items-center border-2 gap-2 bg-silver border-solid border-[#AC802D] rounded-xl focus:z-10 focus:ring-2">

                            <label id="dob" for="">Date of Birth</label>
                            <input type="date" class=" sr-only bg-silver placeholder-white" name="dob"
                                id="dateInput">
                            <button type="button" class="bg-gold-bg-dark border-2 border-gold-dark rounded-lg"
                                id="openDatePicker"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                </svg>
                            </button>





                        </div>

                    </li>
                    <div id="prev" class="hidden">
                        <div class="flex place-content-center pt-5 "><button
                                class="bg-[#D39C32] rounded-xl px-8  w-[30%] py-1.5 my-2 text-white text-xl font-semibold text-nowrap"
                                type="button">Prev</button></div>
                    </div>
                    <div class="flex place-content-center pt-5"><button
                            class="bg-[#D39C32] rounded-xl px-8  w-[30%] py-1.5 my-2 text-white text-xl font-semibold text-nowrap"
                            type="submit">Submit</button></div>

                </ul>
            </div>

            <div class="max-w-sm">
                <!-- SearchBox -->
                <div class="relative"
                    data-hs-combo-box='{
           "groupingType": "default",
           "isOpenOnFocus": true,
           "apiUrl": "../assets/data/searchbox.json",
           "apiGroupField": "category",
           "outputItemTemplate": "<div data-hs-combo-box-output-item><span class=\"flex items-center cursor-pointer py-2 px-4 w-full text-sm text-gray-800 hover:bg-gray-100"><div class=\"flex items-center w-full\"><div class=\"flex items-center justify-center rounded-full bg-gray-200 size-6 overflow-hidden me-2.5\"><img class=\"shrink-0\" data-hs-combo-box-output-item-attr=&apos;[{\"valueFrom\": \"image\", \"attr\": \"src\"}, {\"valueFrom\": \"name\", \"attr\": \"alt\"}]&apos; /></div><div data-hs-combo-box-output-item-field=\"name\" data-hs-combo-box-search-text data-hs-combo-box-value></div></div><span class=\"hidden hs-combo-box-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg></span></span></div>",
           "groupingTitleTemplate": "<div class=\"text-xs uppercase text-gray-500 m-3 mb-1"></div>"
         }'>


                    <!-- SearchBox Dropdown -->
                    <div class="absolute z-50 w-full bg-white border border-gray-200 rounded-lg"
                        style="display: none;" data-hs-combo-box-output="">
                        <div class="max-h-72 rounded-b-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300"
                            data-hs-combo-box-output-items-wrapper=""></div>
                    </div>
                    <!-- End SearchBox Dropdown -->
                </div>
                <!-- End SearchBox -->
            </div>

            </form>
        </div>

    </section>


</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function toggleDropdown(id) {
        // event.preventDefault()
        const dropdown = document.getElementById(id);
        const isHidden = dropdown.classList.contains("hidden");

        // Close all dropdowns
        document.querySelectorAll(".dropdown-menu").forEach(menu => menu.classList.add("hidden"));

        // Toggle the clicked dropdown only if it was hidden
        if (isHidden) {
            dropdown.classList.remove("hidden");
        }
    }
    $(document).ready(function() {


        $('#sec1').click(function(e) {
            e.preventDefault();
            $('#section1').toggle();
            $('#section2').toggle();
        })

        let ids = [];

        // Close dropdown when clicking an item
        $(".dropdown-item").on("click", function() {
            $(".dropdown-menu").addClass("hidden");
            let id = $(this).data("id");
            let sid = $("input[name='qual[]']:checked").map(function() {
                return $(this).val()
            }).get();
            ids.push(id);
            ids = ids.concat(sid);
            ids = [...new Set(ids)];
            console.log(ids);
        });


        // Optional: Close dropdowns when clicking outside
        document.addEventListener("click", (event) => {
            if (!event.target.closest(".dropdown-container")) {
                document.querySelectorAll(".dropdown-menu").forEach(menu => menu.classList.add(
                    "hidden"));
            }
        });


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
            dropdownButton.addEventListener('click', () => {
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
                item.addEventListener('click', () => {
                    toggleDropdown();
                    document.getElementById(dropdownButtonId).textContent = item.textContent
                });
            });


            const dateInput = document.getElementById("dateInput");
            const openDatePicker = document.getElementById("openDatePicker");
            const dob = document.getElementById('dob');

            // Open the date picker when the button is clicked
            openDatePicker.addEventListener("click", () => {
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
        }

        // Initialize both dropdowns
        setupDropdown('dropdown-button', 'dropdown-menu', 'search-input');
        setupDropdown('dropdown-button-2', 'dropdown-menu-2', 'search-input-2');


        let mahall;
        $('.get-mahall').click(function() {
            mahall = $(this).attr('data-id');
            console.log(mahall)
        })
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('register.store') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: "POST",
                data: {
                    name: $("input[name='name']").val(),
                    email: $("input[name='email']").val(),
                    password: $("input[name='password']").val(),
                    password_confirmation: $("input[name='password_confirmation']").val(),
                    gender: $("input[name='gender']").val(),
                    dob: $("input[name='dob']").val(),
                    phone_number: $("input[name='phone_number']").val(),
                    mahall: mahall
                },
                success: function(response) {
                    location.href = "{{ route('verify_email') }}"
                },
                error: function(error) {
                    $("#toast-danger").removeClass("hidden").addClass("flex");
                    console.log(error);
                    $("#toast_text").text(error.responseJSON.message)
                    // setTimeout(hideToast, 3000); // Auto-hide after 3 seconds
                }
            })
        })


        $("#sec1-btn").click(function() {
            $("#section1").toggle();
            $("#prev").toggle();
            $("#sec2").toggle();
        });
        $("#prev").click(function() {
            $("#section1").toggle();
            $("#prev").toggle();
            $("#sec2").toggle();
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</html>
