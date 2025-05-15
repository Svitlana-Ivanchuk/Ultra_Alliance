<?php
/**
	* Template part for displaying a message that posts cannot be found
	*
	* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	*
	* @package ultra
	*/

?>

<section class="no-results not-found">
	<header class="page-header">
		<h2 class="page-title"><?php esc_html_e('Нічого не знайдено', 'ultra'); ?></h2>
	</header><!-- .page-header -->

	<div class="page-content">
		<p><?php _e('Вибачте, але нічого не знайдено за Вашим запитом. Спробуйте інші ключові слова.', 'ultra'); ?></p>
		<div class="">
			<?php get_search_form(); ?>
		</div>

	</div><!-- .page-content -->
</section><!-- .no-results -->