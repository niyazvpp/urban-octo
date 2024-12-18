<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Register | Ihya</title>
</head>

<body>


    <section>
        <div class="flex relative place-content-center flex-col items-center mt-8 mb-6">
            <img class="mr-[55%] h-18 hidden md:block" src="{{ asset('assets/src/IHYA logo png 1.png') }}" alt="IHYA Logo">

            <h1 class="md:text-3xl text-2xl my-2 font-semibold text-center md:mb-5 mb-2">Start with creating an account
            </h1>
            <p class="pb-2 md:text-base text-xs ">Already have an account? <a href="#" class="text-gold">Sign
                    in</a></p>
            <form action=""
                class="bg-[#FFFAD7] flex flex-col items-center place-content-center rounded-xl px-16 p-5 md:w-[50%] lg:w-[35%] xl:[15%]">



                <ul class=" flex flex-col place-content-center items-center w-full">
                    <li class="my-1 flex flex-col w-full">
                        <label class="ml-2 font-medium">Email</label>
                        <input class="bg-[#D9D9D9] my-1 border-[#AC802D] border-solid border-2 rounded-xl px-4 py-2 "
                            type="email" name="" id="" placeholder="Enter your valid email id">
                    </li>
                    <li class="my-1 flex flex-col w-full">
                        <label class="ml-2 font-medium">Phone number</label>
                        <input class="bg-[#D9D9D9]  my-1 border-[#AC802D] border-solid border-2 rounded-xl px-4 py-2 "
                            type="tel" name="" id="" placeholder="Phone number with country code">
                    </li>
                    <li class="my-1 flex flex-col w-full">
                        <label class="ml-2 font-medium">Create Password</label>
                        <input class="bg-[#D9D9D9]  my-1 border-[#AC802D] border-solid border-2 rounded-xl px-4 py-2 "
                            type="password" name="" id="" placeholder="Create a strong password">
                    </li>
                    <li class="my-1 flex flex-col w-full">
                        <label class="ml-2 font-medium">Confirm Password</label>
                        <input class="bg-[#D9D9D9]  my-1 border-[#AC802D] border-solid border-2 rounded-xl px-4 py-2 "
                            type="password" name="" id="" placeholder="Create a strong password">
                    </li>

                </ul>
                <button
                    class="bg-[#D39C32] rounded-md px-8  w-[30%] py-1.5 my-2 text-white text-xl font-semibold text-nowrap"
                    type="submit ">Next</button>
            </form>
        </div>

    </section>
    <footer class="sticky bg-[#D39C32] mt-6">
        <ul class="flex sticky place-content-center items-center gap-6 text-white h-10">
            <li>About Us</li>
            <li>Contact Us</li>
            <li>FAQs</li>
            <li>Terms and Conditions</li>
        </ul>
    </footer>

</body>

</html>
