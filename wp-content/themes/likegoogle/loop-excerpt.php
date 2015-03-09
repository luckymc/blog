<?php
$post_excerpt_thumbnail = 'thumbnail';
if( sith_get_option( 'post_excerpt_thumbnail' ) ):
$post_excerpt_thumbnail = sith_get_option( 'post_excerpt_thumbnail' );
endif;
$post_image_control = ' post-control-';

$post_excerpt_limit = '200';
if( sith_get_option( 'excerpt_limit' ) ):
$post_excerpt_limit = sith_get_option( 'excerpt_limit' );
endif;
$post_title_limit = '128';
if( sith_get_option( 'title_limit' ) ):
$post_title_limit = sith_get_option( 'title_limit' );
endif;
if (sith_get_option( 'post_title_position' )):
$control_title_above = ' control-title-above';
endif;
?>

<div class="post-excerpt<?php echo $post_image_control, $post_excerpt_thumbnail?>">
  <article <?php sith_post_class('default-loop-post'); ?>>
    <?php if( !sith_get_option( 'post_title_position' ) );
else {
?>
    <h2 class="entry-loop-title<?php echo $control_title_above ?>"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'sith' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
      <?php if (strlen($post->post_title) > $post_title_limit) {
echo substr(the_title($before = '', $after = '', FALSE), 0, $post_title_limit) . '...'; } else {
the_title();
} ?>
      </a></h2>
    <?php get_template_part( 'includes/archives-meta' ); ?>
    <?php };?>
    <?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) : ?>
    <div class="post-thumbnail left"> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'sith' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
      <?php the_post_thumbnail('thumbnail-150x150');  ?>
      </a> </div>
    <!-- post-thumbnail /-->
    <?php endif; ?>
    <?php if( sith_get_option( 'post_title_position' ) );
else {
?>
    <h2 class="entry-loop-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'sith' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
      <?php if (strlen($post->post_title) > $post_title_limit) {
echo substr(the_title($before = '', $after = '', FALSE), 0, $post_title_limit) . '...'; } else {
the_title();
} ?>
      </a></h2>
    <?php };?>
    <div class="entry post-description-summary entry-loop-excerpt<?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) : ?> excerpt-space<?php endif; ?>">
      <?php if( sith_get_option( 'post_title_position' ) );
else {
?>
      <?php get_template_part( 'includes/archives-meta' ); ?>
      <?php };?>
      <p> <?php echo sith_content_limit( get_the_excerpt() , $post_excerpt_limit ) ?> </p>
    </div>
    <?php if( sith_get_option( 'archives_social' ) ) get_template_part( 'includes/single-share' );  // Get Share Button template ?>
    <div class="clear"></div>
  </article>
  <!-- .default-loop-post --> 
</div>
