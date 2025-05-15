<?php
/**
	* The template for displaying all single posts
	*
	* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
	*
	* @package ultra
	*/

get_header();
?>

<main id="primary" class="single-main">

	<?php
	while (have_posts()):
		the_post();

		if (has_category('zagalni-umovy-strahuvannya') || has_category(64)) {
			get_template_part('template-parts/content', 'zagalniumovy');
		} else {
			get_template_part('template-parts/content', get_post_type());
		}

	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();