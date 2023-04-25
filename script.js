$(document).ready(function () {
    $('.navbar-collapse a').click(function(){
      $(".navbar-collapse").collapse('hide');
    });
  
    /* Initialize the video plugin */
    $('.video-container').videoBackground();
  });