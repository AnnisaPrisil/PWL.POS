<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet"/>
    <title>UTS </title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&family=Poppins:wght@400;500;600;700&display=swap");


        :root {
            --primary-color: #0a1e27;
            --secondary-color: #e9c675;
            --text-light: #cbd5e1;
            --white: #ffffff;
            --max-width: 1200px;
            --header-font: "Playfair Display", serif;
        }


        /* Import Fonts */
@import url("https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&family=Poppins:wght@400;500;600;700&display=swap");


/* Root Variables */
:root {
  --primary-color: #0a1e27;
  --secondary-color: #9c5f94;
  --text-light: #cbd5e1;
  --white: #ffffff;
  --max-width: 1200px;
  --header-font: "Playfair Display", serif;
}


/* Reset Styles */
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}


html,
body {
  scroll-behavior: smooth;
}


body {
  font-family: "Poppins", sans-serif;
}


/* General Styles */
.section__container {
  max-width: var(--max-width);
  margin: auto;
  padding: 5rem 1rem;
}


img {
  display: flex;
  width: 100%;
}


a {
  text-decoration: none;
  transition: 0.3s;
}


/* Button Styles */
.btn {
  padding: 0.75rem 1.5rem;
  outline: none;
  border: none;
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 1rem;
  color: var(--white);
  background-color: transparent;
  border-radius: 5px;
  transition: 0.3s;
  cursor: pointer;
}


.btn:hover {
  background-color: rgba(10, 30, 39, 0.5);
}


/* Logo Styles */
.logo a {
  font-size: 1.5rem;
  font-weight: 600;
  font-family: var(--header-font);
  color: var(--white);
}


/* Section Header Styles */
.section__subheader {
  position: relative;
  isolation: isolate;
  margin-bottom: 1rem;
  padding-left: 5rem;
  font-size: 0.9rem;
  font-weight: 600;
  letter-spacing: 2px;
  color: var(--secondary-color);
}


.section__subheader::before {
  position: absolute;
  content: "";
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  height: 2px;
  width: 4rem;
  background-color: var(--secondary-color);
}


.section__subheader::after {
  position: absolute;
  top: 50%;
  left: 0;
  transform: translate(-60%, -50%);
  font-size: 8rem;
  font-weight: 600;
  color: var(--white);
  opacity: 0.1;
  z-index: -1;
}


.section__header {
  margin-bottom: 1rem;
  font-size: 3rem;
  font-weight: 400;
  font-family: var(--header-font);
  color: var(--white);
}


/* Header and Video Styles */
.header {
  position: relative;
  height: 100vh;
  overflow: hidden;
}


.video-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
}


.video-background video {
  width: 100%;
  height: 100%;
  object-fit: cover;
  position: absolute;
  top: 0;
  left: 0;
}


.video-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: radial-gradient(
    rgba(255, 255, 255, 0),
    var(--primary-color)
  );
}


/* Navigation Styles */
nav {
  position: relative;
  max-width: var(--max-width);
  margin: auto;
  padding: 1rem;
  z-index: 10;
}


.nav__bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
}


.nav__links {
  position: absolute;
  right: 1rem;
  top: 68px;
  width: calc(100% - 2rem);
  max-width: 350px;
  padding: 2rem;
  list-style: none;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  gap: 2rem;
  background-color: rgba(10, 30, 39, 0.8);
  border-radius: 10px;
  display: none;
}


.nav__links.open {
  display: flex;
  animation: show-nav 0.3s linear forwards;
}


.nav__links.close {
  animation: hide-nav 0.3s linear forwards;
}


@keyframes show-nav {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}


@keyframes hide-nav {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}


.nav__links a {
  font-weight: 500;
  color: var(--white);
}


.nav__links a:hover {
  color: var(--secondary-color);
}


.nav__menu__btn {
  font-size: 1.5rem;
  color: var(--white);
  cursor: pointer;
}


.nav__action__btn {
  display: none;
}


/* Header Content Styles */
.header__container {
  position: relative;
  height: calc(100% - 75px);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 10;
}


.header__content {
  max-width: 700px;
  text-align: center;
}


.header__content .section__header {
  font-size: 4rem;
  font-weight: 600;
  line-height: 5rem;
}


.header__content a {
  color: var(--white);
}


.header__content a:hover {
  color: var(--secondary-color);
}


.scroll__btn {
  margin-top: 2rem;
}


.header__socials {
  position: absolute;
  left: 0;
  align-items: center;
  gap: 1rem;
  color: var(--white);
  transform: translateX(calc(-50% + 1rem)) rotate(90deg);
  display: none;
}


