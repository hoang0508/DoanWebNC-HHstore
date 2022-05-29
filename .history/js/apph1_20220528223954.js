/*=========TOGGLE MENU=============*/
const toggleMenu = document.querySelector(".menu-toggle");
const headerMenu = document.querySelector(".header-menu");
const itemLink = document.querySelectorAll(".item-link");

toggleMenu.addEventListener("click", function (e) {
  headerMenu.classList.toggle("is-show");
  toggleMenu.classList.toggle("fa-bars");
  toggleMenu.classList.toggle("fa-times");
});

[...itemLink].forEach((item) =>
  item.addEventListener("click", function (e) {
    headerMenu.classList.remove("is-show");
    toggleMenu.classList.toggle("fa-bars");
    toggleMenu.classList.toggle("fa-times");
  })
);

document.addEventListener("click", function (e) {
  if (!headerMenu.contains(e.target) && !e.target.matches(".menu-toggle")) {
    headerMenu.classList.remove("is-show");
    toggleMenu.classList.add("fa-bars");
    toggleMenu.classList.remove("fa-times");
  }
});

/*============FIXED HEADER==============*/

const navbarInner = document.querySelector(".navbar-menu");
window.addEventListener("scroll", function (e) {
  if (this.scrollY >= 200) {
    navbarInner.classList.add("active-fixed");
  } else {
    navbarInner.classList.remove("active-fixed");
  }
});

//

const plus = document.querySelector(".plus"),
  minus = document.querySelector(".minus"),
  num = document.querySelector(".num");
let a = 1;
plus.addEventListener("click", () => {
  a++;
  a = a < 10 ? "0" + a : a;
  num.innerText = a;
});

minus.addEventListener("click", () => {
  if (a > 1) {
    a--;
    a = a < 10 ? "0" + a : a;
    num.innerText = a;
  }
});
