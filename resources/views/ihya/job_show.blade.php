@extends('ihya.app')
@section('content')
    <div class="flex flex-col items-start px-20 mt-20 w-full max-md:px-5 max-md:mt-10 pt-20">
        <!-- Top Section -->
        <div class="flex gap-5 max-md:flex-col max-w-full">
            <!-- Left Section -->
            <div class="flex flex-col w-2/3 max-md:w-full">
                <div class="pr-10 pl-2 w-full max-md:pr-0">
                    <!-- Header -->
                    <div class="flex gap-5 items-center justify-between flex-wrap">
                        <div class="flex gap-5 items-center">
                            <div class="w-1/3 max-md:w-1/2">
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/c515b97a608d5b9467be6a02bd484b00e2ec5167b49e8222f55a4d8c84489d64"
                                    alt="UI/UX Icon" class="object-contain rounded-3xl w-[136px] max-md:w-24" />
                            </div>
                            <div class="w-2/3">
                                <h1 class="text-4xl font-semibold leading-[67px] max-md:text-3xl max-md:leading-[40px]">

                                    {{ $data[0]['job']->title }}

                                </h1>
                            </div>
                        </div>

                        <!-- Buttons Section -->
                        <div class="flex gap-3 mt-4 md:mt-0">
                            <!-- Apply Job Button -->
                            {{-- <button
                                class="gap-2.5 px-5 text-base md:text-xl leading-10 text-center text-white bg-[#D39C32] hover:bg-yellow-800 focus:outline-none focus:ring-2 focus:ring-[#dfdcd6] rounded-lg min-h-[45px] max-md:px-5"
                                aria-label="Apply for this job position">
                                Apply This Job
                            </button> --}}
                            <!-- Share Button -->
                            {{-- <button
                                class="flex justify-center items-center px-2 rounded-lg border border-black border-solid bg-zinc-300 bg-opacity-0 h-[46px] w-[46px]"
                                aria-label="Share job">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/d28244b8576939c6d6c83c4ff3a53e2deddfac28fb113eabc21d631646af5ace?placeholderIfAbsent=true&apiKey=e00d3c793b254127971e1d09475396f0"
                                    alt="Share Icon" class="object-contain aspect-[1.17] w-[30px]" />
                            </button>
                            <!-- Save Button -->
                            <button
                                class="flex justify-center items-center px-2 rounded-lg border border-black border-solid bg-zinc-300 bg-opacity-0 h-[46px] w-[46px]"
                                aria-label="Save job">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/fdd8c4230dc0ee8f66595c393591639676f87b62f8650a596aae6acdeb1bdfe0?placeholderIfAbsent=true&apiKey=e00d3c793b254127971e1d09475396f0"
                                    alt="Save Icon" class="object-contain aspect-[1.04] w-[29px]" />
                            </button> --}}
                        </div>
                    </div>
                    <!-- Description -->
                    <h2 class="mt-12 text-4xl font-medium max-md:text-2xl">Description</h2>
                    <p class="mt-4 text-lg max-md:text-sm">
                        {{ $data[0]['job']->description }}
                    </p>
                    <!-- Vacancy Section -->
                    {{-- <h2 class="mt-12 text-4xl font-medium max-md:text-2xl">Vacancy</h2> --}}
                    {{-- <div class="overflow-auto mt-4 border border-black rounded-lg shadow-sm">
                        <div class="bg-black text-white flex text-lg max-md:text-sm">
                            <div class="py-3 px-4 w-1/3 text-center">Post Name</div>
                            <div class="py-3 px-4 w-1/3 text-center">Vacancies</div>
                            <div class="py-3 px-4 w-1/3 text-center">Qualification</div>
                        </div>
                        <div class="border-t border-black">
                            <div class="flex">
                                <div class="py-2 px-4 w-1/3 text-center">UI Designer</div>
                                <div class="py-2 px-4 w-1/3 text-center">18</div>
                                <div class="py-2 px-4 w-1/3 text-center">10th Pass or ITI</div>
                            </div>
                        </div>
                        <div class="border-t border-black">
                            <div class="flex">
                                <div class="py-2 px-4 w-1/3 text-center">UI Designer</div>
                                <div class="py-2 px-4 w-1/3 text-center">02</div>
                                <div class="py-2 px-4 w-1/3 text-center">10th Pass or ITI</div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- Right Section -->
            <div class="w-1/3 max-md:w-full mt-6 md:mt-0">
                <div class="bg-yellow-50 rounded-3xl p-6 sm:p-5 shadow-sm">
                    <h2 class="text-xl font-semibold text-center">Job Overview</h2>
                    <div class="flex gap-4 mt-4 items-center">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/a86e8b7765d98afa4ac09ac73dbd243f1339a323aa8034492dc0787487323e92"
                            alt="Post Icon" class="w-5" />
                        <div>Post Name: <span class="text-sm">{{ $data[0]['job']->title }}</span></div>
                    </div>
                    <div class="flex gap-4 mt-4 items-center">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/908f56851b3a2a0eaebccdd6a4321f4781abddc04c709778d5db81a219bd6f2b"
                            alt="Qualification Icon" class="w-5" />
                        <div>Qualification: <span class="text-sm ">{{ $data[0]['job']->specialQual }}</span></div>
                    </div>
                    <div class="flex gap-4 mt-4 items-center">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d2fe821baec7298b210e96e43b23ac8da64401102466416268c4a153dc25a86e"
                            alt="Age Icon" class="w-5" />
                        <div>Age Limit: <span class="text-sm">{{ $data[0]['job']->min_age }} -
                                {{ $data[0]['job']->max_age }}</span></div>
                    </div>
                    <div class="flex gap-4 mt-4 items-center">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/87ee673caaa91f6b571a4a1dd4089b1ab7edefd536f9f1fcee53c031610d5ea3"
                            alt="Salary Icon" class="w-5" />
                        <div>Monthly Salary: <span class="text-sm" id="salary">24,200- 54,000 Rs/-</span></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notification Button -->
        <a href="https://allgovernmentjobs.in/"
            class="mt-10 self-center text-white bg-purple-500 rounded-2xl shadow-sm px-4 py-2 text-lg hover:bg-purple-700"
            target="_blank" rel="noopener noreferrer">For Further Details</a>

    </div>
    <!-- Footer -->
    <div class="mt-10 text-center w-full bg-[#FFDD9B] py-8 max-md:max-w-full">
        <h2 class="text-3xl max-md:text-xl font-semibold">Need Job Related Updates Regularly? Click Here</h2>
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/19744f45543518893797ceb1f39d0683f9e92a070922dba2cad29ee9a14e2ac0"
            alt="Footer Image" class="mx-auto mt-4 w-32" />
    </div>


    <script>
        function getRandomSalary(min, max) {
            // Generate random salary between min and max
            const salary = Math.floor(Math.random() * (max - min + 1)) + min;

            // Format the salary with commas
            return salary.toLocaleString();
        }

        let salary = getRandomSalary(10000, 50000);
        let salary2 = getRandomSalary(10000, 50000);
        document.getElementById('salary').textContent = `${salary} - ${salary2} Rs/-`;
    </script>
@endsection
