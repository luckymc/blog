<?php
$themename = "LikeGoogle";
$themeurl = "http://themenovum.com/demo/likegoogle";
$themeauthor = "ThemeNovum";
$themeauthorurl = "http://themenovum.com";
$themefolder = "likegoogle";
$themeversion = "1.0.0";

define ('theme_name', $themename );
define ('theme_folder', $themefolder );
define ('theme_author', $themeauthor );
define ('theme_authorurl', $themeauthorurl );
define ('theme_ver' , $themeversion );
define ('theme_url' , $themeurl );

if ( ! isset( $content_width ) ) $content_width = 408;

// Notifier Info
$theme_notifier_name = $themename;
$theme_notifier_url = "http://themenovum.com/updates/".$themefolder.".xml";

//Docs Url
$theme_documentation = "http://themenovum.com/docs/".$themefolder;
define ('theme_docs', $theme_documentation );

// Constants for the theme name, folder and remote XML url
define( 'SILICONTHEMES_NOTIFIER_THEME_NAME', $themename );
define( 'SILICONTHEMES_NOTIFIER_THEME_FOLDER_NAME', $themefolder );
define( 'SILICONTHEMES_NOTIFIER_XML_FILE', $theme_notifier_url );
define( 'SILICONTHEMES_NOTIFIER_CACHE_INTERVAL', 43200 );

include (TEMPLATEPATH . '/includes/functions/odd-even.php');
include (TEMPLATEPATH . '/includes/functions/subcat-no.php');
include (TEMPLATEPATH . '/includes/functions/title-limit.php');

// Custom Functions 
include (TEMPLATEPATH . '/custom-functions.php');

// Get Functions
include (TEMPLATEPATH . '/includes/functions/theme-functions.php');
include (TEMPLATEPATH . '/header-styles-scripts.php');
include (TEMPLATEPATH . '/includes/functions/banners.php');
include (TEMPLATEPATH . '/includes/functions/widgetize-theme.php');
include (TEMPLATEPATH . '/theme-options/theme-options-default-options.php');
include (TEMPLATEPATH . '/includes/functions/updates.php');
include (TEMPLATEPATH . '/includes/pagenavi.php');
include (TEMPLATEPATH . '/includes/breadcrumbs.php');
include (TEMPLATEPATH . '/includes/wp_list_comments.php');
include (TEMPLATEPATH . '/includes/widgets.php');

// Theme Options
if (is_admin()) {
	include (TEMPLATEPATH . '/theme-options/theme-options-ui.php');
	include (TEMPLATEPATH . '/theme-options/theme-options-functions.php');
	include (TEMPLATEPATH . '/theme-options/custom-post-options.php');
	include (TEMPLATEPATH . '/includes/functions/update-notifier.php');
	
	
}
/*-----------------------------------------------------------------------------------*/
# Custom Admin Bar Menus
/*-----------------------------------------------------------------------------------*/
function sith_admin_bar() {
	global $wp_admin_bar;
	
	if ( current_user_can( 'switch_themes' ) ){
		$wp_admin_bar->add_menu( array(
			'parent' => 0,
			'id' => 'theme-options_page',
			'title' => 'Theme Options',
			'href' => admin_url( 'admin.php?page=themeoptions')
		) );
	}
	
}
add_action( 'wp_before_admin_bar_render', 'sith_admin_bar' );

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {

	if( !get_option('sith_active') ){
		sith_save_settings( $default_data );
		update_option( 'sith_active' , theme_ver );
	}
}

include (TEMPLATEPATH . '/includes/functions/translations.php');
?>