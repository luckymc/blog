<?php get_header(); ?>

<div class="content">
  <div class="page-head">
    <h1 class="page-title"> <?php printf( __( 'Tag Archives: %s', 'sith' ), '<span>' . single_tag_title( '', false ) . '</span>' );	?> </h1>
  </div>
  <div class="page-header-bar"></div>
  <div class="post-inner">
    <?php get_template_part( 'loop');	?>
  </div>
  <?php if ($wp_query->max_num_pages > 1) sith_pagenavi(); ?>
</div>
<!-- .content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
