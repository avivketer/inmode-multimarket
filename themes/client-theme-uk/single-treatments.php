<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package inmode
 */
 get_header(); ?>

<section class="main_part">
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12 post_header">
                    <h2 class="color2 heading_post"><?php the_title(); ?></h3>
                    <h3><?php the_field('sub_heading'); ?></h3>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row p-md-5 p-2 justify-content-center align-items-center">
                <div class="col-md-4 col-6 text-center"><?php the_post_thumbnail(); ?></div>
                <div class="col-md-8 col-6 single-post_desc"><?php the_content(); ?></div>
            </div>
        </div>
        <div class="result-slide1 row p-5 p-sm-3">
                <?php $current_post_title = get_the_title();
                    $args = array(
                        'post_type'      => 'result',  
                        'posts_per_page' => 6,
                        'orderby'        => 'date',
                        'order'          => 'ASC', 
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'treatments_cat', // Taxonomy name
                                'field'    => 'name',           // Use term name for filtering
                                'terms'    => $current_post_title, // Current post title as the term name
                            ),
                        ),
                        
                        
                        
                        
                    );
                    $result_query = new WP_Query( $args );

                    if ( $result_query->have_posts() ) :
                        while ( $result_query->have_posts() ) : $result_query->the_post(); ?>
                            <div class="result_list1 col-md-4 mb-5 col-6 p-sm-3">
                                <div class="d-flex flex-column h-100">
                                    <div class="after-before-content">
                                        <a href="<?php the_permalink(); ?>"> 
                                            <img src="<?php the_field('logo'); ?>" class="title_logo">
                                        </a>
                                        <p><?php echo wp_trim_words( get_the_content(), 10, ' ' );?></p>
                                    </div>
                                    <div class="main_div">
                                        <div class="ba-Slider"  unselectable='on' onselectstart='return false;' onmousedown='return false;'>    
                                            <div id="before"><img src="<?php the_field('before');?>" /></div>
                                            <div class="slider2"></div>
                                            <div id="after"><img src="<?php the_field('after');?>" /></div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                            
                        <?php endwhile;
                        wp_reset_postdata();
                        echo '<a href="/treatment/" class="btn btn-treatment_back color2">Back to all Treatments >></a>';
                    else :
                        echo '<p>No results found.</p>';
                    endif;
                ?>
            </div>
            

        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
