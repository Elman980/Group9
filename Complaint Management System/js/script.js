$(document).ready(function(){
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    });
});


document.querySelector('.hamburger-menu').addEventListener('click', () => {
    const navbar = document.querySelector('.navbar');
    navbar.style.display = navbar.style.display === 'flex' ? 'none' : 'flex';
});
