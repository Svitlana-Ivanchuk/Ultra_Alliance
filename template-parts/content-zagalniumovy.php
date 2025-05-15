<?php get_header(); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

 <div class="container">
  <header class="content-header">
   <h3 class="content-title"><?php the_title(); ?></h3>
  </header>

  <div class="entry-content">
   <?php the_content(); ?>
  </div>

 <?php if (get_field('document')): ?>
   <div class="post-doc">
    <a href="<?php the_field('document'); ?>" target="_blank">Переглянути документ</a>
    <?php if (get_field('doc_p7s')): ?>
     / <a href="<?php the_field('doc_p7s'); ?>" target="_blank">ЕЦП</a>
    <?php endif; ?>
   </div>
  <?php endif; ?>

 </div>

</article>

<?php get_footer();