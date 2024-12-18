@extends('ihya.app')
@section('content')
    <style>
        /* Smooth Scrolling Effect */
        html {
            scroll-behavior: smooth;
        }

        /* Fade-in Animation */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .fade-in-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>



    <section class="grid grid-flow-row w-full sec1 fade-in">
        {{-- <nav class="flex flex-col">
            <div class="grid grid-cols-3 md:px-36 px-8 pt-5">
                <div class="flex place-content-center">
                    <img src="{{ asset('assets/src/IHYA logo png 1.png" alt="IHYA Logo" class="max-h-20 md:h-auto h-10">
                </div>
                <div class="flex place-content-center items-center">

                    <div class="hidden  md:flex flex-grow place-content-around">
                        <div class="flex flex-col items-center justify-center "><img class="max-h-[34px] w-auto"
                                src="{{ asset('assets/src/community.svg"  alt="Forum">
                            <p class="text-center text-[10px]">Community</p>
                        </div>
                        <div class="flex flex-col items-center justify-center"><img class="max-h-[34px] w-auto"
                                src="{{ asset('assets/src/Job Seeker.svg"  alt="Forum">
                            <p class="text-center text-[10px]">Jobs</p>
                        </div>
                        <div class="flex flex-col items-center justify-center text-nowrap align-middle"><img
                                class="max-h-[34px] w-auto" src="{{ asset('assets/src/career path.svg"  alt="Forum">
                            <p class="text-center text-[10px]">Set Career</p>
                        </div>
                    </div>

                </div>

                <div class="flex items-center flex-grow place-content-center text-xl fade-in">
                    <div class="flex  md:hidden">
                        <?xml version="1.0" ?>
                        <!DOCTYPE svg
                            PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg
                            height="32px" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1"
                            viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path
                                d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z" />
                        </svg>
                    </div>

                    <button
                        class="hidden md:block bg-gold rounded-xl px-4 text-white text-xl font-semibold text-nowrap mx-2 h-[40px]">Join
                        Now</button>
                    <button
                        class="hidden md:block bg-gold-bg border-gold border-2 rounded-xl px-4 mx-2 h-[40px] text-xl font-semibold text-nowrap">Sign
                        in</button>

                </div>
            </div>
            <div class="bg-gold mx-28 h-[1px] mt-5">
                <p class="opacity-0">&blank;</p>
            </div>

        </nav> --}}

        <!---------------------------------------------------------------------->

        <div class="grid md:grid-cols-2 w-full mt-16 md:mb-8 fade-in">


            <div class="flex flex-col place-content-center items-center mb-6 md:pb-32 w-full h-full ">
                <div class="">
                    <h2 class="h-full font-semibold text-center md:text-10xl text-3xl mb-2">Welcome to <span
                            class="text-[#D39C32] ">Ihya,</span>
                    </h2>
                    <p class="text-sm md:text-base px-8 text-center md:px-0">Join us and be part of this inspiring
                        journey <br class="hidden md:block">
                        toward excellence and shared success!</p>
                </div>
                <div>
                    <div class="mt-12 flex flex-col text-center md:w-full">
                        <a href="{{ route('register.index') }}">
                            <button
                                class="bg-gold-bg-dark md:text-2xl text-lg rounded-full py-1 border-gold border-solid border-2 md:px-18 px-6 my-4">Proceed
                                to Join</button>
                        </a>
                        <p class="text-nowrap text-sm mt-2">Already have an account? <a href="{{ route('register.index') }}"
                                class="text-gold-dark">Sign in</a></p>
                    </div>
                </div>
            </div>
            <div class="flex place-content-end ">
                <img src="{{ asset('assets/src/side image.svg') }}" alt="" class="">
            </div>
        </div>


    </section>



    <section class="fade-in">
        <div class=" bg-gold-bg md:mx-52 mx-10 my-28 md:mb-14 flex items-center rounded-3xl relative">
            <div id="default-carousel" class="relative w-full" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">




                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="grid md:grid-cols-2 grid-cols-1 px-8 h-full">
                            <div class="flex flex-col md:p-10 p-6 place-content-center items-center ">
                                <h1 class="md:text-xl text-2xl"> User Profile and Registration: Enables users to
                                    register, track educational qualifications, job history, and set career goals.


                                </h1>

                            </div>
                            <div class="flex items-center place-content-center h-full m-5">
                                <img src="{{ asset('assets/src/profile.jpg') }}" alt=""
                                    class="md:block hidden h-64 w-auto">
                            </div>
                        </div>

                    </div>



                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="grid md:grid-cols-2 grid-cols-1 px-8 h-full">
                            <div class="flex flex-col md:p-10 p-4 place-content-center items-center ">
                                <h1 class="md:text-xl text-2xl">Job and Education Opportunities:

                                    Centralized platform showcasing job vacancies, qualification exams, scholarships,
                                    and reservation benefits.

                                    Links for job applications and resources tailored to minority communities.


                                </h1>

                            </div>
                            <div class="flex items-center place-content-center h-full m-5">
                                <img src="{{ asset('assets/src/opportunities.jpg') }}" alt=""
                                    class="md:block hidden h-64  w-auto">
                            </div>
                        </div>

                    </div>


                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="grid md:grid-cols-2 grid-cols-1 px-8 h-full">
                            <div class="flex flex-col md:p-10 p-4 place-content-center items-center ">
                                <h1 class="md:text-xl text-2xl"> Community Engagement and Resources:

                                    Forums for discussions, doubt clearance, and sharing resources from across the web.

                                    Features like chat and comments for interaction among users and technical support
                                    from an assistant chatbot.




                                </h1>

                            </div>
                            <div class="flex items-center place-content-center h-full m-5">
                                <img src="{{ asset('assets/src/interaction.jpg') }}" alt=""
                                    class="md:block hidden h-64  w-auto">
                            </div>
                        </div>

                    </div>
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="grid md:grid-cols-2 grid-cols-1 px-8 h-full">
                            <div class="flex flex-col md:p-10 p-4 place-content-center items-center ">
                                <h1 class="md:text-xl text-2xl"> Admin and Super Admin Capabilities:

                                    Tools for administrators to manage mahal data, resident details, exam registrations,
                                    and monthly reporting.

                                    Super admin capabilities for tracking Muslims in government sectors in Kerala and
                                    generating detailed reports.


                                </h1>

                            </div>
                            <div class="flex items-center place-content-center h-full m-5">
                                <img src="{{ asset('assets/src/dashboard.jpg') }}" alt=""
                                    class="md:block hidden h-64  w-auto">
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                        data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                        data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute  top-0  start-0 z-30 flex items-center justify-center h-full px-1 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">

                        <img class="" src="{{ asset('assets/src/arrow-left.svg') }}" alt="">
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-1 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <img class="rotate-180" src="{{ asset('assets/src/arrow-left.svg') }}" alt="">
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>


        </div>
    </section>



    <section class=" fade-in bg-[#D9D9D9] py-7 mt-10 h-80 px-6">
        <div class=" flex md:flex-row flex-col place-content-center items-center h-full ">




            <div class="md:ml-[20%] text-center flex flex-row md:place-content-center items-center ">
                <h1 class="font-semibold md:text-3xl text-2xl mb-4"><span class="text-nowrap">Find perfect
                        job</span><br>
                    <span class="text-nowrap">according to you</span>
                </h1>
            </div>
            <div class="flex flex-wrap place-content-center md:gap-2  md:pl-16 h-full ">
                <button
                    class="bg-[#F2E4CA] rounded-full border-2 border-solid border-[#D39C32] md:px-8 px-6 py-1 md:text-lg text-xs font-medium font-Calibri text-nowrap mx-1 md:my-0 my-1">
                    Engineering</button>
                <button
                    class="bg-[#F2E4CA] rounded-full border-2 border-solid border-[#D39C32] md:px-8 px-6 py-1 md:text-lg text-xs font-medium font-Calibri text-nowrap mx-1 md:my-0 my-1">Medical</button>
                <button
                    class="bg-[#F2E4CA] rounded-full border-2 border-solid border-[#D39C32] md:px-8 px-6 py-1 md:text-lg text-xs font-medium font-Calibri text-nowrap mx-1 md:my-0 my-1">Any
                    degree</button>
                <button
                    class="bg-[#F2E4CA] rounded-full border-2 border-solid border-[#D39C32] md:px-8 px-6 py-1 md:text-lg text-xs font-medium font-Calibri text-nowrap mx-1 md:my-0 my-1">Pharmacy</button>
                <button
                    class="bg-[#F2E4CA] rounded-full border-2 border-solid border-[#D39C32] md:px-8 px-6 py-1 md:text-lg text-xs font-medium font-Calibri text-nowrap mx-1 md:my-0 my-1">Agriculture</button><br
                    class="md:block hidden">
                <button
                    class="bg-[#F2E4CA] rounded-full border-2 border-solid border-[#D39C32] md:px-8 px-6 py-1 md:text-lg text-xs font-medium font-Calibri text-nowrap mx-1 md:my-0 my-1">Architecture</button>
                <button
                    class="bg-[#F2E4CA] rounded-full border-2 border-solid border-[#D39C32] md:px-8 px-6 py-1 md:text-lg text-xs font-medium font-Calibri text-nowrap mx-1 md:my-0 my-1">Hotel
                    Management</button>
                <button
                    class="bg-[#F2E4CA] rounded-full border-2 border-solid border-[#D39C32] md:px-5 px-6 py-1 md:text-lg text-xs font-medium font-Calibri text-nowrap mx-1 md:my-0 my-1">Sports
                    quota</button>
                <button
                    class="bg-[#F2E4CA] rounded-full border-2 border-solid border-[#D39C32] md:px-5 px-6 py-1 md:text-lg text-xs font-medium font-Calibri text-nowrap mx-1 md:my-0 my-1">Teaching</button>
            </div>
        </div>
    </section>

    <section class="fade-in">
        <div class="m-10 flex flex-col items-center place-content-center font-semibold">
            <h1 class=" m-5 text-3xl justify-center text-center">Watch video and <br>
                catch more</h1>
            <div class="flex relative md:px-8 px-2">
                <img src="{{ asset('assets/src/image-border.svg') }}" alt=""
                    class="w-full absolute left-0 top-0">
                <img src="{{ asset('assets/src/image-border.svg') }}" alt=""
                    class="w-full absolute left-0 bottom-0 rotate-180">

                <iframe class="w-auto h-auto m-3 md:h-96 md:w-auto aspect-video"
                    src="https://www.youtube.com/embed/-ctoM78lPF4"
                    title="Ihya | Government Service Assistant for Muslim Community Upliftment" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>





        </div>


    </section>

    <section class="fade-in flex w-full place-content-center foot-img h-[430px] pt-20">

        <div class="flex place-content-center w-1/2">
            <h1 class="text-left md:text-2xl text-xl ml-6 font-semibold">Let's gather for the <br>
                better future of Ummah....</h1>
        </div>
        <div class="flex place-content-center items-start w-1/2">
            <a href="{{ route('register.index') }}">
                <button
                    class="bg-[#D39C32] rounded-xl md:px-8 px-2 py-2 text-xl font-semibold font-Calibri text-nowrap text-white">Get
                    Started</button>
            </a>
        </div>
    </section>

    {{-- <footer class="hidden bg-[#D39C32] flex place-content-around  pt-16 text-white">
        <div class="flex place-content-center text-center flex-col"><img src="{{ asset('assets/src/IHYA logo white 1.svg"
                class="w-96" alt="IHYA Logo">
            <p>Government Service Assistance for <br>
                Muslim Community Development</p>
        </div>

        <ul>
            <li class="font-bold">Useful links</li>
            <li>Log in</li>
            <li>Jobs</li>
            <li>Community</li>
            <li>Career</li>
        </ul>
        <ul>
            <li class="font-bold">Related links</li>
            <li>About Us</li>
            <li>Contact Us</li>
            <li>FAQ</li>
            <li>Guide</li>
        </ul>

        <div>
            <p>Follow us</p>
            <ul class="flex">
                <li>
                    <!-- Instagram --><span class="[&>svg]:h-5 [&>svg]:w-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                            <path
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                        </svg>
                    </span>
                </li>
                <li>
                    <!-- Facebook -->
                    <span class="[&>svg]:h-5 [&>svg]:w-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 320 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                            <path
                                d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                        </svg>
                    </span>
                </li>
                <li>
                    <!-- Youtube -->
                    <span class="[&>svg]:h-5 [&>svg]:w-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                            <path
                                d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
                        </svg>
                    </span>
                </li>

            </ul>
        </div>
    </footer> --}}





    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // IntersectionObserver Setup
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("fade-in-visible");
                        }
                    });
                }, {
                    threshold: 0.2
                } // Trigger when 20% of the element is visible
            );

            // Add fade-in effect to all elements with the class "fade-in"
            const fadeElements = document.querySelectorAll(".fade-in");
            fadeElements.forEach((el) => observer.observe(el));
        });
    </script>
@endsection
