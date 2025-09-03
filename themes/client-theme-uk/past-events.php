<?php /* Template Name: Past Events */ 
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<section class="events upcoming-events">
    <div class="container">
        <h2 class="page-title"><?php the_title(); ?></h2>
        
        <p><?php the_content(); ?></p>
        <a href="/inmode-upcoming-events/" class="text-center color2 pre_event_link">View Upcoming Events>></a>
        
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
                <input type="hidden" id="post_date" name="post_date" value="past">
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
                            Select Technology
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
        <div  id="posts-container" class="row justify-content-center mt-5 mt-sm-0 mb-5 past-list"></div>
        
    </div>
</section>
<?php endwhile;?>
<?php get_footer(); ?>