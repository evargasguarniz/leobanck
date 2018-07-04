jQuery(document).ready(function($){
  $(window).load(function() {
    $("#single-post-slider").flexslider({
      animation: 'slide',
      slideshow: true,
      controlNav: false,
      prevText: '<',
      nextText: '>',
      smoothHeight: true,
      //mousewheel: true,
      //minItems:3,
      //maxItems:3,
      //move:3,
      slideshowSpeed:  2500,
      start: function(slider) {
        slider.container.click(function(e) {
          if( !slider.animating ) {
            slider.flexAnimate( slider.getTarget('next') );
          }
        });
      }
    });
  });
});