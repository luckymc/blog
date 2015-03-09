<?php
function custom_comments( $lang_comment, $args, $depth ) {
	$GLOBALS['comment'] = $lang_comment ;
	?>
	<li id="comment-<?php comment_ID(); ?>">
		<div  <?php comment_class('comment-wrap'); ?> >
			<div class="comment-avatar"><?php echo get_avatar( $lang_comment, 45 ); ?></div>
			<div class="author-comment">
				<?php printf( __( '%s ', 'sith' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $lang_comment->comment_ID ) ); ?>">	<?php printf( __( '%1$s at %2$s', 'sith' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'sith' ), ' ' ); ?></div><!-- .comment-meta .commentmetadata -->
			</div>
			<div class="clear"></div>
			<div class="comment-content">
				<?php if ( $lang_comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'sith' ); ?></em>
					<br />
				<?php endif; ?>
					
				<?php comment_text(); ?>
			</div>
			<div class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div><!-- .reply -->
		</div><!-- #comment-##  -->

	<?php
}

function custom_pings($lang_comment, $args, $depth) {
    $GLOBALS['comment'] = $lang_comment; ?>
	<li class="comment pingback">
		<p><?php _e( 'Pingback:', 'sith' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'sith' ), ' ' ); ?></p>
<?php	
}
?>