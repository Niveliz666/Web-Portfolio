<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Portfolio') — Developer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>
<body>

<nav class="navbar" id="navbar">
    <div class="container" style="max-width: 1400px;">
        <div class="nav-container">
        <a href="{{ route('home') }}" class="nav-logo">
            dev<span>.</span>
        </a>
        <ul class="nav-links">
            <li><a href="#home" class="nav-link">Home</a></li>
            <li><a href="#about" class="nav-link">About</a></li>
            <li><a href="#skills" class="nav-link">Skills</a></li>
            <li><a href="#projects" class="nav-link">Projects</a></li>
            <li><a href="#contact" class="nav-link">Contact</a></li>
        </ul>
        <button class="hamburger" id="hamburger" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>

<div class="mobile-menu" id="mobileMenu">
    <ul>
        <li><a href="#home" class="mob-link">Home</a></li>
        <li><a href="#about" class="mob-link">About</a></li>
        <li><a href="#skills" class="mob-link">Skills</a></li>
        <li><a href="#projects" class="mob-link">Projects</a></li>
        <li><a href="#contact" class="mob-link">Contact</a></li>
    </ul>
</div>

@yield('content')

<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-logo">dev<span>.</span></div>
            <p class="footer-text">© {{ date('Y') }} All rights reserved.</p>
            <div class="footer-links">
                <a href="#home">Home</a>
                <a href="#projects">Projects</a>
                <a href="#contact">Contact</a>
                <a href="{{ route('admin.projects.index') }}">Admin</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  // Initialize AOS immediately
  AOS.init({
    duration: 800,
    easing: 'ease-out-cubic',
    once: true,
    offset: 100,
    startEvent: 'load'
  });
</script>
<script src="{{ asset('js/portfolio.js') }}"></script>
</body>
</html>