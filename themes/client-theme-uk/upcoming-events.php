<?php /* Template Name: Upcoming Events */ 
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<section class="events upcoming-events">      
    <div class="container">
        <h2 class="page-title mb-4"><?php the_title(); ?></h2>
        <?php the_content(); ?>
        <a href="/previous-events/" class="text-center color2 pre_event_link">View Previous Events>></a>
        
        </div>
        <div class="container-fluid fixed_width">
            <div class="filter-btn_slide d-md-none"><i class="fa fa-sliders" aria-hidden="true"></i> Filter</div>
            <div class="form-filters">
            <form id="filter-form">
                <div class="row d-md-none align-items-center mx-3">
                    <div class="col-4"><span class="close-filter"> x </span></div>
                    <div class="col-4"><h4 class="filter_title text-center">Filters</h4></div>
                    <div class="col-4 text-right"><a href="javascript:void(0);" id="reset-button">Clear</a></div>
                </div>
                <input type="hidden" id="post-type" name="post_type" value="event">
                <input type="hidden" id="post_date" name="post_date" value="future">
                <div class="d-flex justify-content-center mb-5 filter_list">
                    <button type="button" id="all-button" class="btn btn_border_white">All</button>
                    <div class="dropdown">
                        <button class="btn btn_border_white dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Type
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
                    <div class="dropdown">
                        <button class="btn btn_border_white dropdown-toggle" type="button" data-bs-toggle="dropdown">
                           Workstations
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
                            Technology
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                            $terms = get_terms(['taxonomy' => 'technology_cat', 'hide_empty' => false]);
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
                    
                    <div class="dropdown d-none">
                        <button class="btn btn_border_white dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Location
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                            $locations = get_posts([
                                'post_type' => 'location',
                                'posts_per_page' => -1,
                                'post_status' => 'publish',
                            ]);
                            
                            foreach ($locations as $location) {
                                echo '<li>
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="location_id[]" value="' . $location->ID . '"> ' . $location->post_title . '
                                    </label>
                                </li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
            <!--<div class="selected-filters"></div>-->
        <div id="posts-container" class="row justify-content-center  mt-5 mt-sm-0 mb-5 future-list"></div>
        <!--<div  class="row justify-content-center mt-sm-3 mt-5 mb-5">-->
            <?php /*
$meta_query = array(); // Initialize meta query
$meta_query[] = array(
    'key'     => '_event_start_date',
    'value'   => date('Y-m-d'),
    'compare' => '>=',
);

$query = array(
    'post_type'      => 'event',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'meta_key'       => '_event_start_date',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
    'offset'         => 0,
    'meta_query'     => $meta_query
);

$result_query = new WP_Query($query);

if ($result_query->have_posts()) :
    while ($result_query->have_posts()) : $result_query->the_post(); ?>
        <div class="col-md-4  p-4">
            <?php  
            $event_id = get_the_ID();
            $thumb = get_the_post_thumbnail_url();
            $location_id = get_post_meta($event_id, '_location_id', true);
            $start_date = get_post_meta($event_id, '_event_start_date', true); 
            $end_date   = get_post_meta($event_id, '_event_end_date', true); 
            $EM_Event = em_get_event($event_id, 'post_id');
            ?>

            <div class="event-top-part">
                <div class="d-flex justify-content-between w-100">
                    <p>
                        <?php 
                        $term_obj_list = get_the_terms($event_id, 'etype');
                        if (!empty($term_obj_list) && !is_wp_error($term_obj_list)) {
                            $first_term = reset($term_obj_list); 
                            echo esc_html($first_term->name); 
                        }
                        ?>
                    </p>
                    <span>
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <?php echo date("M j, Y", strtotime($start_date)); ?> -  
                        <?php echo date("M j, Y", strtotime($end_date)); ?>
                    </span>
                </div>
                <h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
                <div class="location">
                    <span>
                        <?php  
                        if ($EM_Event->has_location()) {
                           // echo "Location: " . esc_html($EM_Event->get_location()->location_name);
                           // echo "<br>Address: " . esc_html($EM_Event->get_location()->location_address);
                              echo "<i class='fa fa-map-marker' aria-hidden='true'></i> " . esc_html($EM_Event->get_location()->location_town) . " , " . esc_html($EM_Event->get_location()->location_country);
                        }
                        ?>
                    </span>
                </div>
            </div>
            <div class="event-thumb">
                <?php the_post_thumbnail(); ?>
                <div class="overlay-thumb">
                    <div class="text">
                        <a href="javascript:void(0);" class="btn btn-event event_popup" 
                        data-title="<?php the_title();?>" 
                        data-loc ="<?php echo  esc_html($EM_Event->get_location()->location_address) . " , " .esc_html($EM_Event->get_location()->location_town) . " , " . esc_html($EM_Event->get_location()->location_country);?>" 
                        data-tream = "<?php echo esc_html($first_term->name);?>"
                        data-thumb="<?php echo $thumb;?>" 
                        data-link ="<?php echo get_permalink();?>"
                        data-date="<?php echo date("M j, Y", strtotime($start_date)); ?> - <?php echo date("M j, Y", strtotime($end_date)); ?>"  
                        data-desc="<?php echo esc_attr(get_the_content());?>">Read More</a>
                        <a href="<?php echo get_permalink(); ?>" class="btn btn-event">Register</a>
                    </div>
                </div>
            </div>
        </div>    
    <?php endwhile;
    wp_reset_postdata(); // Reset the query
endif; */ 
?>


        <!--</div>-->
    </div>
</section>
<div id="eventModal" class="modal fade" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            
                
                <button type="button" class="close btn close-event" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            
            <div class="modal-body p-0">
                <div class="row p-3  top_bar_model">
                    <div class="col-sm-12 text-center">
                        <p class="tream"></p>
                        <h6 id="eventDate"></h6>
                        <h5 class="modal-title" id="eventTitle"></h5>
                    </div>
                </div>
                <div class="row p-5 p-sm-3 bg_dark">
                    <p class="eventDescription d-none mob_show"></p>
                    <div class="col-md-4 col-6">
                        <img src="" class="thumb"> 
                    </div>
                        <div class="col-md-8 col-6 ">
                            <p class="eventDescription d-none d-md-block"></p>
                            <p class="locate"><i class='fa fa-map-marker' aria-hidden='true'></i> <span id="address"></span></p>
                            <a href="" class="btn btn-link register link mb-0">Register</a>
                        </div>
                    </div>
                </div>
                
                
                
            </div>
            
        </div>
    </div>

<?php endwhile;?>
<?php get_footer(); ?>