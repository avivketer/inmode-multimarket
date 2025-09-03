<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package inmode
 */


 $theme_options_options = get_option( 'theme_options_option_name' ); // Array of All Options
 $address_0 = $theme_options_options['address_0']; // Address
 $phone_number_1 = $theme_options_options['phone_number_1']; // Phone number
 $email_address_2 = $theme_options_options['email_address_2']; // Email address
 $facebook_url_3 = $theme_options_options['facebook_url_3']; // Facebook Url
 $instagram_url_4 = $theme_options_options['instagram_url_4']; // Instagram Url
 $linkedin_url_5 = $theme_options_options['linkedin_url_5']; // LinkedIn Url
 $youtube_url_6 = $theme_options_options['youtube_url_6']; // Youtube Url
 $tiktok_url_7 = $theme_options_options['tiktok_url_7'];
 $pinterest_url_8 = $theme_options_options['pinterest_url_8'];
?>

<section class="techonology">
	<div class="container-fluid">
	    <hr class="border-single-work mt-0 mb-0">
		<div class="row align-items-center text-center tech_row">
		    
			<div class="col-md-4 col-3"><img src="/wp-content/uploads/2025/02/Pro-Capture-One-2061-1.png" class="w-100 mob-hide"></div>
			<div class="col-md-8 col-9"><h2>WHICH TECHNOLOGY </br>IS RIGHT FOR YOU?</h2>
				<a href ="/contact-us/" class="btn btn-primary btn-contact">Contact Us</a>
			</div>	
		</div>
	</div>
