$(document).ready(function() {
    $("#news-slider").owlCarousel({
        items : 3,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigation:true,
        navigationText:["",""],
        pagination:true,
        autoPlay:true,
        slideSpeed: 5000
    });
});


$(document).ready(function() {
    // Initialize the Owl Carousel
    $('.owl-carousel').owlCarousel({
      loop: true, // Set to false if you don't want the carousel to loop
      margin: 15, // Adjust the margin between carousel items as per your needs
      responsiveClass: true,
      responsive: {
        0: {
          items: 1, // Number of items to show on different screen sizes
        },
        600: {
          items: 2,
        },
        1000: {
          items: 3,
        }
      }
    });
  });