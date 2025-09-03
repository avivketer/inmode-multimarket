<?php
/** Template Name: About Page Template */
get_header(); ?>

<section class="main_part">
  <div class="container">
    <?php while(have_posts()): the_post(); ?>
      <h2 class="page_title text-center color2 p-3"><?php the_title(); ?></h2>
    </div>  
</div>
<section class="body_content_about">
    <div class="container-fluid fixed_width">
        <div class="row">
            <div class="col-12 text-center">
                <?php if(get_field('sub_heading')):?>
                <h2 class="color2 heading_inner"><?php the_field('sub_heading');?></h2>
                <?php endif;?>
                <div class="page-desc">
                    <?php the_content(); ?>
                </div>
            </div>
            <hr class="single_border">
        </div>
        <div class="row">
            <div class="col-md-4 col-12 modal_video">
                <a href="javascript:void(0);" class="open-popup2" data-bs-toggle="modal" data-bs-target="#videoModal">
                    <img src="<?php the_field('video_thumb');?>" class="model-video w-100">
                </a>
            </div>
            <div class="col-md-4 col-12 vision_mission">
                 <?php if(get_field('heading_our_mission')):?>
                <h3 class="color2 heading_sub_inner"><?php the_field('heading_our_mission');?></h3>
                <?php endif;?>
                 <?php if(get_field('our_mission_content')):?>
                <?php the_field('our_mission_content');?>
                <?php endif;?>
                  <?php if(get_field('our_vision_heading')):?>
                <h3 class="color2 heading_sub_inner"><?php the_field('our_vision_heading');?></h3>
                <?php endif;?>
                 <?php if(get_field('our_vision_content')):?>
                <?php the_field('our_vision_content');?>
                <?php endif;?>
            </div>
            <div class="col-md-4 col-12 fundamentals">
                 <?php if(get_field('fundamantel_value_heading')):?>
                <h3 class="color2 heading_inner"><?php the_field('fundamantel_value_heading');?></h3>
                <?php endif;?>
                 <?php if(get_field('fundamental_value_content')):?>
                <?php the_field('fundamental_value_content');?>
                <?php endif;?>
            </div>
        </div>
    </div>
<div class="container-fluid fixed_width team_group">
        <?php if(get_field('team_heading')):?>
            <h2 class="color2 heading_inner text-center"><?php the_field('team_heading');?></h2>
        <?php endif;?>
      <?php $args = array(
                'post_type'      => 'team',  // Custom post type
                'posts_per_page' => -1,  
                'orderby'        => 'date',
                'order'          => 'ASC',
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'team-group',  // Ensure this is the correct taxonomy name
                        'field'    => 'slug',        // Use 'slug' instead of 'name'
                        'terms'    => array('management-team'), // Wrap in an array
                    ),
                ),
            );

$Clinical_query = new WP_Query($args);
echo "<div class='team-list row'>";

if ($Clinical_query->have_posts()) :
    while ($Clinical_query->have_posts()) : $Clinical_query->the_post();
        $post_id = get_the_ID();
        $image_url = get_the_post_thumbnail_url(); // Assuming ACF image field
        $title = get_the_title();
        $content = get_the_content();
        $designation = get_field('designation');
