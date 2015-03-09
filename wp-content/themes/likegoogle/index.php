<?php get_header();?>

<div class="custom-container<?php echo home_full_layout //Extremely important ?>">

<div class="content">
<div class="container-posts">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php 
if( sith_get_option('home_posts_template') != 'loop-full-thumb'): 
else :
get_template_part('loop-full-thumb');
endif;
if( sith_get_option( 'home_posts_template') != 'loop-full-content'): 
else :
get_template_part('loop-full-content');
endif;
if( sith_get_option( 'home_posts_template') != 'loop-excerpt'): 
else :
get_template_part('loop-excerpt');
endif;
if( sith_get_option( 'home_posts_template') != 'loop-simple-list'): 
else :
get_template_part('loop-simple-list');
endif;
if( sith_get_option('home_posts_template') != 'loop-1caption'): 
else :
get_template_part('loop-1caption');
endif;
if( sith_get_option('home_posts_template') != 'loop-2caption'): 
else :
get_template_part('loop-2caption');
endif;

?>
      <?php if( sith_get_option( 'home_posts_template' ) );
else {
get_template_part('loop-excerpt');
};
//}
?>
      <?php endwhile;?>
    </div>

    <?php if ($wp_query->max_num_pages > 1) sith_pagenavi();?>

  </div>
  <!-- .content /-->
  
  <?php if( sith_get_option( 'full_home_nosidebar' ) );
else {
?>

  <?php get_sidebar(); ?>

  <?php };?>
</div>
<?php get_footer(); ?>
