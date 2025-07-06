import "./bootstrap";
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();
import "flowbite";

// Navbar scroll
document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.getElementById("navbar");
    const linkItems = navbar.querySelectorAll("a, button");

    const toggleNavbarStyle = () => {
        if (window.scrollY > 10) {
            navbar.classList.remove("bg-transparent", "text-white");
            navbar.classList.add(
                "bg-white", // putih solid
                "text-green-600",
                "shadow-md" // bayangan
            );

            linkItems.forEach((item) => {
                item.classList.remove("text-white");
                item.classList.add("text-green-700");
            });
        } else {
            navbar.classList.remove("bg-white", "text-green-600", "shadow-md");
            navbar.classList.add("bg-transparent", "text-white");

            linkItems.forEach((item) => {
                item.classList.remove("text-green-600");
                item.classList.add("text-white");
            });
        }
    };

    window.addEventListener("scroll", toggleNavbarStyle);
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
