
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

    $(document).ready(function () {
      const $stars = $('#ratingStars i');
      const $input = $('#ratingValue');
      let currentRating = 0;

      $stars.on('mouseenter', function () {
        const hoverValue = parseInt($(this).data('value'));

        $stars.each(function () {
          const starValue = parseInt($(this).data('value'));
          $(this).toggleClass('hover', starValue <= hoverValue);
        });
      });

      $stars.on('mouseleave', function () {
        $stars.removeClass('hover');

        $stars.each(function () {
          const starValue = parseInt($(this).data('value'));
          $(this).toggleClass('active', starValue <= currentRating);
        });
      });

      $stars.on('click', function () {
        currentRating = parseInt($(this).data('value'));
        $input.val(currentRating);

        $stars.removeClass('active');
        $stars.each(function () {
          const starValue = parseInt($(this).data('value'));
          $(this).toggleClass('active', starValue <= currentRating);
        });
      });
    });

    $('#show-detail').on('click', function () {
    $('#plan-detail').slideDown(); 
    $(this).hide(); 
  });

  $('#hide-detail').on('click', function () {
    $('#plan-detail').slideUp();
    $('#show-detail').show(); 
  });

  $('#toggle-detail').on('click', function () {
  const detail = $('#plan-detail');
  const icon = $('#toggle-icon');
  const button = $(this);

  detail.slideToggle(300, function () {
    // setelah animasi selesai, baru cek dan ubah
    if (detail.is(':visible')) {
      icon.text('▲');
      button.contents().filter(function() {
        return this.nodeType === 3;
      }).last().replaceWith(' Hide Plan Detail');
    } else {
      icon.text('▼');
      button.contents().filter(function() {
        return this.nodeType === 3;
      }).last().replaceWith(' Show Plan Detail');
    }
  });
});

$(document).ready(function() {

  // Login/Register Form submission feedback
  function showFeedback(message, type) {
      const feedbackDiv = $('#auth-feedback');
      feedbackDiv.removeClass('d-none alert-success alert-danger').addClass(`alert alert-${type}`).text(message);
  }

  $("#loginForm, #registerForm").submit(function(e) {
      e.preventDefault();
      const formId = $(this).attr('id');
      let message = (formId === 'loginForm') ? 'Login berhasil! Anda akan diarahkan...' : 'Registrasi berhasil! Silakan login.';
      showFeedback(message, 'success');
      setTimeout(() => {
          $('#loginRegisterModal').modal('hide');
      }, 2000);
  });
  
});



  })(window.jQuery);

  


