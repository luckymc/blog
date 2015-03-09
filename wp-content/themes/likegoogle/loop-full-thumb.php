<?php 
$size2c = 'thumbnail-420x236';
if(sith_get_option( 'full_home_nosidebar' ) ){
$size2c = 'thumbnail-850x478';
}
?>

<div class="post-full-thumb">
  <article <?php sith_post_class(''); ?>>
    <?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) : ?>
    <div class="post-thumbnail"> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'sith' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
      <?php sith_thumb($size2c); ?>
      </a> </div>
    <?php endif; ?>
    <?php
	if ( has_post_thumbnail() )
	;
	
	else
 
echo ' <div><a href="'.$permalink = get_permalink( $id ).'" title="" rel="bookmark"><img src="' . get_bloginfo( 'template_directory' ) . '/images/default-thumbnail-img.png"/></a></div>';
?>
    <h2 class="post-box-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'sith' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
      <?php the_title(); ?>
      </a></h2>
    <?php get_template_part( 'includes/archives-meta' ); ?>
    <div class="entry">
      <p>
        <?php sith_excerpt() ?>
        <a class="more-link" href="<?php the_permalink() ?>"> <?php echo lang_continue_reading; ?> </a></p>
    </div>
    <?php if( sith_get_option( 'archives_social' ) ) get_template_part( 'includes/single-share' );  // Get Share Button template ?>
    <div class="clear"></div>
  </article>
  <!-- .default-loop-post --> 
</div>
