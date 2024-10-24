import "./bootstrap";

// search bar :
function toggleSearch() {
    const searchBox = document.getElementById("search-box");
    if (searchBox.style.display === "block") {
        searchBox.style.display = "none";
    } else {
        searchBox.style.display = "block";
        searchBox.style.opacity = 0;
        setTimeout(() => {
            searchBox.style.opacity = 1;
            searchBox.focus();
        }, 10);
    }
}

// Fade navbar logic
window.addEventListener("scroll", () => {
    const fadeNavbar = document.querySelector(".fade-navbar");

    if (window.scrollY > 80) {
        // Adjust this value based on when you want the fade navbar to appear
        fadeNavbar.classList.add("show"); // Add class to show fade navbar
    } else {
        fadeNavbar.classList.remove("show"); // Remove class to hide fade navbar
    }
});

// button menu js :
function toggleMenu() {
    const menu = document.getElementById("social-menu");
    menu.classList.toggle("active");
}

//button for side bar langauges rotation
const languageButton = document.getElementById("languageDropdown");
const dropdownMenu = document.querySelector(".dropdown-menu");

languageButton.addEventListener("click", function () {
    languageButton.classList.toggle("rotate-btn");
});

// Attach the functions to the window object for global accessibility
window.toggleSearch = toggleSearch;
window.toggleMenu = toggleMenu;
