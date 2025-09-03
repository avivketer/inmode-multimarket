<?php
/**Template Name: Treatment Page Template*/
get_header(); ?>
<section class="main_part">
<div class="container">
    <h2 class="page_title text-center color2 p-3"><?php the_title();?></h2>
<?php
    // Define a custom WP_Query to fetch posts from the 'treatment' post type
    $args = array(
        'post_type'      => 'treatments',  // Custom post type
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC', // Get all posts (remove the limit)
    );

    $treatment_query = new WP_Query( $args );
    echo "<div class='row'>";
    // Check if there are any posts to display
    if ( $treatment_query->have_posts() ) :
        // Loop through the posts
        $post_count = 0;  // Initialize post counter
        while ( $treatment_query->have_posts() ) : $treatment_query->the_post();
            $post_count++;  // Increment post counter
            
            // Add class for every second set of 3 posts (4-6, 10-12, etc.)
            $extra_class = '';
            if (($post_count - 1) % 6 >= 3) {  // This will add the class on the 4th-6th, 10th-12th, etc.
                $extra_class = 'text-right';  // Modify this class as needed
            }
            ?>
            <div class="team-list col-md-4 col-6 <?php echo $extra_class; ?> treatment_list">
                <div class="treament-thumb">
                    <a href="<?php echo get_permalink();?>">
                        <?php the_post_thumbnail();?>
                        <div class="overlay"></div>
                        <h3 class="treatment_heading"><?php the_title();?></h3>
                    </a>
                </div>
            </div>
                
        <?php endwhile;
        echo "</div>";

        wp_reset_postdata();

    else :
        echo '<p>No treatments found.</p>';
    endif;
?>


</div>
</section>
<section class="logo_list ">
    <div class="container">
        <div class="row align-items-center text-center p-3">
        <div class="col-md-3 col-3"><img src="<?php the_field('logo1');?>"></div>
        <div class="col-md-3 col-3"><img src="<?php the_field('logo2');?>"></div>
        <div class="col-md-3 col-3"><img src="<?php the_field('logo3');?>"></div>
        <div class="col-md-3 col-3"><img src="<?php the_field('logo4');?>"></div>
        </div>
    </div>
</section>
<section class="results-section">
    <div class="container-fluid fixed-width">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-center color2">RESULTS</h2>
                <p class="subheadings text-center color2">Here are just a few results</p>
                </div>
        </div>
                <div class="result-slide1 row justify-content-center">
                    <?php  $args = array(
        'post_type'      => 'result',  // Custom post type
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'ASC',// Get all posts (remove the limit)
    );
     $result_query = new WP_Query( $args );
     if ( $result_query->have_posts() ) :
        // Loop through the posts
        while ( $result_query->have_posts() ) : $result_query->the_post();
            ?>
                    <div class="result_list1 col-md-4 col-6 ">
                        <div class="main_div">
                                        <div class="ba-Slider"  unselectable='on' onselectstart='return false;' onmousedown='return false;'>    
                                            <div id="before"><img src="<?php the_field('before');?>" /></div>
                                            <div class="slider2"></div>
                                            <div id="after"><img src="<?php the_field('after');?>" /></div>
                                        </div>
                                    </div>   
                        
                        <a href="<?php echo get_permalink();?>"> <img src="<?php the_field('logo');?>" class="title_logo mt-4 mb-2"></a>
                        <a href="<?php echo get_permalink();?>" class="link color2">DISCOVER MORE</a>
                    </div>
        <?php endwhile;
         wp_reset_postdata();

    else :
        echo '<p>No results found.</p>';
    endif;?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