.header__socials a {
  font-size: 1.2rem;
  color: var(--white);
  transform: rotate(-90deg);
}


.header__socials a:hover {
  color: var(--secondary-color);
}


/* About Section Styles */
.about {
  background-image: linear-gradient(
    to bottom,
    rgba(255, 255, 255, 0),
    var(--primary-color) 8rem
  );
  overflow: hidden;
}


.about__container {
  padding-top: 0;
  display: grid;
  gap: 5rem 2rem;
  overflow: hidden;
}


.about__image img {
  max-width: 400px;
  margin-inline: auto;
  border-radius: 5px;
  box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.4);
}


.about__content-1 .section__subheader::after {
  content: "01";
}


.about__content-2 .section__subheader::after {
  content: "02";
}


.about__content-3 .section__subheader::after {
  content: "03";
}


.about__content p {
  margin-bottom: 1.5rem;
  color: var(--text-light);
}


.about__content a {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  color: var(--secondary-color);
}


.about__content a span {
  transition: 0.3s;
}


.about__content a:hover span {
  transform: translateX(10px);
}


/* Footer Styles */
.footer {
  background-color: var(--primary-color);
}


.footer__container {
  display: grid;
  gap: 4rem 2rem;
}


.footer__col:first-child {
  max-width: 300px;
}


.footer__logo {
  margin-bottom: 1rem;
}


.footer__col p {
  color: var(--text-light);
}


.footer__col h4 {
  margin-bottom: 1rem;
  font-size: 1rem;
  font-weight: 600;
  color: var(--secondary-color);
}


.footer__links {
  list-style: none;
  display: grid;
  gap: 1rem;
}


.footer__links a {
  color: var(--text-light);
}


.footer__links a:hover {
  color: var(--secondary-color);
}


.footer__bar {
  padding: 1rem;
  font-size: 0.9rem;
  color: var(--text-light);
  text-align: center;
  border-top: 1px solid rgba(203, 213, 225, 0.1);
}


/* Media Queries */
@media (width > 768px) {
  .nav__logo {
    flex: 1;
  }


  .nav__links {
    position: static;
    padding: 0;
    display: flex;
    flex-direction: row;
    background-color: transparent;
  }


  .nav__menu__btn {
    display: none;
  }


  .nav__action__btn {
    justify-content: flex-end;
    display: flex;
    flex: 1;
  }


  .header__container {
    height: calc(100% - 10rem);
  }


  .header__socials {
    display: flex;
  }


  .about__container {
    grid-template-columns: repeat(2, 1fr);
    align-items: center;
    gap: 10rem 2rem;
  }


  .about__image-1 {
    grid-area: 1/2/2/3;
  }


  .about__image-3 {
    grid-area: 3/2/4/3;
  }


  .about__content {
    margin-left: 6rem;
  }


  .footer__container {
    grid-template-columns: 2fr 1fr 1fr;
  }
}


/* Additional Media Queries */
@media (width > 1024px) {
  .header__content .section__header {
    font-size: 5rem;
    line-height: 6rem;
  }


  .about__image img {
    max-width: 450px;
  }
}


@media (width <= 768px) {
  .section__header {
    font-size: 2.5rem;
  }


  .header__content .section__header {
    font-size: 3rem;
    line-height: 4rem;
  }


  .about__content {
    text-align: center;
  }


  .footer__col:first-child {
    text-align: center;
    max-width: 100%;
  }
}
    </style>
