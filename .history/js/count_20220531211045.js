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
