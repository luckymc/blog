<div class="post-full-content">
<article <?php sith_post_class('default-loop-post'); ?>>
        <h2 class="post-box-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'sith' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
      <?php the_title(); ?>
      </a></h2>
      <?php get_template_part( 'includes/archives-meta' ); ?>
    <div class="entry">
      <?php the_content() ?>
    </div>
</article>
</div>