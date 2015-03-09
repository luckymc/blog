<?php

global $get_meta , $post;

if( ( sith_get_option('related') && empty( $get_meta["sith_hide_related"][0] ) ) || ( isset( $get_meta["sith_hide_related"][0] ) && $get_meta["sith_hide_related"][0] == 'no' ) ):
	$related_no = sith_get_option('related_number') ? sith_get_option('related_number') : 3;
	
	global $post;
	$orig_post = $post;
	
	$query_type = sith_get_option('related_query') ;
	if( $query_type == 'author' ){
		$args=array('post__not_in' => array($post->ID),'posts_per_page'=> $related_no , 'author'=> get_the_author_meta( 'ID' ), 'no_found_rows' => 1 );
	}elseif( $query_type == 'tag' ){
		$tags = wp_get_post_tags($post->ID);
		$tags_ids = array();
		foreach($tags as $individual_tag) $tags_ids[] = $individual_tag->term_id;
		$args=array('post__not_in' => array($post->ID),'posts_per_page'=> $related_no , 'tag__in'=> $tags_ids, 'no_found_rows' => 1  );
	}
	else{
		$categories = get_the_category($post->ID);
		$category_ids = array();
		foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		$args=array('post__not_in' => array($post->ID),'posts_per_page'=> $related_no , 'category__in'=> $category_ids, 'no_found_rows' => 1 );
	}		
	$related_query = new wp_query( $args );
	if( $related_query->have_posts() ) : $count=0;?>
	<section id="related_posts" class="box-layout">
		<div class="box-layout-title">
<h2><?php echo lang_related_posts ?></h2>
		</div>
 
		<div class="container-posts box-layout-content">
			<?php while ( $related_query->have_posts() ) : $related_query->the_post()?>
			<?php //sith_post_class('related-item'); ?>
	<?php get_template_part('loop-excerpt'); ?>
			<?php endwhile;?>
			<div class="clear"></div>
		</div>
	</section>
	<?php	endif;
	$post = $orig_post;
	wp_reset_query();
endif; ?>