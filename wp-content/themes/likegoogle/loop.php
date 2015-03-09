
<?php 
if( is_home() || is_front_page() || is_post_type_archive( $post_type ))  {
//$posts_display = "home_";
$posts_display = "home_posts_template";
}
else {
$posts_display = "posts_display";
}
?>

<div class="container-posts">
<?php while ( have_posts() ) : the_post(); ?>

<?php 
if( sith_get_option($posts_display) != 'posts_fullthumb'): 
else :
get_template_part('loop-full-thumb');
endif;
if( sith_get_option( $posts_display) != 'posts_content'): 
else :
get_template_part('loop-full-content');
endif;
if( sith_get_option($posts_display) != 'posts_excerpt'): 
else :
get_template_part('loop-excerpt');
endif;
if( sith_get_option( $posts_display) != 'posts_likegoogle'): 
else :
get_template_part('loop-simple-list');
endif;
if( sith_get_option( $posts_display) != 'loop-2caption'): 
else :
get_template_part('loop-2caption');
endif;
?>

<?php if( sith_get_option( $posts_display ) );
else {
get_template_part('loop-excerpt');
};
//}
?>
<?php endwhile;?>
</div>

<?php if ( ! have_posts() ) :?>
<div id="post-0" class="post not-found container-posts" style=" background:#fff; border:1px solid #ddd">
  <h2 class="post-title">
   <?php echo lang_not_found; ?>
  </h2>
  <div class="entry">
    <p>
      <?php echo lang_not_found_msg; ?>
    </p>
    <?php get_search_form(); ?>
  </div>
</div>
<?php else : ?>
<?php endif; ?>
