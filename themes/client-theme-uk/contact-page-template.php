<?php
/** Template Name: Contact Page Template */
get_header(); ?>
<?php while(have_posts()): the_post(); ?>
<section class="main_part pb-0 mb-0">
    
    <div class="container-fluid">
      <h2 class="page_title text-center color2 p-3"><?php the_title(); ?></h2>
    </div>
<div class="bg-white contact_bg">
    <div class="container-fluid fixed_width">
        <div class="tab-container">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">I’m a Physician</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">I’m a Patient</button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <?php echo do_shortcode('[contact-form-7 id="8e00a2a" title="Contact form 1"]');?>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <?php echo do_shortcode('[contact-form-7 id="6f675d7" title="Contact form 2"]');?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php endwhile;?>
<?php get_footer(); ?>
