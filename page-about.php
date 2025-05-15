<?php get_header(); ?>

<main id="primary" class="site-main">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="container">
            <header class="entry-header header-825">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_content(); ?>
            </div><!-- .entry-content -->

        </div>

        <?php get_template_part('template-parts/template', 'about'); ?>



        <div class="about_moreinfo_wrap">
            <div class="container">

                <?php
                $field_about_moreinfo = get_field_object('about_moreinfo');

                if ($field_about_moreinfo):

                    $label_1 = $field_about_moreinfo['sub_fields'][0]['label'];
                    $label_2 = $field_about_moreinfo['sub_fields'][1]['label'];
                    $label_3 = $field_about_moreinfo['sub_fields'][2]['label'];
                    $label_4 = $field_about_moreinfo['sub_fields'][3]['label'];
                    //$label_5 = $field_about_moreinfo['sub_fields'][4]['label'];
                
                    $field_about_moreinfo_content = get_field('about_moreinfo');

                    $about_tab_1 = $field_about_moreinfo_content['about_more_1'];
                    $about_tab_2 = $field_about_moreinfo_content['about_more_2'];
                    $about_tab_3 = $field_about_moreinfo_content['about_more_3'];
                    $about_tab_4 = $field_about_moreinfo_content['about_more_4'];
                    //$about_tab_5 = $field_about_moreinfo_content['about_more_5'];
                    ?>

                    <h2 class="page-title"><?php echo $field_about_moreinfo['label']; ?></h2>

                    <div class="tabs_wrap">
                        <div class="tabs">

                            <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
                            <label for="tab-btn-1"><?php echo $label_1; ?></label>

                            <input type="radio" name="tab-btn" id="tab-btn-2" value="">
                            <label for="tab-btn-2"><?php echo $label_2; ?></label>

                            <input type="radio" name="tab-btn" id="tab-btn-3" value="">
                            <label for="tab-btn-3"><?php echo $label_3; ?></label>

                            <input type="radio" name="tab-btn" id="tab-btn-4" value="">
                            <label for="tab-btn-4"><?php echo $label_4; ?></label>

                            <!--<input type="radio" name="tab-btn" id="tab-btn-5" value="">
                            <label for="tab-btn-5"><?php echo $label_5; ?></label>-->

                            <div class="tab_content" id="content-1">
                                <?php echo $about_tab_1; ?>
                            </div>

                            <div class="tab_content" id="content-2">
                                <?php echo $about_tab_2; ?>
                            </div>

                            <div class="tab_content" id="content-3">
                                <?php echo $about_tab_3; ?>
                            </div>

                            <div class="tab_content" id="content-4">
                                <?php echo $about_tab_4; ?>
                            </div>

                            <div class="tab_content" id="content-5">
                                <?php echo $about_tab_5; ?>
                            </div>

                        </div>
                    </div>

                <?php endif; ?>


                <?php if (get_field('description_2')) {
                    ; ?>
                    <div class="about_description_2">
                        <?php the_field('description_2'); ?>
                    </div>
                <?php } ?>

            </div>
        </div>

        <?php get_template_part('template-parts/contact', 'form'); ?>

    </article><!-- #post-<?php the_ID(); ?> -->

</main><!-- #main -->


<style type="text/css">
    .table_moreinfo td:last-child.hover:after {
        content: 'Скопіювати';
        position: absolute;
        right: 72px;
        top: 32px;
    }

    .table_moreinfo td:last-child.copied:after {
        content: 'Скопійовано';
        position: absolute;
        right: 72px;
        top: 32px;
    }
</style>


<?php
get_footer();