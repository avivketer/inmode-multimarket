<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package inmode
 */

?>

	
	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	<p><?php echo wp_trim_words( get_the_content(), 30, ' '); ?></p>
    <a href="<?php echo get_permalink();?>" class="color2 link-btn">Read More</a>
