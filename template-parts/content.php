<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ultra
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

 <div class="container">
    <header class="content-header">
        <?php the_title( '<h2 class="content-title">', '</h2>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->
	 
        <?php if (get_field('document')) { ?>
            <a href=<?php the_field('document'); ?> title="<?php echo 'Читати далі'; ?>" class="search-link" target="_blank"><?php echo 'Документ'; ?></a>

        <?php } else { ?>
            <a href="<?php the_permalink(); ?>" title="<?php echo 'Читати далі'; ?>" class="search-link" target="_blank"><?php echo 'Читати далі'; ?></a>
        <?php } ?>	 

 </div>


</article><!-- #post-<?php the_ID(); ?> -->