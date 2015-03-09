<?php get_header(); ?>
<?php
$category_id = get_query_var('cat') ; 
if( sith_get_option( 'cate_template_'.$category_id ) ):
else: endif;
?>
<?php
$sidebar_cat_position = get_query_var('cat') ; 
if( sith_get_option( 'sidebar_position_'.$sidebar_cat_position) != 'full'): 
else :
$cat_full_layout = ' home-full-layout-nosidebar';
endif;
if( sith_get_option('cate_template_'.$category_id) != 'loop-3caption'): 
else :
$class_control_post = ' id="post-3caption"';
endif;
if( sith_get_option( 'posts_display') != 'posts_content'): 
$layout_style_post = 'loop-full-content';
endif;
?>

<div class="<?php echo $layout_style_post ?> custom-container">
  <div class="content">
    <div class="page-head">
      <?php if ( have_posts() ) the_post(); ?>
      <h2 class="page-title">
        <?php if ( is_day() ) : ?>
        <?php echo lang_daily_archives; printf( __(), get_the_date() ); ?>
        <?php elseif ( is_month() ) : ?>
        <?php echo lang_monthly_archives; printf( __(), get_the_date( 'F Y' ) ); ?>
        <?php elseif ( is_year() ) : ?>
        <?php echo lang_yearly_archives; printf( __(), get_the_date( 'Y' ) ); ?>
        <?php elseif ( is_tax() ) : ?>
        <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?>
        <?php else : ?>
        <?php echo lang_blog_archives; ?>
        <?php endif; ?>
      </h2>
    </div>
    <div class="page-header-bar"></div>
    <div class="post-inner">
      <?php
		rewind_posts();
		get_template_part( 'loop', 'archive' );	?>
      <?php if ($wp_query->max_num_pages > 1) sith_pagenavi(); ?>
    </div>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