</head>
<body>
    <header class="header" id="home">
        <!-- Video Background -->
        <div class="video-background">
            <video autoplay loop muted playsinline>
              <source src="images/header new.png" type="video/mp4">
            </video>
            <div class="video-overlay"></div>
          </div>


        <nav>
            <div class="nav__bar">
                <div class="logo nav__logo">
                    <a href="#">GOLDEN</a>
                </div>
                <ul class="nav__links" id="nav-links">
                    <li><a href="#event">About</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#info">Contact</a></li>
                </ul>
                <div class="nav__menu__btn" id="menu-btn">
                    <i class="ri-menu-line"></i>
                </div>
                <!-- Bagian tombol login -->
                <div class="nav__action__btn">
                    <a href="{{ url('/login') }}" class="btn">
                        <span><i class="ri-user-line"></i></span> Login
                    </a>
                </div>
            </div>
        </nav>
       
        <div class="section__container header__container">
            <div class="header__content">
                <h3 class="section__subheader">Reference Outfit For Woman</h3>
                <h1 class="section__header">
                    I DON'T DO FASHION I AM FASHION


                </h1>
                <div class="scroll__btn">
                    <a href="#event">
                        Scroll down
                        <span><i class="ri-arrow-down-line"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </header>


    <section class="about">
        <div class="section__container about__container">
            <div class="about__image about__image-1" id="event">
                <img src="{{ asset('images/about-1.png') }}" alt="about" />
            </div>
            <div class="about__content about__content-1">
                <h3 class="section__subheader">DRESS</h3>
                <h2 class="section__header">What interest for the outfit in here</h2>
                <p>
                    every time you see a charming beautiful dress,
                    you will be carried away by the
                    atmosphere of beauty in every beautiful dress worn from head to toe.


                </p>
            </div>


            <div class="about__image about__image-2" id="menu">
                <img src="{{ asset('images/about-2.png') }}" alt="features" />
            </div>
            <div class="about__content about__content-2">
                <h3 class="section__subheader">SHIMER</h3>
                <h2 class="section__header">beautiful outfit in the beach</h2>
                <p>
                    the beauty of a charming white outfit
                    with a scraf and some accessories
                    that complement the beauty of the outfit.


                </p>
            </div>


            <div class="about__image about__image-3" id="info">
                <img src="{{ asset('images/about-3.png') }}" alt="contact" />
            </div>
            <div class="about__content about__content-3">
                <h3 class="section__subheader">CASUAL OUTFIT</h3>
                <h2 class="section__header">very mesmerizing</h2>
                <p>
                    simple casual outfit that becomes beautiful if the outfit
                    that follows exceeds the beauty of an outfit with beautiful casuals
       
                </p>
            </div>
        </div>
    </section>


    <footer class="footer">
        <div class="section__container footer__container">
            <div class="footer__col">
                <div class="logo footer__logo">
                    <a href="#">GOLDEN</a>
                </div>
                <p>
                    Get out the shop for the beauty inside and outside


                </p>
            </div>
            <div class="footer__col">
                <h4>Quick Links</h4>
                <ul class="footer__links">
                    <li><a href="#event">About</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#info">Contact</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
            <div class="footer__col">
                <h4>Connect With Us</h4>
                <ul class="footer__links">
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Twitter</a></li>
                </ul>
            </div>
        </div>
        <div class="footer__bar">
            Copyright © {{ date('Y') }} GOLDEN. All rights reserved.
        </div>
    </footer>


    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        // Menu toggle functionality
const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");


menuBtn.addEventListener("click", (e) => {
  const isOpen = navLinks.classList.contains("open");
  menuBtnIcon.setAttribute("class", isOpen ? "ri-menu-line" : "ri-close-line");
  if (isOpen) {
    navLinks.classList.add("close");
    navLinks.addEventListener(
      "animationend",
      (e) => {
        navLinks.classList.remove("open");
        navLinks.classList.remove("close");
      },
      { once: true }
    );
  } else {
    navLinks.classList.add("open");
  }
});


navLinks.addEventListener("click", (e) => {
  navLinks.classList.remove("open");
  menuBtnIcon.setAttribute("class", "ri-menu-line");
});


// Scroll reveal animations
const scrollRevealOption = {
  distance: "50px",
  origin: "bottom",
  duration: 1000,
};


// Check if ScrollReveal is available
if (typeof ScrollReveal !== 'undefined') {
  // Header animations
  ScrollReveal().reveal(".header__container .section__subheader", {
    ...scrollRevealOption,
  });
  ScrollReveal().reveal(".header__container .section__header", {
    ...scrollRevealOption,
    delay: 500,
  });
  ScrollReveal().reveal(".header__container .scroll__btn", {
    ...scrollRevealOption,
    delay: 1000,
  });
  ScrollReveal().reveal(".header__container .header__socials", {
    ...scrollRevealOption,
    origin: "left",
    delay: 1500,
  });


  // About section animations
  ScrollReveal().reveal(".about__image-1, .about__image-3", {
    ...scrollRevealOption,
    origin: "right",
  });
  ScrollReveal().reveal(".about__image-2", {
    ...scrollRevealOption,
    origin: "left",
  });
  ScrollReveal().reveal(".about__content .section__subheader", {
    ...scrollRevealOption,
    delay: 500,
  });
  ScrollReveal().reveal(".about__content .section__header", {
    ...scrollRevealOption,
    delay: 1000,
  });
  ScrollReveal().reveal(".about__content p", {
    ...scrollRevealOption,
    delay: 1500,
  });
  ScrollReveal().reveal(".about__content .about__btn", {
    ...scrollRevealOption,
    delay: 2000,
  });
}
    </script>
</body>
</html>



