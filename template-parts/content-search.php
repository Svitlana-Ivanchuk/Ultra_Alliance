<?php
/**
	* Template part for displaying results in search pages
	*
	* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	*
	* @package ultra
	*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if ('post' === get_post_type()): ?>
			<div class="entry-meta">
				<?php
				ultra_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="search-item">
		<div class="search-item-discription">
			<h3 class="search-title"><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>

			<?php if (get_field('document')) { ?>
				<a href=<?php the_field('document'); ?>	title="<?php echo 'Читати далі'; ?>" class="search-link"
					target="_blank"><?php echo 'Документ'; ?></a>

			<?php } else { ?>
				<a href="<?php the_permalink(); ?>" title="<?php echo 'Читати далі'; ?>" class="search-link"
					target="_blank"><?php echo 'Читати далі'; ?></a>
			<?php } ?>

			<?php if (get_field('doc_p7s')): ?>

				<a href=<?php the_field('doc_p7s'); ?>	title="<?php echo 'Читати далі'; ?>" class="search-link" target="_blank"><?php echo 'КЕП'; ?></a>

			<?php endif ?>

		</div>
	</div>

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?>	-->