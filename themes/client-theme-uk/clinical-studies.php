<?php
/** Template Name: Clinical-Studies Page Template */
get_header(); ?>

<section class="main_part">
  <div class="container">
    <?php while(have_posts()): the_post(); ?>
      <h2 class="page_title text-center color2 p-3"><?php the_title(); ?></h2>
      <div class="page-desc">
      <?php the_content(); ?>
      </div>
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
                <input type="hidden" id="post-type" name="post_type" value="clinical-studies">
                <div class="d-flex justify-content-center my-5 my-sm-3 filter_list">
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
                            Select Technology
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                            $terms = get_terms(['taxonomy' => 'technology_cat', 'hide_empty' => false]);
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
        
        <div id="posts-container" class="Clinical-Studies-list row"></div>


   
    <?php endwhile; ?>
 </div>
  
</section>
<div id="StudiesModal" class="modal fade" tabindex="-1" aria-labelledby="StudiesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="background: #fff !important; color: #000 !important;">
            
                
                <button type="button" class="close btn close-event" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            
            <div class="modal-body p-0">
                <div class="row p-3 top_bar_model">
                    <div class="col-sm-12 text-center">
                        <h4>Complete the form below to download Clinical Paper</h4>
                    </div>
                </div>
                <div class="row p-5 p-sm-3 bg_dark">
                    <div class="col-md-12">
                        <input type="hidden" name="download_link" value="" />
                        <?php echo do_shortcode('[contact-form-7 id="ab5fd42" title="Download Clinical Paper"]');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
