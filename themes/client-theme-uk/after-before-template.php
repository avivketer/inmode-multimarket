<?php /* Template Name: After Before Gallery */ 
get_header();?>

<section class="main_part">
  <div class="container-fluid fixed_width">
    <?php while(have_posts()): the_post(); ?>
      <h2 class="page_title text-center after_before_gallery color2 p-3"><?php the_title(); ?></h2>
      <div class="page-desc">
      <?php the_content(); ?>
      
      <div class="filter-btn_slide d-md-none"><i class="fa fa-sliders" aria-hidden="true"></i> Filter</div>
      <div class="form-filters">
            <form id="filter-form">
                <div class="row d-md-none align-items-center mx-3">
                    <div class="col-4"><span class="close-filter"> x </span></div>
                    <div class="col-4"><h4 class="filter_title text-center">Filters</h4></div>
                    <div class="col-4 text-right"><a href="javascript:void(0);" id="reset-button">Clear</a></div>
                </div>
                <input type="hidden" id="post-type" name="post_type" value="result">
                <div class="d-flex justify-content-center mb-5 filter_list">
                    <button type="button" id="all-button" class="btn btn_border_white">All</button>
                    <div class="dropdown">
                        <button class="btn btn_border_white dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Select Workstations
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                            $terms = get_terms(['taxonomy' => 'workstation_cat', 'hide_empty' => false]);
                            foreach ($terms as $term) {
                                echo '<li>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="taxonomy_1[]" value="' . $term->slug . '"> ' . $term->name . '
                                    </label>
                                </li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn_border_white dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Select Treatments
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                            $terms = get_terms(['taxonomy' => 'treatments_cat', 'hide_empty' => false]);
                            foreach ($terms as $term) {
                                echo '<li>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="taxonomy_2[]" value="' . $term->slug . '"> ' . $term->name . '
                                    </label>
                                </li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn_border_white dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Select Type
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                            $terms = get_terms(['taxonomy' => 'etype', 'hide_empty' => false]);
                            foreach ($terms as $term) {
                                echo '<li>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="taxonomy_3[]" value="' . $term->slug . '"> ' . $term->name . '
                                    </label>
                                </li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
      </div>
      
      <div id="posts-container" class='Clinical-Studies-list row d-flex'>
        <?php
        // Initial load of results
        $args = array(
            'post_type' => 'result',
            'posts_per_page' => 12,
            'paged' => 1
        );
        
        $query = new WP_Query($args);
        
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                // Get custom fields
                $before_img_url = get_field('before');
                $after_img_url = get_field('after');
                $logo_img = get_field('logo');

                // Get specific image sizes to ensure consistency
                $before_img_id = attachment_url_to_postid($before_img_url);
                $after_img_id = attachment_url_to_postid($after_img_url);

                $before_sized_url = $before_img_id ? wp_get_attachment_image_src($before_img_id, 'large')[0] : $before_img_url;
                $after_sized_url = $after_img_id ? wp_get_attachment_image_src($after_img_id, 'large')[0] : $after_img_url;
                
                // New CTA control fields (with fallbacks if not set)
                $show_cta = get_field('show_discover_more');
                $show_cta = ($show_cta === true || $show_cta === 1 || $show_cta === '1') ? true : false;
                $custom_link = get_field('cta_custom_link');
                $new_tab = get_field('cta_new_tab') ? '_blank' : '_self';
                $button_text = get_field('cta_button_text');
                if (empty($button_text)) $button_text = 'DISCOVER MORE';
                $link_url = !empty($custom_link) ? $custom_link : get_permalink();
                ?>
                
                <div class="col-md-4 col-12 mb-4">
                    <div class="result_list1">
                        <div class="main_div">
                            <div class="ba-Slider" unselectable='on' onselectstart='return false;' onmousedown='return false;'>    
                                <div id="before"><img src="<?php echo $before_sized_url; ?>" /></div>
                                <div class="slider2"></div>
                                <div id="after"><img src="<?php echo $after_sized_url; ?>" /></div>
                            </div>
                        </div>   
                        
                        <a href="<?php echo esc_url($link_url); ?>" <?php echo ($new_tab === '_blank') ? 'target=\"_blank\" rel=\"noopener\"' : ''; ?>>
                            <img src="<?php echo $logo_img; ?>" class="title_logo mt-4 mb-2">
                        </a>
                        
                        <?php if ($show_cta) : ?>
                            <a href="<?php echo esc_url($link_url); ?>" class="link color2" <?php echo ($new_tab === '_blank') ? 'target=\"_blank\" rel=\"noopener\"' : ''; ?>><?php echo esc_html($button_text); ?></a>
                        <?php else: ?>
                            <div class="link-placeholder"></div>
                        <?php endif; ?>
                    </div>
                </div>
                
            <?php endwhile;
            wp_reset_postdata();
        else :
            echo '<div class="col-12 text-center"><p>No results found.</p></div>';
        endif;
        ?>
      </div>
      
      <?php if ($query->max_num_pages > 1) : ?>
      <div class="load-more-container text-center mt-4 mb-5">
          <button id="load-more" class="btn btn_border_white" data-page="1" data-max="<?php echo $query->max_num_pages; ?>">Load More</button>
      </div>
      <?php endif; ?>
      
      <script>
      jQuery(document).ready(function($) {
          // Load more button click
          $('#load-more').on('click', function() {
              var button = $(this);
              var currentPage = button.data('page');
              var maxPages = button.data('max');
              var nextPage = currentPage + 1;
              
              if (nextPage <= maxPages) {
                  button.text('Loading...');
                  
                  var formData = $('#filter-form').serialize();
                  formData += '&action=load_more_results&page=' + nextPage;
                  
                  $.ajax({
                      url: '<?php echo admin_url('admin-ajax.php'); ?>',
                      type: 'POST',
                      data: formData,
                      success: function(response) {
                          if (response) {
                              $('#posts-container').append(response);
                              button.data('page', nextPage);
                              button.text('Load More');
                              
                              if (nextPage >= maxPages) {
                                  button.hide();
                              }
                          }
                      }
                  });
              } else {
                  button.hide();
              }
          });
          
          // Filter form submission
          $('#filter-form').on('change', 'input', function() {
              $('#posts-container').empty();
              $('#load-more').data('page', 1).show();
              
              var formData = $('#filter-form').serialize();
              formData += '&action=filter_results';
              
              $.ajax({
                  url: '<?php echo admin_url('admin-ajax.php'); ?>',
                  type: 'POST',
                  data: formData,
                  success: function(response) {
                      $('#posts-container').html(response.html);
                      $('#load-more').data('max', response.max_pages);
                      
                      if (response.max_pages <= 1) {
                          $('#load-more').hide();
                      } else {
                          $('#load-more').show();
                      }
                  }
              });
          });
          
          // All button click
          $('#all-button').click(function() {
              // Reset all checkboxes
              $('#filter-form input[type="checkbox"]').prop('checked', false);
              $('#filter-form').find('input').first().trigger('change');
          });
          
          // Reset button click
          $('#reset-button').click(function() {
              // Reset all checkboxes
              $('#filter-form input[type="checkbox"]').prop('checked', false);
              $('#filter-form').find('input').first().trigger('change');
          });
          
          // Mobile filter toggle
          $('.filter-btn_slide').click(function() {
              $('.form-filters').toggleClass('active');
          });
          
          $('.close-filter').click(function() {
              $('.form-filters').removeClass('active');
          });
          
          // FORCE SLIDER HEIGHT FIX - JavaScript solution since CSS isn't working
          function fixSliderHeight() {
              if (window.innerWidth >= 768) { // Desktop only
                  jQuery('.ba-Slider').each(function() {
                      jQuery(this).css({
                          'height': '270px',
                          'max-height': '270px',
                          'overflow': 'hidden'
                      });
                      
                      jQuery(this).find('.slider2').css({
                          'height': '270px',
                          'max-height': '270px',
                          'top': '0',
                          'bottom': 'auto'
                      });
                      
                      jQuery(this).find('#before, #after').css({
                          'height': '270px',
                          'max-height': '270px',
                          'overflow': 'hidden'
                      });
                      
                      jQuery(this).find('#before img, #after img').css({
                          'height': '270px',
                          'max-height': '270px',
                          'object-fit': 'cover',
                          'object-position': 'center'
                      });
                  });
              }
          }
          
          // Apply fix when page loads
          fixSliderHeight();
          
          // Apply fix when window is resized
          jQuery(window).resize(function() {
              fixSliderHeight();
          });
          
          // Apply fix when images load (in case they load after DOM)
          jQuery('.ba-Slider img').on('load', function() {
              setTimeout(fixSliderHeight, 100);
          });
      });
      </script>
    
    </div>
</div>
</section>

<?php endwhile;
    get_footer();?>