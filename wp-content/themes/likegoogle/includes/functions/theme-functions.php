<?php

/*-----------------------------------------------------------------------------------*/
# Get Theme Options
/*-----------------------------------------------------------------------------------*/
function sith_get_option( $name ) {
	$get_options = get_option( 'sith_options' );
	
	if( !empty( $get_options[$name] ))
		return $get_options[$name];
		
	return false ;
}

/*-----------------------------------------------------------------------------------*/
# Setup Theme
/*-----------------------------------------------------------------------------------*/
add_action( 'after_setup_theme', 'sith_setup' );
function sith_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' ); // Add theme support for WooCommerce plugin .

	add_filter( 'enable_post_format_ui', '__return_false' );

	load_theme_textdomain( 'sith', get_template_directory() . '/languages' );

	register_nav_menus( array(
		'top-menu' => __( 'Top Header Menu', 'sith' ),
		'main-menu' => __( 'Main Menu', 'sith' )

	) );
	
}
function sith_fallback_pages() {
	$args    = array(
	//'walker'          => new UL_Class_Walker(),
		'depth'       => 0,
		'sort_column' => 'menu_order, post_title',
		'menu_class'  => '',
		'include'     => '',
		'exclude'     => '',
		'echo'        => false,
		'show_home'   => true,
		'link_before' => '',
		'link_after'  => ''
	);
	$pages   = wp_page_menu( $args );
	$prepend = '<div class="teste">';
	$append  = '</div>';
	$output  = $prepend . $pages . $append;
	echo $output;
}
/*-----------------------------------------------------------------------------------*/
# Post Thumbinals
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) ) 
	add_theme_support( 'post-thumbnails' );


if ( function_exists( 'add_image_size' )){
	add_image_size( 'thumbnail-55x55', 55, 55, true );
	add_image_size( 'thumbnail-150x150', 150, 150, true );
	add_image_size( 'thumbnail-320x180', 320, 180, true );
	add_image_size( 'thumbnail-420x236', 420, 236, true );
	add_image_size( 'thumbnail-850x478', 850, 478, true );
}


/*-----------------------------------------------------------------------------------*/
# If the menu doesn't exist
/*-----------------------------------------------------------------------------------*/

function sith_nav_fallback(){

echo '<ul><li><a style="display:inline-block" href="'.home_url().'/wp-admin/nav-menus.php" title="'.lang_addmenu.'">'.__( lang_addmenu ).'</a></li></ul>';
}

function sith_nav_fallback_select(){

echo '<div class="fall-select"><li><a href="'.home_url().'/wp-admin/nav-menus.php" title="'.lang_addmenu.'">'.__( lang_addmenu ).'</a></li></div>';
}


/*-----------------------------------------------------------------------------------*/
# Mobile Menus
/*-----------------------------------------------------------------------------------*/
function sith_alternate_menu( $args = array() ) {			
	$output = '';
		
	@extract($args);						
			
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {	
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );						
		$menu_items = wp_get_nav_menu_items( $menu->term_id );				
		$output = "<select id='". $id. "'>";
		$output .= "<option value='' selected='selected'>" . __('Go to...', 'sith') . "</option>";
		foreach ( (array) $menu_items as $key => $menu_item ) {
		    $title = $menu_item->title;
		    $url = $menu_item->url;
				    
		    if ( $menu_item->menu_item_parent ) {
				$title = ' - ' . $title;
		    }
		    $output .= "<option value='" . $url . "'>" . $title . '</option>';
		}
		$output .= '</select>';
	}
	return $output;							
}
	
	
/*-----------------------------------------------------------------------------------*/
# Custom Dashboard login page logo
/*-----------------------------------------------------------------------------------*/
function sith_login_logo(){
	if( sith_get_option('dashboard_logo') )
    echo '<style  type="text/css"> .login h1 a {  background-image:url('.sith_get_option('dashboard_logo').')  !important; background-size: 274px 63px; width: 326px; height: 67px; } </style>';  
}  
add_action('login_head',  'sith_login_logo'); 

function sith_login_logo_url() {
   	 return sith_get_option('dashboard_logo_url');
}
if( sith_get_option('dashboard_logo_url') )
add_filter( 'login_headerurl', 'sith_login_logo_url' );

/*-----------------------------------------------------------------------------------*/
# Custom Gravatar
/*-----------------------------------------------------------------------------------*/
function sith_custom_gravatar ($avatar) {
	$sith_gravatar = sith_get_option( 'gravatar' );
	if($sith_gravatar){
		$custom_avatar = sith_get_option( 'gravatar' );
		$avatar[$custom_avatar] = "Custom Gravatar";
	}
	return $avatar;
}
add_filter( 'avatar_defaults', 'sith_custom_gravatar' ); 


/*-----------------------------------------------------------------------------------*/
# Custom Favicon
/*-----------------------------------------------------------------------------------*/
function sith_favicon() {
	$default_favicon = get_template_directory_uri()."/favicon.png";
	$custom_favicon = sith_get_option('favicon');
	$favicon = (empty($custom_favicon)) ? $default_favicon : $custom_favicon;
	echo '<link rel="shortcut icon" href="'.$favicon.'" title="Favicon" />';
}
add_action('wp_head', 'sith_favicon');


