<?php /* Template name: Home page*/
get_header();?>
<?php while(have_posts()):the_post();
	$thumb = get_the_post_thumbnail_url();?>

	<section class="banner" style="background:url('<?php echo $thumb;?>')">
	<div class="container">
		<div class="row signauture-section align-items-center justify-content-center">
			<div class="col-md-6">
			</div>
			<div class="col-md-6 sign col-sm-12 sign-height d-flex align-items-center">
				<img src="<?php echo get_site_url();?>/wp-content/uploads/2025/02/Look-Incredible.png" class="w-100 signture">
			</div>
		</div>
		<div class="row text-center p-3 counter-row">
			<div class="col-md-3 col-sm-6 col-6" >
				<div class="counter-box colored">
				 	<span class="counter">17</span>+
	                <p>Products Innovated</p>
	            </div>
			</div>
			<div class="col-md-3 col-sm-6 col-6">
				<div class="counter-box colored">
				 	<span class="counter">200</span>k+
	                <p>Happy Clients</p>
	            </div>
			</div>
			<div class="col-md-3 col-sm-6 col-6">
				<div class="counter-box colored">
				 	<span class="counter">9</span>m+
	                <p>Patients Helped</p>
	            </div>

			</div>
			<div class="col-md-3 col-sm-6 col-6">
				<div class="counter-box colored">
				 	<span class="counter">100</span>+
	                <p>Countries of Distribution</p>
	            </div>
			</div>
			
		</div>

		</div>
	</div>
</section>
<section class="sliders slider1">
	
		<?php 
		$banner1 = get_field('slider_banner1');
		
		
		$banner2 = get_field('slider_banner2');
		$banner3 = get_field('slider_banner3');
		$banner4 = get_field('slider_banner4');
		$banner5 = get_field('slider_banner5');
		
		$banner1_link = get_field('slider_banner1_link');
		$banner2_link = get_field('slider_banner2_link');
		$banner3_link = get_field('slider_banner3_link');
		$banner4_link = get_field('slider_banner4_link');
		$banner5_link = get_field('slider_banner5_link');
		
		$banner1_mob = get_field('slider_banner1_mobile');
		$banner2_mob = get_field('slider_banner2_mobile');
		$banner3_mob = get_field('slider_banner3_mobile');
		$banner4_mob = get_field('slider_banner4_mobile');
		$banner5_mob = get_field('slider_banner5_mobile');
		
		
		
	//	$slider_banner1__video=get_field('slider_banner1__video');
		


		// Count how many banners have values
		$banner_count_mob = 0;
		if ($banner1_mob != "") $banner_count_mob++;
		if ($banner2_mob != "") $banner_count_mob++;
		if ($banner3_mob != "") $banner_count_mob++;
		if ($banner4_mob != "") $banner_count_mob++;
		if ($banner5_mob != "") $banner_count_mob++;
		$banner_count = 0;
		if ($banner1 != "") $banner_count++;
		if ($banner2 != "") $banner_count++;
		if ($banner3 != "") $banner_count++;
		if ($banner4 != "") $banner_count++;
		if ($banner5 != "") $banner_count++;

		// Add class if more than 1 banner is set
		$banner_slider_class = ($banner_count > 1) ? 'multiple-banners' : '';
		$banner_slider_class_mobile = ($banner_count_mob > 1) ? 'multiple-banners1' : '';
		?>
		<div class="banner_slider d-none d-md-block <?php echo $banner_slider_class; ?>">
			<?php 
				if($banner1 != ""){ ?>
				<div class="banner_slide">
					<a href="<?php echo $banner1_link;?>"><img src="<?php echo $banner1;?>" class="w-100"></a>
				</div>
				<?php }
				if($banner2 != ""){ ?>
				<div class="banner_slide">	
					<a href="<?php echo $banner2_link;?>"><img src="<?php echo $banner2;?>" class="w-100"></a>
				</div>
				<?php }				

				if($banner3 != ""){ ?>
				<div class="banner_slide">	
					<a href="<?php echo $banner3_link;?>"><img src="<?php echo $banner3;?>" class="w-100"></a>
				</div>
				<?php }				

				if($banner4 != ""){ ?>
				<div class="banner_slide">	
					<a href="<?php echo $banner4_link;?>"><img src="<?php echo $banner4;?>" class="w-100"></a>
				</div>
				<?php }
				
				if($banner5 != ""){ ?>
				<div class="banner_slide">	
					<a href="<?php echo $banner5_link;?>"><img src="<?php echo $banner5;?>" class="w-100"></a>
				</div>
				<?php }?>
		</div>
		<div class="banner_slider d-md-none d-sm-block <?php echo $banner_slider_class_mobile; ?>">
			<?php 
				if($banner1 != ""){ ?>
				<div class="banner_slide">
					<a href="<?php echo $banner1_link;?>"><img src="<?php echo $banner1_mob;?>" class="w-100"></a>
				</div>
				<?php }
				if($banner2 != ""){ ?>
				<div class="banner_slide">	
					<a href="<?php echo $banner2_link;?>"><img src="<?php echo $banner2_mob;?>" class="w-100"></a>
				</div>
				<?php }				

				if($banner3 != ""){ ?>
				<div class="banner_slide">	
					<a href="<?php echo $banner3_link;?>"><img src="<?php echo $banner3_mob;?>" class="w-100"></a>
				</div>
				<?php }				

				if($banner4 != ""){ ?>
				<div class="banner_slide">	
					<a href="<?php echo $banner4_link;?>"><img src="<?php echo $banner4_mob;?>" class="w-100"></a>
				</div>
				<?php }
				
				if($banner5 != ""){ ?>
				<div class="banner_slide">	
					<a href="<?php echo $banner5_link;?>"><img src="<?php echo $banner5_mob;?>" class="w-100"></a>
				</div>
				<?php }?>
		</div>
	</div>
