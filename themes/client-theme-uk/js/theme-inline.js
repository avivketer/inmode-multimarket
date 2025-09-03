jQuery(function($){
// --- Begin migrated code from footer.php ---

// Bootstrap and Slick initializations
// (No need to include <script> tags, just the JS)

   // Event info popup
   $(document).on("click", ".eventinfo_popup", function() {
      var title = $(this).data("title");
      var description = $(this).data("desc");
      var thumb = $(this).data("thumb");
      var date = $(this).data("date");
      var loc = $(this).data("loc");
      var tream = $(this).data("tream");
      var link = $(this).data("link");
      $("#eventTitle").text(title);
      $(".eventDescription").text(description);
      $("#eventDate").text(date);
      $("#eventModal .thumb").attr('src', thumb);
      $("#eventModal .link").attr('href', link);
      $(".tream").text(tream);
      $("#address").text(loc);
      $("#eventModal").modal("show");
   });
   $(document).on("click", ".open_download", function() {
      var link = $(this).data("link");
      $("input[name='download_link']").val(link);
      $("#StudiesModal").modal("show");
      setTimeout(function() {
         $("#StudiesModal .tab-container form input:not([type='submit']):not([type='checkbox'])").css({
            'background': '#ffffff',
            'color': '#000000',
            'border': '1px solid #000000',
            'width': '100%',
            'height': '35px',
            'padding': '0 10px',
            'font-size': '16px',
            'margin-bottom': '10px',
            'box-sizing': 'border-box'
         });
         $("#StudiesModal .tab-container form select").css({
            'background': '#ffffff',
            'color': '#000000',
            'border': '1px solid #000000',
            'width': '100%',
            'height': '35px',
            'padding': '0 10px',
            'font-size': '16px',
            'margin-bottom': '10px',
            'box-sizing': 'border-box'
         });
         $("#StudiesModal .tab-container form textarea").css({
            'background': '#ffffff',
            'color': '#000000',
            'border': '1px solid #000000',
            'width': '100%',
            'height': '87px',
            'padding': '10px',
            'font-size': '16px',
            'margin-bottom': '10px',
            'box-sizing': 'border-box'
         });
         $("#StudiesModal .tab-container form label").css({
            'color': '#000000',
            'font-size': '16px',
            'display': 'block',
            'margin-bottom': '5px'
         });
         $("#StudiesModal .tab-container form .col-md-4, #StudiesModal .tab-container form .col-md-8, #StudiesModal .tab-container form .col-sm-12").css({
            'padding': '0 10px',
            'margin-bottom': '15px'
         });
      }, 100);
   });

   // Counter animation
   $('.counter').each(function () {
      $(this).prop('Counter',0).animate({
         Counter: $(this).text()
         }, 
         {
         duration: 4000,
         easing: 'swing',
         step: function (now) {
            $(this).text(Math.ceil(now));
         }
      });
   });
   $(".pr_menu").hide();
   $(".pt_menu").hide();
   $(".provider-menu").click(function($){
      $(".nav_patient").removeClass("active");
      $(".nav_provider").toggleClass("active");
      $(".pt_menu").hide();
      $(".pr_menu").toggle();
   });
   $(".patient-menu").click(function($){
      $(".nav_provider").removeClass("active");
      $(".nav_patient").toggleClass("active");
      $(".pr_menu").hide();
      $(".pt_menu").toggle();
   });
   $('.open-popup').click(function() {
      var title = $(this).data('title');
      var image = $(this).data('image');
      var content = $(this).data('content');
      var desg = $(this).data('desgination');
      var location = $(this).data('eventLocation');
      $('#teamModal .modal-title').text(title);
      $('#teamModal #modalImage').attr('src', image);
      $('#teamModal #modalContent').text(content);
      $('#teamModal .modal-desig').text(desg);
      $('#teamModal .eventLocation').text(location);
      $('#teamModal').modal('show');
   });
   function isMobile() {
      return window.matchMedia("(max-width: 1024px)").matches;
   }
   if (!isMobile()) {
      // Desktop menu logic
      $('.menu-item-has-children').hover(
         function () {
            var $menuItem = $(this);
            var $submenu = $menuItem.find('> .sub-menu');
            var isTopLevel = ($menuItem.parent().attr('id') === 'primary-menu');
            if (isTopLevel) {
               $('#primary-menu > li.menu-item-has-children')
                  .not($menuItem)
                  .removeClass('active')
                  .find('> .sub-menu')
                  .stop(true, true)
                  .slideUp(200);
               $('.overlay-menu').remove();
            }
            $menuItem.addClass('active');
            $submenu.stop(true, true).slideDown(200);
            if (isTopLevel && $('.overlay-menu').length === 0) {
               $('<div class="overlay-menu"></div>').appendTo('.main_m');
            }
         },
         function () {
            var $menuItem = $(this);
            var $submenu = $menuItem.find('> .sub-menu');
            var isTopLevel = ($menuItem.parent().attr('id') === 'primary-menu');
            $menuItem.removeClass('active');
            $submenu.stop(true, true).slideUp(200, function () {
               if (isTopLevel) {
                  var anyTopVisible =
                     $('#primary-menu > li.menu-item-has-children > .sub-menu:visible').length > 0;
                  if (!anyTopVisible) {
                     $('.overlay-menu').fadeOut(200, function () {
                        $(this).remove();
                     });
                  }
               }
            });
         }
      );
   } else {
      // Mobile menu logic (click-based)
      $('.menu-item-has-children > a').on('click', function (e) {
         e.preventDefault();
         var $menuItem = $(this).parent();
         var $submenu = $menuItem.find('> .sub-menu');
         if ($menuItem.hasClass('active')) {
            $menuItem.removeClass('active');
            $submenu.slideUp(200);
         } else {
            $menuItem.siblings('.menu-item-has-children').removeClass('active').find('> .sub-menu').slideUp(200);
            $menuItem.addClass('active');
            $submenu.stop(true, true).slideDown(200);
         }
      });
   }
   $('.carousel_work').slick({
      slidesToShow: 3,
      dots:true,
      centerMode: true,
      centerPadding: '150px',
      autoplay: true,
      speed: 500,
      responsive: [
         {
            breakpoint: 991,
            settings: {
               slidesToShow: 2,
               centerPadding: '100px',
            }
         },
         {
            breakpoint: 767,
            settings: {
               slidesToShow: 1,
               centerPadding: '80px',
            }
         },
      ]
   });
   $('.testimonial_slider, .event_list_slider').slick({
      slidesToShow: 3,
      speed: 500,
      dots:true,
      autoplay: true,
      responsive: [
         {
            breakpoint: 991,
            settings: {
               slidesToShow: 2,
            }
         },
         {
            breakpoint: 767,
            settings: {
               slidesToShow: 1,
            }
         },
      ]
   });
   $('.studies, .work_tech').slick({
      slidesToShow: 3,
      speed: 500,
      responsive: [
         {
            breakpoint: 991,
            settings: {
               slidesToShow: 2,
            }
         },
         {
            breakpoint: 767,
            settings: {
               slidesToShow: 1,
            }
         },
      ]
   });
   $('.multiple-banners, .multiple-banners1').slick({
      slidesToShow: 1,
      speed: 500,
      dots:false,
      autoplay: true,
   });
   $('.result-slide').slick({
      slidesToShow: 3,
      speed: 500,
      dots:true,
      autoplay: true,
      responsive: [
         {
            breakpoint: 991,
            settings: {
               slidesToShow: 2,
            }
         },
         {
            breakpoint: 767,
            settings: {
               slidesToShow: 1,
            }
         },
      ]
   });
   var navbar = $(".workstation_nav");
   if (navbar.length) {
      var stickyOffset = navbar.offset().top;
      $(window).scroll(function () {
         if ($(window).scrollTop() > stickyOffset) {
            navbar.addClass("sticky");
         } else {
            navbar.removeClass("sticky");
         }
      });
   }
   // Filter and before/after slider logic (if not already in ba-slider.js)
   // ...
   // (If you have more code, continue pasting here)

// --- End migrated code from footer.php ---
});