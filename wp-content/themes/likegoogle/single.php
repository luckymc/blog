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
  <?php while ( have_posts() ) : the_post(); ?>
  <?php $get_meta = get_post_custom($post->ID);		
			$post_width = $get_meta["sith_sidebar_pos"][0];
			if( $post_width == 'full' ) $content_width = 955;
		?>
  <?php //Above Post Banner
		if(  empty( $get_meta["sith_hide_above"][0] ) ){
			if( !empty( $get_meta["sith_banner_above"][0] ) ) echo '<div class="ads-post">' .htmlspecialchars_decode($get_meta["sith_banner_above"][0]) .'</div>';
			else sith_banner('banner_above' , '<div class="ads-post">' , '</div>' );
		}
		?>
  <article <?php if( !empty( $rv['review'] ) ) echo $rv['review']; post_class('container-posts ' .single_postformat); ?>>
    <?php get_template_part( 'includes/single-head' ); ?>
    <div class="post-inner">
      <h1 class="name post-title" itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing">
        <?php the_title(); ?>
      </h1>
      <?php get_template_part( 'includes/single-meta' ); ?>
      <div class="entry">
        <?php if( ( sith_get_option( 'share_post_top' ) &&  empty( $get_meta["sith_hide_share"][0] ) ) || $get_meta["sith_hide_share"][0] == 'no' ) get_template_part( 'includes/single-share' ); // Get Share Button template ?>
        <?php if( !empty( $review_position ) && ( $review_position == 'top' || $review_position == 'both'  ) ) echo sith_get_review('review-top'); ?>
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( $lang_pages ), 'after' => '</div>' ) ); ?>
        <?php if( !empty( $review_position ) && ( $review_position == 'bottom' || $review_position == 'both' ) ) echo sith_get_review('review-bottom'); ?>
        <?php if( sith_get_option( 'post_tags' ) ) the_tags( '<p class="post-tag">'.__( $lang_tags. ': ' )  ,', ', '</p>'); ?>
        <?php edit_post_link( __( $lang_edit ), '<span class="edit-link">', '</span>' ); ?>
      </div>
      <!-- .entry /-->
      <?php the_tags( '<span style="display:none">',' ', '</span>'); ?>
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
      <?php if( ( sith_get_option( 'share_post' ) &&  empty( $get_meta["sith_hide_share"][0] ) ) || $get_meta["sith_hide_share"][0] == 'no' ) get_template_part( 'includes/single-share' ); // Get Share Button template ?>
    </div>
    <!-- .post-inner --> 
  </article>
  <!-- .container-posts -->
  <?php //Below Post Banner
		if( empty( $get_meta["sith_hide_below"][0] ) ){
			if( !empty( $get_meta["sith_banner_below"][0] ) ) echo '<div class="ads-post">' .htmlspecialchars_decode($get_meta["sith_banner_below"][0]) .'</div>';
			else sith_banner('banner_below' , '<div class="ads-post">' , '</div>' );
		}
		?>
  <?php get_template_part( 'includes/single-author' ); ?>
  <?php get_template_part( 'includes/single-related' ); ?>
  <?php endwhile;?>
  <?php comments_template( '', true ); ?>
  <?php if( sith_get_option( 'post_nav' ) ): ?>
  <div id="fnp-nav">
    <div class="fnp-previous">
      <?php previous_post_link( '%link', '<div class="fnp-box-left"><div class="fnp-content-left"><div class="fnp-content-border"></div><div class="fnp-nav-title">'. __($lang_previous_article).'</div><div class="fnp-nav-link">%title</div></div></div>' ); ?>
    </div>
    <div class="fnp-next">
      <?php next_post_link( '%link', '<div class="fnp-box-right"><div class="fnp-content-right"><div class="fnp-content-border"></div><div class="fnp-nav-title">'. __($lang_next_article).'</div><div class="fnp-nav-link">%title</div></div></div>' ); ?>
    </div>
  </div>
  <?php endif; ?>
</div>
<!-- .content -->
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