/*-----------------------------------------------------------------------------------*/
# Get Home Cats Boxes
/*-----------------------------------------------------------------------------------*/
function sith_get_home_cats($cat_data){

	switch( $cat_data['type'] ){
	
		case 'n':
			get_home_cats( $cat_data );
			break;
			
		case 'box2':
			get_home_cats( $cat_data );
			break;
			
		case 'box3':
			get_home_cats( $cat_data );
			break;
		
		case 's':
			get_home_scroll( $cat_data );
			break;
			
		case 'news-pic':
			get_home_news_pic( $cat_data );
			break;
			
		case 'news-pic2':
			get_home_news_pic( $cat_data );
			break;
			
		case 'videos':
			get_home_news_videos( $cat_data );
			break;	
			
		case 'recent':
			get_home_recent( $cat_data );
			break;	
			
		case 'divider': ?>
<div class="divider" style="height:<?php if( !empty($cat_data['height']) ) echo $cat_data['height'] ?>px"></div>
<div class="clear"></div>
<?php
			break;
			
		case 'ads': ?>
<div class="home-ads">
  <?php if( !empty($cat_data['text']) ) echo do_shortcode( htmlspecialchars_decode(stripslashes ($cat_data['text']) )) ?>
</div>
<div class="clear"></div>
<?php
			break;
	}
}



/*-----------------------------------------------------------------------------------*/
# Exclude pages From Search
/*-----------------------------------------------------------------------------------*/
function sith_Search_Filter($query) {
	if( $query->is_search ){
		if ( sith_get_option( 'search_exclude_pages' ) && !is_admin() ){
			$post_types = get_post_types(array( 'public' => true, 'exclude_from_search' => false ));
			unset($post_types['page']);
			$query->set('post_type', $post_types );
		}
		if ( sith_get_option( 'search_cats' ))
			$query->set( 'cat', sith_get_option( 'search_cats' ) && !is_admin() );
	}
	return $query;
}
add_filter('pre_get_posts','sith_Search_Filter');


/*-----------------------------------------------------------------------------------*/
# Random article
/*-----------------------------------------------------------------------------------*/	
add_action('init', 'sith_random_post');
function sith_random_post(){
	if ( isset($_GET['silicontrand']) ){
$random = new WP_Query('orderby=rand&no_found_rows=1&showposts=1');
if ($random->have_posts()) {
	while ($random->have_posts()) : $random->the_post();
		$URL = get_permalink();
	endwhile; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Refresh" content="0; url=<?php echo $URL; ?>">
</head>
<body>
</body>
</html>
<?php }
		die;
	}
}


/*-----------------------------------------------------------------------------------*/
#Author Box
/*-----------------------------------------------------------------------------------*/
function sith_author_box($avatar = true , $social = true ){
	if( $avatar ) : ?>
<div class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'MFW_author_bio_avatar_size', 60 ) ); ?></div>
<!-- #author-avatar -->
<?php endif; ?>
<div class="author-description">
  <?php the_author_meta( 'description' ); ?>
</div>
<!-- #author-description -->
<?php  if( $social ) :	?>
<div class="author-social">
  <?php if ( get_the_author_meta( 'url' ) ) : ?>
  <a class="ttip" href="<?php the_author_meta( 'url' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( " 's site", 'sith' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author_site.png" width="18" height="18" alt="" /></a>
  <?php endif ?>
  <?php if ( get_the_author_meta( 'twitter' ) ) : ?>
  <a class="ttip" href="http://twitter.com/<?php the_author_meta( 'twitter' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( ' Twitter', 'sith' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author_twitter.png" width="18" height="18" alt="" /></a>
  <?php endif ?>
  <?php if ( get_the_author_meta( 'facebook' ) ) : ?>
  <a class="ttip" href="<?php the_author_meta( 'facebook' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( ' Facebook', 'sith' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author_facebook.png" width="18" height="18" alt="" /></a>
  <?php endif ?>
  <?php if ( get_the_author_meta( 'google' ) ) : ?>
  <a class="ttip" href="<?php the_author_meta( 'google' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( ' Google+', 'sith' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author_google.png" width="18" height="18" alt="" /></a>
  <?php endif ?>
  <?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
  <a class="ttip" href="<?php the_author_meta( 'linkedin' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( ' Linkedin', 'sith' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author_linkedin.png" width="18" height="18" alt="" /></a>
  <?php endif ?>
  <?php if ( get_the_author_meta( 'flickr' ) ) : ?>
  <a class="ttip" href="<?php the_author_meta( 'flickr' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( ' Flickr', 'sith' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author_flickr.png" width="18" height="18" alt="" /></a>
  <?php endif ?>
  <?php if ( get_the_author_meta( 'youtube' ) ) : ?>
  <a class="ttip" href="<?php the_author_meta( 'youtube' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( ' YouTube', 'sith' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author_youtube.png" width="18" height="18" alt="" /></a>
  <?php endif ?>
  <?php if ( get_the_author_meta( 'pinterest' ) ) : ?>
  <a class="ttip" href="<?php the_author_meta( 'pinterest' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( ' Pinterest', 'sith' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author_pinterest.png" width="18" height="18" alt="" /></a>
  <?php endif ?>
  <?php if ( get_the_author_meta( 'behance' ) ) : ?>
  <a class="ttip" href="<?php the_author_meta( 'behance' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( ' Behance', 'sith' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author_behance.png" width="18" height="18" alt="" /></a>
  <?php endif ?>
  <?php if ( get_the_author_meta( 'instagram' ) ) : ?>
  <a class="ttip" href="<?php the_author_meta( 'instagram' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( ' Instagram', 'sith' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/author_instagram.png" width="18" height="18" alt="" /></a>
  <?php endif ?>
</div>
<?php endif; ?>
<div class="clear"></div>
<?php
}

