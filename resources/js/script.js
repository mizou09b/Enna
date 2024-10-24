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

// Button for sidebar languages rotation
const languageButton = document.getElementById("languageDropdown");
const dropdownMenu = document.querySelector(".dropdown-menu");

// Function to reset the button state
function resetButton() {
    languageButton.classList.remove("rotate-btn"); // Remove the rotation class
}

// Event listener for language selection
dropdownMenu.addEventListener("click", function(event) {
    // Check if the clicked element is a language link
    if (event.target.classList.contains('dropdown-item')) {
        resetButton(); // Reset button when a language is selected
    }
});

// Event listener for button click
languageButton.addEventListener("click", function () {
    languageButton.classList.toggle("rotate-btn");
});

// Event listener for clicks outside the dropdown
document.addEventListener("click", function(event) {
    // Check if the click was outside the language button or dropdown menu
    if (!languageButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
        resetButton(); // Reset the button when clicking outside
    }
});

// Attach the functions to the window object for global accessibility
window.toggleSearch = toggleSearch;
window.toggleMenu = toggleMenu;
