$(document).ready(function() {

    setTimeout(function(){
      $('body').addClass('loaded');
      $('h1').css('color','#222222');
    }, 3000);

  });


var menu = document.querySelector('.toggle-sidebar');

menu.onclick = () => {
    document.querySelector('.sidebar-menu').classList.toggle('active');
    menu.classList.toggle('active');
}

var dropdown = document.querySelector('.dropdown-profile-2');

dropdown.onclick = () => {
    document.querySelector(".dropdown-profile-dropdown").classList.toggle('active');
}
