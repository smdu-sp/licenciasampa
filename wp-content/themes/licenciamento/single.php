<?php
/**
 * The template for displaying all single posts.
 *
 * @package AprovaSP
 */

get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
