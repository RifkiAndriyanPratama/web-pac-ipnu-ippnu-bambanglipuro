import "./bootstrap";
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();
import "flowbite";

document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.getElementById("navbar");
    const navbarList = document.getElementById("navbar-list");
    const hamburger = document.querySelector("[data-collapse-toggle]");

    const isHomePage = navbar?.dataset.isHome === 'true';

    if (!navbar || !isHomePage) return;

    const toggleNavbarStyle = () => {
        if (window.scrollY > 10) {
            navbar.classList.remove("bg-transparent", "text-white");
            navbar.classList.add("bg-white", "text-green-600", "shadow-md");

            navbarList?.classList.remove("md:text-white");
            navbarList?.classList.add("md:text-green-600");

            hamburger?.classList.remove("text-white");
            hamburger?.classList.add("text-green-700");
        } else {
            navbar.classList.remove("bg-white", "text-green-600", "shadow-md");
            navbar.classList.add("bg-transparent", "text-white");

            navbarList?.classList.remove("md:text-green-600");
            navbarList?.classList.add("md:text-white");

            hamburger?.classList.remove("text-green-700");
            hamburger?.classList.add("text-white");
        }
    };

    window.addEventListener("scroll", toggleNavbarStyle);
    toggleNavbarStyle();
});






// aos
import AOS from "aos";
import "aos/dist/aos.css";

document.addEventListener("DOMContentLoaded", () => {
    AOS.init({
        duration: 1000,
        once: true,
    });
});