</section>
<div class="trapezoid-1"><a href="javscript:void(0);" class="contact-btn" data-bs-toggle="modal" data-bs-target="#exampleModal2">Contact Us</a></div>
<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="footer_top">
			<?php the_custom_logo(); ?>
			<h3>STAY UPDATED!</h3>
			<h5>Follow us on Social media</h5>
			<ul class="socail links">
				<?php if($facebook_url_3!=""){ ?>
						<li><a href="<?php echo $facebook_url_3;?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<?php }
						if($instagram_url_4!=""){?>
						<li><a href="<?php echo $instagram_url_4;?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<?php }
						if($linkedin_url_5!=""){?>
						<li><a href="<?php echo $linkedin_url_5;?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<?php }
						if($youtube_url_6!=""){?>
						<li><a href="<?php echo $youtube_url_6;?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
						<?php }
						if( $tiktok_url_7!=""){?>
						<li><a href="<?php echo $tiktok_url_7;?>"><img src="/wp-content/uploads/2025/03/tik-tok.png" class="logo_social"></a></li>
						<?php }
						if($pinterest_url_8!=""){?>
						<li><a href="<?php echo $pinterest_url_8;?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						<?php }
						
						
						?>
			</ul>
		</div>
	</div>
	<div class="container-fluid px-5">
	<div class="row footer_bottom">
		<div class="col-md-6">
			<nav class="navbar justify-content-left">  
						    <?php wp_nav_menu(
								array(
									'theme_location' => 'menu-4',
									'menu_id'        => 'footer-menu',
									'menu_class'	 => 'd-flex',
								));?>
    						
  						</nav>

		</div>
		<div class="col-md-6 text-right footer-address">
			<p>
				<?php if($phone_number_1!=""){ ?>
					Contact us:
					<a href="tel:<?php echo $phone_number_1;?>">
						<?php echo $phone_number_1; ?> 
					</a>
				<?php } ?>
				<?php if($address_0!=""){ ?> |  
					<?php echo $address_0;?> 
				<?php }?>
			</p>
		</div>
		<div class="col-12 text-center">
		    <p class="branding">UX / UI: FLY Branding</p>
		</div>
	</div>
</div>	
</footer><!-- #colophon -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mx-auto h-auto">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search Here</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
</button>
      </div>
      <div class="modal-body">
        <form role="search" method="get" class="search-form d-flex w-100 align-items-center justify-content-center" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
		<input type="search" class="search-field"
			placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
			value="<?php echo get_search_query() ?>" name="s"
			title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	</label>
	<input type="submit" class="search-submit"
		value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
      </div>
     
    </div>
  </div>
</div>
</div><!-- #page -->

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered w-100">
    <div class="modal-content">
        
     
      <div class="modal-body">
          <div class="bg-white contact_bg bg-pop pb-5">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    <div class="container">
        <div class="tab-container">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">I’m a Physician</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">I’m a Patient</button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <?php echo do_shortcode('[contact-form-7 id="8e00a2a" title="Contact form 1"]');?>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <?php echo do_shortcode('[contact-form-7 id="6f675d7" title="Contact form 2"]');?>
                </div>
            </div>
        </div>
    </div>
</div>
        
      </div>
     
    </div>
  </div>
</div>
</div><!-- #page -->





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.js"></script>
<script type="text/javascript">
    
   jQuery(document).ready(function($) {
    // Use event delegation for dynamically loaded elements
    $(document).on("click", ".eventinfo_popup", function() {
       // alert('test');
        var title = $(this).data("title");
        var description = $(this).data("desc");
        var thumb = $(this).data("thumb");
        var date = $(this).data("date");
        var loc = $(this).data("loc");
        var tream = $(this).data("tream");
        var link = $(this).data("link");

        // Update modal content with data from clicked element
        $("#eventTitle").text(title);
        $(".eventDescription").text(description);
        $("#eventDate").text(date);
        $("#eventModal .thumb").attr('src', thumb);
        $("#eventModal .link").attr('href', link);
        $(".tream").text(tream);
        $("#address").text(loc);

        // Show the modal
        $("#eventModal").modal("show");
    });
    $(document).on("click", ".open_download", function() {
        var link = $(this).data("link");
        $("input[name='download_link']").val(link);  // Corrected the syntax for selecting the input element
        $("#StudiesModal").modal("show");
        
        // Force apply styles to form elements after modal opens
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
            
            // Fix column layout
            $("#StudiesModal .tab-container form .col-md-4, #StudiesModal .tab-container form .col-md-8, #StudiesModal .tab-container form .col-sm-12").css({
                'padding': '0 10px',
                'margin-bottom': '15px'
            });
        }, 100);
    });
});



	jQuery(document).ready(function() {
		jQuery('.counter').each(function () {
			jQuery(this).prop('Counter',0).animate({
				Counter: jQuery(this).text()
				}, 
				{
				duration: 4000,
				easing: 'swing',
				step: function (now) {
					jQuery(this).text(Math.ceil(now));
				}
			});
		});
		jQuery(".pr_menu").hide();
		jQuery(".pt_menu").hide();
		jQuery(".provider-menu").click(function($){
		    jQuery(".nav_patient").removeClass("active");
            jQuery(".nav_provider").toggleClass("active");
            jQuery(".pt_menu").hide();
            jQuery(".pr_menu").toggle();
            
        });
        jQuery(".patient-menu").click(function($){
            jQuery(".nav_provider").removeClass("active");
            jQuery(".nav_patient").toggleClass("active");
            jQuery(".pr_menu").hide();
            jQuery(".pt_menu").toggle();
        });
        jQuery('.open-popup').click(function() {
        var title = $(this).data('title');
        var image = $(this).data('image');
        var content = $(this).data('content');
        var desg = $(this).data('desgination');
        var location = $(this).data('eventLocation');
        jQuery('#teamModal .modal-title').text(title);
        jQuery('#teamModal #modalImage').attr('src', image);
        jQuery('#teamModal #modalContent').text(content);
        jQuery('#teamModal .modal-desig').text(desg);
        jQuery ('#teamModal .eventLocation').text(location);
        jQuery('#teamModal').modal('show'); // Show Bootstrap Modal
    });
    
    
        

   
        function isMobile() {
            return window.matchMedia("(max-width: 1024px)").matches; // Adjust breakpoint if needed
        }
    
        if (!isMobile()) {
            // Desktop menu logic
            $('.menu-item-has-children').hover(
                function () {
                    var $menuItem = $(this);
                    var $submenu = $menuItem.find('> .sub-menu');
                    var isTopLevel = ($menuItem.parent().attr('id') === 'primary-menu');
    
                    if (isTopLevel) {
                        // Close other top-level menus
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
    
                    // Append overlay if not exists
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
                e.preventDefault(); // Prevent navigation
    
                var $menuItem = $(this).parent();
                var $submenu = $menuItem.find('> .sub-menu');
    
                if ($menuItem.hasClass('active')) {
                    $menuItem.removeClass('active');
                    $submenu.slideUp(200);
                } else {
                    // Close only sibling submenus, not parent levels
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
		  
    var navbar = jQuery(".workstation_nav");

    // Ensure navbar exists before accessing offset
    if (navbar.length) {
        var stickyOffset = navbar.offset().top;

        jQuery(window).scroll(function () {
            if (jQuery(window).scrollTop() > stickyOffset) {
                navbar.addClass("sticky");
            } else {
                navbar.removeClass("sticky");
            }
        });
    } 
	});
	
jQuery(document).ready(function ($) {
    function loadPosts() {
        var selectedCategories = [];
        var selectedLocation = [];
        var postType = $('#post-type').val();
        var postdate = $('#post_date').val();
        
        $('.selected-filters').html(''); // Clear selected filters
        
        $('input[type="checkbox"]:checked').each(function () {
            var value = $(this).val();
            
            var label = $(this).parent().text().trim();
            if ($(this).attr('name') === 'location_id[]') {
                selectedLocation.push(value);
            } else {
                selectedCategories.push(value);
            }

            // Append selected filter with a remove button
            $('.selected-filters').append(
                `${label} <span class="remove-filter ms-2" style="cursor:pointer;">&times;</span> 
                <span class="filter-badge badge bg-primary m-1 p-2" data-value="${value}"></span>`
            );
        });

        $.ajax({
            url: '<?php echo admin_url("admin-ajax.php"); ?>',
            type: 'POST',
            data: {
                action: 'filter_posts',
                location: selectedLocation,
                categories: selectedCategories,
                post_type: postType,
                post_date: postdate
            },
            beforeSend: function () {
                $('#posts-container').html('<p>Loading...</p>');
            },
            success: function (response) {
                $('#posts-container').html(response);
            }
        });
    }

    // Load all posts by default
    loadPosts();

    // Trigger filter on checkbox change
    $('input[type="checkbox"]').on('change', function () {
        loadPosts();
    });

    // Reset filter when "All" button is clicked
    $('#all-button').on('click', function () {
        $('input[type="checkbox"]').prop('checked', false);
        $('.selected-filters').html('');
        loadPosts();
    });
    
     // Reset filter when "Reset" button is clicked
    $('#reset-button').on('click', function () {
        $('input[type="checkbox"]').prop('checked', false); // Uncheck all checkboxes
        $('.selected-filters').html(''); // Clear selected filters display
       
        loadPosts(); // Reload posts
    });

    $(document).on('click', '.remove-filter', function () {
        var valueToRemove = $(this).parent().data('value');
        $(`input[value="${valueToRemove}"]`).prop('checked', false);
        $(this).parent().remove();
        loadPosts();
    });
    
    
    var moveSlider = false;

    // Simple before/after slider - working version
    $(document).on("mousedown touchstart", ".ba-Slider .slider2", function(e) {
        e.preventDefault();
        moveSlider = true;
        var $this = $(this).closest('.ba-Slider');
        $this.find('#before img').height($this.find('#after img').height());
        var $beforeImage = $this.children("#before");
        var $sliderControl = $this.children(".slider2");

        $beforeImage.removeClass("ease");
        $sliderControl.removeClass("ease");

        $(document).on("mousemove.slider touchmove.slider", function(e) {
            if (moveSlider) {
                var pOffset = $this.offset();
                var pageX;
                
                // Better touch handling
                if (e.type === 'touchmove') {
                    pageX = e.originalEvent.touches[0].pageX;
                } else {
                    pageX = e.pageX;
                }
                
                var mouseX = pageX - pOffset.left;
                mouseX = (mouseX < 0) ? 0 : mouseX;
                mouseX = (mouseX > $this.width()) ? $this.width() : mouseX;

                $beforeImage.width(mouseX - 0.5);
                $sliderControl.css("left", mouseX - 16.5);
            }
        });

        $(document).on("mouseup.slider touchend.slider", function(e) {
            if (moveSlider) {
                moveSlider = false;
                $beforeImage.addClass("ease");
                $sliderControl.addClass("ease");

                var minmax = $this.width() / 8;
                var beforeWidth = $beforeImage.width();
                var parentWidth = $this.width();

                if (beforeWidth > parentWidth - minmax) {
                    $beforeImage.width("100%");
                    $sliderControl.css("left", parentWidth - 16.5);
                } else if (beforeWidth < minmax) {
                    $beforeImage.width(0);
                    $sliderControl.css("left", -16.5);
                }

                $(document).off(".slider");
            }
        });
    });




    // $(".ba-Slider").each(function(i) {
    //     var $this = $(this);
    //     var $beforeImage = $this.children("#before");
    //     var $sliderControl = $this.children(".slider2");

    //     $sliderControl.on("mousedown touchstart", function(e) {
    //         e.preventDefault();
    //         moveSlider = true;
    //         $beforeImage.removeClass("ease");
    //         $sliderControl.removeClass("ease");
    //     });

    //     $(document).on("mouseup touchend", function(e) {
    //         if (moveSlider) {
    //             moveSlider = false;
    //             $beforeImage.addClass("ease");
    //             $sliderControl.addClass("ease");

    //             var minmax = $this.width() / 8;
    //             var beforeWidth = $beforeImage.width();
    //             var parentWidth = $this.width();

    //             if (beforeWidth > parentWidth - minmax) {
    //                 $beforeImage.width("100%");
    //                 $sliderControl.css("left", parentWidth - 16.5);
    //             } else if (beforeWidth < minmax) {
    //                 $beforeImage.width(0);
    //                 $sliderControl.css("left", -16.5);
    //             }
    //         }
    //     });

    //     $this.on("mousemove touchmove", function(e) {
    //         if (moveSlider) {
    //             var pOffset = $this.offset();
    //             var pageX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;
    //             var mouseX = pageX - pOffset.left;

    //             mouseX = (mouseX < 0) ? 0 : mouseX;
    //             mouseX = (mouseX > $this.width()) ? $this.width() : mouseX;

    //             $beforeImage.width(mouseX - 0.5);
    //             $sliderControl.css("left", mouseX - 16.5);
    //         }
    //     });
    // });
    
    
    $('button.close.btn.close-event').on("click", function(){
        $("#eventModal").modal("hide");
    });
    
    jQuery('.filter-btn_slide').click(function(){
        jQuery('.form-filters').slideToggle();
    });
    jQuery('.close-filter').click(function(){
        jQuery('.form-filters').slideUp();
    });
    

});


jQuery(document).ready(function(){
    jQuery('.multi, .multi1').click(function(event){
        jQuery('.multip, .multip1').toggle();
        event.stopPropagation(); // Prevent the click from bubbling to the document
    });

    jQuery(document).mouseup(function(event){
        if (!jQuery('.multip, .multip1').is(event.target) && jQuery('.multip, .multip1').has(event.target).length === 0 && 
            !jQuery('.multi, .multi1').is(event.target)) {
            jQuery('.multip, .multip1').hide();
        }
    });
});	
jQuery(document).ready(function($) {
    function initializeSlick() {
        if ($(window).width() <= 767) {
            if (!$('.treatment_list').hasClass('slick-initialized')) {
                $('.treatment_list').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    dots: true,
                    arrows: false
                });
            }
        } else {
            if ($('.treatment_list').hasClass('slick-initialized')) {
                $('.treatment_list').slick('unslick');
            }
        }
    }

    // Run on page load
    initializeSlick();

    // Run on window resize
    $(window).on('resize', function() {
        initializeSlick();
    });
});	




</script>
<?php wp_footer(); ?>


</body>
</html>
