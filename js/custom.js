
  (function ($) {
  
  "use strict";

    // COUNTER NUMBERS
    jQuery('.counter-thumb').appear(function() {
      jQuery('.counter-number').countTo();
    });
    
    // CUSTOM LINK
    $('.smoothscroll').click(function(){
    var el = $(this).attr('href');
    var elWrapped = $(el);
    var header_height = $('.navbar').height();

    scrollToDiv(elWrapped,header_height);
    return false;

    function scrollToDiv(element,navheight){
      var offset = element.offset();
      var offsetTop = offset.top;
      var totalScroll = offsetTop-navheight;

      $('body,html').animate({
      scrollTop: totalScroll
      }, 300);
    }
});

    $(document).ready(function(){
      $(".owl-testimonials").owlCarousel({
      loop: true,
      margin: 30,
      nav: false,
      dots: true,
      autoplay: true,
      autoplayTimeout: 5000,
      responsive:{
          0:{ items:1 },
          768:{ items:2 },
          992:{ items:3 }
      }
      });
  });

    $(window).on('scroll', function () {
      let scrollPos = $(document).scrollTop();
      let currentId = "";

      $('section[id]').each(function () {
          const topOffset = $(this).offset().top - 200;
          const bottomOffset = topOffset + $(this).outerHeight();
          if (scrollPos >= topOffset && scrollPos <= bottomOffset) {
              currentId = $(this).attr('id');
          }
      });

      $('.navbar-nav .scroll-link').removeClass('active');

      const currentPage = window.location.pathname.split("/").pop();
      if (currentPage === 'index.php' || currentPage === '') {
          if (currentId) {
              $('.navbar-nav .scroll-link[href*="#' + currentId + '"]').addClass('active');
          }
      }

      $('.navbar-nav .nav-link[href="meals.php"]').removeClass('active');
      $('.navbar-nav .nav-link[href="subs.php"]').removeClass('active');

      if (currentPage === 'meals.php') {
          $('.navbar-nav .nav-link[href="meals.php"]').addClass('active');
      } else if (currentPage === 'subs.php') {
          $('.navbar-nav .nav-link[href="subs.php"]').addClass('active');
      }
    });

    
  })(window.jQuery);

  


