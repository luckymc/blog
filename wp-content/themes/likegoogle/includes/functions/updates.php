<?php

if( is_admin() ){
	if( get_option('sith_active') < 3 ){
		$old_options  = array(
			"sith_logo_setting",
			"sith_logo",
			"sith_favicon",
			"sith_breadcrumbs",
			"sith_breadcrumbs_delimiter",
			"sith_css",
			"sith_header_code",
			"sith_footer_code",
			"sith_sidebar_pos",
			"sith_display_homepage",
			"sith_home_layout",
			"sith_post_authorbio",
			"sith_post_nav",
			"sith_post_meta",
			"sith_post_author",
			"sith_post_date",
			"sith_post_cats",
			"sith_post_comments",
			"sith_post_tags",
			"sith_share_post",
			"sith_share_tweet",
			"sith_share_twitter_username",
			"sith_share_facebook",
			"sith_share_google",
			"sith_share_linkdin",
			"sith_share_stumble",
			"sith_share_pinterest",
			"sith_related",
			"sith_related_number",
			"sith_related_query",
			"sith_footer_top",
			"sith_footer_social",
			"sith_footer_widgets",
			"sith_footer_text",
			"sith_footer_two",
			"sith_share_buttons",
			"sith_archives_social",
			"sith_blog_display",
			"sith_category_desc",
			"sith_category_rss",
			"sith_tag_rss",
			"sith_author_bio",
			"sith_author_rss",
			"sith_search_cats",
			"sith_search_exclude_pages",
			"sith_sidebar_home",
			"sith_sidebar_page",
			"sith_sidebar_post",
			"sith_sidebar_archive",
			"sith_banner_top",
			"sith_banner_top_img",
			"sith_banner_top_url",
			"sith_banner_top_alt",
			"sith_banner_top_tab",
			"sith_banner_top_adsense",
			"sith_notify_theme",
			"sith_dashboard_logo",
			"sith_global_color",
			"sith_links_color",
			"sith_links_decoration",
			"sith_links_color_hover",
			"sith_links_decoration_hover",
			"sith_topbar_links_color",
			"sith_topbar_links_color_hover",
			"sith_todaydate_background",
			"sith_todaydate_color",
			"sith_breaking_title_bg",
			"sith_footer_title_color",
			"sith_footer_links_color",
			"sith_footer_links_color_hover",
			"sith_breaking_cat",
			"sith_sidebars",
			"sith_social",
			"sith_home_tabs",
			"sith_background",
			"sith_topbar_background",
			"sith_header_background",
			"sith_footer_background",
		);
		
		$current_options = array();
		foreach( $old_options as $option ){
			if( get_option( $option ) ){
				$new_option = preg_replace('/sith_/', '' , $option);
				if( $option == 'sith_home_tabs' ){
					$sith_home_tabs = explode (',' , get_option( $option ) );
					$current_options[$new_option] = $sith_home_tabs  ;
				}else{			
					$current_options[$new_option] =  get_option( $option ) ;
				}
				update_option( 'sith_options' , $current_options );
				delete_option($option);
			}
		}
		update_option( 'sith_active' , 3 );
		echo '<script>location.reload();</script>';
		die;
	}
	
					
	if( get_option('sith_active') < 4 ){
		$categories_obj = get_categories('hide_empty=0');
		foreach ($categories_obj as $pn_cat) {
			$category_id = $pn_cat->cat_ID;
			
			$cat_sidebar = sith_get_option( 'sidebar_cat_'.$category_id );
			$cat_slider  = sith_get_option( 'slider_cat_'.$category_id  );
			$cat_bg 	 = sith_get_option( 'cat'.$category_id.'_background' );
			$cat_full_bg = sith_get_option( 'cat'.$category_id.'_background_full' );
			$cat_color   = sith_get_option( 'cat_'.$category_id.'_color' );
			
			$new_cat = array();
			$new_cat['cat_sidebar'] =  $cat_sidebar;
			$new_cat['cat_slider']  = $cat_slider;
			$new_cat['cat_color'] = $cat_color;
			$new_cat['cat_background'] = $cat_bg;
			$new_cat['cat_background_full'] = $cat_full_bg;
			
			update_option( "sith_cat_".$category_id , $new_cat );
		}


		$theme_options = get_option( 'sith_options' );
		
		$theme_options['post_og_cards'] = false;
		$theme_options['slider_caption'] = false;
		$theme_options['slider'] = true;
		$theme_options['slider_caption_length'] = 100;

		$theme_options['box_meta_score'] 	= true;
		$theme_options['box_meta_date'] 	= true;
		$theme_options['box_meta_comments'] = true;
		
		
		$theme_options['arc_meta_date'] 	= true;
		$theme_options['arc_meta_comments'] = true;
		
		$theme_options['modern_scrollbar']  = true;
		
		$theme_options['theme_skin'] = 'default';
		$theme_options['header_position'] = 'header_pos_default';
		$theme_options['logo_setting'] = 'logo';
		$theme_options['logo_margin'] = 0;
		$theme_options['header_search'] = 		false;
		$theme_options['header_social_icons'] = 		false;
		$theme_options['breadcrumbs'] = 		true;
		$theme_options['breadcrumbs_delimiter'] = 		'»';
		$theme_options['sidebar_pos'] = 		'right';
		$theme_options['post_title_position'] = 		false;
		$theme_options['home_layout'] = 		'li';
		$theme_options['home_posts_template'] = 		'loop-excerpt';
		$theme_options['post_excerpt_thumbnail'] = 		'thumbnail';
		$theme_options['home_exc_length'] = 		'15';
		$theme_options['excerpt_limit'] = '200';
		$theme_options['title_limit'] = '128';
		$theme_options['post_og_cards'] =		true;
		$theme_options['post_authorbio'] = 		false;
		$theme_options['post_nav'] = 		true;
		$theme_options['post_meta'] = 		true;
		$theme_options['post_author'] = 		true;
		$theme_options['post_date'] = 		true;
		$theme_options['post_cats'] = 		false;
		$theme_options['post_comments'] = 		true;
		$theme_options['post_tags'] = 		true;
		$theme_options['share_post'] = 		true;
		$theme_options['share_tweet'] = 		true;
		$theme_options['share_facebook'] = 		true;
		$theme_options['share_google'] = 		true;
		$theme_options['share_linkdin'] = 		false;
		$theme_options['share_stumble'] = 		false;
		$theme_options['share_pinterest'] = 		false;
		$theme_options['related'] = 		true;
		$theme_options['related_number'] = 		'3';
		$theme_options['related_query'] = 		'category';
		$theme_options['footer_social'] = 		true;
		$theme_options['footer_widgets'] = 		'footer-3c';
		$theme_options['footer_text'] = 		'&#169; 2014 - All Rights Reserved - Powered by <a href="http://www.wordpress.com">WordPress</a> | Designed by <a href="http://www.themenovum.com" target="_blank">ThemeNovum</a>';
		$theme_options['author_bio'] = 		true;
		$theme_options['notify_theme'] = 		true;
		$theme_options['post_og_cards'] =		true;
		$theme_options['box_meta_score'] =		true;
		$theme_options['box_meta_date'] =		true;
		$theme_options['box_meta_comments'] =		true;
		$theme_options['arc_meta_date'] =		true;
		$theme_options['arc_meta_comments'] =		true;


		update_option( 'sith_options' , $theme_options );


		update_option( 'sith_active' , 4.1 );
		echo '<script>location.reload();</script>';
		die;
	}
}

?>