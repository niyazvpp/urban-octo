<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <link rel="stylesheet" href="{{ asset('assets/css/first.css') }}">
    @vite('resources/css/app.css')
    <title>Ihya</title>
</head>

<body class="bg-[url('{{ asset('assets/src/lines.svg') }}')]">


    <section class=" flex flex-col place-content-around items-center bg-no-repeat">
        <div class="relative">
            <img src="{{ asset('assets/src/page1.svg') }}" class="w-full hidden md:block" alt="Ihya Logo">
            <img src="{{ asset('assets/src/mobile-page-2.svg') }}" class="self-stretch w-full w-1000px md:hidden"
                alt="Ihya Logo">


            <div class=" md:hidden flex flex-col w-full absolute top-0 mt-5"><img
                    src="{{ asset('assets/src/IHYA logo white 1.svg') }}" alt="" class="max-h-24 ">
                <p class="text-wrap  text-center mt-10 text-white text-xs">Government Service Assistance for
                    <br>
                    Muslim Community Development
                </p>
            </div>
            <!-- <div class="mobile-svg h-32">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius qui explicabo reprehenderit, vero vel facilis, libero quae corporis, blanditiis aut itaque necessitatibus! Dolore nesciunt explicabo excepturi pariatur dicta delectus beatae.</div> -->
        </div>



        <div class="flex-grow flex place-content-center items-center flex-col mt-10 px-6">
            <p class="text-center sm:text-sm">Let’s empower the community for a brighter future, <br
                    class="hidden md:block ">
                Enhancing representation in government sectors and <br class="hidden md:block">
                fostering growth for the next generation.</p>
            <h1 class="mt-14 mb-24 text-xl text-[#AC802D] font-semibold"><a href="{{ route('homee') }}">Click and
                    Continue</a></h1>
            <p></p>
        </div>
        </div>
    </section>


</body>

</html>
