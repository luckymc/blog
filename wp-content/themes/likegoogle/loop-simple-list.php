
<div class="post-simple-list">
<article <?php post_class('default-loop-post'); ?>>
    <h2 class="post-box-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'sith' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
      <?php the_title(); ?>
      </a></h2>
    <div class="clear"></div>
  </article>
<!-- .default-loop-post -->
</div>