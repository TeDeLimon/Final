document.addEventListener('DOMContentLoaded', function() {
    eventListeners();
});
function eventListeners() {
    const menu = document.querySelector('#menu');
  
    menu.addEventListener('click', function() {
      const mobileMenu = document.querySelector('#mobile-menu');
      mobileMenu.classList.toggle('activo'); 
    });
}