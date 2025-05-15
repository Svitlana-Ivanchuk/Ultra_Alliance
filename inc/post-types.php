<?php
function ultra_register_post_type()
{

   $args = array(
      'hierarchical' => true,
      'labels' => array(
         'name' => esc_html_x('Product_categories', 'taxonomy general name', 'ultra'),
         'singular_name' => esc_html_x('Product_category', 'taxonomy singular name', 'ultra'),
         'search_items' => esc_html__('Search Product_categories', 'ultra'),
         'popular_items' => esc_html__('Popular Product_categories', 'ultra'),
         'all_items' => esc_html__('All Product_categories', 'ultra'),
         'parent_item' => esc_html__('Parent Product_category', 'ultra'),
         'parent_item_colon' => esc_html__('Parent Product_category:', 'ultra'),
         'edit_item' => esc_html__('Edit Product_category', 'ultra'),
         'update_item' => esc_html__('Update Product_category', 'ultra'),
         'add_new_item' => esc_html__('Add New Product_category', 'ultra'),
         'new_item_name' => esc_html__('New Product_category Name', 'ultra'),
         'separate_items_with_commas' => esc_html__('Separate Product_categories with commas', 'ultra'),
         'add_or_remove_items' => esc_html__('Add or remove Product_categories', 'ultra'),
         'choose_from_most_used' => esc_html__('Choose from the most used Product_categories', 'ultra'),
         'not_found' => esc_html__('No Product_categories found.', 'ultra'),
         'menu_name' => esc_html__('Product_categories', 'ultra'),
         'back_to_items' => esc_html__('Back to Product_categories', 'ultra'),
      ),
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'show_in_rest' => true,
      'rewrite' => array('slug' => 'product_categories'),
   );

   register_taxonomy('product_category', array('product'), $args);

   unset($args);

   $args = array(
      'label' => esc_html__('Products', 'ultra'),
      'labels' => array(
         'name' => esc_html_x('Products', 'Post type general name', 'ultra'),
         'singular_name' => esc_html_x('Product', 'Post type singular name', 'ultra'),
         'menu_name' => esc_html_x('Products', 'Admin Menu text', 'ultra'),
         'name_admin_bar' => esc_html_x('Product', 'Add New on Toolbar', 'ultra'),
         'add_new' => esc_html__('Add New', 'ultra'),
         'add_new_item' => esc_html__('Add New Product', 'ultra'),
         'new_item' => esc_html__('New Product', 'ultra'),
         'edit_item' => esc_html__('Edit Product', 'ultra'),
         'view_item' => esc_html__('View Product', 'ultra'),
         'all_items' => esc_html__('All Products', 'ultra'),
         'search_items' => esc_html__('Search Products', 'ultra'),
         'parent_item_colon' => esc_html__('Parent Products:', 'ultra'),
         'not_found' => esc_html__('No Products found.', 'ultra'),
         'not_found_in_trash' => esc_html__('No Products found in Trash.', 'ultra'),
         'featured_image' => esc_html_x('Product Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'ultra'),
         'set_featured_image' => esc_html_x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'ultra'),
         'remove_featured_image' => esc_html_x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'ultra'),
         'use_featured_image' => esc_html_x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'ultra'),
         'archives' => esc_html_x('Product archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'ultra'),
         'insert_into_item' => esc_html_x('Insert into Product', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a
post). Added in 4.4', 'ultra'),
         'uploaded_to_this_item' => esc_html_x('Uploaded to this Product', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when
viewing media attached to a post). Added in 4.4', 'ultra'),
         'filter_items_list' => esc_html_x('Filter Products list', 'Screen reader text for the filter links heading on the post type listing screen. Default
“Filter posts list”/”Filter pages list”. Added in 4.4', 'ultra'),
         'items_list_navigation' => esc_html_x('Products list navigation', 'Screen reader text for the pagination heading on the post type listing screen.
Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'ultra'),
         'items_list' => esc_html_x('Products list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts
list”/”Pages list”. Added in 4.4', 'ultra'),
      ),
      'supports' => array('title', 'editor', 'author', 'thumbnail'),
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'product'),
      'has_archive' => true,
      'hierarchical' => false,
      'menu_position' => 20,
      'menu_icon' => 'dashicons-products',
      'show_in_rest' => true,

   );

   register_post_type('product', $args);
}


add_action('init', 'ultra_register_post_type');

function ultra_rewrite_rules()
{
   ultra_register_post_type();
   flush_rewrite_rules();
}

add_action('after_switch_theme', 'ultra_rewrite_rules');