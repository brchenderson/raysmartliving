<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ray
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php

			if( have_rows('page_content') ):

			     // loop through the rows of data
			    while ( have_rows('page_content') ) : the_row();
						get_template_part('template-parts/module', get_row_layout());

			    endwhile;

			else :

			    // no layouts found

			endif;

			while ( have_posts() ) : the_post();



			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
