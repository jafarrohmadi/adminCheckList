$(window).scroll(function () {
  $('.header').toggleClass("hide", ($(window).scrollTop() > 100));
});

$(document).on('click','.menu-bar',function() {
  $('.sidenav').addClass( "active" );
  $('.sidenav-overlay').fadeIn();
});

$(document).on('click','.sidenav-overlay',function() {
  $('.sidenav').removeClass( "active" );
  $('.sidenav-overlay').fadeOut();
});

$(document).on('click','.btn.yellow',function() {
  $('.map-detail').addClass( "active" );
  $('.btn-closemap').show();
});

$(document).on('click','.btn-closemap',function() {
  $('.map-detail').removeClass( "active" );
  $('.btn-closemap').hide();
});