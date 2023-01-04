var menu_btn = document.querySelector("#menu-btn");
var sidebar = document.querySelector(".kanan");
var logout = document.querySelector(".logout");

menu_btn.addEventListener("click", () => {
    sidebar.classList.toggle("active-nav");
    logout.classList.toggle("active-log");
});