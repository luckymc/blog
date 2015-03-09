<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<?php global $is_IE ?>
<body id="top" <?php body_class(); ?>>
<?php if( sith_get_option('banner_bg_url') && sith_get_option('banner_bg') ): ?>
<a href="<?php echo sith_get_option('banner_bg_url') ?>" target="_blank" class="background-cover"></a>
<?php else: ?>
<div class="background-cover"></div>
<?php endif; ?>
<?php 
if( sith_get_option('header_position') != 'header_pos_default'): 
else :
$header_pos = ' header-pos-default';
$top_menu_pos = ' top-menu-default';
$logo_pos = ' logo-default';
$main_menu_pos = ' main-menu-default';
endif;
if( sith_get_option( 'header_position') != 'header_pos_center'): 
else :
$header_pos = ' header-pos-center';
$top_menu_pos = ' top-menu-center';
$logo_pos = ' logo-center';
$main_menu_pos = ' main-menu-center';
endif;
if( sith_get_option( 'header_position') != 'header_pos_right'): 
else :
$header_pos = ' header-pos-right';
$top_menu_pos = ' top-menu-right';
$logo_pos = ' logo-right';
$main_menu_pos = ' main-menu-right';
endif;

?>
<?php $full_width =''; if( sith_get_option( 'full_logo' )) $full_width = ' full-logo'; ?>
<div class="container-boxedDISABLE container-full">
<div class="top-navigation<?php echo $top_menu_pos ?>">
  <div class="container">



    <?php if(!sith_get_option( 'top_menu' )): ?>
    <?php wp_nav_menu( array( 'container_class' => 'top-menu', 'theme_location' => 'top-menu', 'fallback_cb' => 'sith_nav_fallback'  ) ); ?>
    <?php endif; ?>
  </div>
  <div class="clear"></div>
</div>
<!-- .top-menu /-->

<header id="header-layout" class="header-layout<?php echo $header_pos ?><?php echo $full_width.$logo_pos ?>">
  <div class="header-content">
    <div class="container">
      <?php if( is_category() || is_single() ){
	if( is_category() ) $category_id = get_query_var('cat') ;
	if( is_single() ){ 
		$categories = get_the_category( $post->ID );
		$category_id = $categories[0]->term_id ;
	}
	$cat_options = get_option( "sith_cat_$category_id");
}

