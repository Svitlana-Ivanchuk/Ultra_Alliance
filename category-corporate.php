<?php

/**
 * Template name: Category Template
 */

get_header(); ?>

<main id="primary" class="site-main footer-over">
    <div class="container">
        <header class="page-header">
            <?php the_archive_title('<h1 class="entry-title">', '</h1>'); ?>
        </header><!-- .page-header -->


        <div class="row">
            <div class="col-lg-8">
                <div class="category_wrap">

                    <?php
                    if (is_category()) {
                        $this_category = get_category($cat);
                    }
                    ?>
                    <?php
                    if ($this_category->category_parent)
                        $this_category = wp_list_categories('orderby=id
&title_li=&use_desc_for_title=1&child_of=' . $this_category->category_parent .
                            "&echo=0");
                    else
                        $this_category = wp_list_categories('orderby=id&depth=1
&title_li=&use_desc_for_title=1&child_of=' . $this_category->cat_ID .
                            "&echo=0");
                    if ($this_category) { ?>

                        <ul class="subcat_ul">
                            <?php echo $this_category; ?>

                        </ul>

                    <?php } ?>

                </div>
            </div>
        </div>

    </div>
</main><!-- #main -->
<?php get_footer();