/*-----------------------------------------------------------------------------------*/
# Social 
/*-----------------------------------------------------------------------------------*/
function sith_get_social($newtab='yes', $icon_size='32', $tooltip='ttip'){
	$social = sith_get_option('social');
	@extract($social);
		
	if ($newtab == 'yes') $newtab = "target=\"_blank\"";
	else $newtab = '';
		
	$icons_path =  get_template_directory_uri().'/images/socialicons';
		
		?>
<div class="social-icons icon_<?php echo $icon_size; ?>">
  <?php
		// RSS
		if ( !sith_get_option('rss_icon') ){
		if ( sith_get_option('rss_url') != '' && sith_get_option('rss_url') != ' ' ) $rss = sith_get_option('rss_url') ;
		else $rss = get_bloginfo('rss2_url'); 
			?>
  <a class="<?php echo $tooltip; ?>" title="Rss" href="<?php echo $rss ; ?>" <?php echo $newtab; ?>><i class="sithicon-rss"></i></a>
  <?php 
		}
		// Google+
		if ( !empty($google_plus) && $google_plus != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Google+" href="<?php echo $google_plus; ?>" <?php echo $newtab; ?>><i class="sithicon-gplus"></i></a>
  <?php 
		}
		// Facebook
		if ( !empty($facebook) && $facebook != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Facebook" href="<?php echo $facebook; ?>" <?php echo $newtab; ?>><i class="sithicon-facebook"></i></a>
  <?php 
		}
		// Twitter
		if ( !empty($twitter) && $twitter != ' ') {
			?>
  <a class="<?php echo $tooltip; ?>" title="Twitter" href="<?php echo $twitter; ?>" <?php echo $newtab; ?>><i class="sithicon-twitter"></i></a>
  <?php
		}		
		// Pinterest
		if ( !empty($Pinterest) && $Pinterest != ' ') {
			?>
  <a class="<?php echo $tooltip; ?>" title="Pinterest" href="<?php echo $Pinterest; ?>" <?php echo $newtab; ?>><i class="sithicon-pinterest-circled"></i></a>
  <?php
		}
		// MySpace
		if ( !empty($myspace) && $myspace != ' ') {
			?>
  <a class="<?php echo $tooltip; ?>" title="MySpace" href="<?php echo $myspace; ?>" <?php echo $newtab; ?>><i class="sithicon-myspace"></i></a>
  <?php
		}
		// FriendFeed
		if ( !empty($friendfeed) && $friendfeed != ' ') {
			?>
  <a class="<?php echo $tooltip; ?>" title="FriendFeed" href="<?php echo $friendfeed; ?>" <?php echo $newtab; ?>><i class="sithicon-friendfeed"></i></a>
  <?php
		}
		// dribbble
		if ( !empty($dribbble) && $dribbble != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Dribbble" href="<?php echo $dribbble; ?>" <?php echo $newtab; ?>><i class="sithicon-dribbble"></i></a>
  <?php
		}
		// LinkedIN
		if ( !empty($linkedin) && $linkedin != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="LinkedIn" href="<?php echo $linkedin; ?>" <?php echo $newtab; ?>><i class="sithicon-linkedin"></i></a>
  <?php
		}
		// evernote
		if ( !empty($evernote) && $evernote != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Evernote" href="<?php echo $evernote; ?>" <?php echo $newtab; ?>><i class="sithicon-evernote"></i></a>
  <?php
		}
		// Flickr
		if ( !empty($flickr) && $flickr != ' ') {
			?>
  <a class="<?php echo $tooltip; ?>" title="Flickr" href="<?php echo $flickr; ?>" <?php echo $newtab; ?>><i class="sithicon-flickr"></i></a>
  <?php
		}
		// Picasa
		if ( !empty($picasa) && $picasa != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Picasa" href="<?php echo $picasa; ?>" <?php echo $newtab; ?>><i class="sithicon-picasa"></i></a>
  <?php
		}
		// YouTube
		if ( !empty($youtube) && $youtube != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Youtube" href="<?php echo $youtube; ?>" <?php echo $newtab; ?>><i class="sithicon-youtube"></i></a>
  <?php
		}
		// Skype
		if ( !empty($skype) && $skype != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Skype" href="<?php echo $skype; ?>" <?php echo $newtab; ?>><i class="sithicon-skype"></i></a>
  <?php
		}
		// Digg
		if ( !empty($digg) && $digg != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Digg" href="<?php echo $digg; ?>" <?php echo $newtab; ?>><i class="sithicon-digg"></i></a>
  <?php
		}
		// Reddit 
		if ( !empty($reddit) && $reddit != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Reddit" href="<?php echo $reddit; ?>" <?php echo $newtab; ?>><i class="sithicon-reddit"></i></a>
  <?php
		}
		// Delicious 
		if ( !empty($delicious) && $delicious != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Delicious" href="<?php echo $delicious; ?>" <?php echo $newtab; ?>><i class="sithicon-delicious"></i></a>
  <?php
		}
		// stumbleuponUpon 
		if ( !empty($stumbleupon) && $stumbleupon != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="StumbleUpon" href="<?php echo $stumbleupon; ?>" <?php echo $newtab; ?>><i class="sithicon-stumbleupon"></i></a>
  <?php
		}
		// Tumblr 
		if ( !empty($tumblr) && $tumblr != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Tumblr" href="<?php echo $tumblr; ?>" <?php echo $newtab; ?>><i class="sithicon-tumblr"></i></a>
  <?php
		}
		// Vimeo
		if ( !empty($vimeo) && $vimeo != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Vimeo" href="<?php echo $vimeo; ?>" <?php echo $newtab; ?>><i class="sithicon-vimeo"></i></a>
  <?php
		}
		// Blogger
		if ( !empty($blogger) && $blogger != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Blogger" href="<?php echo $blogger; ?>" <?php echo $newtab; ?>><i class="sithicon-blogger"></i></a>
  <?php
		}
		// Wordpress
		if ( !empty($wordpress) && $wordpress != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="WordPress" href="<?php echo $wordpress; ?>" <?php echo $newtab; ?>><i class="sithicon-wordpress"></i></a>
  <?php
		}
		// Yelp
		if ( !empty($yelp) && $yelp != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Yelp" href="<?php echo $yelp; ?>" <?php echo $newtab; ?>><i class="sithicon-yelp"></i></a>
  <?php
		}
		// Last.fm
		if ( !empty($lastfm) && $lastfm != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Last.fm" href="<?php echo $lastfm; ?>" <?php echo $newtab; ?>><i class="sithicon-lastfm"></i></a>
  <?php
		}
		// grooveshark
		if ( !empty($grooveshark) && $grooveshark != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Grooveshark" href="<?php echo $grooveshark; ?>" <?php echo $newtab; ?>><i class="sithicon-grooveshark"></i></a>
  <?php
		}
		// sharethis
		if ( !empty($sharethis) && $sharethis != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="ShareThis" href="<?php echo $sharethis; ?>" <?php echo $newtab; ?>><i class="sithicon-share"></i></a>
  <?php
		}
		// dropbox
		if ( !empty($dropbox) && $dropbox != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Dropbox" href="<?php echo $dropbox; ?>" <?php echo $newtab; ?>><i class="sithicon-dropbox"></i></a>
  <?php
		}
		// xing.me
		if ( !empty($xing) && $xing != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Xing" href="<?php echo $xing; ?>" <?php echo $newtab; ?>><i class="sithicon-xing"></i></a>
  <?php
		}
		// DeviantArt
		if ( !empty($deviantart) && $deviantart != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="DeviantArt" href="<?php echo $deviantart; ?>" <?php echo $newtab; ?>><i class="sithicon-deviantart"></i></a>
  <?php
		}
		// Apple
		if ( !empty($apple) && $apple != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Apple" href="<?php echo $apple; ?>" <?php echo $newtab; ?>><i class="sithicon-apple"></i></a>
  <?php
		}
		// foursquare
		if ( !empty($foursquare) && $foursquare != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Foursquare" href="<?php echo $foursquare; ?>" <?php echo $newtab; ?>><i class="sithicon-foursquare"></i></a>
  <?php
		}
		// github
		if ( !empty($github) && $github != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Github" href="<?php echo $github; ?>" <?php echo $newtab; ?>><i class="sithicon-github"></i></a>
  <?php
		}
		// soundcloud
		if ( !empty($soundcloud) && $soundcloud != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="SoundCloud" href="<?php echo $soundcloud; ?>" <?php echo $newtab; ?>><i class="sithicon-soundcloud"></i></a>
  <?php
		}		
		// behance
		if ( !empty( $behance ) && $behance != '' && $behance != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Behance" href="<?php echo $behance; ?>" <?php echo $newtab; ?>><i class="sithicon-behance"></i></a>
  <?php
		}
		// instagram
		if ( !empty( $instagram ) && $instagram != '' && $instagram != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="instagram" href="<?php echo $instagram; ?>" <?php echo $newtab; ?>><i class="sithicon-instagram"></i></a>
  <?php
		}
		// paypal
		if ( !empty( $paypal ) && $paypal != '' && $paypal != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="paypal" href="<?php echo $paypal; ?>" <?php echo $newtab; ?>><i class="sithicon-paypal"></i></a>
  <?php
		}
		// spotify
		if ( !empty( $spotify ) && $spotify != '' && $spotify != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="spotify" href="<?php echo $spotify; ?>" <?php echo $newtab; ?>><i class="sithicon-spotify"></i></a>
  <?php
		}
		// viadeo
		if ( !empty( $viadeo ) && $viadeo != '' && $viadeo != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="viadeo" href="<?php echo $viadeo; ?>" <?php echo $newtab; ?>><i class="sithicon-viadeo"></i></a>
  <?php
		}
		// Google Play
		if ( !empty( $google_play ) && $google_play != '' && $google_play != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Google Play" href="<?php echo $google_play; ?>" <?php echo $newtab; ?>><i class="sithicon-googleplay"></i></a>
  <?php
		}
		// 500PX
		if ( !empty($px500) && $px500 != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="500px" href="<?php echo $px500; ?>" <?php echo $newtab; ?>><i class="sithicon-fivehundredpx"></i></a>
  <?php
		}
		// Forrst
		if ( !empty($forrst) && $forrst != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="Forrst" href="<?php echo $forrst; ?>" <?php echo $newtab; ?>><i class="sithicon-forrst"></i></a>
  <?php
		}
		// VK
		if ( !empty($vk) && $vk != ' ' ) {
			?>
  <a class="<?php echo $tooltip; ?>" title="vk.com" href="<?php echo $vk; ?>" <?php echo $newtab; ?>><i class="sithicon-vkontakte"></i></a>
  <?php
		} ?>
</div>
<?php
}

