<?php

/**
 * The template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to sith_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">
<?php //echo $nopassword ?>
	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
    <div class="page-head" style="margin-bottom:0px !important">
		<h4 id="page-title">
			<?php
			/*	printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'sith' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );*/
			?>
<span><?php comments_popup_link( __(lang_leave_a_comment), __( lang_one_comment), __('% '.lang_comments) ); ?></span>
		</h4>
        </div>
        <div class="page-header-bar"></div>
        <div class="widget" style="padding:10px; background:#fff">

		<ol class="commentlist">
			<?php //wp_list_comments( array( 'callback' => 'sith_comment', 'style' => 'ol' ) ); ?>
            <?php wp_list_comments('type=comment&callback=custom_comments'); ?>
		</ol><!-- .commentlist -->
</div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span>' .$lang_previous_comment ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( '<span class="meta-nav">&rarr;</span>' .$lang_next_comment) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><h1><center><?php echo lang_nocomments; ?></center></h1></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>

</div><!-- #comments .comments-area -->