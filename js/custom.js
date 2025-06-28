
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


$(document).ready(function() {

    const planData = {
        diet: { name: 'Diet Plan', price: 30000 },
        protein: { name: 'Protein Plan', price: 40000 },
        royal: { name: 'Royal Plan', price: 60000 }
    };

    const currencyFormatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    });

    function updateSummary() {
        const selectedPlan = $('#plan').val();
        
        const mealTypes = $('input[name="meal_type[]"]:checked').map(function() {
            return $(this).val();
        }).get();

        const deliveryDays = $('input[name="delivery_days[]"]:checked').map(function() {
            return $(this).val();
        }).get();
        
        const plan = planData[selectedPlan];
        if (!plan) { 
            $('#summary-plan-title').text('Subscribe to ... Plan');
            $('#summary-total-price').text('Rp0');
            $('#detail-plan-name').text('No plan selected');
            $('#detail-plan-price').text('Rp0 per meal');
            $('#calculation-string').text('Select options to see calculation');
            return;
        }

        const pricePerMeal = plan.price;
        const numMeals = mealTypes.length;
        const numDays = deliveryDays.length;
        const totalWeeklyPrice = pricePerMeal * numMeals * numDays;
        
        $('#summary-plan-title').text(`Subscribe to ${plan.name}`);
        $('#summary-total-price').text(currencyFormatter.format(totalWeeklyPrice));
        
        $('#detail-plan-name').text(plan.name);
        $('#detail-plan-price').text(`${currencyFormatter.format(pricePerMeal)} per meal`);
        
        $('#detail-meal-types').text(mealTypes.join(', ') || 'None');
        $('#detail-meal-count').text(`${numMeals} meal type(s)`);
        
        const daysHtml = deliveryDays.length > 0
            ? deliveryDays.map(day => `<li><b>${day}</b></li>`).join('')
            : '<li>None</li>';
        $('#detail-delivery-days-list').html(daysHtml);
        $('#detail-delivery-days-count').text(`${numDays} day(s)`);

        const calculationHtml = `
            ${currencyFormatter.format(pricePerMeal)} 
            <small class="text-muted">x</small> ${numMeals} meal(s) 
            <small class="text-muted">x</small> ${numDays} day(s) 
            <strong class="ms-1">= ${currencyFormatter.format(totalWeeklyPrice)}</strong>
        `;
        $('#calculation-string').html(calculationHtml);
    }
    
    if (typeof initialPlanFromPHP !== 'undefined' && initialPlanFromPHP) {
        $('#plan').val(initialPlanFromPHP);
    }

    $('#plan, input[name="meal_type[]"], input[name="delivery_days[]"]').on('change', function() {
        updateSummary();
    });

    updateSummary();

    $('#toggle-detail').on('click', function() {
        const detail = $('#plan-detail');
        const icon = $('#toggle-icon');
        const button = $(this);

        detail.slideToggle(300, function() {
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
    
    $('#subscription-form').on('submit', function(e){
         if($('input[name="meal_type[]"]:checked').length === 0){
             alert('Please select at least one Meal Type.');
             e.preventDefault();
             return;
         }
         if($('input[name="delivery_days[]"]:checked').length === 0){
             alert('Please select at least one Delivery Day.');
             e.preventDefault();
             return;
         }
    });

});

  })(window.jQuery);

  


