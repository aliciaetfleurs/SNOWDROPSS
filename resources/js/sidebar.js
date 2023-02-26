console.log("sidebar");
let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
    });
}

let sidebar = document.querySelector(".sidebar");
let navLinks = document.querySelector(".nav-links");
let homeSection = document.querySelector(".home-section");
let sidebarBtn = document.querySelector(".bx-menu-alt-left");

sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    navLinks.classList.toggle("border");
    homeSection.classList.toggle("move");
});