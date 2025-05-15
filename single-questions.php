<?php get_header(); ?>

    <main id="primary" class="site-main">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="container">

    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

</div>



<br><br><br>


<?php get_template_part( 'template-parts/contact', 'form' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->

    </main><!-- #main -->

<?php
get_footer();
