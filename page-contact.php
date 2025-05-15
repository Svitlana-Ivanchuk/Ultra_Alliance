<?php get_header(); ?>

    <main id="primary" class="site-main">


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

 <div class="contact-content">
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

 </div>

<div class="contact_map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1069.3699562391657!2d30.478230539135083!3d50.396294584451034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4c8d909c92b8b%3A0x7d95f9b694f6c792!2z0L_RgNC-0LLRg9C70L7QuiDQntGF0YLQuNGA0YHRjNC60LjQuSwgNywg0JrQuNGX0LIsIDAyMDAw!5e0!3m2!1suk!2sua!4v1744099626835!5m2!1suk!2sua" width="100%" height="556" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>

<?php get_template_part( 'template-parts/contact', 'form' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->

    </main><!-- #main -->

<?php
get_footer();
