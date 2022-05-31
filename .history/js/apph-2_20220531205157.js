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

// Count

const plus = document.querySelector(".plus"),
  minus = document.querySelector(".minus"),
  num = document.querySelector(".number-cart");
let a = 1;
plus.addEventListener("click", (e) => {
  // e.preventDefault();
  a++;
  num.setAttribute("value", a);
  console.log(a);
});

minus.addEventListener("click", (e) => {
  // e.preventDefault();
  if (a > 1) {
    a--;
    num.setAttribute("value", a);
  }
});

//
const topDown = document.querySelector(".top-down");

function topDownScroll() {
  if (scrollY >= 300) {
    topDown.classList.add("scroll-show");
  } else {
    topDown.classList.remove("scroll-show");
  }
}

window.addEventListener("scroll", topDownScroll);
