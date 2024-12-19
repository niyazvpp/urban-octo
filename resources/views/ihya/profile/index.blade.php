<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('assets/src/favicon.ico') }}" type="image/x-icon">

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">

    <title>Document</title>
</head>

<body class="relative">
    <!-- #region Edit-->
    <div id="popup" class="hidden">
        <div class="flex place-content-center items-center w-full h-full z-10 ml-7  md:ml-0 absolute">
            <div
                class=" rounded-lg overflow-hidden px-16 py-6 bg-gold-bg  shadow-xl lg:px-8 md:w-[50%] lg:w-[30%] h-[400px]">
                <div class="">
                    <h1 class="text-xl font-medium text-center mb-6">Edit Your Profile</h1>

                    <ul class="flex flex-col place-content-center items-center">


                        <li class="py-1 w-full">
                            <label for="name">User name</label>
                            <div class="w-full"><input type="text" name="" id="name"
                                    class="w-full bg-silver border-2 border-gold-dark rounded-lg"></div>
                        </li>

                        <li class="py-1 w-full">
                            <label for="name">Password</label>
                            <div class="w-full"><input type="password" name="" id="pass"
                                    class="bg-silver border-2 focus:bg-silver border-gold-dark rounded-lg w-full"></div>
                        </li>



                        <li class="py-1 w-full ">
                            <label for="name">Confirm Password</label>
                            <div class="w-full"><input type="password" name="" id="confirm-pass"
                                    class=" w-full bg-silver border-2 focus:bg-silver border-gold-dark rounded-lg">
                            </div>
                        </li>

                        <li class="py-5 ">
                            <button id="save" class="bg-gold rounded-lg px-4 text-white text-xl py-1">Save</button>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <!-- #endregion -->
    <section class="flex place-content-center items-center bg-gold-bg px-10 ">
        <div class="bg-white">

            <div class="flex max-h-64 w-auto">
                <img src="{{ asset('assets/src/foot image.png') }}" alt="">
            </div>

            <div class="flex place-content-between items-center px-5">

                <div class="flex flex-col  items-center "><img
                        src="{{ asset('assets/src/Circled User Male Skin Type 3.png') }}" alt="Profile Photo"
                        class="w-[200px] h-[200px]">
                    <p class="font-semibold text-xl">Navas VPP</p>
                    <p>{{ $mahall->name }}, {{ $state->name }}, India</p>
                </div>

                <div id="edit"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                        viewBox="0 0 12 12">
                        <title>pen</title>
                        <g fill="#000000">
                            <path
                                d="M11.707,1.879,10.121.293a1,1,0,0,0-1.414,0L7.354,1.646l3,3,1.353-1.353A1,1,0,0,0,11.707,1.879Z">
                            </path>
                            <polygon points="6.646 2.354 1 8 0 12 4 11 9.646 5.354 6.646 2.354" fill="#000000">
                            </polygon>
                        </g>
                    </svg></div>


            </div>


            <!-- #region  accordion-->


            <div class="mt-6" id="accordion-collapse" data-accordion="collapse">
                <h2 id="accordion-collapse-heading-1">
                    <button type="button"
                        class=" flex items-center justify-between w-full p-5 font-medium   border border-b-0  rounded-t-xl gap-3"
                        data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                        aria-controls="accordion-collapse-body-1">
                        <span class="text-black">Saved Jobs</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                    <div class="p-5 border border-b-0  ">

                        <!-- #region -->
                        @foreach ($savedJobs as $job)
                            <div
                                class=" flex place-content-between w-full px-6  border rounded-md text-xl py-4  font-medium">
                                <p>{{ $job->title }}</p>
                            </div>
                        @endforeach


                    </div>
                </div>



                <h2 id="accordion-collapse-heading-2">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium   border border-b-0 gap-3"
                        data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                        aria-controls="accordion-collapse-body-2">
                        <span class="text-black">Your Qualifications</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                    <div class="p-5 border border-b-0  ">

                        <!-- #region -->
                        @foreach ($qualifications as $qualification)
                            <div
                                class=" flex place-content-between w-full px-6  border rounded-md text-xl py-4  font-medium">
                                <p>{{ $qualification->name }}</p>

                                <input class="border text-sm rounded-lg cursor-pointer"
                                    name="{{ encrypt($qualification->id) }}" type="file"
                                    accept="image/*,application/pdf">
                            </div>
                        @endforeach


                    </div>
                </div>
                <h2 id="accordion-collapse-heading-3">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium   border         gap-3"
                        data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                        aria-controls="accordion-collapse-body-3">
                        <span class="text-black">Your Interested areas</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                    <div class="p-5 border border-t-0  ">
                        <!-- #region -->
                        @foreach ($areas as $area)
                            <div
                                class=" flex place-content-between w-full px-6  border rounded-md text-xl py-4  font-medium">
                                <p>{{ $area->name }}</p>
                            </div>
                        @endforeach

                        <!-- #endregion -->
                    </div>
                </div>
            </div>

            <!-- #endregion accrodion  -->

        </div>
    </section>

    <script>
        var popup = document.getElementById('popup');
        var edit = document.getElementById('edit');
        var save = document.getElementById('save')


        edit.addEventListener("click", () => {
            popup.classList.toggle("hidden");
        });


        save.addEventListener("click", () => {
            popup.classList.toggle("hidden");
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
