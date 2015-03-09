<aside id="sidebar">
<?php
	wp_reset_query();
	if ( is_home() ){
	
		$sidebar_home = sith_get_option( 'sidebar_home' );
		if( $sidebar_home )
			dynamic_sidebar ( sanitize_title( $sidebar_home ) ); 
			
		else dynamic_sidebar( 'primary-widget-area' );	
		
	}elseif( is_page() ){
		global $get_meta;
		$sith_sidebar_pos = $get_meta["sith_sidebar_pos"][0];

		if( $sith_sidebar_pos != 'full' ){
			$sith_sidebar_post = sanitize_title($get_meta["sith_sidebar_post"][0]);
			$sidebar_page = sith_get_option( 'sidebar_page' );
			if( $sith_sidebar_post )
				dynamic_sidebar($sith_sidebar_post);
				
			elseif( $sidebar_page )
				dynamic_sidebar ( sanitize_title( $sidebar_page ) ); 
			
			else dynamic_sidebar( 'primary-widget-area' );
		}

	}elseif ( is_single() ){
		global $get_meta;
		$sith_sidebar_pos = $get_meta["sith_sidebar_pos"][0];

		if( $sith_sidebar_pos != 'full' ){
			$sith_sidebar_post = sanitize_title($get_meta["sith_sidebar_post"][0]);
			$sidebar_post = sith_get_option( 'sidebar_post' );
			if( $sith_sidebar_post )
				dynamic_sidebar($sith_sidebar_post);
				
			elseif( $sidebar_post )
				dynamic_sidebar ( sanitize_title( $sidebar_post ) ); 
			
			else dynamic_sidebar( 'primary-widget-area' );
		}
		
	}elseif ( is_category() ){
		
		$category_id = get_query_var('cat') ;
		$cat_sidebar = sith_get_option( 'sidebar_cat_'.$category_id ) ;
		$sidebar_archive = sith_get_option( 'sidebar_archive' );

		if( $cat_sidebar )
			dynamic_sidebar ( sanitize_title( $cat_sidebar ) ); 
			
		elseif( $sidebar_archive )
			dynamic_sidebar ( sanitize_title( $sidebar_archive ) );
			
		else dynamic_sidebar( 'primary-widget-area' );
		
	}else{
		$sidebar_archive = sith_get_option( 'sidebar_archive' );
		if( $sidebar_archive ){
			dynamic_sidebar ( sanitize_title( $sidebar_archive ) );
		}
		else dynamic_sidebar( 'primary-widget-area' );
	}
?>
</aside>