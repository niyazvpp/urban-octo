<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login | Ihya</title>
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


    <section>
        <div class="flex relative place-content-center flex-col items-center mt-8 mb-6">
            <img class="mr-[55%] hidden md:block" src="{{ asset('assets/src/IHYA logo png 1.png') }}" alt="IHYA Logo">

            <h1 class="md:text-3xl text-2xl my-2 font-semibold text-center md:mb-5 mb-2">Login
            </h1>
            <p class="pb-2 md:text-base text-xs ">Don't have an account? <a href="{{ route('register.index') }}"
                    class="text-gold">Register</a>
            </p>
            <form method="post" id="form"
                class="bg-[#FFFAD7] flex flex-col items-center place-content-center rounded-xl px-16 p-5 md:w-[50%] lg:w-[35%] xl:[15%]">



                <ul class=" flex flex-col place-content-center items-center w-full">
                    <li class="my-1 flex flex-col w-full">
                        <label class="ml-2 font-medium">Email</label>
                        <input class="bg-[#D9D9D9] my-1 border-[#AC802D] border-solid border-2 rounded-xl px-4 py-2 "
                            type="email" name="email" id="" placeholder="Enter your email">
                    </li>
                    <li class="my-1 flex flex-col w-full">
                        <label class="ml-2 font-medium">Password</label>
                        <input class="bg-[#D9D9D9]  my-1 border-[#AC802D] border-solid border-2 rounded-xl px-4 py-2 "
                            type="password" name="password" id="" placeholder="Enter your password">
                    </li>
                </ul>
                <button
                    class="bg-[#D39C32] rounded-md px-8  w-[30%] py-1.5 my-2 text-white text-xl font-semibold text-nowrap"
                    type="submit ">Next</button>
            </form>
        </div>

    </section>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

<script>
    $(document).ready(function() {
        $("#form").submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: "{{ route('login.authenticate') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: formData,
                success: function(response) {
                    location.href = "{{ route('home') }}"
                },
                error: function(error) {
                    $("#toast-danger").removeClass("hidden").addClass("flex");
                    console.log(error);
                    $("#toast_text").text(error.responseJSON.message)
                    // setTimeout(hideToast, 3000); // Auto-hide after 3 seconds
                }
            });
        })
    });
</script>

</html>
