/* -- Mobile Nav Toggle -- */

const navbar = document.querySelector(".navbar");

const handleNavToggle = () => {
    navbar.dataset.transitionable = "true";

    navbar.dataset.toggled = navbar.dataset.toggled === "true" ? "false" : "true";
}

window.matchMedia("(max-width: 768px)").onchange = e => {
    navbar.dataset.transitionable = "false";
    
    navbar.dataset.toggled = "false";
};