<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <div id="section2" class="">
        <section class="flex flex-col place-content-center px-4 items-center ">
            <h1 class="text-3xl m-3 font-semibold text-center">Educational qualifications</h1>
            <p class="text-xs">*If you have only a single qualification you can simply select & click next</p>

            <div class=" flex flex-col gap-2 items-center place-content-center px-4 mt-16 ">







                <div class="grid md:grid-cols-2 grid-cols-1  gap-2 w-full"> <!-- row  -->
                    <!-- #box-->
                    @foreach ($qualifications as $qualification)
                        <div
                            class="bg-[#FFFAD7]  rounded-xl px-10 flex flex-col place-content-center items-center  py-4  text-xl">
                            <h1 class="text-center">Select your {{ $qualification->name }}</h1>
                            <div>

                                <div class="m-3 flex">
                                    @if ($qualification->specialQualifications->count() <= 3)
                                        @foreach ($qualification->specialQualifications as $sp)
                                            <div>
                                                <input type="checkbox" value="{{ encrypt($sp->id) }}" name="qual[]"
                                                    id="bel-{{ $loop->iteration }}" class="hidden peer">
                                                <label for="bel-{{ $loop->iteration }}"
                                                    class="peer-checked:*:bg-[#D39C32] peer-checked:*:text-white">
                                                    <div
                                                        class="bg-[#F2E4CA] border-2 border-[#AC802D] px-6 mx-1 mb-5 rounded-xl">
                                                        <span class="text-nowrap">{{ $sp->name }}</span>
                                                    </div>
                                                </label>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="relative inline-block text-left dropdown-container">
                                            <button type="button"
                                                onclick="toggleDropdown('dropdown{{ $loop->index }}')""
                                                class="inline-flex items-center justify-center w-full rounded-xl border-2 border-gold-dark shadow-sm px-4  bg-gold-bg-dark ">
                                                Course
                                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.292l3.71-4.06a.75.75 0 111.08 1.04l-4.25 4.665a.75.75 0 01-1.08 0L5.23 8.27a.75.75 0 01.02-1.06z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <div id="dropdown{{ $loop->index }}"
                                                class="hidden dropdown-menu origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                <div class="py-1 z-50">
                                                    @foreach ($qualification->specialQualifications as $spp)
                                                        <a href="#"
                                                            class="dropdown-item block px-4 py-2 text-sm bg-gold-bg hover:bg-gold-bg"
                                                            data-id="{{ encrypt($spp->id) }}">{{ $spp->name }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- #box-->

                </div> <!-- row end -->









            </div>
            <button id="submit1"
                class="bg-[#D39C32] rounded-xl px-8  w-[30%] py-1.5 my-14 text-white text-xl font-semibold text-nowrap"
                type="submit ">Next</button>
        </section>




    </div>
    <section class="hidden flex flex-col place-content-center items-center" id="section3">
        <h1 class="text-3xl m-3 font-semibold text-center mt-10">
            Select your <span class="text-nowrap"> interested areas</span>
        </h1>
        <p class="text-xs text-center">
            *Select areas according to your experience
            <span class="text-nowrap">and educational qualification in it</span>
        </p>

        <!-- #box-->
        <form action="" class="flex place-content-center">
            <div class="flex flex-wrap md:w-[80%] place-content-center mt-16">
                @foreach ($interestAreas as $int)
                    <div>
                        <input type="checkbox" name="area[]" value="{{ $int->id }}" id="{{ $loop->iteration }}"
                            class="hidden peer" />
                        <label for="{{ $loop->iteration }}"
                            class="peer-checked:*:bg-[#D39C32] peer-checked:*:text-white">
                            <div class="bg-[#F2E4CA] border-2 border-[#AC802D] px-6 mx-1 mb-5 rounded-xl">
                                {{ $int->name }}
                            </div>
                        </label>
                    </div>
                @endforeach
                <button id="submit2"
                    class="bg-[#D39C32] rounded-xl px-8  w-[30%] py-1.5 my-14 text-white text-xl font-semibold text-nowrap"
                    type="submit ">Next</button>
            </div>

            <!-- <button class="bg-[#D39C32] rounded-xl px-8 w-[30%] py-1.5 my-2 text-white text-xl font-semibold text-nowrap" type="submit ">Next</button> -->
        </form>
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
        let qualifications = [];
        let inputQualifications = [];
        // Close dropdown when clicking an item
        $("input[name='qual[]']").on("change", function() {
            // Loop through all checked checkboxes
            inputQualifications = []; //
            $("input[name='qual[]']:checked").each(function() {
                inputQualifications.push($(this).val());
            });


        });
        $(".dropdown-item").on("click", function() {
            $(".dropdown-menu").addClass("hidden");
            let id = $(this).attr("data-id");
            if (qualifications.includes(id)) {
                let index = qualifications.indexOf(id);
                qualifications.splice(index, 1);
            } else {
                qualifications.push(id);
            }
        });
        $('#submit1').click(function(e) {
            e.preventDefault();
            let nnew = inputQualifications.concat(qualifications);

            $.ajax({
                url: "{{ route('qualification.store') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    qualifications: nnew
                },
                success: function(response) {
                    $("#section3").show();
                    $("#section2").hide();

                },
                error: function(response) {
                    alert("kkk")
                }
            })
        })
        $('#submit2').click(function(e) {
            let interested_areas = $("input[name='area[]']:checked").map(function() {
                return $(this).val()
            }).get();
            e.preventDefault();
            $.ajax({
                url: "{{ route('interest.store') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    interested_areas: interested_areas
                },
                success: function(response) {
                    location.href = "{{ route('home') }}"

                },
                error: function(response) {
                    alert("kkk")
                }
            })
        })




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
        }
    });
</script>

</html>
