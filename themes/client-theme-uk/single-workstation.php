<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package inmode
 */
 get_header(); ?>
 <?php while ( have_posts() ) : the_post(); ?>
<section class="main_part">
    <div class="container-fluid">
       
            <div class="row text-center  justify-content-center align-items-center px-md-5 px-sm-2">
                <div class="col-md-12 col-6 d-md-none d-sm-block"><?php the_post_thumbnail(); ?></div>
                <div class="col-md-12 col-6 post_header">
                    <img src="<?php the_field('logo');?>" class="mx-auto"></h3>
                    <?php if(get_field('subheading')):?>
                        <h3><?php the_field('subheading'); ?></h3>
                    <?php endif;?>
                    <ul class="workstation_nav d-md-flex d-none justify-content-center">
                        <li><a href="#work_what">WHAT IS IT?</a></li>
                        <li><a href="#work_banifit">KEY BENEFITS</a></li>
                        <li><a href="#work_tech">TECHNOLOGIES ON WORKSTATION</a></li>
                        <li><a href="#work_event">EVENTS</a></li>
                        <li><a href="#work_news">NEWS</a></li>
                        <li><a href="#work_studies">CLINICAL STUDIES</a></li>
                    </ul>
                </div>
            </div>
            <nav class="navbar navbar-top p2i d-md-none d-sm-block">
              <div class="container-fluid">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <?php the_title();?> >
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav p2i_list">
                    <li><a href="#work_what">WHAT IS IT?</a></li>
                    <li><a href="#work_banifit">KEY BENEFITS</a></li>
                    <li><a href="#work_tech">TECHNOLOGIES ON WORKSTATION</a></li>
                    <li><a href="#work_event">EVENTS</a></li>
                    <li><a href="#work_news">NEWS</a></li>
                    <li><a href="#work_studies">CLINICAL STUDIES</a></li>
                  </ul>
                </div>
              </div>
            </nav>
            <div class="row content_work align-items-end px-md-5 px-sm-2">
                <div class="col-md-4 d-md-block d-none bg_work" style="background:url('<?php echo get_the_post_thumbnail_url(); ?>')  top center/cover;"><?php the_post_thumbnail();?></div>
                <div class="col-md-8 post_desc">
                        <div class="w_desc" id="work_what">
                        <?php if(get_field('what_it_is__heading')):?>
                            <h2 class="inner_heading color2"><?php the_field('what_it_is__heading'); ?></h2>
                        <?php endif;?>
                         <?php if(get_field('what_is_it')):?>
                            <?php the_field('what_is_it'); ?>
                        <?php endif;?>
                    </div>
                    <div class="w_desc" id="work_banifit">
                        <?php if(get_field('key_benfit_heading')):?>
                            <h2 class="inner_heading color2"><?php the_field('key_benfit_heading'); ?></h2> 
                        <?php endif;?>
                        <?php if(get_field('key_benifit')):?>
                            <?php the_field('key_benifit'); ?>
                        <?php endif;?>
                    </div>
                </div>
                <hr class="border-single-work mt-0">
            </div>

       
    </div>
</section>
<section class="work_technologies" id="work_tech">
    <div class="container-fluid">
        <h2 class="inner_heading color2 mb-3">TECHNOLOGIES ON THE WORKSTATION</h2>
             <div class="row tech_list px-5 justify-content-center">
                
                <?php 
                    $current_post_title = get_the_title();
                    $args = array(
                        'post_type'      => 'technologie',  
                        'posts_per_page' => 9,
                        'orderby'        => 'date',
                        'order'          => 'ASC', 
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'workstation_cat', // Taxonomy name
                                'field'    => 'name',           // Use term name for filtering
                                'terms'    => $current_post_title, // Current post title as the term name
                            ),
                        ),
                    );
                    
                    $result_query = new WP_Query( $args );

                    if ( $result_query->have_posts() ) :
                        while ( $result_query->have_posts() ) : $result_query->the_post(); ?>
                            <div class="work_tech_list col-md-4 col-6">
                                <div class="d-flex flex-column h-100">
                                <div class="desc">
                                
                                <?php the_post_thumbnail();?>
                                <img src="<?php the_field('logo'); ?>" class="work_title_logo d-block mx-auto">
                                <?php the_content();?>
                                </div>
                                <div class="main_div mt-auto">
                                    <div class="ba-Slider"  unselectable='on' onselectstart='return false;' onmousedown='return false;'>    
                                        <div id="before"><img src="<?php the_field('before');?>" /></div>
                                        <div class="slider2"></div>
                                        <div id="after"><img src="<?php the_field('after');?>" /></div>
                                    </div>
                                    <!--<span>Before & After</span>-->
                                </div>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                            </div>
                            </div>
                        <?php endwhile;
                            wp_reset_postdata();
                    else :
                        echo '<p>No results found.</p>';
                    endif;
                ?>
            </div>
            
            <hr class="border-single-work">
    </div>
