@extends('ihya.app')
@section('content')
    <div class="flex overflow-hidden flex-col bg-white">
        <main
            class="flex relative flex-col px-16 pt-40 pb-32 mt-0 w-full text-3xl text-black min-h-[496px] max-md:px-5 max-md:pt-24 max-md:pb-28 max-md:max-w-full"
            role="main" style="background-color: #fffad7">
            <img loading="lazy" src="{{ asset('assets/src/home page main.png') }}"
                class="object-cover absolute inset-0 size-full" alt="Background decoration" />
            <h1 class="relative -right-2/4 z-10">
                <span class="text-4xl font-semibold">Hi, </span>
                <span class="text-4xl font-semibold text-orange-400">Ihya </span>
                <span class="text-4xl font-semibold">just made</span>
                <br />
                <span class="text-4xl font-semibold leading-10">something special for you</span>
            </h1>
            <p class="relative -right-2/4 z-10 mt-4">
                <span class="text-xl">Scroll and explore the hundreds of job affairs</span>
                <br />
                <span class="text-xl leading-7">we have made up for you according to your interest</span>
            </p>
        </main>

        <!--  -->

        <section class="flex flex-col items-center mt-14 max-md:mt-10" aria-labelledby="browse-section">
            <h2 id="browse-section" class="text-4xl font-semibold text-black mb-3">
                Browse your job by your interest
            </h2>
            <p class="mt-2 text-xl leading-6 text-center text-black mb-16">
                Explore the opportunities by Industry
                <br />
                Find your ideal role
            </p>

            <div class="flex flex-row gap-5 text-center" role="region" aria-label="Career Options">
                <div class="flex flex-col place-content-center px-20 py-12 text-center bg-white shadow-2xl rounded-[45px] max-sm:hidden"
                    role="article" tabindex="0">
                    <div class="content-center text-4xl font-semibold text-orange-400">Teacher</div>
                    <div class="mt-8 text-xl leading-7 text-black w-[262px]">
                        Responsible for Planning, designing, and overseeing construction projects
                    </div>
                </div>
                <div class="flex flex-col justify-start items-center place-content-center px-20 py-12 bg-white shadow-2xl rounded-[45px] max-md:px-5 max-sm:hidden"
                    role="article" tabindex="0">
                    <div class="self-center text-4xl font-semibold text-orange-400">IAS Officer</div>
                    <div class="mt-8 text-xl leading-8 text-black w-[262px]">
                        Responsible for Planning, designing, and overseeing construction projects

                    </div>
                </div>
                <div class="flex flex-col justify-start items-center place-content-center px-20 py-12 shadow-2xl rounded-[45px] max-md:px-5 max-sm:hidden"
                    style="background-color: #d39c32" role="article" tabindex="0">
                    <div class="self-center text-4xl font-semibold text-white">Lieutenant General</div>
                    <div class="mt-8 text-xl leading-8 text-white w-[262px]">
                        Responsible for overseeing large formations, planning military operations.
                    </div>
                </div>
                <div class="flex flex-col justify-start items-center place-content-center px-20 py-12 bg-white shadow-2xl rounded-[45px] max-md:px-5 max-sm:hidden"
                    role="article" tabindex="0">
                    <div class="self-center text-4xl font-semibold text-orange-400">Track Inspector</div>
                    <div class="mt-8 text-xl leading-8 text-black w-[262px]">
                        Monitors the condition of railway tracks, ensuring their safety and proper maintenance.
                    </div>
                </div>
                <div class="flex flex-col justify-start items-center place-content-center px-20 py-12 bg-white shadow-2xl rounded-[45px] max-md:px-5 max-sm:hidden"
                    role="article" tabindex="0">
                    <div class="self-center text-4xl font-semibold text-orange-400">Professor</div>
                    <div class="mt-8 text-xl leading-8 text-black w-[262px]">
                        Responsible for Planning, designing, and overseeing construction projects
                    </div>
                </div>
            </div>

        </section>

        <section>
            <img loading="lazy" src="{{ asset('assets/src/map homepage.svg') }}"
                class="object-contain mt-40 w-full
      aspect-[3.75] max-md:mt-10 max-md:max-w-full"
                alt="Job categories illustration" </section>
        @endsection