/*-----------------------------------------------------------------------------------*/
# Change The Default WordPress Excerpt Length
/*-----------------------------------------------------------------------------------*/
function sith_excerpt_global_length( $length ) {
	if( sith_get_option( 'exc_length' ) )
		return sith_get_option( 'exc_length' );
	else return 60;
}

function sith_excerpt_home_length( $length ) {
	if( sith_get_option( 'home_exc_length' ) )
		return sith_get_option( 'home_exc_length' );
	else return 15;
}

function sith_excerpt(){
	add_filter( 'excerpt_length', 'sith_excerpt_global_length', 999 );
	echo get_the_excerpt();
}

function sith_excerpt_home(){
	add_filter( 'excerpt_length', 'sith_excerpt_home_length', 999 );
	echo get_the_excerpt();
}


/*-----------------------------------------------------------------------------------*/
# Read More Functions
/*-----------------------------------------------------------------------------------*/
function sith_remove_excerpt( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'sith_remove_excerpt');


/*-----------------------------------------------------------------------------------*/
# Page Navigation
/*-----------------------------------------------------------------------------------*/
function sith_pagenavi( $query = false, $num = false ){
	?>
<div class="pagination">
  <?php sith_get_pagenavi( $query, $num ) ?>
</div>
<?php
}

/*-----------------------------------------------------------------------------------*/
# Get Post Audio  
/*-----------------------------------------------------------------------------------*/
function sith_audio(){
	global $post;
	$get_meta = get_post_custom($post->ID);
	$mp3 = $get_meta["sith_audio_mp3"][0] ;
	$m4a = $get_meta["sith_audio_m4a"][0] ;
	$oga = $get_meta["sith_audio_oga"][0] ;
	echo do_shortcode('[audio mp3="'.$mp3.'" ogg="'.$oga.'" m4a="'.$m4a.'"]');
}

