<?php get_header(); ?>

    <main id="primary" class="site-main">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

 <div class="container">
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

<div class="cooperation_wrap">

<?php
$field_cooperation = get_field_object('cooperation');

if( $field_cooperation ):

$label_1 = $field_cooperation['sub_fields'][0]['label'];
$label_2 = $field_cooperation['sub_fields'][1]['label'];
$label_3 = $field_cooperation['sub_fields'][2]['label'];

$field_cooperation_content = get_field('cooperation');

$coop_tab_1 = $field_cooperation_content['coop_1'];
$coop_tab_2 = $field_cooperation_content['coop_2'];
$coop_tab_3 = $field_cooperation_content['coop_3'];
 ?>

<div class="tabs_wrap">
<div class="tabs">

    <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked >
    <label for="tab-btn-1"><?php echo $label_1; ?></label>

    <input type="radio" name="tab-btn" id="tab-btn-2" value="" >
    <label for="tab-btn-2"><?php echo $label_2; ?></label>

    <input type="radio" name="tab-btn" id="tab-btn-3" value="" >
    <label for="tab-btn-3"><?php echo $label_3; ?></label>

    <input type="radio" name="tab-btn" id="tab-btn-4" value="" >
    <label for="tab-btn-4"> <a href="/services/">Клієнтам</a></label>


    <div class="tab_content" id="content-1">
        <?php echo $coop_tab_1; ?>
    </div>

    <div class="tab_content" id="content-2">
        <?php echo $coop_tab_2; ?>
    </div>

    <div class="tab_content" id="content-3">
        <?php echo $coop_tab_3; ?>
    </div>

</div>
</div>

<?php endif; ?>

</div>

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

 </div>

<?php get_template_part( 'template-parts/contact', 'form' ); ?>

 </article><!-- #post-<?php the_ID(); ?> -->

    </main><!-- #main -->

<?php
get_footer();
