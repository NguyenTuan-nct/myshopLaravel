document.addEventListener("DOMContentLoaded", function () {
    var navbar = document.querySelector('.navbar.fixed-top');
    window.addEventListener('scroll', function () {
        if (window.scrollY > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
});