if( !empty($cat_options['cat_custom_logo']) ){
 ?>
      <div class="logo">
        <h2>
          <?php if( $cat_options['logo_setting'] == 'title' ): ?>
          <a  href="<?php echo home_url() ?>/"><?php echo single_cat_title( '', false ) ?></a>
          <?php else : ?>
          <?php if( !empty($cat_options['logo']) ) $logo = $cat_options['logo'];
				elseif( sith_get_option( 'logo' ) ) $logo = sith_get_option( 'logo' );
						else $logo = get_stylesheet_directory_uri().'/images/logo.png';
				?>
          <a title="<?php bloginfo('name'); ?>" href="<?php echo home_url(); ?>/"> <img src="<?php echo $logo ; ?>" alt="<?php echo single_cat_title( '', false ) ?>" /><strong><?php echo single_cat_title( '', false ) ?></strong> </a>
          <?php endif; ?>
        </h2>
      </div>
      <!-- .logo /-->
      <?php if( $cat_options['logo_retina'] && $cat_options['logo_retina_width'] && $cat_options['logo_retina_height']): ?>
      <script type="text/javascript">
jQuery(document).ready(function($) {
	var retina = window.devicePixelRatio > 1 ? true : false;
	if(retina) {
       	jQuery('#header-layout .logo img').attr('src', '<?php echo $cat_options['logo_retina']; ?>');
       	jQuery('#header-layout .logo img').attr('width', '<?php echo $cat_options['logo_retina_width']; ?>');
       	jQuery('#header-layout .logo img').attr('height', '<?php echo $cat_options['logo_retina_height']; ?>');
	}
});
</script>
      <?php endif; ?>
      <?php
}else{
	$logo_margin =''; if( sith_get_option( 'logo_margin' )) $logo_margin = ' style="margin:'.sith_get_option( 'logo_margin' ).'px 0px "';  ?>
      <div class="logo"<?php echo $logo_margin ?>>
        <?php if( !is_singular() && !is_category() && !is_tag() ) ; else echo ''; ?>
        <?php if( sith_get_option('logo_setting') == 'title' ): ?>
        <div class="logo-typetext">
          <h2><a  href="<?php echo home_url() ?>/">
            <?php bloginfo('name'); ?>
            </a></h2>
          <span>
          <?php bloginfo( 'description' ); ?>
          </span></div>
        <?php else : ?>
        <?php if( sith_get_option( 'logo' ) ) $logo = sith_get_option( 'logo' );
						else $logo = get_stylesheet_directory_uri().'/images/logo.png';
				?>
                <div class="logo-image">
        <a title="<?php bloginfo('name'); ?>" href="<?php echo home_url(); ?>/"> <img src="<?php echo $logo ; ?>" alt="<?php bloginfo('name'); ?>"/> </a>
        </div>
        <?php endif; ?>
        <?php if( !is_singular() && !is_category() && !is_tag() ) ; else echo ''; ?>
      </div>
      <!-- .logo /-->
      <?php if( sith_get_option( 'logo_retina' ) && sith_get_option( 'logo_retina_width' ) && sith_get_option( 'logo_retina_height' )): ?>
      <script type="text/javascript">
jQuery(document).ready(function($) {
	var retina = window.devicePixelRatio > 1 ? true : false;
	if(retina) {
       	jQuery('#header-layout .logo img').attr('src', '<?php echo sith_get_option( 'logo_retina' ); ?>');
       	jQuery('#header-layout .logo img').attr('width', '<?php echo sith_get_option( 'logo_retina_width' ); ?>');
       	jQuery('#header-layout .logo img').attr('height', '<?php echo sith_get_option( 'logo_retina_height' ); ?>');
	}
});
</script>
      <?php endif; ?>
      <?php } ?>
     
    </div>
    
    
          <?php if(!sith_get_option( 'header_search' )): ?>
      <div class="search-top">
        <form method="get" id="searchform" action="<?php echo home_url(); ?>/">
          <button class="search-button" type="submit" value="<?php if( !$is_IE ) echo lang_search; //_e( 'Search' , 'sith' ) ?>"></button>
          <input type="text" id="s" class="search-field" name="s" value="<?php echo lang_search; ?>" onfocus="if (this.value == '<?php echo lang_search; ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo lang_search; ?>';}"  />
        </form>
      </div>
      <!-- .search-top /-->
      <?php endif; ?>
    
          <?php if(!sith_get_option( 'header_social_icons' )): ?>
      <div class="social-icons-top">
        <?php	sith_get_social( 'yes' , 16 , 'tooldown' ); ?>
      </div>
      <?php endif; ?>
    
    
  </div>
  
  <?php $stick = ''; ?>
  <?php if( sith_get_option( 'stick_nav' ) ) $stick = ' fixed-enabled' ?>
  <?php if( sith_get_option( 'header_position' ) ) $header_position = sith_get_option( 'header_position' ) ?>
  <?php if(!sith_get_option( 'main_nav' )): ?>
  <?php
			//UberMenu Support
			$navID = 'main-nav';
			?>
  
  <nav id="<?php echo $navID; ?>" class="menu-principal<?php echo $stick.$main_menu_pos ?>">
    <div class="container">
      <?php $orig_post = $post; wp_nav_menu( array( 'container_class' => 'main-menu', 'theme_location' => 'main-menu' ,'fallback_cb' => 'sith_nav_fallback',  ) ); $post = $orig_post; ?>
    </div>
    <div class="clear"></div>
  </nav>
  <?php endif ?>
      

      
<div class="clear"></div>

  <div class="clear"></div>
  <?php sith_breadcrumbs() ?>
</header>
<!-- #header /-->

<?php 
$sidebar = '';
if( sith_get_option( 'sidebar_pos' ) == 'left' ) $sidebar = ' sidebar-left';
if( is_singular() || ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) ){

	$current_ID = $post->ID;
	if( function_exists( 'is_woocommerce' ) && is_woocommerce() )	$current_ID = woocommerce_get_page_id('shop');

	$get_meta = get_post_custom( $current_ID );
	if( !empty($get_meta["sith_sidebar_pos"][0]) ){
		$sidebar_pos = $get_meta["sith_sidebar_pos"][0];

		if( $sidebar_pos == 'left' ) $sidebar = ' sidebar-left';
		elseif( $sidebar_pos == 'full' ) $sidebar = ' full-width';
		elseif( $sidebar_pos == 'right' ) $sidebar = ' sidebar-right';
	}
}

if(sith_get_option( 'full_home_nosidebar' ) ){ 
$homepage_full_layout = ' home-full-layout-nosidebar';
define ('home_full_layout' ,  $homepage_full_layout );

 }
 
 
if( sith_get_option('home_posts_template') != 'loop-3caption'): 
else :
$homepage_full_layout = ' home-full-layout-nosidebar';
define ('home_full_layout' ,  $homepage_full_layout );
endif;

$sith_sidebar_pos = get_query_var('cat') ; 
if( sith_get_option( 'sith_sidebar_pos') != 'full'): 
else :
$sith_sidebar_pos = ' full-width';
endif;
$sith_sidebar_pos = get_query_var('cat') ; 
if( sith_get_option( 'sith_sidebar_pos') != 'right'): 
else :
$sith_sidebar_pos = ' sidebar-right';
endif;
$sith_sidebar_pos = get_query_var('cat') ; 
if( sith_get_option( 'sith_sidebar_pos') != 'left'): 
else :
$sith_sidebar_pos = ' sidebar-left';
endif;
define ('post_sidebar_pos' ,  $sith_sidebar_pos );
?>
</div>
<?php sith_banner('banner_top' , '<div class="ads-top clear">' , '</div>' ); ?>
<div id="main-content" class="container container_12<?php echo $sidebar ; ?>">