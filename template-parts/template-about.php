<div class="about_wrap">
 <div class="container">

  <div class="about_wrap-container">
   <h3 class="block_subhead"><?php echo get_post_field('post_title', apply_filters('wpml_object_id', 30, 'post', TRUE)); ?></h3>
   <h2 class="block_head"><?php echo get_post_field('post_title', apply_filters('wpml_object_id', 91, 'post', TRUE)); ?></h2>

   <div class="about_counters ">
    <div class="row about_row">
     <div class="col-md-6 col-lg-6">
      <a href="<?php the_permalink(290); ?>" target="_blank">
       <div class="about_block">
        <div class="service_block_ttl"><?php $the_post = get_post(290);
        echo get_the_title($the_post); ?>
        </div>
        <div class="service_block_img"><?php $the_post = get_post(290);
        echo get_the_post_thumbnail($the_post); ?> </div>
       </div>
      </a>
     </div>
     <div class="col-md-6 col-lg-6">
      <a href="<?php the_permalink(239); ?>" target="_blank">
       <div class="about_block">
        <div class="service_block_ttl"><?php $the_post = get_post(239);
        echo get_the_title($the_post); ?>
        </div>
        <div class="service_block_img"><?php $the_post = get_post(239);
        echo get_the_post_thumbnail($the_post); ?> </div>


       </div>
      </a>
     </div>
     <div class="col-md-6 col-lg-6">
      <a href="<?php echo get_category_link(45); ?>" target="_blank">
       <div class="about_block">
        <div class="service_block_ttl"><?php $cat_id = apply_filters('wpml_object_id', 45, 'category', TRUE);
        $cat = get_term($cat_id);
        echo $cat->name; ?>
        </div>
        <div class="service_block_img"><?php echo category_description(45); ?> </div>
       </div>
      </a>
     </div>
		
     <div class="col-md-6 col-lg-6">
      <a href="<?php the_permalink(2337); ?>" target="_blank">
       <div class="about_block">
        <div class="service_block_ttl"><?php $the_post = get_post(2337);
        echo get_the_title($the_post); ?>
        </div>
        <div class="service_block_img"><?php $the_post = get_post(2337);
        echo get_the_post_thumbnail($the_post); ?> </div>
       </div>
      </a>
     </div>		
		
		
     <!-- <div class="col-md-6 col-lg-6">
      <a href="<?php echo get_category_link(59); ?>" target="_blank">
       <div class="about_block">
        <div class="service_block_ttl"><?php $term_id = apply_filters('wpml_object_id', 59, 'category', TRUE);
        $term = get_term($term_id);
        echo $term->name; ?>
        </div>
        <div class="service_block_img"><?php echo category_description(59); ?> </div>
       </div>
      </a>
     </div>-->
		
		
    </div>
   </div>
  </div>

  <div class="about_img">
   <?php echo get_the_post_thumbnail(30, 'full'); ?>
  </div>

 </div>
</div>