</section>

<section class="work_event" id="work_event">
    <div class="container-fluid">
        <h2 class="inner_heading color2"><?php the_title();?> Events</h2>
             <div class="row tech_list px-5 event_list_slider">
                <?php
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
        'meta_query'     => $meta_query,
        'tax_query'      => array(
            array(
                'taxonomy' => 'workstation_cat', // Taxonomy name
                'field'    => 'name',           // Use term name for filtering
                'terms'    => $current_post_title, // Current post title as the term name
                ),
        ),
    );

$result_query = new WP_Query($query);

if ($result_query->have_posts()) :
    while ($result_query->have_posts()) : $result_query->the_post(); ?>
        <div class="col-md-4 col-6 p-3 m-4">
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
endif; 
?>


        </div>

                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                
            <hr class="border-single-work">
    </div>
</section>
<section class="work_news" id="work_news">
    <div class="container-fluid">
        <h2 class="inner_heading color2"><?php the_title();?> News</h2>
        <div class="row tech_list work_tech px-5">
             <?php 
                    
                    $args1 = array(
                        'post_type'      => 'news',  
                        'posts_per_page' => -1,
                        'orderby'        => 'date',
                        'order'          => 'ASC', 
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'workstation_cat', // Taxonomy name
                                'field'    => 'name',           // Use term name for filtering
                                'terms'    => $current_post_title, // Current post title as the term name
                            ),
                        ),
                    );
                    $result_query1 = new WP_Query( $args1 );
                    if ( $result_query1->have_posts() ) :
                        while ( $result_query1->have_posts() ) : $result_query1->the_post(); ?>
                            <div class="team-list blog-list col-md-4 col-sm-6">
                                <div class="news-desc">
                                        <h4><?php echo $current_post_title;?></h4>
                                        <p><?php the_title();?></p>
                                    </div>
                                    <div class="news-thumb">
                                        <a href="<?php echo get_permalink();?>">
                                            <?php the_post_thumbnail();?>
                                        </a>
                                    </div>
                                    <a href="<?php echo get_permalink();?>" class="color2 link-btn">View</a>
                                </div>
                        <?php endwhile;
                            wp_reset_postdata();
                    else :
                        echo '<p>No results found.</p>';
                    endif;
                ?>
        </div>
        <hr class="border-single-work">
    </div>
</section>
<section class="clinical_studies" id="work_studies" >
	<div class="container-fluid">
        
		<h2><?php the_title();?> CLINICAL STUDIES</h2>
		<div class="row studies px-5">
		<?php
		      query_posts(array(
		        'post_type' => 'clinical-studies',         
		        'showposts' => '-1',          
		        'orderby' => 'date',
		        'order' => 'DESC',            
    		)); ?>
			<?php while (have_posts()) : the_post(); ?>
			<div class="studies_list col-sm-4">
				<div class="studies_thumb">
					<a href="<?php echo get_permalink();?>"><?php the_post_thumbnail();?></a>
				</div>
				<div class="studies_description text-center">
				    <h4><?php echo $current_post_title;?></h4>
				    <p class="study_date"><?php the_field('published_date'); ?></p>
				    <p class="study_publication"><?php the_field('publication'); ?></p>
					
					<a href="<?php echo get_permalink();?>" class="link_discover studies_loop">READ CLINICAL STUDY </a>
				</div>
			</div>
			<?php endwhile ;?>
			<?php wp_reset_query(); ?>
		</div>
		<hr class="border-single-work">
		<a href="/workstations/" class="btn btn-primary btn-studies color2">Back to all Workstations >></a>
	</div>
</section>
 <?php endwhile;?> 
<?php get_footer(); ?>
