let navbar = document.querySelector('.navbar');

document.addEventListener('scroll', () => {
    if (window.scrollY > 0.000001) {
        navbar.classList.add('scroll');
    } else {
        navbar.classList.remove('scroll');
        navbar.style.transition = '.4s ease'; // Corrected line
    }
});

function myFunction() {
    var x = document.getElementById("TopNav");
    if (x.className === "navbar-list") {
      x.className += " responsive";
    } else {
      x.className = "navbar-list";
    }
    var y = document.getElementById("ResDiv");
    if (y.className === "mob-res-div") {
        y.className += " responsive";
      } else {
        y.className = "mob-res-div";
      }
      var z = document.getElementById("logo");
    if (z.className === "logo") {
        z.className += " responsive";
      } else {
        z.className = "logo";
      }
  }
