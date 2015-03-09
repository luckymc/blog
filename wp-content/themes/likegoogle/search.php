<?php get_header(); ?>
<?php
if( sith_get_option( 'posts_display') != 'posts_content'): 
$layout_style_post = 'loop-full-content';
endif;
?>
 
<div class="<?php echo $layout_style_post ?> custom-container">
	<div class="content">

		<div class="page-head">
			<h2 class="page-title">
				<?php if ( have_posts() ) : ?>
				<?php echo lang_search_results_for, ': <span>' . get_search_query() . '</span>' ; ?>
				<?php else : ?>
				<?php echo lang_not_found; ?>
				<?php endif; ?>
			</h2>
			
		</div>
          <div class="page-header-bar"></div>
  <div class="post-inner">
		
		<?php if ( have_posts() ) : ?>
			<?php get_template_part( 'loop', 'search' );	?>
			<?php if ($wp_query->max_num_pages > 1) sith_pagenavi(); ?>
		<?php else : ?>
         <div class="post-inner">
			<div id="post-0" class="post not-found container-posts" style=" background:#fff; border:1px solid #ddd">
				
					<p><?php echo lang_not_found_msg; ?></p>
				
			</div>
            </div>
		<?php endif; ?>
	</div>
    </div>
	<?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
