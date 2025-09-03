<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package inmode
 */

get_header();
?>


<section class="main_part">
    <div class="container-fluid fixed_width">
        
        <?php if ( have_posts() ) : ?>
        <h2 class="page_title text-center color2 p-3">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'inmode' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h2>
		<div class="serach result row row_list">
		    	<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			
			echo "<div class='col-md-12'>";
				get_template_part( 'template-parts/content', 'search' );
			echo "</div>";
			endwhile;
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		</div>
       
        
    </div>


</section>

		



<?php

get_footer();
