<div class="flex overflow-hidden flex-col bg-white" style="margin-bottom: 5rem">
    <nav class="bg-white border-[#d39c32] border-b fixed w-full z-50 top-0 shadow-md">
        <div class="max-w-screen-lg flex flex-wrap items-center justify-between mx-auto px-4 place-content-center my-4">
            <!-- Logo Section -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('assets/src/IHYA-NEWONE.svg') }}" class="inline" style="max-height: 8rem"
                    alt="IHYA" />
            </a>

            <!-- Navbar Menu & Profile Section -->

            <div class="flex items-center md:order-2 md:space-x-0 rtl:space-x-reverse gap-4 md:gap-10 ">
                <div x-data="{ dropdownOpen: false, notifications: 1 }" class="relative">
                    <!-- Notification Button with Badge -->

                    @if (Auth::user())
                        <button @click="dropdownOpen = !dropdownOpen"
                            class="relative z-10 block rounded-md bg-white p-2 focus:outline-none">
                            <svg class="h-6 w-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                            </svg>

                            <!-- Notification Badge -->
                            <span x-show="notifications > 0"
                                class="absolute top-0 right-0 inline-block bg-red-500 text-white text-xs rounded-full w-5 h-5 text-center font-semibold">
                                <span x-text="notifications"></span>
                            </span>
                        </button>
                    @endif
                    <!-- Close Overlay on click outside -->
                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10">
                    </div>

                    <!-- Notification Dropdown Content -->
                    <div x-show="dropdownOpen"
                        class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20 md:w-80 w-56 max-h-[300px] overflow-y-auto">
                        <div class="py-2 max-h-[300px]">
                            <!-- Notification Item 1 -->
                            <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                {{-- <img class="h-8 w-8 rounded-full object-cover mx-1"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                                    alt="avatar" /> --}}
                                <p class="text-gray-600 md:text-sm text-xs mx-2">
                                    <span class="font-bold">Your account</span> created - Ihya

                                </p>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Profile Dropdown -->
                @if (Auth::user())
                    <div class="flex justify-center" style="margin-top: -129px">
                        <div x-data="{ dropdownOpen: false }" class="relative my-32 mb-1 hidden md:flex">
                            <button @click="dropdownOpen = !dropdownOpen"
                                class="relative z-10 block focus:outline-none bg-[#d36c32] text-white hover:bg-white hover:text-black rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:bg-[#ff8844]">
                                <img class="w-8 h-8 rounded-full" src="{{ asset('assets/src/profile.png') }}"
                                    alt="user photo" />
                            </button>

                            <div x-show="dropdownOpen" @click="dropdownOpen = false"
                                class="fixed inset-0 h-full w-full z-10"></div>


                            <ul x-show="dropdownOpen"
                                class="absolute right-0 mt-10 py-2 w-48 bg-white rounded-md shadow-xl z-20 border border-collapse">
                                <li>
                                    <a href="{{ route('profile.index') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                                </li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" onclick="document.getElementById('logout-form').submit();"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Log out
                                    </a>
                                </li>


                            </ul>

                        </div>
                    </div>
                @endif

                <!-- Mobile Menu Button -->
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lgtext-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false" id="menu-button">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>

            <!-- Navbar Links (Desktop) -->
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium  p-4 md:p-0 mt-4 rounded-lg bg-gray-50 md:space-x-8 md:flex-row items-center md:mt-0 md:border-0 md:bg-white text-black md:white:bg-white sm::border-2 border-orange-300">
                    <li>
                        <a href="{{ route('jobs.index') }}"
                            class="block py-2 px-3  text-lg {{ Route::currentRouteName() == 'jobs.index' ? 'text-[#d36c32] font-semibold' : '' }} "
                            aria-current="page">Jobs</a>
                    </li>
                    <li>
                        <a href="{{ route('forum_post.index') }}"
                            class="{{ Route::currentRouteName() == 'forum_post.index' ? 'text-[#d36c32] font-semibold' : '' }} block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#d39c32] md:p-0 border-sm:border-b-2 border-gray-200 text-lg">Community</a>
                    </li>
                    <li>
                        <a href="{{ route('career') }}"
                            class=" block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#d39c32] md:p-0 border-sm:border-b-2 border-gray-200 text-lg {{ Route::currentRouteName() == 'career' ? 'text-[#d36c32] font-semibold' : '' }}">Set
                            career</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</div>
<script>
    // Mobile Navbar Toggle
    const menuButton = document.getElementById("menu-button");
    const navbarMenu = document.getElementById("navbar-user");

    menuButton.addEventListener("click", () => {
        navbarMenu.classList.toggle("hidden");
    });

    // Get the profile button and the dropdown menu
    // const userMenuButton = document.getElementById("user-menu-button");
    const userDropdown = document.getElementById("user-dropdown");

    // Add an event listener to toggle the dropdown visibility
    // userMenuButton.addEventListener("click", (event) => {
    //     // Prevent the event from propagating to document listener
    //     event.stopPropagation();

    //     // Toggle the 'hidden' class on the dropdown to show/hide it
    //     userDropdown.classList.toggle("hidden");


    //     // Toggle aria-expanded attribute for accessibility
    //     const isExpanded = userMenuButton.getAttribute("aria-expanded") === "true";
    //     userMenuButton.setAttribute("aria-expanded", !isExpanded);

    //     // Position the dropdown under the profile button
    //     const rect = userMenuButton.getBoundingClientRect();
    //     userDropdown.style.top = `${rect.bottom + window.scrollY}px`;
    //     userDropdown.style.left = `${rect.left + window.scrollX}px`;
    // });

    // Close the dropdown if clicked outside
    // document.addEventListener("click", (event) => {
    //     if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
    //         // Hide the dropdown and reset aria-expanded
    //         userDropdown.classList.add("hidden");
    //         userMenuButton.setAttribute("aria-expanded", "false");
    //     }
    // });
</script>
