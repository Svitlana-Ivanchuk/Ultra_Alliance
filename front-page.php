<?php get_header(); ?>

<main id="primary" class="site-main">


    <div class="container">
        <div class="home_blockslider_1">
            <div class="swiper swiper-slider1">
                <div class="swiper-wrapper">
                    <?php
                    $slider_args = array('post_type' => 'slider', );
                    $slider_qry = new WP_Query($slider_args);
                    if ($slider_qry->have_posts()):
                        while ($slider_qry->have_posts()):
                            $slider_qry->the_post();
                            ?>
                            <div class="swiper-slide">
                                <div class="home_block_slide1">
                                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">

                                        <div class="col">
                                            <b><?php the_title(); ?></b>
                                            <?php the_content(); ?>
                                        </div>

                                        <div class="col text-right">
                                            <?php the_post_thumbnail('thumb-slide1'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_query();
                    ?>
                </div>
            </div>
            <div class="swiper-pagination swiper-pagination-num"></div>
        </div>
    </div>


    <div class="services_wrap">
        <div class="container">

            <h3 class="block_subhead">Послуги</h3>
            <h2 class="block_head">Створіть свій Ultra захист в декілька кліків</h2>

            <div class="tabs_wrap">
                <div class="tabs">
                    <?php
                    $cat_args = array(
                        'orderby' => 'term_id',
                        'order' => 'ASC',
                        'hide_empty' => false,
                    );
                    $terms = get_terms('service_tax', $cat_args);
                    ?>
                    <?php foreach ($terms as $key => $taxonomy) {
                        $term_slug = $taxonomy->slug;
                        $term_name = $taxonomy->name;
                        ?>
                        <input type="radio" name="tab-btn" id="tab-btn-<?php echo ($key); ?>" value="" <?php if ($key === array_key_first($terms)) {
                               echo 'checked';
                           } ?>>
         <label for="tab-btn-<?php echo ($key); ?>"><?php echo ($term_name); ?></label>

                    <?php } ?>

                    <?php foreach ($terms as $key => $taxonomy) {
                        $term_slug = $taxonomy->slug;
                        $term_name = $taxonomy->name;
                        ?>

                        <div id="content-<?php echo ($key); ?>">
                            <div class="row">
                                <?php
                                $tax_post_args = array(
                                    'post_type' => 'service',
                                    'posts_per_page' => 7,
                                    'order' => 'ASC',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'service_tax',
                                            'field' => 'slug',
                                            'terms' => $term_slug
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



                                <div class="col-md-6 col-lg-4">
                                    <a href="<?php echo apply_filters('wpml_permalink', get_page_link(86)); ?>">
                                        <div class="service_block">
                                            <div class="service_block_ttl">
                                                <?php echo get_post_field('post_title', apply_filters('wpml_object_id', 86, 'post', TRUE)); ?>
                                            </div>
                                            <div class="service_block_img"><img width="40" height="40" src="wp-content/uploads/service_0.svg"
                                                    class="attachment-thumb-service size-thumb-service wp-post-image" alt="" loading="lazy"> </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>



                    <?php } ?>

                </div>
            </div>

        </div>
    </div>

    <?php get_template_part('template-parts/template', 'about'); ?>



    <div class="container">
        <?php the_content(); ?>
    </div>


    <div class="about_prefs_wrap">
        <div class="container">
            <h2 class="block_head"><?php echo get_post_field('post_title', apply_filters('wpml_object_id', 104, 'post', TRUE)); ?></h2>

            <div class="prefs_wrap"><?php echo get_post_field('post_content', apply_filters('wpml_object_id', 104, 'post', TRUE)); ?></div>


        </div>
    </div>


    <div class="faq_wrap">
        <div class="container">
            <h3 class="block_subhead">FAQ</h3>

            <h2><?php echo get_post_field('post_title', apply_filters('wpml_object_id', 118, 'post', TRUE)); ?></h2>

            <div class="row faq_row">
                <div class="col-md-4">
                    <div class="block_subhead_sm">
                        <?php
                        $term_id = apply_filters('wpml_object_id', 20, 'category', TRUE);
                        $term = get_term($term_id);
                        echo $term->name;
                        ?>
                    </div>

                    <?php
                    $tax_post_args = array(
                        'post_type' => 'questions',
                        'posts_per_page' => 4,
                        'order' => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'kategoriya_faq',
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

                            <div class="faq_item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_query();
                    ?>
                </div>
                <div class="col-md-4">
                    <div class="block_subhead_sm">
                        <?php
                        $term_id = apply_filters('wpml_object_id', 21, 'category', TRUE);
                        $term = get_term($term_id);
                        echo $term->name;
                        ?>
                    </div>
                    <?php
                    $tax_post_args = array(
                        'post_type' => 'questions',
                        'posts_per_page' => 4,
                        'order' => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'kategoriya_faq',
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

                            <div class="faq_item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_query();
                    ?>
                </div>

                <div class="col-md-4">
                    <a href="<?php echo apply_filters('wpml_permalink', get_page_link(118)); ?>" class="all_faq">
                        Більше питань
                        <span>
                            <svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1.00073L8 9.00059L1 17.0005" stroke="black" stroke-width="1.6" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                </div>

            </div>
        </div>
    </div>


    <?php get_template_part('template-parts/contact', 'form'); ?>



</main><!-- #main -->

<?php
get_sidebar();
get_footer();