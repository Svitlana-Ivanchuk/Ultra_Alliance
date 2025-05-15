<?php get_header(); ?>

    <main id="primary" class="site-main">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="container">
<div class="row d-flex align-items-center">
<div class="col-md-6">

    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

</div>
<div class="col-md-6">

<div class="service_short">
    <?php the_excerpt(); ?>


<?php if (get_field('popup_form') != "") { ?>
<div class="service_short_buttons">
<button class="btn" data-bs-toggle="modal" data-bs-target="#form_pop">Замовити</button>
</div>
<?php } ?>

</div>

</div>
</div>
</div>

    <?php // ultra_post_thumbnail(); ?>
    <img src="<?php the_field('widepic'); ?>" alt="" style="width: 100%;" />


<?php if( have_rows('prefs') ): ?>

   <div class="container">

  <div class="row justify-content-center service_prefs">

  <?php while( have_rows('prefs') ): the_row();
    $image = get_sub_field('prefs_img');
    $content = get_sub_field('prefs_txt');
    ?>
    <div class="col-6 col-md-3">
       <div class="service_pref">
       <div class="service_pref_img">
            <img src="<?php echo $image; ?>" />
        </div>
     <p><?php echo $content; ?></p>
        </div>
    </div>

  <?php endwhile; ?>

  </div>
  </div>

<?php endif; ?>

<?php if( have_rows('casco_variants') ): ?>

   <div class="container">

<div class="block_subhead"><?php the_field('casco_text'); ?></div>
<div class="block_head" style="max-width: 740px"><?php the_field('casco_text_sm'); ?></div>

  <div class="service_vars_wrap">
  <?php
   $count = 0;
   while( have_rows('casco_variants') ): the_row();
    $count++;
    $name = get_sub_field('cas_name');
    $short = get_sub_field('cas_short');
    $text_1 = get_sub_field('cas_text_1');
    $text_2 = get_sub_field('cas_text_2');
    ?>

  <label>
  <input type="radio" name="radio" <?php if ($count == 2) {echo 'checked';} ?> />
  <div class="service_var_box var_box_<?php echo $count; ?>">
      <div class="cas_count">0<?php echo $count; ?></div>

    <div class="cas_name"><?php echo $name; ?></div>
    <div class="cas_short"><?php echo $short; ?></div>
    <div class="cas_hidden">
        <?php if ($text_1) { ?>
            <div class="cas_text_1"><?php echo $text_1; ?></div>
        <?php } ?>
        <?php if ($text_2) { ?>
            <div class="cas_text_2"><?php echo $text_2; ?></div>
        <?php } ?>
    </div>
  </div>
</label>

  <?php endwhile; ?>

  </div>
  </div>

<?php endif; ?>


    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->


<div class="faq_wrap">
    <div class="container">
<div class="block_head nomax"><?php echo get_post_field('post_title', apply_filters( 'wpml_object_id', 118, 'post', TRUE  )); ?></div>

<div class="row faq_row">
<div class="col-md-8">
<div class="block_subhead_sm">
<?php
$term_id = apply_filters( 'wpml_object_id', 20, 'category', TRUE  );
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
                     'field'    => 'term_id',
                     'terms' => $term_id
                )
           )
    );
    $tax_post_qry = new WP_Query($tax_post_args);
    if($tax_post_qry->have_posts()) :
         while($tax_post_qry->have_posts()) :
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
<a href="<?php echo apply_filters( 'wpml_permalink', get_page_link(118)); ?>" class="all_faq">
Більше питань
<span>
<svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 1.00073L8 9.00059L1 17.0005" stroke="black" stroke-width="1.6" stroke-linejoin="round"/>
</svg>
</span>
</a>
</div>
</div>
</div>
</div>


<?php get_template_part( 'template-parts/contact', 'form' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->

    </main><!-- #main -->

<?php if (get_field('popup_form') != "") { ?>

<div class="modal fade" id="form_pop" tabindex="-1" aria-labelledby="form_popLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="form_popLabel">Оформлення заявки<br> для укладання договору</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


<div class="popup_subhead_sm">Це займе не більше 2х хвилин</div>

<div class="popform_wrap">
<div class="tabs">
    <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked="checked" >
    <label for="tab-btn-1">Оформлення заявки</label>
    <input type="radio" name="tab-btn" id="tab-btn-2" value="" >
    <label for="tab-btn-2">Інший спосіб</label>
    <div class="tab_content" id="content-1">
        <?php
         $popup_form_id = get_field('popup_form');
         echo do_shortcode("[contact-form-7 id=\"$popup_form_id\"]"); ?>
    </div>
    <div class="tab_content" id="content-2">
         <?php echo do_shortcode('[wbcr_html_snippet id="272"]'); ?>
    </div>
</div>
</div>

      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php
get_footer();
