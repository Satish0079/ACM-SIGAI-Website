let navbar = document.querySelector('.navbar');

document.addEventListener('scroll', () => {
    if (window.scrollY > 0.000001) {
        navbar.classList.add('scroll');
    } else {
        navbar.classList.remove('scroll');
        navbar.style.transition = '.4s ease'; // Corrected line
    }
});
