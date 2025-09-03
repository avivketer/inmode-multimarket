<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package inmode
 */

?>

<?php the_title( '<h1 class="entry-title text-center color2 mb-5">', '</h1>' ); ?>
	

	<?php inmode_post_thumbnail(); ?>

	<div class="entry-content1 px-5">
		<?php the_content();	?>
	</div>

