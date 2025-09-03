<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package inmode
 */

get_header();
?>
<section class="main_part">
    <?php while ( have_posts() ) : the_post(); ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
        <div class="container">
            <?php $post_type = get_post_type();
            if($post_type=="post"){
                $post_type ="Blog";
            } 
            ?>
            <h2 class="text-center color2 single_post_title"><?php echo $post_type;?></h2>
             <?php 
             $post_type = get_post_type();
             if($post_type=="post"){ ?>
             <p class="date text-right"><?php the_time('F d,Y');?></p>
             <h2 class="color2 heading_post mb-5 text-center"><?php the_title(); ?></h2>
                
               <div class="blog_content"><?php echo wpautop(get_the_content());?></div>
            <?php } else { ?>
            
            
            
            
            <div class="row justify-content-center align-items-top single_details ">
                <div class="col-12 mob_show text-center">
                <h2 class="color2 heading_post mb-5 text-center"><?php the_title(); ?></h2>
                <p class="date text-right"><?php the_time('F d,Y');?></p>
                </div>
                <div class="col-md-4 col-4 text-center pe-md-5  pe-2"><?php the_post_thumbnail(); ?></div>
                <div class="col-md-8 col-8 post_header ps-md-5  ps-2">
                    <?php the_content();?>
                </div>
            </div>
            <?php }?>
            <div class="row py-5 text-center d-none d-md-flex">
                <div class="col-md-4">
                    <?php $prev_post = get_previous_post();
                    if (!empty($prev_post)) {
                        echo '<a class="d-block color2 link_btn link_box p-2" href="' . get_permalink($prev_post->ID) . '"><< Previous Article</a>';
                    }?>
                </div>
                <div class="col-md-4">
                    <a class="d-block color2 link_btn link_box p-2" href="/blog">Back to all Articles >></a>
                </div>
                <div class="col-md-4">
                    <?php $next_post = get_next_post();
                    if (!empty($next_post)) {
                        echo '<a class="d-block color2 link_btn link_box p-2" href="' . get_permalink($next_post->ID) . '">Next Article >></a>';
                    }?>
                </div>
        </div>
       

        <?php endwhile; ?>
    
</section>
<?php get_footer();
