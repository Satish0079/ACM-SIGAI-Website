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
      var a = document.getElementById("ResDiv");
      var b = document.getElementById("navbar");
      if (a.classList.contains("mob-res-div") && a.classList.contains("responsive")) {
        b.classList.add("responsive");
      } else {
        b.classList.remove("responsive");
      }
  }

  let scrollTimer;

  window.addEventListener('scroll', function() {
    const navbar = document.getElementById('navbar');
    const scrollPosition = window.scrollY;

    clearTimeout(scrollTimer);
  
    scrollTimer = setTimeout(function() {
      if (scrollPosition > 0) {   // Use > 700 for the effect to come in after 1 viewport height of scroll
        navbar.classList.add('highlight');
      } else {
        navbar.classList.remove('highlight');
      }
    }, 200); // 200 milliseconds
  });
  
// For checking scroll Position

  // window.addEventListener('scroll', function() {
  //   const scrollPosition = window.scrollY;
  //   console.log('Scroll position:', scrollPosition);
  // });  