/*-----------------------------------------------------------------------------------*/
# Get Post Video  
/*-----------------------------------------------------------------------------------*/
function sith_video(){
 $wp_embed = new WP_Embed();
	global $post;
	$get_meta = get_post_custom($post->ID);
	if( !empty( $get_meta["sith_video_url"][0] ) ){
		$video_url = $get_meta["sith_video_url"][0];
		$video_url = str_replace ( 'https://', 'http://', $video_url );
		$video_output = $wp_embed->run_shortcode('[embed width="660" height="380"]'.$video_url.'[/embed]');
		if( $video_output == '<a href="'.$video_url.'">'.$video_url.'</a>' ){
			$width  = '100%' ;
			$height = '380';
			$video_link = @parse_url($video_url);
			if ( $video_link['host'] == 'www.youtube.com' || $video_link['host']  == 'youtube.com' ) {
				parse_str( @parse_url( $video_url, PHP_URL_QUERY ), $my_array_of_vars );
				$video =  $my_array_of_vars['v'] ;
				$video_output ='<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$video.'?rel=0&wmode=opaque" frameborder="0" allowfullscreen></iframe>';
			}
			elseif( $video_link['host'] == 'www.youtu.be' || $video_link['host']  == 'youtu.be' ){
				$video = substr(@parse_url($video_url, PHP_URL_PATH), 1);
				$video_output ='<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$video.'?rel=0&wmode=opaque" frameborder="0" allowfullscreen></iframe>';
			}elseif( $video_link['host'] == 'www.vimeo.com' || $video_link['host']  == 'vimeo.com' ){
				$video = (int) substr(@parse_url($video_url, PHP_URL_PATH), 1);
				$video_output='<iframe src="http://player.vimeo.com/video/'.$video.'?wmode=opaque" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
			}
			elseif( $video_link['host'] == 'www.dailymotion.com' || $video_link['host']  == 'dailymotion.com' ){
				$video = substr(@parse_url($video_url, PHP_URL_PATH), 7);
				$video_id = strtok($video, '_');
				$video_output='<iframe frameborder="0" width="'.$width.'" height="'.$height.'" src="http://www.dailymotion.com/embed/video/'.$video_id.'"></iframe>';
			}
		}
	}
	elseif( !empty( $get_meta["sith_embed_code"][0] ) ){
		$embed_code = $get_meta["sith_embed_code"][0];
		$embed_code = htmlspecialchars_decode( $embed_code);
		$width = 'width="100%"';
		$height = 'height="400"';
		$embed_code = preg_replace('/width="([3-9][0-9]{2,}|[1-9][0-9]{3,})"/',$width,$embed_code);
		$video_output = preg_replace( '/height="([0-9]*)"/' , $height , $embed_code );
	}
	if( !empty($video_output) ) echo $video_output; ?>
<?php
}

/*-----------------------------------------------------------------------------------*/
# Sith Excerpt
/*-----------------------------------------------------------------------------------*/
function sith_content_limit($text, $chars = 120) {
	$text = $text." ";
	$text = mb_substr( $text , 0 , $chars , 'UTF-8');
	$text = $text."...";
	return $text;
}


/*-----------------------------------------------------------------------------------*/
# Queue Comments reply js
/*-----------------------------------------------------------------------------------*/
function comments_queue_js(){
if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
  wp_enqueue_script( 'comment-reply' );
}
add_action('wp_print_scripts', 'comments_queue_js');


/*-----------------------------------------------------------------------------------*/
# Remove recent comments_ style
/*-----------------------------------------------------------------------------------*/
function sith_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'sith_remove_recent_comments_style' );


/*-----------------------------------------------------------------------------------*/
# Get the thumbnail
/*-----------------------------------------------------------------------------------*/
function get_post_thumb(){
	global $post ;
	if ( has_post_thumbnail($post->ID) ){
		$image_id = get_post_thumbnail_id($post->ID);  
		$image_url = wp_get_attachment_image_src($image_id,'large');  
		$image_url = $image_url[0];
		return $ap_image_url = str_replace(get_option('siteurl'),'', $image_url);
	}
}

/*-----------------------------------------------------------------------------------*/
# tie Thumb
/*-----------------------------------------------------------------------------------*/
function sith_thumb( $size = 'thumbnail-55x55' ){
	global $post;
	if( sith_get_option( 'timthumb') ){
		
		if( $size == 'sith-medium' ){$width = 272; $height = 125;}
		elseif( $size == 'sith-large' ){$width = 290;	$height = 195;}
		elseif( $size == 'slider' ){	$width 	= 660;$height = 330;}
		elseif( $size == 'big-slider' ){$width = 995; $height = 498;}
		else{ $width = 55; $height = 55;}
		
		$img = get_post_thumb(); 
		if(!empty($img)){ ?>
<img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo $img ?>&amp;h=<?php echo $height ?>&amp;w=<?php echo $width ?>&amp;a=c" alt="<?php the_title(); ?>" />
<?php 
		}
	}else{
		$image_id = get_post_thumbnail_id($post->ID);  
		$image_url = wp_get_attachment_image($image_id, $size , false, array( 'alt'   => get_the_title() ,'title' =>  get_the_title()  ));  
		echo $image_url;
	}
}