?>
        <div class="col-md-4 col-12 text-center pt-0 pb-5 pb-sm-3 px-5">
            <div class="d-flex inner_half align-items-end team_list_div">
                <div class="img-thumb">
                    <a href="javascript:void(0);" class="open-popup" 
                    data-title="<?php echo esc_attr($title); ?>" 
                    data-image="<?php echo esc_url($image_url); ?>"  
                    data-desgination ="<?php echo $designation;?>"
                    data-content="<?php echo esc_attr(strip_tags($content)); ?>">
                        <img src="<?php the_field('image_thumb'); ?>" class="team-img">
                    </a>
                </div>
                <div class="team_description p-2">
                    <h4 class="color2"><?php echo esc_html($title); ?></h4>
                    <?php if (get_field('designation')) : ?>
                        <p class="color2"><?php the_field('designation'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="team-excerpt-area">
                <?php if (trim(strip_tags($content)) !== ''): ?>
                    <span class="team-excerpt"><?php echo wp_trim_words( get_the_content(), 15, '...' );?></span>
                <?php else: ?>
                    <span class="team-excerpt team-excerpt-placeholder"></span>
                <?php endif; ?>
                <span class="readmore-placeholder">
                    <?php if (trim(strip_tags($content)) !== ''): ?>
                        <a href="javascript:void(0);" class="open-popup color2" 
                            data-title="<?php echo esc_attr($title); ?>" 
                            data-image="<?php echo esc_url($image_url); ?>"  
                            data-desgination ="<?php echo $designation;?>"
                            data-content="<?php echo esc_attr(strip_tags($content)); ?>">Read More >></a>
                    <?php endif; ?>
                </span>
            </div>
        </div>
<?php
    endwhile;
   
    wp_reset_postdata();
endif;
?>
</div>
<div class="container-fluid fixed_width team_group pt-0">
        <?php if(get_field('team_heading')):?>
            <h2 class="color2 heading_inner text-center"><?php the_field('team_heading2');?></h2>
        <?php endif;?>
      <?php $args = array(
                'post_type'      => 'team',  // Custom post type
                'posts_per_page' => -1,  
                'orderby'        => 'date',
                'order'          => 'ASC',
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'team-group',  // Ensure this is the correct taxonomy name
                        'field'    => 'slug',        // Use 'slug' instead of 'name'
                        'terms'    => array('marketing-team	'), // Wrap in an array
                    ),
                ),
            );

$Clinical_query = new WP_Query($args);
echo "<div class='team-list row'>";

if ($Clinical_query->have_posts()) :
    while ($Clinical_query->have_posts()) : $Clinical_query->the_post();
        $post_id = get_the_ID();
        $image_url = get_the_post_thumbnail_url(); // Assuming ACF image field
        $title = get_the_title();
        $content = get_the_content();
        $designation = get_field('designation');
?>
        <div class="col-md-4 col-12 text-center pt-0 pb-5 pb-sm-3 px-5">
            <div class="d-flex inner_half align-items-end team_list_div">
                <div class="img-thumb">
                    <a href="javascript:void(0);" class="open-popup" 
                    data-title="<?php echo esc_attr($title); ?>" 
                    data-image="<?php echo esc_url($image_url); ?>"  
                    data-desgination ="<?php echo $designation;?>"
                    data-content="<?php echo esc_attr(strip_tags($content)); ?>">
                        <img src="<?php the_field('image_thumb'); ?>" class="team-img">
                    </a>
                </div>
                <div class="team_description p-2">
                    <h4 class="color2"><?php echo esc_html($title); ?></h4>
                    <?php if (get_field('designation')) : ?>
                        <p class="color2"><?php the_field('designation'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="team-excerpt-area">
                <?php if (trim(strip_tags($content)) !== ''): ?>
                    <span class="team-excerpt"><?php echo wp_trim_words( get_the_content(), 15, '...' );?></span>
                <?php else: ?>
                    <span class="team-excerpt team-excerpt-placeholder"></span>
                <?php endif; ?>
                <span class="readmore-placeholder">
                    <?php if (trim(strip_tags($content)) !== ''): ?>
                        <a href="javascript:void(0);" class="open-popup color2" 
                            data-title="<?php echo esc_attr($title); ?>" 
                            data-image="<?php echo esc_url($image_url); ?>"  
                            data-desgination ="<?php echo $designation;?>"
                            data-content="<?php echo esc_attr(strip_tags($content)); ?>">Read More >></a>
                    <?php endif; ?>
                </span>
            </div>
        </div>
<?php
    endwhile;
    
    wp_reset_postdata();
endif;
?>
</div>
<div class="container-fluid fixed_width team_group pt-0">
        <?php if(get_field('team_heading')):?>
            <h2 class="color2 heading_inner text-center"><?php the_field('team_heading3');?></h2>
        <?php endif;?>
      <?php $args = array(
                'post_type'      => 'team',  // Custom post type
                'posts_per_page' => -1,  
                'orderby'        => 'date',
                'order'          => 'ASC',
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'team-group',  // Ensure this is the correct taxonomy name
                        'field'    => 'slug',        // Use 'slug' instead of 'name'
                        'terms'    => array('business-development-managers	'), // Wrap in an array
                    ),
                ),
            );

$Clinical_query = new WP_Query($args);
echo "<div class='team-list row'>";

