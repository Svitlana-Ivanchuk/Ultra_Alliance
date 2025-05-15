<?php

get_header();
?>






<?php

$category = get_queried_object();

$children = get_categories([
    'parent' => $category->term_id,
    'hide_empty' => false,
]);

if (!empty($children)) {
    include locate_template('category-corporate.php');
    return;
} else {
    include locate_template('archive.php');
    return;
}

?>


<?php get_footer();