/*-----------------------------------------------------------------------------------*/
# tie Thumb SRC
/*-----------------------------------------------------------------------------------*/
function sith_thumb_src( $size = 'thumbnail-55x55' ){
	global $post;

	if( sith_get_option( 'timthumb') ){
	
		if( $size == 'sith-medium' ){$width = 272; $height = 125;}
		elseif( $size == 'sith-large' ){$width = 290;	$height = 195;}
		elseif( $size == 'slider' ){	$width 	= 660;$height = 330;}
		elseif( $size == 'big-slider' ){$width = 995; $height = 498;}
		else{ $width = 55; $height = 55;}
		
		$img = get_post_thumb();
		if( !empty($img) ){
			return $img_src = get_template_directory_uri()."/timthumb.php?src=". $img ."&amp;h=". $height ."&amp;w=". $width ."amp;a=c";
		}
	}else{
		$image_id = get_post_thumbnail_id($post->ID);  
		$image_url = wp_get_attachment_image_src($image_id, $size );  
		return $image_url[0];
	}
}

/*-----------------------------------------------------------------------------------*/
# Get Feeds 
/*-----------------------------------------------------------------------------------*/
function sith_get_feeds( $feed , $number = 10 ){
	include_once(ABSPATH . WPINC . '/feed.php');

	$rss = @fetch_feed( $feed );
	if (!is_wp_error( $rss ) ){
		$maxitems = $rss->get_item_quantity($number); 
		$rss_items = $rss->get_items(0, $maxitems); 
	}
	if ($maxitems == 0) {
		$out = "<ul><li>". __( $no_items )."</li></ul>";
	}else{
		$out = "<ul>";
		
		foreach ( $rss_items as $item ) : 
			$out .= '<li><a target="_blank" href="'. esc_url( $item->get_permalink() ) .'" title="'.  __( lang_posted ).$item->get_date("j F Y | g:i a").'">'. esc_html( $item->get_title() ) .'</a></li>';
		endforeach;
		$out .='</ul>';
	}
	
	return $out;
}


/*-----------------------------------------------------------------------------------*/
# Sith Wp Footer
/*-----------------------------------------------------------------------------------*/
add_action('wp_footer', 'sith_wp_footer');
function sith_wp_footer() { 
	if ( sith_get_option('footer_code')) echo htmlspecialchars_decode( stripslashes(sith_get_option('footer_code') )); 
} 


/*-----------------------------------------------------------------------------------*/
# News In Picture
/*-----------------------------------------------------------------------------------*/
function sith_last_news_pic($order , $numberOfPosts = 12 , $cats = 1 ){
	global $post;
	$orig_post = $post;
	
	if( $order == 'random')
		$lastPosts = get_posts(	$args = array('numberposts' => $numberOfPosts, 'suppress_filters' => 0, 'orderby' => 'rand', 'no_found_rows' => 1, 'category' => $cats ));
	else
		$lastPosts = get_posts(	$args = array('numberposts' => $numberOfPosts, 'suppress_filters' => 0, 'no_found_rows' => 1, 'category' => $cats ));
	
		foreach($lastPosts as $post): setup_postdata($post); ?>
<?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) : ?>
<div class="post-thumbnail"><a class="ttip" title="<?php the_title();?>" href="<?php the_permalink(); ?>" >
  <?php sith_thumb(); ?>
  </a></div>
<!-- post-thumbnail /-->
<?php endif; ?>
<?php endforeach;
	$post = $orig_post;
}


/*-----------------------------------------------------------------------------------*/
# Get Most Racent posts
/*-----------------------------------------------------------------------------------*/
function sith_last_posts($numberOfPosts = 5 , $thumb = true){
	global $post;
	$orig_post = $post;
	
	$lastPosts = get_posts('no_found_rows=1&suppress_filters=0&numberposts='.$numberOfPosts);
	foreach($lastPosts as $post): setup_postdata($post);
?>
<li <?php sith_post_class(); ?>>
  <?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() && $thumb ) : ?>
  <div class="post-thumbnail"><a href="<?php the_permalink(); ?>" title="<?php printf( __( '%s', 'sith' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    <?php sith_thumb(); ?>
    </a></div>
  <!-- post-thumbnail /-->
  <?php endif; ?>
  <h3><a href="<?php the_permalink(); ?>">
    <?php the_title();?>
    </a></h3>
  <span class="date"><?php echo get_the_time(get_option('date_format'));; ?></span></li>
<?php endforeach; 
	$post = $orig_post;
}


/*-----------------------------------------------------------------------------------*/
# Get Most Racent posts from Category
/*-----------------------------------------------------------------------------------*/
function sith_last_posts_cat($numberOfPosts = 5 , $thumb = true , $cats = 1){
	global $post;
	$orig_post = $post;

	$lastPosts = get_posts('category='.$cats.'&no_found_rows=1&suppress_filters=0&numberposts='.$numberOfPosts);
	foreach($lastPosts as $post): setup_postdata($post);
?>
<li <?php sith_post_class(); ?>>
  <?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() && $thumb ) : ?>
  <div class="post-thumbnail"><a href="<?php the_permalink(); ?>" title="<?php printf( __( '%s', 'sith' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    <?php sith_thumb(); ?>
    </a></div>
  <!-- post-thumbnail /-->
  <?php endif; ?>
  <h3><a href="<?php the_permalink(); ?>">
    <?php the_title();?>
    </a></h3>
  <span class="date"><?php echo get_the_time(get_option('date_format')); ?></span></li>
<?php endforeach;
	$post = $orig_post;
}

/*-----------------------------------------------------------------------------------*/
# Get Most Racent posts from Category with Authors
/*-----------------------------------------------------------------------------------*/
function sith_last_posts_cat_authors($numberOfPosts = 5 , $thumb = true , $cats = 1){
	global $post;
	$orig_post = $post;

	$lastPosts = get_posts('category='.$cats.'&no_found_rows=1&suppress_filters=0&numberposts='.$numberOfPosts);
	foreach($lastPosts as $post): setup_postdata($post);
?>
<li>
  <?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() && $thumb ) : ?>
  <div class="post-thumbnail"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php echo lang_view_all_posts_by; sprintf( esc_attr__( '%s', 'sith' ), get_the_author() ) ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'MFW_author_bio_avatar_size', 50 ) ); ?></a></div>
  <!-- post-thumbnail /-->
  <?php endif; ?>
  <h3><a href="<?php the_permalink(); ?>">
    <?php the_title();?>
    </a></h3>
  <strong><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) )?>" title="<?php echo lang_view_all_posts_by; sprintf( esc_attr__( '%s', 'sith' ), get_the_author() ) ?>"><?php echo get_the_author() ?></a></strong></li>
