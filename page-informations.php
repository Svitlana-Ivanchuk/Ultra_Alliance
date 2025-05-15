<?php get_header(); ?>

<main id="primary" class="site-main">


 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="block_services_row">
   <div class="block_services_wrap bs_2">
    <div class="container">
     <header class="entry-header ">
      <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
     </header><!-- .entry-header -->

     <div class="accordion" id="categoriesAccordion">
      <?php
      $main_categories_ids = [52, 53, 58];

      foreach ($main_categories_ids as $index => $cat_id_raw) {
       $main_cat_id = apply_filters('wpml_object_id', $cat_id_raw, 'category', TRUE);
       $main_cat = get_term($main_cat_id);
       $subcategories = get_terms(array(
        'taxonomy' => 'category',
        'parent' => $main_cat_id,
        'hide_empty' => false
       ));

       $accordion_id = 'catAccordion' . $index;
       ?>

       <div class="information-item">
        <h2 class="accordion-header" id="heading<?php echo $accordion_id; ?>">
         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $accordion_id; ?>"
          aria-expanded="false" aria-controls="collapse<?php echo $accordion_id; ?>">
          <?php echo $main_cat->name; ?>
         </button>
        </h2>
        <div id="collapse<?php echo $accordion_id; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $accordion_id; ?>"
         data-bs-parent="#categoriesAccordion">
         <div class="accordion-body">
          <div class="main-category-description mb-3">
           <?php echo category_description($main_cat->term_id); ?>
          </div>

          <?php if (!empty($subcategories)): ?>
           <div class="row subcategories-wrap">
            <?php foreach ($subcategories as $subcat): ?>
             <div class="col-md-4 col-sm-6 mb-3">
              <a href="<?php echo get_category_link($subcat->term_id); ?>" target="_blank">
               <div class="service_block small">
                <div class="service_block_ttl"><?php echo $subcat->name; ?></div>
                <div class="service_block_img"><?php echo category_description($subcat->term_id); ?></div>
               </div>
              </a>
             </div>
            <?php endforeach; ?>
           </div>
          <?php endif; ?>
         </div>
        </div>
       </div>

      <?php } ?>
     </div>

    </div>
   </div>
  </div>

  <div class="entry-content">
   <?php the_content(); ?>
  </div><!-- .entry-content -->

  <div class="faq_wrap">
   <div class="container">
    <div class="block_head nomax"><?php echo get_post_field('post_title', apply_filters('wpml_object_id', 118, 'post', TRUE)); ?></div>

    <div class="row faq_row">
     <div class="col-md-8">
      <div class="block_subhead_sm">
       <?php
       $term_id = apply_filters('wpml_object_id', 20, 'category', TRUE);
       $term = get_term($term_id);
       echo $term->name;
       ?>
      </div>
      <div class="row">
       <?php
       $tax_post_args = array(
        'post_type' => 'questions',
        'posts_per_page' => 6,
        'order' => 'ASC',
        'orderby' => 'rand',
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
         <div class="col-sm-6">
          <div class="faq_item">
           <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
           </a>
          </div>
         </div>
         <?php
        endwhile;
       endif;
       wp_reset_query();
       ?>
      </div>
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

 </article><!-- #post-<?php the_ID(); ?> -->

</main><!-- #main -->

<?php
get_footer();