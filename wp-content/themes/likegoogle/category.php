<?php get_header(); ?>
<?php
$sidebar_cat_position = get_query_var('cat') ; 
if( sith_get_option( 'sidebar_position_'.$sidebar_cat_position) != 'full'): 
else :
$cat_full_layout = ' home-full-layout-nosidebar';
endif;
if( sith_get_option('cate_template_'.$category_id) != 'loop-2caption'): 
else :
$class_control_post = ' id="post-2caption"';
endif;
if( sith_get_option( 'posts_display') != 'posts_content'): 
$layout_style_post = 'loop-full-content';
endif;
?>

<div class="<?php echo $layout_style_post ?> custom-container<?php echo $cat_full_layout //Extremely important ?> <?php echo sith_get_option('sidebar_position_'.$sidebar_cat_position ); ?>">
  <div class="content"<?php echo $class_control_post ?>>
    <?php $category_id = get_query_var('cat') ; ?>
    <div class="page-head clear">
      <h1 class="page-title"><?php echo single_cat_title( '', false ) ?> </h1>
</div>
    <div class="page-header-bar"></div>
 
    <div class="post-inner" >
      <?php

while ( have_posts() ) : the_post();


if( sith_get_option( 'cate_template_'.$category_id ) )
		get_template_part(sith_get_option('cate_template_'.$category_id ) );
else get_template_part('loop-excerpt');
endwhile;
		?>
    </div>
    <div class="clear"></div>
    <?php if ($wp_query->max_num_pages > 1) sith_pagenavi(); ?>
  </div>
  <!-- .content -->
  
  <?php
if(sith_get_option( 'sidebar_position_'.$sidebar_cat_position) != 'home-full-layout-nosidebar'): 
get_sidebar();
else :
endif;
?>
</div>
<?php get_footer(); ?>