<?php endforeach;
	$post = $orig_post;
}


/*-----------------------------------------------------------------------------------*/
# Get Random posts 
/*-----------------------------------------------------------------------------------*/
function sith_random_posts($numberOfPosts = 5 , $thumb = true){
	global $post;
	$orig_post = $post;

	$lastPosts = get_posts('orderby=rand&no_found_rows=1&suppress_filters=0&numberposts='.$numberOfPosts);
	foreach($lastPosts as $post): setup_postdata($post);
?>
<li <?php sith_post_class(); ?>>
  <?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() && $thumb ) : ?>
  <div class="post-thumbnail"><a href="<?php the_permalink(); ?>" title="<?php printf( __( '%s', 'sith' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    <?php sith_thumb(); ?>
    </a></div>
  <!-- post-thumbnail /-->
  <?php endif; ?>
  <h3><a href="<?php the_permalink(); ?>">
    <?php the_title(); ?>
    </a></h3>
  <span class="date"><?php echo get_the_time(get_option('date_format'));; ?></span></li>
<?php endforeach;
	$post = $orig_post;
}


/*-----------------------------------------------------------------------------------*/
# Get Popular posts 
/*-----------------------------------------------------------------------------------*/
function sith_popular_posts($pop_posts = 5 , $thumb = true){
	global $post;
	$orig_post = $post;
	
	$popularposts = new WP_Query( array( 'orderby' => 'comment_count', 'order' => 'DESC', 'posts_per_page' => $pop_posts, 'post_status' => 'publish', 'no_found_rows' => 1, 'ignore_sticky_posts' => 1  ) );
	while ( $popularposts->have_posts() ) : $popularposts->the_post()?>
<li <?php sith_post_class(); ?>>
  <?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() && $thumb ) : ?>
  <div class="post-thumbnail"><a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php printf( __( '%s', 'sith' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    <?php sith_thumb(); ?>
    </a></div>
  <!-- post-thumbnail /-->
  <?php endif; ?>
  <h3><a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php echo the_title(); ?>"><?php echo the_title(); ?></a></h3>
  <span class="date"><?php echo get_the_time(get_option('date_format'));; ?></span></li>
<?php 
	endwhile;
	$post = $orig_post;
}


/*-----------------------------------------------------------------------------------*/
# Get Most commented posts 
/*-----------------------------------------------------------------------------------*/
function sith_most_commented($lang_comment_posts = 5 , $avatar_size = 50){
$lang_comments = get_comments('status=approve&number='.$lang_comment_posts);
foreach ($lang_comments as $lang_comment) { ?>
<li>
  <div class="post-thumbnail"><?php echo get_avatar( $lang_comment, $avatar_size ); ?></div>
  <a href="<?php echo get_permalink($lang_comment->comment_post_ID ); ?>#comment-<?php echo $lang_comment->comment_ID; ?>"><?php echo strip_tags($lang_comment->comment_author); ?>:<?php echo wp_html_excerpt( $lang_comment->comment_content, 60 ); ?>...</a></li>
<?php } 
}




/*-----------------------------------------------------------------------------------*/
# OG Meta for posts
/*-----------------------------------------------------------------------------------*/
function sith_og_data() {
	global $post ;
	
	if ( function_exists("has_post_thumbnail") && has_post_thumbnail() )
		$post_thumb = sith_thumb_src( 'slider' ) ;
	else{
		$get_meta = get_post_custom($post->ID);
		if( !empty( $get_meta["sith_video_url"][0] ) ){
			$video_url = $get_meta["sith_video_url"][0];
			$video_link = @parse_url($video_url);
			if ( $video_link['host'] == 'www.youtube.com' || $video_link['host']  == 'youtube.com' ) {
				parse_str( @parse_url( $video_url, PHP_URL_QUERY ), $my_array_of_vars );
				$video =  $my_array_of_vars['v'] ;
				$post_thumb ='http://img.youtube.com/vi/'.$video.'/0.jpg';
			}
			elseif( $video_link['host'] == 'www.vimeo.com' || $video_link['host']  == 'vimeo.com' ){
				$video = (int) substr(@parse_url($video_url, PHP_URL_PATH), 1);
				$url = 'http://vimeo.com/api/v2/video/'.$video.'.php';;
				$contents = @file_get_contents($url);
				$thumb = @unserialize(trim($contents));
				$post_thumb = $thumb[0]['thumbnail_large'];
			}
		}
	}
	//echo $post->post_content;
$description = htmlspecialchars(strip_tags(strip_shortcodes($post->post_content)));
?>
<meta property="og:title" content="<?php the_title(); ?>"/>
<meta property="og:type" content="article"/>
<meta property="og:description" content="<?php echo sith_content_limit($description , 100 ); ?>"/>
<meta property="og:url" content="<?php the_permalink(); ?>"/>
<meta property="og:site_name" content="<?php echo get_bloginfo( 'name' ) ?>"/>
<?php
if( !empty($post_thumb) )
	echo '<meta property="og:image" content="'. $post_thumb .'" />'."\n";
}


/*-----------------------------------------------------------------------------------*/
# For Empty Widgets Titles 
/*-----------------------------------------------------------------------------------*/
function sith_widget_title($title){
	if( empty( $title ) )
		return ' ';
	else return $title;
}
add_filter('widget_title', 'sith_widget_title');


/*-----------------------------------------------------------------------------------*/
# Add Class to Gallery shortcode for lightbox
/*-----------------------------------------------------------------------------------*/
if( !sith_get_option( 'disable_gallery_shortcode' ) )
add_filter( 'post_gallery', 'sith_post_gallery', 10, 2 );

function sith_post_gallery( $output, $attr) {
    global $post, $wp_locale;

    static $instance = 0;
    $instance++;

    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";
	
	$images_class ='';
	if( isset($attr['link']) && 'file' == $attr['link'] )
		$images_class = "gallery-images";
	
    $output = apply_filters('gallery_style', "
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} .gallery-item {
                float: {$float};
                margin-top: 10px;
                text-align: center;
                width: {$itemwidth}%;           }
            #{$selector} img {
                border: 2px solid #cfcfcf;
            }
            #{$selector} .gallery-caption {
                margin-left: 0;
            }
        </style>
        <!-- see gallery_shortcode() in wp-includes/media.php -->
        <div id='$selector' class='$images_class gallery galleryid-{$id}'>");

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "
            <{$icontag} class='gallery-icon'>
                $link
            </{$icontag}>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='gallery-caption'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '<br style="clear: both" />';
    }

    $output .= "
            <br style='clear: both;' />
        </div>\n";

    return $output;
}

