<?php get_header(); ?>

<main id="primary" class="site-main">


    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


        <div class="block_services_row">
            <div class="block_services_wrap bs_1">
                <div class="container">
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header><!-- .entry-header -->


                    <h2>
                        <?php
                        $term_id = apply_filters('wpml_object_id', 18, 'category', TRUE);
                        $term = get_term($term_id);
                        echo $term->name;
                        ?>
                    </h2>
                    <div class="block_subhead_sm">Виберіть види страхування</div>
                    <div class="row mt-4">
                        <?php
                        $tax_post_args = array(
                            'post_type' => 'service',
                            'posts_per_page' => 999,
                            'order' => 'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'service_tax',
                                    'field' => 'term_id',
                                    'terms' => $term_id
                                )
                            )
                        );

                        $tax_post_qry = new WP_Query($tax_post_args);

                        if ($tax_post_qry->have_posts()):
                            while ($tax_post_qry->have_posts()):
                                $tax_post_qry->the_post();
                                ?>

                                <div class="col-md-6 col-lg-4">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="service_block">
                                            <div class="service_block_ttl"><?php the_title(); ?></div>
                                            <div class="service_block_img"><?php the_post_thumbnail('thumb-service'); ?> </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_query();
                        ?>
                    </div>


                </div>
            </div>

            <div class="block_services_wrap bs_2">
                <div class="container">

                    <h2>
                        <?php
                        $term_id = apply_filters('wpml_object_id', 19, 'category', TRUE);
                        $term = get_term($term_id);
                        echo $term->name;
                        ?>
                    </h2>
                    <div class="block_subhead_sm">Виберіть види страхування</div>
                    <div class="row mt-4">
                        <?php
                        $tax_post_args = array(
                            'post_type' => 'service',
                            'posts_per_page' => 999,
                            'order' => 'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'service_tax',
                                    'field' => 'term_id',
                                    'terms' => $term_id
                                )
                            )
                        );

                        $tax_post_qry = new WP_Query($tax_post_args);

                        if ($tax_post_qry->have_posts()):
                            while ($tax_post_qry->have_posts()):
                                $tax_post_qry->the_post();
                                ?>

                                <div class="col-md-6 col-lg-4">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="service_block">
                                            <div class="service_block_ttl"><?php the_title(); ?></div>
                                            <div class="service_block_img"><?php the_post_thumbnail('thumb-service'); ?> </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_query();
                        ?>
                    </div>

                </div>
            </div>
        </div>

        <div class="entry-content">
            <?php the_content(); ?>
        </div><!-- .entry-content -->


        <?php get_template_part('template-parts/contact', 'form'); ?>

    </article><!-- #post-<?php the_ID(); ?> -->

</main><!-- #main -->

<?php
get_footer();