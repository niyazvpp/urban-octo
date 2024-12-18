@extends('ihya.app')


@section('content')
    <style>
        /* Container styling */


        .animation-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Rotating Globe SVG */
        .globe {
            animation: bounce 2s infinite ease-in-out;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Text Fade-in Animation */
        .text-animation h1 {
            animation: fadeIn 2s ease-in-out forwards;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <script>
        const API_KEY = "AIzaSyAfvOdwOsU7ZMTn6H5-3yI8Kic0vrK9EKg";
        const questions = [{
                id: 1,
                question: "What do you usually do when you have free time?",
                options: [
                    "Play sports",
                    "Watch movies/shows",
                    "Play video games",
                    "Read books",
                    "Create art or crafts",
                    "Write stories/poetry",
                    "Explore technology",
                    "Spend time outdoors",
                    "Volunteer",
                    "Listen to music",
                    "Socialize with friends",
                ],
                category: "Personal Interests and Passions",
            },
            {
                id: 2,
                question: "What types of books, movies, or shows do you enjoy most?",
                options: [
                    "Science fiction",
                    "Mystery",
                    "Fantasy",
                    "History",
                    "Comedy",
                    "Adventure",
                    "Romance",
                    "Documentaries",
                    "Superhero stories",
                    "Real-life dramas",
                ],
                category: "Personal Interests and Passions",
            },
            {
                id: 3,
                question: "Do you enjoy working on creative projects, like art, writing, or music?",
                options: [
                    "Yes, I enjoy drawing or painting.",
                    "Yes, I like writing stories or poems.",
                    "Yes, I enjoy playing or composing music.",
                    "No, I prefer other types of activities.",
                ],
                category: "Personal Interests and Passions",
            },
            {
                id: 4,
                question: "Are there any games or activities you love that might show what you’re good at?",
                options: [
                    "Strategy games like chess",
                    "Puzzle-solving games",
                    "Creative games like Minecraft",
                    "Sports or outdoor games",
                    "Role-playing games",
                    "Trivia or knowledge-based games",
                ],
                category: "Personal Interests and Passions",
            },
            {
                id: 5,
                question: "Have you ever tried something new and felt really good at it? What was it?",
                options: [
                    "Cooking",
                    "Building something",
                    "Acting",
                    "Public speaking",
                    "Trying a new sport",
                    "Solving a complex problem",
                    "Volunteering",
                    "Learning a new skill (coding, photography, etc.)",
                ],
                category: "Personal Interests and Passions",
            },
            {
                id: 6,
                question: "If you could teach someone one skill, what would it be?",
                options: [
                    "Playing a sport",
                    "Drawing or painting",
                    "Writing",
                    "Programming",
                    "Organizing things",
                    "Explaining complex ideas",
                    "Playing a musical instrument",
                ],
                category: "Skills and Strengths",
            },
            {
                id: 7,
                question: "Have you ever been complimented for something you did really well?",
                options: [
                    "Performing (sports, music, acting)",
                    "Problem-solving",
                    "Artistic talent",
                    "Leadership",
                    "Public speaking",
                    "Kindness/helpfulness",
                    "Creativity",
                ],
                category: "Skills and Strengths",
            },
            {
                id: 8,
                question: "Are you good at remembering details, or do you prefer big-picture thinking?",
                options: [
                    "Remembering details: Focused on precision and accuracy.",
                    "Big-picture thinking: Focused on overall ideas and goals.",
                ],
                category: "Skills and Strengths",
            },
            {
                id: 9,
                question: "Can you think of a time when you solved a problem in a unique way?",
                options: [
                    "Finding a creative solution for a school project",
                    "Fixing something broken at home",
                    "Helping a friend with advice",
                    "Managing time effectively for a deadline",
                ],
                category: "Skills and Strengths",
            },
            {
                id: 10,
                question: "Are there any skills or talents you wish you could improve or develop?",
                options: [
                    "Public speaking",
                    "Writing",
                    "Artistic skills",
                    "Technical skills (coding, video editing)",
                    "Leadership",
                    "Social skills",
                    "Handcrafting or DIY",
                ],
                category: "Skills and Strengths",
            },
            {
                id: 11,
                question: "What motivates you the most—achieving success, helping others, or being creative?",
                options: [
                    "Achieving success (winning awards, good grades)",
                    "Helping others (volunteering, mentoring)",
                    "Being creative (art, music, innovation)",
                ],
                category: "Values and Goals",
            },
            {
                id: 12,
                question: "Do you want a career that allows you to make a difference in the world?",
                options: [
                    "Yes, I want to help people or the environment.",
                    "Not necessarily, I prefer focusing on personal goals.",
                    "I’m not sure yet.",
                ],
                category: "Values and Goals",
            },
            {
                id: 13,
                question: "How important is job stability or income to you in the future?",
                options: [
                    "Very important (stability and financial security)",
                    "Somewhat important (balance of stability and enjoyment)",
                    "Not a priority (passion and interest matter more)",
                ],
                category: "Values and Goals",
            },
            {
                id: 14,
                question: "Would you prefer a job that lets you work on something you’re passionate about, even if it’s challenging?",
                options: [
                    "Yes, passion is key.",
                    "No, I prefer something easier and more straightforward.",
                ],
                category: "Values and Goals",
            },
            {
                id: 15,
                question: "Do you see yourself working for a big company, a small team, or on your own?",
                options: [
                    "Big company (structured environment, career growth)",
                    "Small team (personal connections, flexibility)",
                    "On my own (freelancing, entrepreneurship)",
                ],
                category: "Values and Goals",
            },
            {
                id: 16,
                question: "Do you like learning by doing hands-on work, or do you prefer reading and studying?",
                options: [
                    "Hands-on work (building, experimenting)",
                    "Reading and studying (books, research)",
                    "A mix of both",
                ],
                category: "Work Preferences",
            },
            {
                id: 17,
                question: "Are you comfortable talking to new people, or do you prefer working with those you already know?",
                options: [
                    "Comfortable talking to new people.",
                    "Prefer working with people I already know.",
                    "Depends on the situation.",
                ],
                category: "Work Preferences",
            },
            {
                id: 18,
                question: "Do you like following routines, or do you enjoy when every day feels different?",
                options: [
                    "Following routines (structured tasks)",
                    "Enjoy when every day feels different (variety and surprises)",
                ],
                category: "Work Preferences",
            },
            {
                id: 19,
                question: "Do you prefer working outdoors, indoors, or in a mix of both?",
                options: [
                    "Outdoors (nature, physical activity)",
                    "Indoors (offices, labs, studios)",
                    "A mix of both",
                ],
                category: "Work Preferences",
            },
            {
                id: 20,
                question: "Would you rather have a job that allows you to focus on one thing or juggle many tasks?",
                options: ["Focus on one thing (specialization)", "Juggle many tasks (multitasking)"],
                category: "Work Preferences",
            },
            {
                id: 21,
                question: "What is your favorite way to learn—reading, watching videos, practicing, or discussing?",
                options: [
                    "Reading (books, articles)",
                    "Watching videos (visual demonstrations)",
                    "Practicing (hands-on learning)",
                    "Discussing (group discussions, debates)",
                ],
                category: "Education and Learning",
            },
            {
                id: 22,
                question: "Are you interested in learning more about technology, like coding, robotics, or game design?",
                options: [
                    "Yes, I’d love to explore these.",
                    "Maybe, if it’s useful for the future.",
                    "No, I’m more interested in other things.",
                ],
                category: "Education and Learning",
            },
            {
                id: 23,
                question: "Do you enjoy experimenting with science, like conducting experiments or building projects?",
                options: [
                    "Yes, I love experimenting.",
                    "Sometimes, but I prefer other activities.",
                    "No, it’s not my interest.",
                ],
                category: "Education and Learning",
            },
            {
                id: 24,
                question: "Have you ever thought about what type of classes or workshops you’d like to take outside school?",
                options: [
                    "Art and design",
                    "Coding",
                    "Sports",
                    "Leadership",
                    "Photography",
                    "Public speaking",
                    "Music",
                    "Business skills",
                ],
                category: "Education and Learning",
            },
            {
                id: 25,
                question: "Do you like working with numbers, data, or solving mathematical problems?",
                options: [
                    "Yes, I enjoy math and data analysis.",
                    "Not really, I prefer other subjects.",
                    "I’m not sure yet.",
                ],
                category: "Skills and Interests",
            },
            {
                id: 26,
                question: "Do you find it easy to talk in front of a group of people or prefer working alone?",
                options: [
                    "I enjoy speaking in front of others.",
                    "I prefer working alone or in smaller groups.",
                    "I’m okay with both, depending on the situation.",
                ],
                category: "Skills and Interests",
            },
            {
                id: 27,
                question: "Do you enjoy learning about history or cultures from around the world?",
                options: [
                    "Yes, I love learning about history and cultures.",
                    "Sometimes, depending on the topic.",
                    "No, I prefer other subjects.",
                ],
                category: "Skills and Interests",
            },
            {
                id: 28,
                question: "Are you interested in understanding how businesses work and managing teams?",
                options: [
                    "Yes, I’m interested in business and management.",
                    "Not really, I’m more interested in other things.",
                    "I’m not sure yet.",
                ],
                category: "Skills and Interests",
            },
            {
                id: 29,
                question: "Would you enjoy a career that involves helping people directly, like healthcare or teaching?",
                options: [
                    "Yes, I want to help others directly.",
                    "Not really, I prefer working in a different field.",
                    "I’m not sure yet.",
                ],
                category: "Career Goals",
            },
            {
                id: 30,
                question: "Do you like problem-solving, like finding solutions for tough situations?",
                options: [
                    "Yes, I love solving problems.",
                    "Sometimes, but it can be frustrating.",
                    "No, I prefer easier tasks.",
                ],
                category: "Career Goals",
            },
            {
                id: 31,
                question: "Would you rather work in a fast-paced environment or in a more calm, organized setting?",
                options: [
                    "Fast-paced environment (lots of action and challenges)",
                    "Calm, organized setting (predictable and steady tasks)",
                ],
                category: "Career Goals",
            },
            {
                id: 32,
                question: "Do you enjoy thinking critically or analyzing things in depth?",
                options: [
                    "Yes, I love thinking critically and analyzing problems.",
                    "Sometimes, but I prefer more hands-on work.",
                    "No, I prefer simpler tasks.",
                ],
                category: "Career Goals",
            },
            {
                id: 33,
                question: "Do you think you’d enjoy working in a career that involves technology, like IT or software development?",
                options: [
                    "Yes, I’m interested in technology and IT.",
                    "Maybe, if I learn more about it.",
                    "No, I’m not interested in technology-related careers.",
                ],
                category: "Career Interests",
            },
            {
                id: 34,
                question: "Are you interested in traveling for work or working internationally?",
                options: [
                    "Yes, I would love to travel for work.",
                    "Not really, I prefer staying closer to home.",
                    "I’m not sure yet.",
                ],
                category: "Career Interests",
            },
            {
                id: 35,
                question: "What kind of impact do you want your future career to have?",
                options: [
                    "I want to make a positive difference in the world.",
                    "I want to focus on my personal growth and success.",
                    "I want to be part of a creative or innovative field.",
                ],
                category: "Career Interests",
            },
        ];
    </script>

    <section class="flex flex-col pt-4 mt-2 w-full min-h-[496px] bg-[#FFFAD7]">
        <div class="flex flex-col items-start px-8 md:px-16 pt-6 pb-12 w-full max-md:px-5">
            <div class="w-full max-w-[1145px] mx-auto px-4 md:px-6">
                <!-- Main Flex Container -->
                <div class="flex gap-5 lg:gap-10 flex-col md:flex-row items-center">
                    <!-- Left Column - Image -->
                    <div class="flex w-full md:w-[45%]">
                        <img style="height: 438px;" loading="lazy" src="{{ asset('assets/src/career path.svg') }}"
                            alt="Ihya Gateway illustration"
                            class="object-contain w-full max-w-[250px] md:max-w-none mx-auto" />
                    </div>

                    <!-- Right Column - Content -->
                    <div class="flex flex-col w-full md:w-[55%] text-center md:text-left">
                        <div class="flex flex-col mt-6 md:mt-0 text-black">
                            <!-- Heading Section -->
                            <h2 class="text-3xl md:text-4xl font-semibold leading-snug md:leading-tight">
                                Set your career with
                                <span class="text-[#D39C32]">Ihya's</span> career
                            </h2>
                            <!-- Subtitle Section -->
                            <p class="mt-4 text-base md:text-xl leading-relaxed md:leading-8">
                                Scroll and explore the hundreds of job affairs
                            </p>
                            <p class="text-base md:text-xl leading-6 md:leading-7">
                                we have made up for you according to your interest
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="flex overflow-hidden flex-col bg-white">


        <section id="career-section" aria-labelledby="skill-section-title"
            class="flex justify-center items-center mt-20 w-full pb-20">
            <form id="questionnaire"
                class="container mx-auto flex flex-col items-center pt-16 pb-12 px-5 md:px-10 lg:px-20 w-full max-w-4xl rounded-3xl shadow-lg"
                style="background-color: #FFFAD7;">
                <h2 id="skill-section-title"
                    class="text-3xl md:text-4xl font-semibold leading-tight text-center mb-6 text-black">Career </h2>
                <!-- Page Indicator -->
                <p id="pageIndicator" class="text-lg font-medium text-gray-700 mb-8"></p>
                <div id="con"></div>
                <!-- Navigation Buttons -->
                <div class=" flex justify-between w-full mt-8">
                    <div class="grid grid-cols-2 place-content-between w-full">
                        <div class="flex w-16 justify-start items-center"><button type="button" id="prevBtn"
                                onclick="handleNavigation('prev')"
                                class="px-6  hidden py-3 text-lg font-semibold text-white bg-[#D39C32] rounded-xl hover:bg-yellow-700 focus:ring-2 focus:ring-gray-600 focus:outline-none"
                                style="">Prev</button></div>
                        <div class="flex place-content-end justify-end items-center">
                            <div class="flex w-full"></div><button type="button" id="nextBtn"
                                onclick="handleNavigation('next')"
                                class=" px-6 py-3 self-end  text-lg font-semibold text-white bg-[#D39C32] rounded-xl hover:bg-yellow-700 focus:ring-2 focus:ring-[#D39C32] focus:outline-none">Next</button>
                        </div>
                    </div>
            </form>
        </section>

        <div id="loading-animation"
            class="hidden fixed inset-0 bg-white bg-opacity-95 flex flex-col items-center justify-center z-50">
            <div class="animation-container">
                <!-- Rotating Globe SVG -->
                <svg class="globe" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="120" height="120">
                    <g transform="translate(0, 0)">
                        <circle cx="32" cy="32" r="30" fill="#FFFAD7" stroke="#D39C32" stroke-width="4">
                        </circle>
                        <path d="M32 2 A30 30 0 1 1 31.999 2.001" fill="none" stroke="#D39C32" stroke-width="3"
                            stroke-dasharray="180 90" stroke-linecap="round" transform="rotate(0 32 32)">
                            <animateTransform attributeName="transform" type="rotate" from="0 32 32" to="360 32 32"
                                dur="2s" repeatCount="indefinite" />
                        </path>
                        <path d="M2 32 A30 30 0 1 0 62 32" fill="none" stroke="#D39C32" stroke-width="3"
                            stroke-dasharray="180 90" stroke-linecap="round" transform="rotate(0 32 32)">
                            <animateTransform attributeName="transform" type="rotate" from="0 32 32" to="-360 32 32"
                                dur="2.5s" repeatCount="indefinite" />
                        </path>
                    </g>
                </svg>

                <!-- Text Animation -->
                <div class="text-animation mt-6 text-center">
                    <h1 class="text-2xl md:text-3xl font-semibold text-[#D39C32]">
                        Ihya AI is crafting the best career paths for you
                    </h1>
                    <p class="text-lg mt-2 text-gray-700">Please wait while we analyze your interests...</p>
                </div>
            </div>
        </div>

        <div id="result" class="hidden">

            <div class="flex flex-col mx-6 md:mx-32 my-10 md:my-28">
                <h1 class="self-center text-2xl md:text-3xl font-semibold leading-none text-center text-black ">
                    Jobs recommended by <span class="font-semibold  " style="color:#d39c32;"> Ihya AI </span>
                </h1>

                <div id="parent">

                </div>

            </div>
        </div>

    </div>
    <script>
        const questionsPerPage = 2;
        let currentPage = 0;
        const responses = {}; // Store user responses

        const container = document.getElementById("con");
        const pageIndicator = document.getElementById("pageIndicator");

        const renderPage = () => {
            // Clear the container
            container.innerHTML = "";

            // Get questions for the current page
            const startIndex = currentPage * questionsPerPage;
            const pageQuestions = questions.slice(startIndex, startIndex + questionsPerPage);

            // Render questions
            pageQuestions.forEach((q, index) => {
                const fieldset = document.createElement("fieldset");
                fieldset.className = "w-full mb-12";
                const responseValue = responses[q.id] || null;

                fieldset.innerHTML = `
                <legend class="text-lg md:text-xl font-semibold leading-none text-black mb-4">
                    Q.${startIndex + index + 1}/${questions.length}
                </legend>
                <p class="text-lg md:text-lg leading-relaxed text-black mb-6">${q.question}</p>
                <div class="flex flex-col space-y-4">
                    ${q.options
                        .map(
                            (option, optIndex) => `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="flex items-center">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <input id="radio-${q.id}-${optIndex}" type="radio" name="radio-group-${q.id}" value="${option}" class=" text-[#D39C32] border border-[#D39C32] focus:ring-[#D39C32]" style="width: 18px; height: 18px;" ${responseValue === option ? "checked" : ""} />
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <label for="radio-${q.id}-${optIndex}" class="ml-2 text-base text-black">${option}</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        `
                        )
                        .join("")}
                </div>
            `;
                container.appendChild(fieldset);
            });

            // Update page indicator
            pageIndicator.textContent = `Page ${currentPage + 1} of ${Math.ceil(questions.length / questionsPerPage)}`;

            // Update navigation buttons
            document.getElementById("prevBtn").style.display = currentPage === 0 ? "none" : "block";
            document.getElementById("nextBtn").innerText = currentPage === Math.ceil(questions.length /
                questionsPerPage) - 1 ? "Submit" : "Next";
        };

        const handleNavigation = (direction) => {
            // Save current responses
            const startIndex = currentPage * questionsPerPage;
            const pageQuestions = questions.slice(startIndex, startIndex + questionsPerPage);
            pageQuestions.forEach((q) => {
                const selectedOption = document.querySelector(`input[name="radio-group-${q.id}"]:checked`);
                responses[q.id] = selectedOption ? selectedOption.value : null;
            });

            // Handle form submission on last page
            if (direction === "next" && currentPage === Math.ceil(questions.length / questionsPerPage) - 1) {
                console.log(responses);
                // alert("Form submitted! Check console for results.");
                submitAnswers(responses);
                $('#career-section').hide()
                $("#result").show()
                const result = document.getElementById("result");
                if (result) {
                    result.scrollIntoView({
                        behavior: "smooth",
                        block: "start"
                    });
                }

                return;
            }

            // Update current page
            currentPage += direction === "next" ? 1 : -1;

            const sectionTitle = document.getElementById("skill-section-title");
            if (sectionTitle) {
                sectionTitle.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
            }
            renderPage();
        };

        function submitAnswers(answers) {
            showLoadingAnimation();
            const API_URL =
                "https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=" +
                API_KEY;


            $.ajax({
                url: API_URL,
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify({
                    contents: {
                        role: "user",
                        parts: [{
                            text: `Questions with options: ${questions}, User choosen answers: ${answers} ` +
                                'Based on the user\'s overall responses, provide five career suggestions in the following JSON format: {"careerSuggestions": [{"career": "Career Name", "reason": "Provide a thoughtful, personalized reason for the suggestion based on the user\'s interests and qualifications, avoiding generic statements.", "description": "A detailed description of the career, relevant to India with a focus on government jobs, growth, and stability.", "whatToDo": "Outline the steps to pursue this career, including education, skills, and certifications.", "trending": "true/false indicating whether the career is trending in India."}]}. Provide only this JSON without any additional text or explanation.PLease provide, i am directly usingit in my website, so dont interrupt the data',
                        }, ],
                    },
                }),
                success: function(response) {
                    hideLoadingAnimation();
                    const careerSuggestions = JSON.parse(
                        response?.candidates[0].content.parts[0].text
                    )?.careerSuggestions;
                    let total = "";
                    careerSuggestions.forEach((career) => {
                        let element = `<article
                    class="flex flex-wrap gap-5 justify-between items-start px-5 md:px-16 py-8 md:py-12 mt-6 md:mt-12 w-full rounded-3xl shadow-lg bg-[#D39C32] bg-opacity-50">
                    <div class="flex flex-col text-sm md:text-base leading-6 text-black">
                        <h2 class="self-start text-xl md:text-3xl font-semibold leading-none">
                            ${career.career}
                        </h2>
                        <p class="mt-3">
                           ${career.description}
                        </p>
                        <p class="mt-4 md:mt-6 font-medium">
                            <span class="font-semibold">How could be?</span>
                            <span>${career.whatToDo}</span>
                        </p>
                    </div>
                </article>`;
                        total = total + element;
                    })
                    $("#result").html(total);

                },
                error: function(error) {
                    console.error("An error occurred:", error);
                    hideLoadingAnimation();

                },
            });
        }
        // Initial render

        $(document).ready(function() {
            renderPage();
        })

        function showLoadingAnimation() {
            const loadingAnimation = document.getElementById('loading-animation');
            loadingAnimation.classList.remove('hidden');
        }

        function hideLoadingAnimation() {
            const loadingAnimation = document.getElementById('loading-animation');
            loadingAnimation.classList.add('hidden');
        }

        // Example usage during result generation
        // Show the animation when generating results

        // Adjust timeout as needed
    </script>
@endsection
