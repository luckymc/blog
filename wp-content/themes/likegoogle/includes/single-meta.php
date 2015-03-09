<?php

global $get_meta;
if( ( sith_get_option( 'post_meta' ) && empty( $get_meta["sith_hide_meta"][0] ) ) || $get_meta["sith_hide_meta"][0] == 'no' ): ?>		
<p class="single-meta">
<?php if( sith_get_option( 'post_author' ) ): ?>		
	<span><?php echo lang_posted_by; ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php echo lang_view_all_posts_by; sprintf( esc_attr__( '%s', 'sith' ), get_the_author() ) ?>"> <?php echo get_the_author() ?></a></span>
<?php endif; ?>	
<?php if( sith_get_option( 'post_date' ) && sith_get_option( 'time_format' ) != 'none' ): ?>		
 <?php //echo lang_on; ?>  <span class="date"><?php echo get_the_time(get_option('date_format')); ?></span> 
<?php endif; ?>	
<?php if( sith_get_option( 'post_cats' ) ): ?>
	<span class="pm-categories"><?php   $i = 0;
      foreach((get_the_category()) as $cat) {
        echo '<a href="'.get_category_link($cat->cat_ID).'">' . $cat->cat_name . '</a>';
        if (++$i == 1) break;
      }  ?></span>
<?php endif; ?>	
<?php if( sith_get_option( 'post_comments' ) ): ?>
<span class="pm-comments"><?php comments_popup_link( __(lang_leave_a_comment), __( lang_one_comment), __('% '.lang_comments) ); ?></span>
<?php endif; ?>
<?php edit_post_link( __( $lang_edit ), '<span class="right">', '</span>' ); ?>
</p>
<div class="clear"></div>
<?php endif; ?>