if ($Clinical_query->have_posts()) :
    while ($Clinical_query->have_posts()) : $Clinical_query->the_post();
        $post_id = get_the_ID();
        $image_url = get_the_post_thumbnail_url(); // Assuming ACF image field
        $title = get_the_title();
        $content = get_the_content();
        $designation = get_field('designation');
?>
        <div class="col-md-4 col-12 text-center pt-0 pb-5 pb-sm-3 px-5">
            <div class="d-flex inner_half align-items-end team_list_div">
                <div class="img-thumb">
                    <a href="javascript:void(0);" class="open-popup" 
                    data-title="<?php echo esc_attr($title); ?>" 
                    data-image="<?php echo esc_url($image_url); ?>"  
                    data-desgination ="<?php echo $designation;?>"
                    data-content="<?php echo esc_attr(strip_tags($content)); ?>">
                        <img src="<?php the_field('image_thumb'); ?>" class="team-img">
                    </a>
                </div>
                <div class="team_description p-2">
                    <h4 class="color2"><?php echo esc_html($title); ?></h4>
                    <?php if (get_field('designation')) : ?>
                        <p class="color2"><?php the_field('designation'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="team-excerpt-area">
                <?php if (trim(strip_tags($content)) !== ''): ?>
                    <span class="team-excerpt"><?php echo wp_trim_words( get_the_content(), 15, '...' );?></span>
                <?php else: ?>
                    <span class="team-excerpt team-excerpt-placeholder"></span>
                <?php endif; ?>
                <span class="readmore-placeholder">
                    <?php if (trim(strip_tags($content)) !== ''): ?>
                        <a href="javascript:void(0);" class="open-popup color2" 
                            data-title="<?php echo esc_attr($title); ?>" 
                            data-image="<?php echo esc_url($image_url); ?>"  
                            data-desgination ="<?php echo $designation;?>"
                            data-content="<?php echo esc_attr(strip_tags($content)); ?>">Read More >></a>
                    <?php endif; ?>
                </span>
            </div>
        </div>
<?php
    endwhile;
    
    wp_reset_postdata();
endif;
?>
</div>
<div class="container-fluid fixed_width team_group pt-0">
        <?php if(get_field('team_heading')):?>
            <h2 class="color2 heading_inner text-center"><?php the_field('team_heading4');?></h2>
        <?php endif;?>
      <?php $args = array(
                'post_type'      => 'team',  // Custom post type
                'posts_per_page' => -1,  
                'orderby'        => 'date',
                'order'          => 'ASC',
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'team-group',  // Ensure this is the correct taxonomy name
                        'field'    => 'slug',        // Use 'slug' instead of 'name'
                        'terms'    => array('clinical-team'), // Wrap in an array
                    ),
                ),
            );

$Clinical_query = new WP_Query($args);
echo "<div class='team-list row'>";

if ($Clinical_query->have_posts()) :
    while ($Clinical_query->have_posts()) : $Clinical_query->the_post();
        $post_id = get_the_ID();
        $image_url = get_the_post_thumbnail_url(); // Assuming ACF image field
        $title = get_the_title();
        $content = get_the_content();
        $designation = get_field('designation');
        $email = get_field('email');
