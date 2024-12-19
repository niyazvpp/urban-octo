<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Home') | Ihya</title>
    <link rel="shortcut icon" href="{{ asset('assets/src/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manjari:wght@100;400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
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

<body class="font-poppins">
    @include('ihya.layouts.navbar')
    @yield('content')
    @include('ihya.layouts.footer')
</body>
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

</html>
