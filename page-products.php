<?php get_header(); ?>

<main id="primary" class="site-main">

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    <div class="block_products_row">

      <div class="block_products_wrap bs_1">
        <div class="container">
          <header class="entry-header">
            <?php the_title('<h1 class="page-title">', '</h1>'); ?>
          </header><!-- .entry-header -->

          <div class="back-button">
            <a href="/zagalniumovy" class="btn"><svg class="icon_product">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#pointer_left"></use>
              </svg> Назад </a>
          </div>

          <ul class="mt-4">
            <?php
            $tax_post_args = array(
              'post_type' => 'product',
              'posts_per_page' => 999,
              'order' => 'ASC',
            );

            $tax_post_qry = new WP_Query($tax_post_args);

            if ($tax_post_qry->have_posts()):
              while ($tax_post_qry->have_posts()):
                $tax_post_qry->the_post();
                ?>

                <li class="">
                  <a href="<?php the_permalink(); ?>">
                    <div class="products_block">
                      <div class="products_block_ttl"><?php the_title(); ?></div>
                      <div class="products_block_img "><?php the_post_thumbnail('thumb-service'); ?> </div>
                    </div>
                  </a>
                </li>
                <?php
              endwhile;
            endif;
            wp_reset_postdata();
            ?>
          </ul>

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