<?php get_header(); ?>

<div class="custom-container<?php echo post_sidebar_pos //Extremely important ?>">
  <div class="content">
    <?php if ( ! have_posts() ) : ?>
    <div id="post-0" class="post not-found container-posts">
      <h1 class="post-title"><?php echo lang_not_found; ?></h1>
      <div class="entry">
        <p><?php echo lang_not_found_msg; ?></p>
        <?php get_search_form(); ?>
      </div>
    </div>
    <?php endif; ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php
			if( function_exists('bp_current_component') && bp_current_component() ) $current_id = get_queried_object_id();
			else $current_id = $post->ID;
			$get_meta = get_post_custom( $current_id );			
			$post_width = $get_meta["sith_sidebar_pos"][0];
			if( $post_width == 'full' ) $content_width = 955;
		?>
    <article <?php if( !empty( $rv['review'] ) ) echo $rv['review']; post_class('container-posts post'); ?>>
      <div class="page-head">
        <h1 class="page-title">
          <?php the_title(); ?>
        </h1>
      </div>
      <div class="page-header-bar"></div>
      <div class="post-inner">
        <div class="entry">
          <?php get_template_part( 'includes/single-head' ); ?>
          <?php if( !empty( $review_position ) && ( $review_position == 'top' || $review_position == 'both'  ) ) echo sith_get_review('review-top'); ?>
          <?php the_content(); ?>
          <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( $lang_pages ), 'after' => '</div>' ) ); ?>
          <?php if( !empty( $review_position ) && ( $review_position == 'bottom' || $review_position == 'both' ) ) echo sith_get_review('review-bottom'); ?>
          <?php edit_post_link( __( $lang_edit ), '<span class="edit-link">', '</span>' ); ?>
        </div>
        <!-- .entry /--> 
        <span style="display:none" class="updated">
        <?php the_time( 'Y-m-d' ); ?>
        </span>
        <?php if ( get_the_author_meta( 'google' ) ){ ?>
        <div style="display:none" class="vcard author" itemprop="author" itemscope itemtype="http://schema.org/Person"><strong class="fn" itemprop="name"><a href="<?php the_author_meta( 'google' ); ?>?rel=author">+<?php echo get_the_author(); ?></a></strong></div>
        <?php }else{ ?>
        <div style="display:none" class="vcard author" itemprop="author" itemscope itemtype="http://schema.org/Person"><strong class="fn" itemprop="name">
          <?php the_author_posts_link(); ?>
          </strong></div>
        <?php } ?>
      </div>
      <!-- .post-inner --> 
    </article>
    <!-- .container-posts -->
    <?php endwhile; ?>
    <?php if( !function_exists('bp_current_component') || (function_exists('bp_current_component') && !bp_current_component() ) )  comments_template( '', true );  ?>
  </div>
  <!-- .content -->
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
