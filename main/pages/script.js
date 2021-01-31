const toggle = document.querySelector(".menu-toggle");
const navBar = document.querySelector("nav");
toggle.addEventListener("click", () => {
    navBar.classList.toggle("active");
    toggle.classList.toggle("rotate");
})