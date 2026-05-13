<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İbrahim Salih Aslan | Portfolio</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-logo">ISA</div>
        <ul class="nav-links">
            <li><a href="#about">About</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <button id="darkModeBtn">🌙</button>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <h1>Hi, I'm <span class="highlight">İbrahim Salih Aslan</span></h1>
            <p>Software Engineering Student & Game Developer</p>
            <a href="#projects" class="btn">View My Projects</a>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="about">
        <h2>About Me</h2>
        <p>I'm a 3rd-year Software Engineering student at Haliç University. I build projects in game development with Unity, full-stack web, and artificial intelligence.</p>
    </section>

    <!-- PROJECTS -->
    <section id="projects" class="projects">
        <h2>Projects</h2>
        <div id="projects-container">
            <p>Loading...</p>
        </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="contact">
        <h2>Contact</h2>
        <form id="contactForm">
            <input type="text" id="name" placeholder="Your Name" />
            <input type="email" id="email" placeholder="Your Email" />
            <textarea id="message" placeholder="Your Message"></textarea>
            <button type="submit" class="btn">Send</button>
        </form>
        <p id="formMsg"></p>
    </section>

    <footer>
        <p>© 2026 İbrahim Salih Aslan</p>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>