// const navSlide = () => {
//     const burger = document.querySelector(".burger");
//     const nav = document.querySelector(".nav-links");
  
//     burger.addEventListener("click", () => {
//       nav.classList.toggle("nav-active");
//     });
//   }
  
//   navSlide();
  

function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
  }