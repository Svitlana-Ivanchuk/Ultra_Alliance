<?php get_header(); ?>

<main id="primary" class="site-main">

   <div class="block_products_wrap bs_2">

      <div class="container">
         <header class="product-title">
            <?php the_title('<h2 class="">', '</h2>'); ?>
         </header><!-- .entry-header -->

         <div class="back-button">
            <a href="/products" class="btn"><svg class="icon_product">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#pointer_left"></use>
               </svg> Назад до страхових продуктів</a>
         </div>

         <?php

         if (have_rows('about_company')):
            while (have_rows('about_company')):
               the_row();

               $main_title = get_sub_field('main_title');
               $company_title_1 = get_sub_field('punkt_1');
               $company_desc_1 = get_sub_field('desc_1');
               $company_title_2 = get_sub_field('punkt_2');
               $company_desc_2 = get_sub_field('desc_2');
               $company_title_3 = get_sub_field('punkt_3');
               $company_desc_3 = get_sub_field('desc_3');
               $company_title_4 = get_sub_field('punkt_4');
               $company_desc_4 = get_sub_field('desc_4');
               ?>

               <h3 class="product-subtitle"><?php echo $main_title ?></h3>

               <details class="products_block">
                  <summary class="products_block_ttl">
                     <h4><?php echo $company_title_1 ?></h4>
                     <div class="products_block_img bs_5">
                        <svg class="icon_product">
                           <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#pointer_down"></use>
                        </svg>
                     </div>
                  </summary>
                  <p><?php echo $company_desc_1 ?></p>
               </details>
               <details class="products_block">
                  <summary class="products_block_ttl">
                     <h4><?php echo $company_title_2 ?></h4>
                     <div class="products_block_img bs_5">
                        <svg class="icon_product">
                           <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#pointer_down"></use>
                        </svg>
                     </div>
                  </summary>
                  <p><?php echo $company_desc_2 ?></p>
               </details>
               <details class="products_block">
                  <summary class="products_block_ttl">
                     <h4><?php echo $company_title_3 ?></h4>
                     <div class="products_block_img bs_5">
                        <svg class="icon_product">
                           <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#pointer_down"></use>
                        </svg>
                     </div>
                  </summary>
                  <p><?php echo $company_desc_3 ?></p>
               </details>
               <details class="products_block">
                  <summary class="products_block_ttl">
                     <h4><?php echo $company_title_4 ?></h4>
                     <div class="products_block_img bs_5">
                        <svg class="icon_product">
                           <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#pointer_down"></use>
                        </svg>
                     </div>
                  </summary>
                  <p><?php echo $company_desc_4 ?></p>
               </details>

            <?php endwhile; endif; ?>



         <?php if (have_rows('informacziya')):
            while (have_rows('informacziya')):
               the_row();

               $parent_title = get_sub_field('title'); ?>

               <h3 class="product-subtitle"><?php echo $parent_title ?></h3>

               <?php
               if (have_rows('items')):
                  while (have_rows('items')):
                     the_row();

                     $child_title = get_sub_field('item_title');
                     $child_description = get_sub_field('item_description'); ?>

                     <details class="products_block">
                        <summary class="products_block_ttl">
                           <h4><?php echo $child_title ?></h4>
                           <div class="products_block_img bs_5">
                              <svg class="icon_product">
                                 <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#pointer_down"></use>
                              </svg>
                           </div>
                        </summary>
                        <p><?php echo $child_description ?></p>
                     </details>

                  <?php endwhile; endif; endwhile; endif; ?>


         <div class="products_block bs_5">
            <a href="<?php the_field('idssp_file'); ?>" target="_blank">Інформаційний документ про стандартний страховий продукт
               <div class="products_block_img bs_5">
                  <svg class="icon_product">
                     <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#icon_pgf_file"></use>
                  </svg>
               </div>
            </a>
         </div>

         <div class="products_block bs_5">
            <a href="<?php the_field('informacziya_pro_strahovyh_poserednykiv'); ?>" target="_blank">Інформація про страхових посередників
               <div class="products_block_img bs_5">
                  <svg class="icon_product">
                     <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#arrow_circle_right"></use>
                  </svg>
               </div>
            </a>
         </div>

         <div class="products_block bs_5">
            <a href="<?php the_field('informacziya_pro_strahovayka'); ?>" target="_blank">Інформація про страховика
               <div class="products_block_img bs_5">
                  <svg class="icon_product">
                     <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#arrow_circle_right"></use>
                  </svg>
               </div>
            </a>
         </div>

         <div class="products_block bs_5">
            <a href="<?php the_field('zagalni_umovy_strahovogo_produktu'); ?>" target="_blank">Загальні умови страхового продукту
               <div class="products_block_img bs_5">
                  <svg class="icon_product">
                     <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#icon_pgf_file"></use>
                  </svg>
               </div>
            </a>
         </div>

         <div class="entry-content">
            <?php the_content(); ?>
         </div><!-- .entry-content -->

      </div>
   </div>
</main><!-- #main -->
<?php
get_footer();