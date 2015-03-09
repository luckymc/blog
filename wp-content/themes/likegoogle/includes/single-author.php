		<?php  if( ( sith_get_option( 'post_authorbio' ) && empty( $get_meta["sith_hide_author"][0] ) ) || ( isset( $get_meta["sith_hide_related"][0] ) && $get_meta["sith_hide_author"][0] == 'no' ) ): ?>		
		<section id="author-box" class="box-layout">
			<div class="box-layout-title">
				<h2><?php echo lang_about; ?> <?php the_author() ?> </h2>
			</div>
			<div class="container-posts box-layout-content">
				<?php sith_author_box() ?>
			</div>
		</section><!-- #author-box -->
		<?php endif; ?>