<?php get_header(); ?>

<main id="primary" class="site-main">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="container">
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_content(); ?>
            </div><!-- .entry-content -->

        </div>


        <div class="about_gallery_wrap">
            <div class="container">
                <div class="d-md-flex align-items-center justify-content-around">
                    <div class="about_gallery_img">

                        <img src="/wp-content/uploads/about_gallery_img2.png" alt="" />

                    </div>
                    <div class="about_gallery_txt">
                        <h2 class="page-title"><?php echo get_post_field('post_title', apply_filters('wpml_object_id', 190, 'post', TRUE)); ?></h2>

                        <?php echo get_post_field('post_content', apply_filters('wpml_object_id', 190, 'post', TRUE)); ?>

                    </div>
                </div>
            </div>
        </div>

        <?php get_template_part('template-parts/contact', 'form'); ?>

    </article><!-- #post-<?php the_ID(); ?> -->

</main><!-- #main -->


<?php
get_footer();