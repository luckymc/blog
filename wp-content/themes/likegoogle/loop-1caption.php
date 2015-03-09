<?php 
$sidebar_cat_position = get_query_var('cat') ;  
$size2c = 'thumbnail-850x478';
if(sith_get_option( 'sidebar_position_'.$sidebar_cat_position) != 'home-full-layout-nosidebar'): 
$size2c = 'thumbnail-850x478';
else :
endif;
$post_caption_excerpt_limit = '50';
if( sith_get_option( 'post_caption_excerpt_limit' ) ):
$post_caption_excerpt_limit = sith_get_option( 'post_caption_excerpt_limit' );
endif;
$post_caption_title_limit = '128';
if( sith_get_option( 'post_caption_title_limit' ) ):
$post_caption_title_limit = sith_get_option( 'post_caption_title_limit' );
endif;
?>
<div class="box-w-caption">
<div class="post-1caption post-default-loop-caption">
  <article <?php sith_post_class('post-loop-caption');?>>
    <div> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'sith' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
      <?php sith_thumb( $size2c ); ?>
      </a>
      <?php
	if ( has_post_thumbnail() )
	;
	
	else
 
echo '<div><a href="'.$permalink = get_permalink( $id ).'" title="" rel="bookmark"><img src="' . get_bloginfo( 'template_directory' ) . '/images/default-thumbnail-img.png"/></a></div>';
?>
      <div class="post-caption">
        <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'sith' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
               <?php if (strlen($post->post_title) > $post_caption_title_limit) {
echo substr(the_title($before = '', $after = '', FALSE), 0, $post_caption_title_limit) . '...'; } else {
the_title();
} ?>
          </a> </h2>
<?php if( sith_get_option( 'disable_box_excerpt' ) );
else {
?><p><?php echo sith_content_limit( get_the_excerpt() , $post_caption_excerpt_limit ) ?></p>
<?php };?>
      </div>
    </div>
  </article>
  <!-- .default-loop-post --> 
</div>
</div>