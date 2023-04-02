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

/* -- Modal Toggle -- */

const handleModalToggle = (id) => {
    const modal = document.getElementById(id);
    modal.dataset.toggled = modal.dataset.toggled === "true" ? "false" : "true";
}


/* -- Flex Gap Support Fallback -- */

const flexGapSupported = () => {
    const flex = document.createElement("div");
    flex.style.display = "flex";
    flex.style.flexDirection = "column";
    flex.style.rowGap = "1px";

    flex.appendChild(document.createElement("div"));
    flex.appendChild(document.createElement("div"));

    document.body.appendChild(flex);
    const isSupported = flex.scrollHeight === 1;
    flex.parentNode.removeChild(flex);

    return isSupported;
}

// if (!flexGapSupported()) {
//     const flexContainers = document.querySelectorAll(".flex-gap");

//     flexContainers.forEach(container => {
//         const flexItems = container.querySelectorAll(".flex-gap-item");

//         flexItems.forEach(item => {
//             item.style.marginBottom = "1rem";
//         });
//     });
// }