?>
        <div class="col-md-4 col-12 text-center pt-0 pb-5 pb-sm-3 px-5">
            <div class="d-flex inner_half align-items-end team_list_div">
                <div class="img-thumb">
                    <a href="javascript:void(0);" class="open-popup" 
                    data-title="<?php echo esc_attr($title); ?>" 
                    data-image="<?php echo esc_url($image_url); ?>"  
                    data-desgination ="<?php echo $designation;?>"
                    data-content="<?php echo esc_attr(strip_tags($content)); ?>" data-email="<?php echo $email;?>">
                        <img src="<?php the_field('image_thumb'); ?>" class="team-img">
                    </a>
                </div>
                <div class="team_description p-2">
                    <h4 class="color2"><?php echo esc_html($title); ?></h4>
                    <?php if (get_field('designation')) : ?>
                        <p class="color2"><?php the_field('designation'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="team-excerpt-area">
                <?php if (trim(strip_tags($content)) !== ''): ?>
                    <span class="team-excerpt"><?php echo wp_trim_words( get_the_content(), 15, '...' );?></span>
                <?php else: ?>
                    <span class="team-excerpt team-excerpt-placeholder"></span>
                <?php endif; ?>
                <span class="readmore-placeholder">
                    <?php if (trim(strip_tags($content)) !== ''): ?>
                        <a href="javascript:void(0);" class="open-popup color2" 
                            data-title="<?php echo esc_attr($title); ?>" 
                            data-image="<?php echo esc_url($image_url); ?>"  
                            data-desgination ="<?php echo $designation;?>"
                            data-content="<?php echo esc_attr(strip_tags($content)); ?>">Read More >></a>
                    <?php endif; ?>
                </span>
            </div>
        </div>
<?php
    endwhile;
    
    wp_reset_postdata();
endif;
?>
</div>
<div class="container-fluid fixed_width team_group pt-0">
        <?php if(get_field('team_heading')):?>
            <h2 class="color2 heading_inner text-center"><?php the_field('team_heading5');?></h2>
        <?php endif;?>
      <?php $args = array(
                'post_type'      => 'team',  // Custom post type
                'posts_per_page' => -1,  
                'orderby'        => 'date',
                'order'          => 'ASC',
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'team-group',  // Ensure this is the correct taxonomy name
                        'field'    => 'slug',        // Use 'slug' instead of 'name'
                        'terms'    => array('warehouse-team'), // Wrap in an array
                    ),
                ),
            );

$Clinical_query = new WP_Query($args);
echo "<div class='team-list row'>";

if ($Clinical_query->have_posts()) :
    while ($Clinical_query->have_posts()) : $Clinical_query->the_post();
        $post_id = get_the_ID();
        $image_url = get_the_post_thumbnail_url(); // Assuming ACF image field
        $title = get_the_title();
        $content = get_the_content();
        $designation = get_field('designation');
?>
        <div class="col-md-4 col-12 text-center pt-0 pb-5 pb-sm-3 px-5">
            <div class="d-flex inner_half align-items-end team_list_div">
                <div class="img-thumb">
                    <a href="javascript:void(0);" class="open-popup" 
                    data-title="<?php echo esc_attr($title); ?>" 
                    data-image="<?php echo esc_url($image_url); ?>"  
                    data-desgination ="<?php echo $designation;?>"
                    data-content="<?php echo esc_attr(strip_tags($content)); ?>">
                        <img src="<?php the_field('image_thumb'); ?>" class="team-img">
                    </a>
                </div>
                <div class="team_description p-2">
                    <h4 class="color2"><?php echo esc_html($title); ?></h4>
                    <?php if (get_field('designation')) : ?>
                        <p class="color2"><?php the_field('designation'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="team-excerpt-area">
                <?php if (trim(strip_tags($content)) !== ''): ?>
                    <span class="team-excerpt"><?php echo wp_trim_words( get_the_content(), 15, '...' );?></span>
                <?php else: ?>
                    <span class="team-excerpt team-excerpt-placeholder"></span>
                <?php endif; ?>
                <span class="readmore-placeholder">
                    <?php if (trim(strip_tags($content)) !== ''): ?>
                        <a href="javascript:void(0);" class="open-popup color2" 
                            data-title="<?php echo esc_attr($title); ?>" 
                            data-image="<?php echo esc_url($image_url); ?>"  
                            data-desgination ="<?php echo $designation;?>"
                            data-content="<?php echo esc_attr(strip_tags($content)); ?>">Read More >></a>
                    <?php endif; ?>
                </span>
            </div>
        </div>
<?php
    endwhile;
    
    wp_reset_postdata();
endif;
?>
</div>
<!-- Modal (Hidden Initially) -->
        <div id="teamModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    
                    <div class="modal-body text-center ">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="d-flex align-items-end">
                            <div class="team_pop_thumb">
                                <img src="" id="modalImage" class="img-fluid mb-3">
                            </div>
                            <div class="team_pop_content">
                                <h5 class="modal-title color2"></h5>
                                <h5 class="modal-desig color2"></h5>
                               
                            </div>
                        </div>
                            <div class="team_pop_content1">
                                <p id="modalContent"></p> 
                            </div>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <div id="videoModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content p-3 color_bg">
                    <div class="modal-body text-center ">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <?php the_field('video');?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
  </div>
</section>


<?php get_footer(); ?>
