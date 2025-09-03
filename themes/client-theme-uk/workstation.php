<?php /* Template Name: Workstation */ 
get_header();?>
<section class="work_stations">
    <div class="container-fluid">
        <h2 class="page-title"><?php the_title();?></h2>
        <div class="row justify-content-center align-items-md-end">
            <?php
              query_posts(array(
                'post_type' => 'workstation',          
                'showposts' => '-1',     
               
                'orderby' => 'date',
                  'order' => 'DESC',
                    
            ) );  ?>
<?php while (have_posts()) : the_post(); ?>
    <div class="col-md-4 col-6 h-100">
                <div class="row workstation-bottom my-3">
                    <div class="workstation_img col-md-5 col-sm-12">
                        <a href="<?php echo get_permalink();?>"><?php the_post_thumbnail();?></a>
                    </div>
                    <div class="workstation-content col-md-7 col-sm-12">
                        <div class="d-flex flex-column h-100 flex-height">
                            <div class="workstation_desc">
                                <img src="<?php the_field('logo');?>" class="wrokstation_logo">
                                <?php the_excerpt();?>
                                <?php the_field('treatment');?>
                            </div>
                            <div class="workstation-link mt-auto">
                                <a href="<?php echo get_permalink();?>">Discover more<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php endwhile ;?>
<?php wp_reset_query(); ?>
            
           
        </div>
    </div>
</section>
<?php get_footer();?>