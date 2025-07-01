
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

        const pageOnLoad = new URLSearchParams(window.location.search).get('page') || 'home';
        const hashOnLoad = window.location.hash;

        if (hashOnLoad && pageOnLoad === 'home' && $(hashOnLoad).length > 0) {
            const header_height = $('.navbar').height();
            setTimeout(function() {
                const totalScroll = $(hashOnLoad).offset().top - header_height;
                $('body,html').animate({
                    scrollTop: totalScroll
                }, 300);
            }, 100);
        }

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

        updateActiveNav();
    });

        function updateActiveNav() {
        const pageParam = new URLSearchParams(window.location.search).get('page') || 'home';
    
        $('.navbar-nav .nav-link').removeClass('active');
    
        if (pageParam === 'home') {
            let scrollPos = $(document).scrollTop();
            let currentId = "";
    
            $('section[id]').each(function () {
                if ($(this).is(':visible')) {
                    const topOffset = $(this).offset().top - 200;
                    const bottomOffset = topOffset + $(this).outerHeight();
                    if (scrollPos >= topOffset && scrollPos < bottomOffset) {
                        currentId = $(this).attr('id');
                    }
                }
            });
    
            if (currentId) {
                $('.navbar-nav .scroll-link[href*="#' + currentId + '"]').addClass('active');
            } else if (scrollPos < 300) { 
                $('.navbar-nav a.nav-link[href="index.php?page=home"], .navbar-nav a.nav-link[href="index.php"]').first().addClass('active');
            }
        } else {
            $('.navbar-nav .nav-link[href*="page=' + pageParam + '"]').addClass('active');
        }
    }

    $(window).on('scroll', updateActiveNav);

    $(window).on('scroll', function () {
        const pageParam = new URLSearchParams(window.location.search).get('page') || 'home';
    
        $('.navbar-nav .nav-link').removeClass('active');
    
        if (pageParam === 'home') {
            let scrollPos = $(document).scrollTop();
            let currentId = "";
    
            $('section[id]').each(function () {
                const topOffset = $(this).offset().top - 200;
                const bottomOffset = topOffset + $(this).outerHeight();
                if (scrollPos >= topOffset && scrollPos <= bottomOffset) {
                    currentId = $(this).attr('id');
                }
            });
    
            if (currentId) {
                $('.navbar-nav .scroll-link[href*="#' + currentId + '"]').addClass('active');
            } else if (scrollPos < 300) { 
                $('.navbar-nav a.nav-link[href="index.php"]').addClass('active');
            }
        } else {
            $('.navbar-nav .nav-link[href*="page=' + pageParam + '"]').addClass('active');
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


$(function() {

    if ($('#date-range-picker').length) { 
        $('#date-range-picker').daterangepicker({
            ranges: {
                'Hari Ini': [moment(), moment()],
                'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
                '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
                'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
                'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            "locale": {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Terapkan",
                "cancelLabel": "Batal",
                "fromLabel": "Dari",
                "toLabel": "Ke",
                "customRangeLabel": "Custom",
                "weekLabel": "W",
                "daysOfWeek": ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
                "monthNames": ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                "firstDay": 1
            },
            "startDate": moment().startOf('month'),
            "endDate": moment().endOf('month')
        }, function(start, end, label) {
            
            $('#date-range-picker span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
        });


        var start = moment().startOf('month');
        var end = moment().endOf('month');
        $('#date-range-picker span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
    }
});

  })(window.jQuery);