/*-----------------------------------------------------------------------------------*/
# Creates a nicely formatted and more specific title element text for output
/*-----------------------------------------------------------------------------------*/
function sith_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'sith' ), max( $paged, $page ) );

	return $title;
}
if ( !class_exists( 'All_in_One_SEO_Pack' ) && !function_exists( 'wpseo_get_value' ) ) 
add_filter( 'wp_title', 'sith_wp_title', 10, 2 );

/*-----------------------------------------------------------------------------------*/
# Fix Shortcodes
/*-----------------------------------------------------------------------------------*/
function sith_fix_shortcodes($content){   
    $array = array (
        '[raw]' => '', 
        '[/raw]' => '', 
        '<p>[raw]' => '', 
        '[/raw]</p>' => '', 
        '[/raw]<br />' => '', 
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'sith_fix_shortcodes');

/*-----------------------------------------------------------------------------------*/
# Check if the current page is wp-login.php or wp-register.php
/*-----------------------------------------------------------------------------------*/
function sith_is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}


/*-----------------------------------------------------------------------------------*/
# Posts Classes
/*-----------------------------------------------------------------------------------*/
function sith_post_format_class($classes) {
    global $post;
	
	$post_format = get_post_meta($post->ID, 'sith_post_head', true);
	if( !empty($post_format) )
		$classes[] = 'sith_'.$post_format;
		
	return $classes;
}
add_filter('post_class', 'sith_post_format_class');


function sith_post_class( $classes = false ) {
    global $post;
	
	$post_format = get_post_meta($post->ID, 'sith_post_head', true);
	if( !empty($post_format) ){
		if( !empty($classes) ) $classes .= ' ';
		$classes .= 'sith_'.$post_format;
	}
	if( !empty($classes) )	
		echo 'class="'.$classes.'"';
}


/*-----------------------------------------------------------------------------------*/
# Languages Switcher
/*-----------------------------------------------------------------------------------*/
function sith_language_selector_flags(){
	if( function_exists( 'icl_get_languages' )){
		$languages = icl_get_languages('skip_missing=0&orderby=code');
		if(!empty($languages)){
			echo '<div id="sith_lang_switcher">';
			foreach($languages as $l){
				if(!$l['active']) echo '<a href="'.$l['url'].'">';
					echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
				if(!$l['active']) echo '</a>';
			}
			echo '</div>';
		}
	}
}

/*-----------------------------------------------------------------------------------*/
# For recent posts box in the homepage builder
/*-----------------------------------------------------------------------------------*/
$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'sith_modify_posts_per_page', 0);
function sith_modify_posts_per_page() {
    add_filter( 'option_posts_per_page', 'sith_option_posts_per_page' );
}
function sith_option_posts_per_page( $value ) {
 
    global $option_posts_per_page;
    if ( is_home() && sith_get_option('display_homepage') == 'boxes' ) {
        return 1;
    } else {
        return $option_posts_per_page;
    }
}

/*-----------------------------------------------------------------------------------*/
# Show dropcap and highlight shortcodes in excerpts 
/*-----------------------------------------------------------------------------------*/
function sith_remove_shortcodes($text = '') {
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');

		$text = str_replace("[dropcap]","",$text);
		$text = str_replace("[/dropcap]","",$text);
		$text = str_replace("[highlight]","",$text);
		$text = str_replace("[/highlight]","",$text);

		$text = strip_shortcodes( $text );

		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$excerpt_length = apply_filters('excerpt_length', 55);
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[&hellip;]');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
add_filter( 'get_the_excerpt', 'sith_remove_shortcodes', 1);
	
/*-----------------------------------------------------------------------------------*/
# WP 3.6.0
/*-----------------------------------------------------------------------------------*/
// For old theme versions Video shortcode
function sith_video_fix_shortcodes($content){   
	$v = '/(\[(video)\s?.*?\])(.+?)(\[(\/video)\])/';
	$content = preg_replace( $v , '[embed]$3[/embed]' , $content);
    return $content;
}
add_filter('the_content', 'sith_video_fix_shortcodes', 0);

//To prevent wordpress from importing mediaelement css file
function sith_audio_video_shortcode(){
	if( !is_admin()){
		wp_enqueue_script( 'wp-mediaelement' );
		return false;
	}
}
add_filter('wp_audio_shortcode_library', 'sith_audio_video_shortcode');
add_filter('wp_video_shortcode_library', 'sith_audio_video_shortcode');

//Responsive Videos
function sith_video_width_shortcode( $html ){
	$width1 = 'width: 100%';
	return preg_replace('/width: ([0-9]*)px/',$width1,$html);
}
add_filter('wp_video_shortcode', 'sith_video_width_shortcode');
?>
