<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ray
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info row">
			<div class="site-info--item social"><a href="<?php the_field('facebook', 'options'); ?>"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a><a href="<?php the_field('twitter', 'options'); ?>"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a></div>
			<address class="site-info--item address"><?php the_field('address', 'options'); ?></address>
			<div class="site-info--item phone"><?php the_field('phone_number', 'options'); ?></div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<script>
	jQuery(document).ready(function(){
		jQuery('.menu-toggle').click(function(){
			jQuery(this).toggleClass('open');
		});
	});
</script>
<?php wp_footer(); ?>

</body>
</html>
