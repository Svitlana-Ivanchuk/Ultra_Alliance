<?php

/**
 * Template name: Zagalniumovy Template Page
 */


get_header(); ?>

<main id="primary" class="site-main">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


        <div class="block_services_row">
            <div class="block_services_wrap bs_3">
                <div class="container">
                    <header class="page-header">
                        <?php the_title('<h1 class="page-title">', '</h1>'); ?>
                    </header><!-- .page-header -->



                    <?php
                    // Сторінка продуктів
                    $products_page = get_page_by_path('products');
                    $products_page_url = get_permalink($products_page->ID);
                    $products_page_title = get_the_title($products_page->ID);

                    // Категорії
                    $category_74 = get_category(68); // Загальні умови
                    $category_75 = get_category(69);
                    $category_24 = get_category(24);
                    $category_26 = get_category(26);

                    ?>

                    <div class="insurance-links">

                        <ul class="mt-4">
                            <li class="">
                                <a href="<?php echo esc_url($products_page_url); ?>">
                                    <div class="products_block">

                                        <div class="products_block_ttl"><?php echo esc_html__($products_page_title); ?></div>
                                        <div class="products_block_img bs_4"><svg class="icon_product">
                                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#pointer_right"></use>
                                            </svg></div>
                                    </div>
                                </a>
                            </li>

                            <li class="">
                                <a href="<?php echo esc_url(get_category_link($category_74->term_id)); ?>">
                                    <div class="products_block">
                                        <div class="products_block_ttl"><?php echo esc_html__($category_74->name); ?></div>
                                        <div class="products_block_img bs_4"><svg class="icon_product">
                                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#pointer_right"></use>
                                            </svg></div>
                                    </div>
                                </a>
                            </li>

                            <li class="">
                                <a href="<?php echo esc_url(get_category_link($category_75->term_id)); ?>">
                                    <div class="products_block">
                                        <?php echo esc_html__($category_75->name); ?>
                                        <div class="products_block_img bs_4"><svg class="icon_product">
                                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#pointer_right"></use>
                                            </svg></div>
                                    </div>
                                </a>
                            </li>

                            <li class="">
                                <a href="<?php echo esc_url(get_category_link($category_24->term_id)); ?>">
                                    <div class="products_block">
                                        <?php echo esc_html__($category_24->name); ?>
                                        <div class="products_block_img bs_4"><svg class="icon_product">
                                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#pointer_right"></use>
                                            </svg></div>
                                    </div>
                                </a>
                            </li>

                            <li class="">
                                <a href="<?php echo esc_url(get_category_link($category_26->term_id)); ?>">
                                    <div class="products_block">
                                        <?php echo esc_html__($category_26->name); ?>
                                        <div class="products_block_img bs_4"><svg class="icon_product">
                                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#pointer_right"></use>
                                            </svg></div>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>


                </div>
            </div>
        </div>

        <?php get_template_part('template-parts/contact', 'form'); ?>

    </article><!-- #post-<?php the_ID(); ?> -->

</main><!-- #main -->
<?php get_footer();