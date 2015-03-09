<?php get_header(); ?>
<?php
if( sith_get_option( 'posts_display') != 'posts_content'): 
$layout_style_post = 'loop-full-content';
endif;
?>
<div class="<?php echo $layout_style_post ?> custom-container">
	<div class="content">
		
		
		<?php if ( have_posts() ): the_post(); ?>
		<div class="page-head">

			<h2 class="page-title">
				<?php echo lang_author_archives;?>: <?php printf( get_the_author()) ?>
			</h2>
 
			<?php endif; ?>
		</div><!-- .page-head /-->
   <div class="page-header-bar"></div>

 <div class="entry">
 
				<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<div class="author-description"><?php the_author_meta( 'description' ); ?></div>
				<?php endif; ?> 
                </div>
                
                 <div class="post-inner">
		<?php
			rewind_posts();
			get_template_part( 'loop');
		?>

</div>
		<?php if ($wp_query->max_num_pages > 1) sith_pagenavi(); ?>			
	
	</div>
	<?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>