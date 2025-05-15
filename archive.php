<?php get_header(); ?>

<main id="primary" class="site-main footer-over">
    <div class="container">
        <header class="page-header">
            <?php the_archive_title('<h1 class="entry-title">', '</h1>'); ?>
        </header><!-- .page-header -->


        <div class="row">
            <div class="col-lg-12">
                <div class="category_wrap">


                    <?php while (have_posts()):
                        the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="post-date">
                                <?php ultra_posted_on(); ?>
                            </div><!-- .entry-meta -->

                            <?php if (get_field('document')) { ?>
                                <header class="post-header">
                                    <?php the_title('<h3 class="post-title"><a href="' . get_field('document') . '" target="_blank">', '</a></h3>'); ?>
                                </header>
                                <!--  .entry-header -->



                                <?php the_excerpt(); ?>

                                <div class="post-doc">
                                    <a href="<?php the_field('document'); ?>" target="_blank">Переглянути документ</a>
                                    <?php if (get_field('doc_p7s')) { ?> /
                                        <a href="<?php the_field('doc_p7s'); ?>" target="_blank">ЕЦП</a><?php } ?>
                                </div><!-- .entry-content -->
                            <?php } else { ?>
                                <header class="post-header">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="post-title">
                                            <?php the_title(); ?>
                                        </h3>
                                    </a>
                                </header><!-- .entry-header -->
                            <?php } ?>
                        </article><!-- #post-<?php the_ID(); ?> -->
                    <?php endwhile; ?>

                    <div class="pagination">
                        <?php
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => __('« Назад', 'ultra'),
                            'next_text' => __('Далі »', 'ultra'),
                        ));
                        ?>
                    </div>

                </div>
            </div>
        </div>

    </div>
</main><!-- #main -->
<?php get_footer();