</section>
<section class="about_inmode">
	<div class="container">
		<h1 class="color2"><?php the_field('section_3_heading');?></h1>
		<?php the_field('section_3_text');?>
	</div>
</section>
<section class="our_workstation">
	<div class="conatiner-fluid">
		<h2><?php the_field('_section4_heading');?></h2>
	<?php ?>
		<div class="carousel_work">
		<?php
		      query_posts(array(
		        'post_type' => 'workstation',         
		        'showposts' => '5',          
		        'orderby' => 'date',
		        'order' => 'DESC',            
    		)); ?>
			<?php while (have_posts()) : the_post(); ?>
			<div class="slide_carousel">
				<a href="<?php echo get_permalink();?>"><?php the_post_thumbnail();?></a>
				<img src="<?php the_field('logo');?> ">
					<p><?php echo wp_trim_words( get_the_content(), 20 );?></p>
					<a href="<?php echo get_permalink();?>" class="link_discover">DISCOVER MORE</a>
			</div>
			<?php endwhile ;?>
			<?php wp_reset_query(); ?>
      </div>
</div>
	<?php ?>
	</div>
</section>
<section class="clinical_studies">
	<div class="container-fluid fixed_width">
        <hr/>
		<h2 class="p-5">CLINICAL STUDIES</h2>
		<div class="row studies">
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
				    <h4><?php $terms = get_the_terms(get_the_ID(), 'workstation_cat'); // Replace 'your_taxonomy' with the actual taxonomy slug
                        if ($terms && !is_wp_error($terms)) {
                            $first_term = reset($terms); // Get the first term
                            echo esc_html($first_term->name); // Display the term name
                        }
                        ?>
                    </h4>
				    <p class="study_date"><?php the_field('published_date'); ?></p>
				    <p class="study_publication"><?php the_field('publication'); ?></p>
					
					<?php 
					$download_link = get_field('download_link');
					if ($download_link): ?>
						<a href="javascript:void(0);" class="link_discover studies_loop open_download" data-link="<?php echo esc_url($download_link); ?>">DOWNLOAD CLINICAL STUDY</a>
					<?php else: ?>
						<a href="<?php echo get_permalink();?>" class="link_discover studies_loop">READ CLINICAL STUDY </a>
					<?php endif; ?>
				</div>
			</div>
			<?php endwhile ;?>
			<?php wp_reset_query(); ?>
		</div>
		<a href="<?php the_field('section5_button_url');?>" class="btn btn-primary btn-studies"><?php the_field('section5_button_text');?></a>
	</div>
</section>
<section class="clients says">
	<div class="conatiner-fluid">
		
		<h2 class="">WHAT OUR CLINICS SAY</h2>
		<div class="testimonial_slider">
		<?php
		      query_posts(array(
		        'post_type' => 'testimonial',         
		        'showposts' => '8',          
		        'orderby' => 'date',
		        'order' => 'DESC',            
    		)); ?>
			<?php while (have_posts()) : the_post(); ?>
			<?php $show_hexagon = get_field('show_hexagon'); ?>
			<div class="testimonial_list<?php if (!$show_hexagon) echo ' no-hexagon'; ?>">
				<?php if ($show_hexagon): ?>
				<div class="testimonial_thumb">
					<div class="frame-container">
						<img src="<?php echo get_the_post_thumbnail_url();?>" alt="Masked Image">
						<svg class="hexagon-frame" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
							<defs>
								<mask id="hex-mask">
									<rect x="0" y="0" width="300" height="300" fill="black" />
									<polygon points="150,10 280,90 280,225 150,300 10,225 10,90" fill="white" />
								</mask>
							</defs>
							<polygon points="150,10 280,90 280,225 150,300 10,225 10,90" fill="none" stroke="#59B7B3" stroke-width="10" />
						</svg>
					</div>
				</div>
				<?php endif; ?>
				<div class="testimonial_description">
					<?php the_content();?>
					<h5><?php the_title();?></h5>
					<a href="<?php the_field('button_link'); ?>" class="link_discover"><?php the_field('button_label'); ?></a>
				</div>
			</div>
			<?php endwhile ;?>
			<?php wp_reset_query(); ?>
		

	</div>
</section>

<!-- Clinical Studies Download Modal -->
<div id="StudiesModal" class="modal fade" tabindex="-1" aria-labelledby="StudiesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
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

<?php endwhile;?>
<?php get_footer();
?>
