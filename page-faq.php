<?php get_header(); ?>

    <main id="primary" class="site-main">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

 <div class="container">
    <header class="entry-header header-825">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

 </div>

<div class="services_faq_wrap">
<div class="container">
<div class="tabs_wrap">
<div class="tabs">

<?php
$cat_args = array(
    'orderby'       => 'term_id',
    'order'         => 'ASC',
    'parent'        => 0,
    'exclude'        => array(20,21),
    'hide_empty'    => false,
);
$terms = get_terms('kategoriya_faq', $cat_args);
?>
<?php    foreach($terms as $key => $taxonomy){
         $term_slug = $taxonomy->slug;
         $term_name = $taxonomy->name;
         $term_id = $taxonomy->term_id;
?>
    <input type="radio" name="tab-btn" id="tab-btn-<?php echo ( $key ); ?>" value="" <?php if ($key === array_key_first($terms)) {echo 'checked';} ?> >
    <label for="tab-btn-<?php echo ( $key ); ?>"><?php echo ( $term_name ); ?></label>

<?php } ?>
<?php    foreach($terms as $key => $taxonomy){
         $term_slug = $taxonomy->slug;
         $term_name = $taxonomy->name;
         $term_id = $taxonomy->term_id;
?>

    <div id="content-<?php echo ( $key ); ?>">
<div class="services_faq_bg">
     <div class="row service_block_row">

<?php
$cat_args_2 = array(
    'orderby'       => 'term_id',
    'order'         => 'ASC',
    'parent'        => $term_id,
    'hide_empty'    => false,
);
$terms = get_terms('kategoriya_faq', $cat_args_2);
?>
<?php    foreach($terms as $key => $taxonomy){
         $term_slug = $taxonomy->slug;
         $term_name = $taxonomy->name;
         $term_descr = $taxonomy->description;
         $term_id = $taxonomy->term_id;
?>
    <div class="col-md-6 col-lg-3">
<div class="service_block" data-filter=".<?php echo($term_slug); ?>">
<div class="service_block_ttl"><?php echo($term_name); ?></div>
<div class="service_block_img"><?php echo($term_descr); ?> </div>
</div>
    </div>
<?php } ?>

<div class="col-md-6 col-lg-3">
<div class="service_block" data-filter="*">
<div class="service_block_ttl"><?php echo get_post_field('post_title', apply_filters( 'wpml_object_id', 86, 'post', TRUE  )); ?></div>
<div class="service_block_img"><img width="40" height="40" src="/wp-content/uploads/service_0.svg" class="attachment-thumb-service size-thumb-service wp-post-image" alt="" loading="lazy"> </div>
</div>
</div>
     </div>
</div>
<div class="cat_faq_subcat_grid">
<p>Тут ви можете дізнатись відповіді на Ваші запитання</p>

<?php    foreach($terms as $key => $taxonomy){
         $term_slug = $taxonomy->slug;
         $term_name = $taxonomy->name;
         $term_descr = $taxonomy->description;
         $term_id = $taxonomy->term_id;
?>

<div class="cat_faq_subcat <?php echo($term_slug); ?>">
<h2><?php echo $term_name; ?></h2>
<div class="accordion-menu">
    <ul>
<?php
$tax_post_args = array(
          'post_type' => 'questions',
          'posts_per_page' => 999,
          'order' => 'ASC',
          'tax_query' => array(
                array(
                     'taxonomy' => 'kategoriya_faq',
                  'terms' => $term_id
                )
           )
    );
    $tax_post_qry = new WP_Query($tax_post_args);
    if($tax_post_qry->have_posts()) :
         while($tax_post_qry->have_posts()) :
                $tax_post_qry->the_post();
?>
            <li>
                <input type="checkbox" checked="">
                <i class="arrow"></i>
                <h3><?php the_title(); ?></h3>
                <p>
                    <?php the_content(); ?>
                </p>
            </li>
<?php
    endwhile;
    endif;
    wp_reset_query();
?>

</ul>
</div>
</div>
<?php } ?>
</div>
    </div>


<?php } ?>

<?php

//    wp_reset_query();
    ?>
</div>
</div>

</div>
</div>

<?php get_template_part( 'template-parts/contact', 'form' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->

    </main><!-- #main -->

<?php
get_footer();
