@extends('ihya.app')
@section('content')
    <main class="flex  z-10 flex-col px-20 md:px-[2%] py-8 -mt-10 w-full bg-orange-50 max-md:px-5 max-md:max-w-full">
        <div class="w-full max-md:max-w-full">
            <div class="  md:w-full flex gap-5 max-md:flex-col">
                <aside class=" flex flex-col w-3/12 max-md:ml-0 max-md:w-full" role="complementary" aria-label="Job Filters">
                    <div class="flex flex-col mt-11 max-md:mt-10">
                        <div
                            class="flex flex-col items-start px-8 lg:px-4 pt-7 pb-16 w-full bg-white rounded-3xl shadow-2xl max-md:px-5">
                            <div
                                class="flex gap-5 justify-between self-stretch w-full text-center whitespace-nowrap items-center fade-in">
                                <div class="flex gap-2 text-xl font-semibold leading-10 text-orange-400">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/5a6baa4d9a4c95ac730a77ce06721b5b13229ad8c1899d90e3db3531562dcaf1?placeholderIfAbsent=true&apiKey=e00d3c793b254127971e1d09475396f0"
                                        alt="Filter icon" class="object-contain shrink-0 my-auto aspect-square w-[18px]" />
                                    <span role="heading" aria-level="2">Filter</span>
                                </div>
                                <div class="flex h-full items-center place-content-center">
                                    <button
                                        class=" text-xs leading-4 text-black hover:cursor-pointer hover:text-yellow-300 focus:outline-none focus:ring-orange-400"
                                        tabindex="0">reset</button>
                                </div>
                            </div>
                            <!-- #region qualified or not-->

                            <fieldset class="w-full flex flex-col items-center my-2  fade-in">
                                <legend
                                    class="mt-3.5 text-base font-semibold leading-10 md:leading-tight md:mb-2 md:pt-3  text-black">
                                    Qualification Status</legend>
                                <div
                                    class="flex gap-2 text-sm md:flex-col lg:flex-row font-medium text-start w-full text-black">


                                    <input type="radio" name="is_qualified" id="qualified" class="hidden peer job-filter"
                                        value="qualified">
                                    <label for="qualified"
                                        class="flex flex-col whitespace-nowrap cursor-pointer peer-checked:*:bg-[#D39C32] peer-checked:*:text-white peer-checked:*:border-white">
                                        <span
                                            class="py-1 px-3 bg-white rounded-xl border border-black border-solid hover:bg-gray-50 focus-within:ring-2 focus-within:ring-orange-400">Qualified</span>
                                    </label>
                                    <div>
                                        <input type="radio" checked name="is_qualified" id="Not-qualified"
                                            class="hidden peer job-filter" value="not_qualified">
                                        <label for="Not-qualified"
                                            class="flex flex-col whitespace-nowrap cursor-pointer peer-checked:*:bg-[#D39C32] peer-checked:*:text-white peer-checked:*:border-white">
                                            <span
                                                class="px-3 py-1 bg-white rounded-xl border border-black border-solid hover:bg-gray-50 focus-within:ring-2 focus-within:ring-orange-400">Not
                                                Qualified</span>
                                        </label>
                                    </div>
                            </fieldset>

                            <!-- #endregion  qualified or not-->



                            <!-- #region type state or central-->
                            <fieldset class="w-full flex flex-col items-center my-2  fade-in">
                                <legend
                                    class="mt-3.5 text-base font-semibold leading-10 md:leading-tight md:mb-2 md:pt-3  text-black">
                                    Level</legend>
                                <div
                                    class="flex gap-2 w-full text-sm md:flex-col lg:flex-row font-medium text-center text-black">

                                    <div>

                                        <input type="radio" checked name="gov_type" id="central"
                                            class="hidden peer job-filter" value="centre">
                                        <label for="central"
                                            class="flex flex-col whitespace-nowrap cursor-pointer peer-checked:*:bg-[#D39C32] peer-checked:*:text-white peer-checked:*:border-white">

                                            <span
                                                class="py-1 px-3 bg-white rounded-xl border border-black border-solid hover:bg-gray-50 focus-within:ring-2 focus-within:ring-orange-400">Central</span>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" name="gov_type" id="state" class="hidden peer job-filter"
                                            value="state">
                                        <label for="state"
                                            class="flex flex-col whitespace-nowrap cursor-pointer peer-checked:*:bg-[#D39C32] peer-checked:*:text-white peer-checked:*:border-white">

                                            <span
                                                class="px-3 py-1 bg-white rounded-xl border border-black border-solid hover:bg-gray-50 focus-within:ring-2 focus-within:ring-orange-400">State</span>
                                        </label>
                                    </div>
                            </fieldset>
                            <fieldset class="w-full flex flex-col items-center my-2  fade-in">
                                <legend
                                    class="mt-3.5 text-base font-semibold leading-10 md:leading-tight md:mb-2 md:pt-3  text-black">
                                    Type</legend>
                                <div
                                    class="flex gap-2 w-full text-sm md:flex-col lg:flex-row font-medium text-center text-black">

                                    <div>

                                        <input type="radio" checked name="type" id="job"
                                            class="hidden peer job-filter" value="job">
                                        <label for="job"
                                            class="flex flex-col whitespace-nowrap cursor-pointer peer-checked:*:bg-[#D39C32] peer-checked:*:text-white peer-checked:*:border-white">

                                            <span
                                                class="py-1 px-3 bg-white rounded-xl border border-black border-solid hover:bg-gray-50 focus-within:ring-2 focus-within:ring-orange-400">Job</span>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" name="type" id="exam" class="hidden peer job-filter"
                                            value="exam">
                                        <label for="exam"
                                            class="flex flex-col whitespace-nowrap cursor-pointer peer-checked:*:bg-[#D39C32] peer-checked:*:text-white peer-checked:*:border-white">

                                            <span
                                                class="px-3 py-1 bg-white rounded-xl border border-black border-solid hover:bg-gray-50 focus-within:ring-2 focus-within:ring-orange-400">Exam</span>
                                        </label>
                                    </div>
                            </fieldset>

                            <!-- #endregion  type state or central -->

                            <!-- #region Vancancy-->
                            <fieldset class="w-full flex flex-col items-center my-2 fade-in">
                                <legend
                                    class="mt-3.5 text-base font-semibold leading-10 md:leading-tight md:mb-2 md:pt-3 center text-black">
                                    Vacancy</legend>

                                <div class="flex gap-2 text-sm md:flex-col lg:flex-row font-medium text-center text-black">

                                    <div>

                                        <input type="radio" checked name="vacancy" id="available"
                                            class="hidden peer job-filter" value="available">
                                        <label for="available"
                                            class="flex flex-col whitespace-nowrap cursor-pointer peer-checked:*:bg-[#D39C32] peer-checked:*:text-white peer-checked:*:border-white">
                                            <span
                                                class="py-1 px-3 bg-white rounded-xl border border-black border-solid hover:bg-gray-50 focus-within:ring-2 focus-within:ring-orange-400">Available</span>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" checked name="vacancy" id="not-available"
                                            class="hidden peer job-filter" value="not_available">
                                        <label for="not-available"
                                            class="flex flex-col whitespace-nowrap cursor-pointer peer-checked:*:bg-[#D39C32] peer-checked:*:text-white peer-checked:*:border-white">
                                            <span
                                                class="px-3 py-1 bg-white rounded-xl border border-black border-solid hover:bg-gray-50 focus-within:ring-2 focus-within:ring-orange-400">Not
                                                Available</span>
                                        </label>
                                    </div>
                            </fieldset>

                            <!-- #endregion  Vancancy -->

                            <div class="mb-6 mt-8 fade-in">
                                <h3 class="text-lg font-semibold text-black mb-4">Interested Areas</h3>

                                <ul>
                                    @foreach ($interestAreas as $area)
                                        <li>
                                            <label class="flex items-center">
                                                <input type="checkbox" name="interest_areas[]"
                                                    class="form-checkbox text-yellow-600 w-5 h-5 mr-3 rounded-xl job-filter"
                                                    value="{{ $area->id }}" checked>
                                                <span class="font-medium text-black">{{ $area->name }}</span>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                                <input type="checkbox" id="show-aoi" class="hidden text-sm mt-3 peer">
                                <label class="peer-checked:*:hidden" for="show-aoi">
                                    <p style="color: #D39C32;"> show more...</p>
                                </label>
                                <div class="hidden peer-checked:block">
                                    <ul>
                                        @foreach ($interestAreasNotOwnedByUser as $area)
                                            <li>
                                                <label class="flex items-center">
                                                    <input type="checkbox" name="interest_areas[]"
                                                        class="form-checkbox text-yellow-600 w-5 h-5 mr-3 rounded-xl job-filter"
                                                        value="{{ $area->id }}">
                                                    <span class="font-medium text-black">{{ $area->name }}</span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                            <!-- Qualification Type -->

                        </div>
                    </div>
                </aside>

                <main class="flex flex-col ml-0 w-9/12 max-md:ml-0 max-md:w-full md:grow md:w-full fade-in"
                    role="main">
                    <div class="flex flex-col w-full max-md:mt-8 max-md:max-w-full">
                        <div class="flex flex-col w-full max-md:max-w-full">
                            <p class="self-start text-base leading-10  mr-4  text-black max-md:max-w-full">
                                *<span class="filter_num"></span> jobs were filtered out <span
                                    class="total_num"></span><span class="text-nowrap"> on the basis
                                    of age and gender</span>
                            </p>


                            <div id="jobs" class="w-full">



                            </div>




                        </div>
                    </div>
                </main>
            </div>
        </div>

    </main>
    <script>
        $(document).ready(function() {
            function getRandomInt(min, max) {
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }
            let jobShowBaseUrl = "{{ route('jobs.show', ['job' => '__ID__']) }}";
            let currentPage = 1;
            let isLastPage = false; // Flag to track if it's the last page

            // Listen for changes on radio buttons with class 'isQualified'
            $(".job-filter").change(function() {
                // Reset last page flag
                $('#jobs').empty(); // Clear previous jobs
                loadPage(); // Load the first page
            });

            function loadPage() {
                let filters = {
                    is_qualified: $("input[name='is_qualified']:checked").val(),
                    gov_type: $("input[name='gov_type']:checked").val(),
                    type: $("input[name='type']:checked").val(),
                    vacancy: $("input[name='vacancy']:checked").val(),
                    interest_areas: $("input[name='interest_areas[]']:checked").map(function() {
                        return $(this).val()
                    }).get(),


                };

                $.ajax({
                    url: "{{ route('jobs.store') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: filters,
                    success: function(response) {
                        console.log(response)
                        let total = "";
                        console.log(response.is_qualified);

                        if (response.is_qualified) {
                            const jobsArray = Object.values(response.jobs);
                            console.log(jobsArray)





                            jobsArray.forEach(element => {
                                const qualifications = element.job_qualifications
                                    .map(q => `${q.name}`)
                                    .join(' , ');
                                let first = `<article class="px-12 py-8 md:px-6 mt-2 bg-white rounded-2xl shadow-lg max-md:px-5 max-md:mr-1.5 max-md:max-w-full" role="article">
                                            <div class="flex gap-5 max-md:flex-col md:gap-0 md:place-content-between">
                                                <div class="flex flex-col w-[76%] max-md:ml-0 max-md:w-full">
                                                    <div class="flex grow gap-8 max-md:mt-10" id="">
                                                        <div class="flex flex-col grow shrink-0 self-start basis-0 w-fit">
                                                            <div class="flex text-center w-full">
                                                                <h2 class=" text-2xl font-semibold leading-1 text-black md:shrink-0 text-start">
                                                                    ${element.title}</h2>
                                                                <span class="z-10 px-2.5 pt-2 ml-3 pb-2 my-auto text-base font-medium leading-4 md:text-nowrap text-white bg-green-600 rounded-lg md:ml-2 md:mb-1 md:py-1 ">Qualified</span>
                                                            </div>`;
                                first = first + `<p class="mt-1.5 text-base font-medium leading-6 text-black max-md:mr-2.5">
                                            <span class="font-semibold text-nowrap">Required Qualifications:</span>
                                            <span class="text-xs text-white">${qualifications}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col ml-5 md:ml-0  max-md:ml-0 max-md:w-full">
                                <div class="flex flex-col  my-auto max-md:mt-10 md:mt-0 ">
                                    <p class="self-end md:self-start text-sm font-medium leading-none text-black max-md:mr-2.5 md:mr-0 md:text-center md:mt-7 md:ml-1  mr-6">
                                        Vacancies: <span class="font-bold">${getRandomInt(0, 10)}</span>
                                    </p>
                                    <a href="${jobShowBaseUrl.replace('__ID__', element.id)}">
                                    <button class="mt-3 px-5 md:px-2  py-1.5 md:text-nowrap text-lg font-semibold text-white rounded-xl bg-[#D39C32] hover:bg-yellow-800  focus:outline-none focus:ring-2 focus:ring-[#dfdcd6]" tabindex="0">Read more</button>
                                    </a>
                                </div>
                            </div>
                    </div>
                    </article>`;
                                total = total + first;
                            });
                        } else if (response.is_qualified == false) {
                            const failedJobsArray = Object.values(response.not_qualified_jobs);
                            if (failedJobsArray.length === 0) {
                                $('#loadMore')
                                    .hide(); // Hide "Load More" button if no not qualified jobs
                            }


                            failedJobsArray.forEach(element => {
                                const qualifications = element.job.job_qualifications
                                    .map(q => `${q.name}`)
                                    .join(' , ');
                                const missingQualifications = element
                                    .missing_qualifications
                                    .map(q => `${q}`)
                                    .join(' , ');

                                let first = `<article class="px-12 py-8 md:px-6 mt-2 bg-white rounded-2xl shadow-lg max-md:px-5 max-md:mr-1.5 max-md:max-w-full" role="article">
                                            <div class="flex gap-5 max-md:flex-col md:gap-0 md:place-content-between">
                                                <div class="flex flex-col w-[76%] max-md:ml-0 max-md:w-full">
                                                    <div class="flex grow gap-8 max-md:mt-10" id="">
                                                        <div class="flex flex-col grow shrink-0 self-start basis-0 w-fit">
                                                            <div class="flex text-center w-full">
                                                                <h2 class=" text-2xl font-semibold leading-1 text-black md:shrink-0 text-start">
                                                                    ${element.job.title}</h2>
                                                                <span class="z-10 px-2.5 pt-2 ml-3 pb-2 my-auto text-base font-medium leading-4 md:text-nowrap text-white bg-red-600 rounded-lg md:ml-2 md:mb-1 md:py-1 ">Not Qualified</span>
                                                            </div>`;
                                first = first + `<p class="mt-1.5 text-base font-medium leading-6 text-black max-md:mr-2.5">
                                            <span class="font-semibold text-nowrap">Required Qualifications:</span>
                                            <span class="text-sm">${qualifications}</span>
                                        </p>
                                        <p class="mt-1.5 text-base font-medium leading-6 text-black max-md:mr-2.5">
                                            <span class="font-semibold text-nowrap text-red-600">Missing Qualifications:</span>
                                            <span class="text-sm">${missingQualifications}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col ml-5 md:ml-0  max-md:ml-0 max-md:w-full">
                                <div class="flex flex-col  my-auto max-md:mt-10 md:mt-0 ">
                                    <p class="self-end md:self-start text-sm font-medium leading-none text-black max-md:mr-2.5 md:mr-0 md:text-center md:mt-7 md:ml-1  mr-6">
                                        Vacancies: <span class="font-bold">${getRandomInt(0, 10)}</span>
                                    </p>
                                   <a href="${jobShowBaseUrl.replace('__ID__', element.job.id)}">
                                    <button class="mt-3 px-5 md:px-2  py-1.5 md:text-nowrap text-lg font-semibold text-white rounded-xl bg-[#D39C32] hover:bg-yellow-800  focus:outline-none focus:ring-2 focus:ring-[#dfdcd6]" tabindex="0">Read more</button>
                                    </a>
                                </div>
                            </div>
                    </div>
                    </article>`;
                                total = total + first;
                            });
                        } else {
                            total =
                                `<div class="flex w-full h-full items-center justify-center text-center mt-6"><p class="text-red-700 text-xl">${response.error}</p></div>`;
                        }

                        const jobDiv = $('#jobs');
                        jobDiv.append(total); // Append the jobs to the existing list

                        // If we've reached the last page, hide the "Load More" button
                        if (response.current_page >= response.last_page) {
                            $('#loadMore').hide();
                            isLastPage = true;
                        } else {
                            $('#loadMore').show();
                        }
                    },
                    error: function() {
                        console.log('Error loading jobs');
                    },
                });
            }

            loadPage();

            // Load more on button click
            // $('#loadMore').click(function() {
            //     if (!isLastPage) {
            //         currentPage++; // Increment the page
            //         loadPage(); // Load the next page
            //     }
            // });

            // function hideIt() {
            //     $('#loadMore').val('sd')
            //     console.log($('#loadMore'))
            // }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endsection
