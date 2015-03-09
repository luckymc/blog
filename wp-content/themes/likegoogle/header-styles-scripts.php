<?php
/*-----------------------------------------------------------------------------------*/
# Register main Scripts and Styles
/*-----------------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'sith_register' ); 
function sith_register() {

	## Register Main style.css file

	wp_register_style( 'sith-style', get_stylesheet_uri() , array(), '', 'all' );
	wp_enqueue_style( 'sith-style' );

	## Register All Scripts
    wp_register_script( 'sith-scripts', get_template_directory_uri() . '/js/sith-scripts-frontend.js', array( 'jquery' ), false, true );
	wp_register_script( 'fnp-nav', get_template_directory_uri() . '/js/fnp-nav.js', array( 'jquery' ), false, true );


	## Get Global Scripts
    wp_enqueue_script( 'sith-scripts' );
	wp_enqueue_script( 'fnp-nav' );

	
## For facebook & Google + share
	if( is_singular() && sith_get_option('post_og_cards') && ( !function_exists('bp_current_component') || (function_exists('bp_current_component') && !bp_current_component() ) ) ) sith_og_data();
}


/*-----------------------------------------------------------------------------------*/
# Sith Wp Head
/*-----------------------------------------------------------------------------------*/
add_action('wp_head', 'sith_wp_head');
function sith_wp_head() {

	
	?>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/js/respond.min.js"></script>
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() ?>/css/ie9.css" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_template_directory_uri() ?>/css/ie8.css" />
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri() ?>/css/ie7.css" />
<![endif]-->
<!--if IE 7
    link(rel='stylesheet', href='<?php echo get_template_directory_uri() ?>/css/fontello-ie7.css')
    
    -->
<script>
      function toggleCodes(on) {
        var obj = document.getElementById('icons');
        
        if (on) {
          obj.className += ' codesOn';
        } else {
          obj.className = obj.className.replace(' codesOn', '');
        }
      }
      
    </script>
<script type='text/javascript'>
	/* <![CDATA[ */
	var silicontvar = {'mob_navigation' : '<?php echo lang_mob_navigation; ?>'};
	var tie = {"ajaxurl":"<?php echo admin_url('admin-ajax.php'); ?>" , "your_rating":"<?php echo $your_rating; ?>"};
	/* ]]> */
</script>
<?php
global $is_IE;
if( $is_IE ){ ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<?php }

	if( sith_get_option( 'disable_responsive' ) ){?>
<meta name="viewport" content="width=1045" />
<?php }else{ ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<?php
	}
echo "\n"; ?>
<style type="text/css" media="screen">
<?php if( sith_get_option( 'theme_color' )): ?> a, #fnp-nav a:after {
color:<?php echo sith_get_option( 'theme_color' );
?>!important;
}
.post-box-title a, .entry-loop-title a { color: #444444 !important}
.post-box-title a:hover, .entry-loop-title a:hover {color:<?php echo sith_get_option( 'theme_color' );?>!important;}


.search-top .search-button { background:<?php echo sith_get_option( 'theme_color' );
?>!important;}


.top-navigation ul li a:hover, .top-navigation ul li:hover > a, .top-navigation ul :hover > a, .top-navigation ul ul li:hover > a, .top-navigation ul ul :hover > a, .pagination a:hover {
 background:<?php echo sith_get_option( 'theme_color' );
?>!important;
}
.top-navigation li.current-menu-item a:hover, .top-navigation ul li.current-menu-item:hover > a {
 background:<?php echo sith_get_option( 'theme_color' );
?>!important;
}
.widget-top, .footer-widget-top, .page-header-bar, .comment-respond h3#reply-title {
border-bottom-color:<?php echo sith_get_option( 'theme_color' );
?>!important;
}
.widget-container a {
	color: #444444 !important
}
.widget-container a:hover { color:<?php echo sith_get_option( 'theme_color' );
?>!important;}
.pagination a:hover, .post-caption h2 a {
	color: #fff !important
}
.social-icons [class^="sithicon-"]:before, .social-icons-widget .social-icons [class^="sithicon-"]:before, .social-icons [class*=" sithicon-"]:before, .social-icons-widget .social-icons [class*=" sithicon-"]:before {
    border-radius: 2px;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
    color:#FFF;
}
<?php endif;
?>  

<?php if( sith_get_option( 'post_title_color' )): ?>
.post-box-title a, .entry-loop-title a { color: <?php echo sith_get_option ('post_title_color');?> !important}
<?php endif;
?>  
<?php if( sith_get_option( 'post_title_color_hover' )): ?>
.post-box-title a:hover, .entry-loop-title a:hover {color:<?php echo sith_get_option( 'post_title_color_hover' );?>!important;}
<?php endif;
?>  




<?php if( sith_get_option('background')):
 $bg = sith_get_option( 'background' );
 if( sith_get_option('background_full') ): ?> .background-cover {
<?php echo "\n";
?> background-color:<?php echo $bg['color'] ?> !important;
 background-image : url('<?php echo $bg['img'] ?>') !important;
<?php echo "\n";
?> filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $bg['img'] ?>', sizingMethod='scale') !important;
<?php echo "\n";
?> -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $bg['img'] ?>',sizingMethod='scale')" !important;
<?php echo "\n";
?>
}
<?php else: ?> body {
<?php if( !empty( $bg['color'] ) ) {
?>background-color:<?php echo $bg['color'] ?> !important;
<?php echo "\n";
}
?> <?php if( !empty( $bg['img'] ) ) {
?>background-image: url('<?php echo $bg['img'] ?>') !important;
<?php echo "\n";
}
?> <?php if( !empty( $bg['repeat'] ) ) {
?>background-repeat:<?php echo $bg['repeat'] ?> !important;
<?php echo "\n";
}
?> <?php if( !empty( $bg['attachment'] ) ) {
?>background-attachment:<?php echo $bg['attachment'] ?> !important;
<?php echo "\n";
}
?> <?php if( !empty( $bg['hor'] ) || !empty( $bg['ver'] ) ) {
?>background-position:<?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?> !important;
<?php echo "\n";
}
?>
}
<?php endif;
?> <?php endif;
?> 
 <?php if( sith_get_option( 'highlighted_color' ) ): ?> ::-moz-selection {
background: <?php echo sith_get_option( 'highlighted_color' ) ?>;
}
::selection {
background: <?php echo sith_get_option( 'highlighted_color' ) ?>;
}
<?php endif;
?> <?php if( sith_get_option( 'links_color' ) || sith_get_option( 'links_decoration' ) ): ?> a {
 <?php if( sith_get_option( 'links_color' ) ) echo 'color: '.sith_get_option( 'links_color' ).';';
?> <?php if( sith_get_option( 'links_decoration' ) ) echo 'text-decoration: '.sith_get_option( 'links_decoration' ).';';
?>
}
.shortc-button {
	color: #fff !important
}
.white.shortc-button {
	color: #000 !important
}
<?php endif;
?> <?php if( sith_get_option( 'links_color_hover' ) || sith_get_option( 'links_decoration_hover' ) ): ?> a:hover {
 <?php if( sith_get_option( 'links_color_hover' ) ) echo 'color: '.sith_get_option( 'links_color_hover' ).'!important;';
?> <?php if( sith_get_option( 'links_decoration_hover' ) ) echo 'text-decoration: '.sith_get_option( 'links_decoration_hover' ).';';
?>
}
<?php endif;
?>  <?php $topnav_bg = sith_get_option( 'topnav_background' );
if( !empty( $topnav_bg['img']) || !empty( $topnav_bg['color'] ) ): ?> .top-navigation {
background:<?php if( !empty($topnav_bg['color']) ) echo $topnav_bg['color'] ?> <?php if( !empty($topnav_bg['img']) ) {
?>url('<?php echo $topnav_bg['img'] ?>')<?php
}
?> <?php if( !empty ($topnav_bg['repeat']) ) echo $topnav_bg['repeat'] ?> <?php if( !empty ($topnav_bg['attachment']) ) echo $topnav_bg['attachment'] ?> <?php if( !empty ($topnav_bg['hor']) ) echo $topnav_bg['hor'] ?> <?php if( !empty ($topnav_bg['ver']) ) echo $topnav_bg['ver'] ?>;
}
<?php echo "\n";
?> <?php endif;
?> <?php if( sith_get_option( 'topnav_links_color' ) ): ?> .top-navigation ul li a {
 <?php if( sith_get_option( 'topnav_links_color' ) ) echo 'color: '.sith_get_option( 'topnav_links_color' ).' !important;';
?>
}
<?php endif;
?> <?php if( sith_get_option( 'topnav_links_color_hover' )): ?> .top-navigation ul li a:hover, .top-navigation ul li:hover > a, .top-navigation ul :hover > a, .top-navigation ul ul li:hover > a, .top-navigation ul ul :hover > a {
 <?php if( sith_get_option( 'topnav_links_color_hover' ) ) echo 'color: '.sith_get_option( 'topnav_links_color_hover' ).' !important;';
?>
}
 <?php endif;
?> <?php if( sith_get_option( 'topnav_background_links_color_hover' )): ?> .top-navigation ul li a:hover, .top-navigation ul li:hover > a, .top-navigation ul :hover > a, .top-navigation ul ul li:hover > a, .top-navigation ul ul :hover > a {
 <?php if( sith_get_option( 'topnav_background_links_color_hover' ) ) echo 'background: '.sith_get_option( 'topnav_background_links_color_hover' ).' !important;';
?>
}
 <?php endif;
?> <?php if( sith_get_option( 'topnav_links_color' ) ): ?>  <?php endif;
?> <?php if( sith_get_option( 'topnav_submenu_background' )): ?> .top-navigation ul ul {
background-color:<?php echo sith_get_option( 'topnav_submenu_background' ).' !important;';
?>
}
<?php echo "\n";
?> .top-navigation ul > li.parent-list:hover > a:after {
border-color: transparent transparent <?php echo sith_get_option( 'topnav_submenu_background' ).' !important;';
?>
}
<?php echo "\n";
?>  <?php endif;
?> <?php if( sith_get_option( 'topnav_submenu_links_color' ) ): ?> .top-navigation ul.sub-menu a, .top-navigation ul ul li.current-menu-item a, .top-navigation ul ul li.current-menu-parent a, .top-navigation ul ul li.current-page-ancestor a, .top-navigation ul ul li a, .top-navigation ul.sub-menu a, .top-navigation ul li.current-menu-item ul a, .top-navigation ul li.current-menu-parent ul a, .top-navigation ul li.current-page-ancestor ul a {
 <?php if( sith_get_option( 'topnav_submenu_links_color' ) ) echo 'color:'.sith_get_option( 'topnav_submenu_links_color' ).' !important;';
?>
}
.top-navigation ul.sub-menu a, .top-navigation ul ul li.current-menu-item a, .top-navigation ul ul li.current-menu-parent a, .top-navigation ul ul li.current-page-ancestor a, .top-navigation ul li.current-menu-parent ul.sub-menu li a {
 <?php if( sith_get_option( 'topnav_submenu_links_color' ) ) echo 'color:'.sith_get_option( 'topnav_submenu_links_color' ).' !important;';
?>
}
<?php endif;
?>  <?php if( sith_get_option( 'topnav_current_links_color' ) ): ?> .top-navigation ul li.current-menu-item a, .top-navigation ul li.current-menu-parent a, .top-navigation ul li.current-page-ancestor a, .sub-navigation ul li a {
 <?php if( sith_get_option( 'topnav_current_links_color' ) ) echo 'color: '.sith_get_option( 'topnav_current_links_color' ).' !important;';
?>
}
<?php endif;
?> <?php if( sith_get_option( 'topnav_current_links_background' )): ?> .top-navigation ul li.current-menu-item a, .top-navigation ul li.current-menu-parent a, .top-navigation ul li.current-page-ancestor a, .sub-navigation {
<?php if( sith_get_option( 'topnav_current_links_background' ) ) echo 'background: '.sith_get_option( 'topnav_current_links_background' ).' ;';
?>  <?php if( sith_get_option( 'topnav_current_links_color' ) ) echo 'color: '.sith_get_option( 'topnav_current_links_color' ).';';
?>
}
<?php endif;
?>  <?php if( sith_get_option( 'topnav_submenu_links_color' ) ): ?> .top-navigation ul ul a {
 <?php if( sith_get_option( 'topnav_submenu_links_color' ) ) echo 'color:'.sith_get_option( 'topnav_submenu_links_color' ).' !important;';
?>
}
.top-navigation ul.sub-menu a, .top-navigation ul ul li.current-menu-item a, .top-navigation ul ul li.current-menu-parent a, .top-navigation ul ul li.current-page-ancestor a, .top-navigation ul li.current-menu-parent ul.sub-menu li a {
 <?php if( sith_get_option( 'topnav_submenu_links_color' ) ) echo 'color:'.sith_get_option( 'topnav_submenu_links_color' ).' !important;';
?>
}
 <?php endif;
?>  <?php if( sith_get_option( 'topnav_links_color_hover' )): ?> .top-navigation li.current-menu-item a:hover, .top-navigation ul li.current-menu-item a:hover, .top-navigation ul li.current-menu-item:hover > a {
 <?php if( sith_get_option( 'topnav_links_color_hover' ) ) echo 'color: '.sith_get_option( 'topnav_links_color_hover' ).' !important;';
?>
}
 <?php endif;
?> <?php if( sith_get_option( 'topnav_background_links_color_hover' )): ?> .top-navigation li.current-menu-item a:hover, .top-navigation ul li.current-menu-item:hover > a {
 <?php if( sith_get_option( 'topnav_background_links_color_hover' ) ) echo 'background: '.sith_get_option( 'topnav_background_links_color_hover' ).' !important;';
?>
}
<?php endif;
?>  
<?php if( sith_get_option( 'mainnav_links_color' ) ): ?> 

#main-nav ul li a .sub-indicator {
	<?php if( sith_get_option( 'mainnav_links_color' ) ) echo 'border-top: 4px solid '.sith_get_option( 'mainnav_links_color' ).';';?>
	}

<?php endif;
?> 
<?php if( sith_get_option( 'mainnav_links_color_hover' ) ): ?> 
#main-nav ul li a:hover .sub-indicator, #main-nav ul li:hover a .sub-indicator {
	<?php if( sith_get_option( 'mainnav_links_color_hover' ) ) echo 'border-top: 4px solid '.sith_get_option( 'mainnav_links_color_hover' ).';';?>
	}
<?php endif;
?>
<?php if( sith_get_option( 'mainnav_submenu_background2' )): ?> #main-nav ul ul {
background-color:<?php echo sith_get_option( 'mainnav_submenu_background2' ).' !important;';
?>
}
<?php echo "\n";
?> #main-nav ul > li.parent-list:hover > a:after {
border-color: transparent transparent <?php echo sith_get_option( 'mainnav_submenu_background2' ).' !important;';
?>
}
<?php echo "\n";
?>
<?php endif;
?> <?php if( sith_get_option( 'mainnav_submenu_links_color' ) ): ?>  #main-nav ul ul a{
 <?php if( sith_get_option( 'mainnav_submenu_links_color' ) ) echo 'color:'.sith_get_option( 'mainnav_submenu_links_color' ).' !important;';
?>
}
#main-nav ul ul li a .sub-indicator, #main-nav ul li:hover ul li a .sub-indicator {
	
	<?php if( sith_get_option( 'mainnav_submenu_links_color' ) ) echo 'border-top: 4px solid transparent;border-left: 4px solid '.sith_get_option( 'mainnav_submenu_links_color' ).';';?>
}

<?php endif;
?>  

<?php if( sith_get_option( 'mainnav_current_links_color' ) ): ?>
#main-nav ul li.current-menu-item a, #main-nav ul li.current-menu-parent a, #main-nav ul li.current-page-ancestor a, .sub-navigation ul li a {
 <?php if( sith_get_option( 'mainnav_current_links_color' ) ) echo 'color: '.sith_get_option( 'mainnav_current_links_color' ).' !important;';
?>
}
#main-nav ul li.current-menu-item a .sub-indicator, #main-nav ul li.current-menu-parent a .sub-indicator {	<?php if( sith_get_option( 'mainnav_current_links_color' ) ) echo 'border-top: 4px solid '.sith_get_option( 'mainnav_current_links_color' ).';';?>}
<?php endif;
?> <?php if( sith_get_option( 'mainnav_current_links_background' )): ?> #main-nav ul li.current-menu-item a, #main-nav ul li.current-menu-parent a, #main-nav ul li.current-page-ancestor a, .sub-navigation { <?php if( sith_get_option( 'mainnav_current_links_background' ) ) echo 'background: '.sith_get_option( 'mainnav_current_links_background' ).' ;';
?>
 <?php if( sith_get_option( 'mainnav_current_links_color' ) ) echo 'color: '.sith_get_option( 'mainnav_current_links_color' ).';';
?>
}  
<?php endif;
?>
 <?php if( sith_get_option( 'mainnav_links_color_hover' )): ?>
#main-nav ul li.current-menu-parent a:hover .sub-indicator, 
#main-nav ul:hover li.current-menu-parent a .sub-indicator {border-top: 4px solid <?php sith_get_option( 'mainnav_submenu_links_color' )?>;}
#main-nav ul:hover li.current-menu-parent ul li a:hover .sub-indicator {border-left: 4px solid <?php sith_get_option( 'mainnav_submenu_links_color' )?>}
#main-nav ul:hover li.current-menu-parent ul li a .sub-indicator {border-top: 4px solid transparent;}
<?php endif;
?>


<?php if( sith_get_option( 'mainnav_submenu_links_color' ) ): ?>  #main-nav ul.sub-menu a,  #main-nav ul ul li.current-menu-item a,  #main-nav ul ul li.current-menu-parent a,  #main-nav ul ul li.current-page-ancestor a,  #main-nav ul ul li a, #main-nav ul.sub-menu a,  #main-nav ul li.current-menu-item ul a,  #main-nav ul li.current-menu-parent ul a,  #main-nav ul li.current-page-ancestor ul a {
 <?php if( sith_get_option( 'mainnav_submenu_links_color' ) ) echo 'color:'.sith_get_option( 'mainnav_submenu_links_color' ).' !important;';
?>
}

#main-nav ul:hover li.current-menu-parent ul li a .sub-indicator {border-top: 4px solid transparent;}
#main-nav ul ul li:hover ul li a .sub-indicator {<?php if( sith_get_option( 'mainnav_submenu_links_color' ) ) echo 'border-top: 4px solid transparent;border-left: 4px solid '.sith_get_option( 'mainnav_submenu_links_color' ).' !important;';
?>}
<?php endif;
?>


 <?php if( sith_get_option( 'mainnav_links_color_hover' )): ?> #main-nav li.current-menu-item a:hover, #main-nav ul li.current-menu-item a:hover, #main-nav ul li.current-menu-item:hover > a {
 <?php if( sith_get_option( 'mainnav_links_color_hover' ) ) echo 'color: '.sith_get_option( 'mainnav_links_color_hover' ).' !important;';
?>
}
<?php endif;
?>  

<?php if( sith_get_option( 'mainnav_background_links_color_hover' )): ?> #main-nav li.current-menu-item a:hover, 
#main-nav ul li.current-menu-item:hover > a {
 <?php if( sith_get_option( 'mainnav_background_links_color_hover' ) ) echo 'background: '.sith_get_option( 'mainnav_background_links_color_hover' ).' !important;';
?>
}
<?php endif;
?> 

 <?php if( sith_get_option( 'mainnav_links_color_hover' )): ?> #main-nav ul li a:hover, #main-nav ul li:hover > a, #main-nav ul :hover > a, #main-nav ul ul li:hover > a, #main-nav ul ul :hover > a {
 <?php if( sith_get_option( 'mainnav_links_color_hover' ) ) echo 'color: '.sith_get_option( 'mainnav_links_color_hover' ).' !important;';
?>
}
#main-nav ul li.current-menu-item a:hover .sub-indicator, #main-nav ul:hover li.current-menu-item a .sub-indicator {	<?php if( sith_get_option( 'mainnav_links_color_hover' ) ) echo 'border-top: 4px solid '.sith_get_option( 'mainnav_links_color_hover' ).';';?>}

#main-nav ul li.current-menu-item ul li a:hover .sub-indicator,
#main-nav ul:hover li.current-menu-item ul li a .sub-indicator {	<?php if( sith_get_option( 'mainnav_links_color_hover' ) ) echo 'border-top: 4px solid transparent;';?>}


#main-nav ul ul li:hover a .sub-indicator, 
#main-nav ul ul li ul li:hover a .sub-indicator {<?php if( sith_get_option( 'mainnav_links_color_hover' ) ) echo 'border-top: 4px solid transparent;border-left: 4px solid '.sith_get_option( 'mainnav_links_color_hover' ).' !important;';
?>}

<?php /* ERRO DE HOVER EM OUTROS MENUS QUE NÃO SEJA AQUELE DO QUAL O MOUSE PASSA.
#main-nav ul li.current-menu-parent a:hover .sub-indicator, 
#main-nav ul:hover li.current-menu-parent a .sub-indicator {<?php if( sith_get_option( 'mainnav_links_color_hover' ) ) echo '  border-top: 4px solid '.sith_get_option( 'mainnav_links_color_hover' ).' ;';
?>} */?>
<?php endif;
?>  


<?php if( sith_get_option( 'mainnav_background_links_color_hover' )): ?> #main-nav ul li a:hover, #main-nav ul li:hover > a, #main-nav ul :hover > a, #main-nav ul ul li:hover > a, #main-nav ul ul :hover > a {
 <?php if( sith_get_option( 'mainnav_background_links_color_hover' ) ) echo 'background: '.sith_get_option( 'mainnav_background_links_color_hover' ).' !important;';
?>
}

<?php endif;
?>  


<?php if( sith_get_option( 'search_button_background' ) ): ?> .search-top .search-button {
 <?php if( sith_get_option( 'search_button_background' ) ) echo 'background-color: '.sith_get_option( 'search_button_background' ).' !important;';
?>
}
<?php endif;
?> <?php if( sith_get_option( 'search_button_color' ) ): ?> .search-top button.search-button:before {
 <?php if( sith_get_option( 'search_button_color' ) ) echo 'color: '.sith_get_option( 'search_button_color' ).' !important;';
?>
}
<?php endif;
?>  <?php if( sith_get_option( 'breadcrumbs_background' ) || sith_get_option( 'breadcrumbs_background' ) || sith_get_option( 'breadcrumbs_text_color' )): ?> #crumbs {
<?php if( sith_get_option( 'breadcrumbs_background' ) ) echo 'background: '.sith_get_option( 'breadcrumbs_background' ).';';
?> <?php if( sith_get_option( 'breadcrumbs_text_color' ) ) echo 'color: '.sith_get_option( 'breadcrumbs_text_color' ).';';
?>
}
<?php endif;
?> <?php if( sith_get_option( 'breadcrumbs_links_color' )): ?> #crumbs a {
<?php if( sith_get_option( 'breadcrumbs_links_color' ) ) echo 'color: '.sith_get_option( 'breadcrumbs_links_color' ).';';
?>
}
<?php endif;
?>  <?php if( sith_get_option( 'breadcrumbs_links_color_hover' )): ?> #crumbs a:hover {
<?php if( sith_get_option( 'breadcrumbs_links_color_hover' ) ) echo 'color: '.sith_get_option( 'breadcrumbs_links_color_hover' ).';';
?>
}
<?php endif;
?>  <?php $header_bg = sith_get_option( 'header_background' );
if( !empty( $header_bg['img']) || !empty( $header_bg['color'] ) ): ?> .header-content {
background:<?php if( !empty($header_bg['color']) ) echo $header_bg['color'] ?> <?php if( !empty($header_bg['img']) ) {
?>url('<?php echo $header_bg['img'] ?>')<?php
}
?> <?php if( !empty ($header_bg['repeat']) ) echo $header_bg['repeat'] ?> <?php if( !empty ($header_bg['attachment']) ) echo $header_bg['attachment'] ?> <?php if( !empty ($header_bg['hor']) ) echo $header_bg['hor'] ?> <?php if( !empty ($header_bg['ver']) ) echo $header_bg['ver'] ?> !important;
}
<?php echo "\n";
?> <?php endif;
?> <?php $mainnav_bg = sith_get_option( 'mainnav_background' );
if( !empty( $mainnav_bg['img']) || !empty( $mainnav_bg['color'] ) ): ?> #main-nav {
background:<?php if( !empty($mainnav_bg['color']) ) echo $mainnav_bg['color'] ?> <?php if( !empty($mainnav_bg['img']) ) {
?>url('<?php echo $mainnav_bg['img'] ?>')<?php
}
?> <?php if( !empty ($mainnav_bg['repeat']) ) echo $mainnav_bg['repeat'] ?> <?php if( !empty ($mainnav_bg['attachment']) ) echo $mainnav_bg['attachment'] ?> <?php if( !empty ($mainnav_bg['hor']) ) echo $mainnav_bg['hor'] ?> <?php if( !empty ($mainnav_bg['ver']) ) echo $mainnav_bg['ver'] ?>;
}
<?php echo "\n";
?> <?php endif;
?> <?php if( sith_get_option( 'header_links_color' ) ): ?> header#header-layout .logo a {
 <?php if( sith_get_option( 'header_links_color' ) ) echo 'color: '.sith_get_option( 'header_links_color' ).' !important;';
?>
}
<?php endif;
?> <?php if( sith_get_option( 'header_text_color' ) ): ?> header#header-layout .logo span {
 <?php if( sith_get_option( 'header_text_color' ) ) echo 'color: '.sith_get_option( 'header_text_color' ).' !important;';
?>
}
<?php endif;
?> <?php if( sith_get_option( 'mainnav_links_color' ) ): ?> #main-nav ul li a {
 <?php if( sith_get_option( 'mainnav_links_color' ) ) echo 'color: '.sith_get_option( 'mainnav_links_color' ).' !important;';
?>
}
<?php endif;
?> <?php if( sith_get_option( 'postcaption_bg_title' ) ): ?> .post-caption h2 a {
<?php if( sith_get_option( 'postcaption_bg_title' ) ) echo 'background:'.sith_get_option( 'postcaption_bg_title' ).'!important;';
?>
}
<?php endif;
?>  <?php if( sith_get_option( 'postcaption_color_title' ) ): ?> .post-caption h2 a {
<?php if( sith_get_option( 'postcaption_color_title' ) ) echo 'color:'.sith_get_option( 'postcaption_color_title' ).'!important;';
?>
}
<?php endif;
?>  <?php if( sith_get_option( 'postcaption_bg_excerpt' ) ): ?> .post-caption p {
<?php if( sith_get_option( 'postcaption_bg_excerpt' ) ) echo 'background:'.sith_get_option( 'postcaption_bg_excerpt' ).'!important;';
?>
}
<?php endif;
?>  <?php if( sith_get_option( 'postcaption_color_excerpt' ) ): ?> .post-caption p {
<?php if( sith_get_option( 'postcaption_bg_excerpt' ) ) echo 'color:'.sith_get_option( 'postcaption_color_excerpt' ).'!important;';
?>
}
<?php endif;
?>  <?php if( sith_get_option( 'slider_color' ) ): ?> .content .slider-caption h2 a, .full-width .content .slider-caption h2 a, .flex-direction-nav a, .flex-control-paging li a, #sidebar .slider-caption, .slider-caption h2 a, .full-width .content .slider-caption h2 a, #sidebar .slider-caption h2 a {
<?php if( sith_get_option( 'slider_color' ) ) echo 'color:'.sith_get_option( 'slider_color' ).';';
?>
}
<?php endif;
?>  <?php if( sith_get_option( 'widget_title_background' ) ): ?> .widget-top, .footer-widget-top {
<?php if( sith_get_option( 'widget_title_background' ) ) echo 'background:'.sith_get_option( 'widget_title_background' ).';';
?>
}
<?php endif;
?>  <?php if( sith_get_option( 'widget_title_color' ) ): ?> .widget-top, .widget-top a, .widget-top h4, .footer-widget-top h4 {
<?php if( sith_get_option( 'widget_title_color' ) ) echo 'color:'.sith_get_option( 'widget_title_color' ).';';
?>
}
<?php endif;
?>  <?php if( sith_get_option( 'widget_content_color' ) ): ?> #sidebar .widget-container, .widget-container a, .box-layout-content, .footer-widget-container, #sidebar .widget-container a, .box-layout-content a, .footer-widget-container a, .widget-container li span.date, .footer-widget-container li span.date {
<?php if( sith_get_option( 'widget_content_color' ) ) echo 'color:'.sith_get_option( 'widget_content_color' ).' !important;';
?>
}
<?php endif;
?>  <?php if( sith_get_option( 'widget_content_background' ) ): ?> #sidebar .widget-container, .box-layout-content, .footer-widget-container, #sidebar .widget-container a, .box-layout-content a, .footer-widget-container a {
<?php if( sith_get_option( 'widget_content_background' ) ) echo 'background:'.sith_get_option( 'widget_content_background' ).';';
?>
}
<?php endif;
?>  
<?php /*if( sith_get_option( 'widget_border_color' ) ): ?> #sidebar .widget-container, .footer-widget-container, #sidebar .widget-container, .footer-widget-container, .widget-top, .footer-widget-top, .box-layout {
<?php if( sith_get_option( 'widget_border_color' ) ) echo 'border: 4px solid '.sith_get_option( 'widget_border_color' ).';';
?>
}
.widget-top, .footer-widget-top, .box-layout-title {
}
.box-layout-title {
<?php if( sith_get_option( 'widget_border_color' ) ) echo 'border-bottom: 1px solid '.sith_get_option( 'widget_border_color' ).';';
?>
}
<?php endif;
*/
?>  

<?php if( sith_get_option( 'widget_border_color' ) ): ?>
.footer-widget-top, .widget-top, .page-header-bar, .comment-respond h3#reply-title {<?php if( sith_get_option( 'widget_border_color' ) ) echo 'border-bottom: 4px solid '.sith_get_option( 'widget_border_color' ).' !important;';
?>}
<?php endif;
?>  

<?php if( sith_get_option( 'widget_links_color' )): ?>
.widget-container a, .footer-widget-container a {color:<?php echo sith_get_option( 'widget_links_color' );?> !important;}
<?php endif;
?> 

<?php if( sith_get_option( 'widget_links_color_hover' )): ?>
.widget-container a:hover, .footer-widget-container a:hover {color:<?php echo sith_get_option( 'widget_links_color_hover' );?> !important;}
<?php endif;
?> 




<?php if(sith_get_option( 'disable_responsive' ) ) {
?> body {
overflow:inherit;
overflow-x:inherit;
}
<?php
}
?> <?php $content_bg = sith_get_option( 'main_content_bg' );
if( !empty( $content_bg['img']) || !empty( $content_bg['color'] ) ): ?> #main-content {
background:<?php if( !empty($content_bg['color']) ) echo $content_bg['color'] ?> <?php if( !empty($content_bg['img']) ) {
?>url('<?php echo $content_bg['img'] ?>')<?php
}
?> <?php if( !empty($content_bg['repeat']) ) echo $content_bg['repeat'] ?> <?php if( !empty($content_bg['attachment']) ) echo $content_bg['attachment'] ?> <?php if( !empty($content_bg['hor']) ) echo $content_bg['hor'] ?> <?php if( !empty($content_bg['ver']) ) echo $content_bg['ver'] ?>;
}
<?php echo "\n";
?> <?php endif;
?> <?php $boxes_bg = sith_get_option( 'boxes_bg' );
if( !empty( $boxes_bg['img']) || !empty( $boxes_bg['color'] ) ): ?> .box-layout-content, #sidebar .widget-container, .container-posts, .column2 li.first-news, .wide-box li.first-news {
background:<?php if( !empty($boxes_bg['color']) ) echo $boxes_bg['color'] ?> <?php if( !empty($boxes_bg['img']) ) {
?>url('<?php echo $boxes_bg['img'] ?>')<?php
}
?> <?php if( !empty($boxes_bg['repeat']) ) echo $boxes_bg['repeat'] ?> <?php if( !empty($boxes_bg['attachment']) ) echo $boxes_bg['attachment'] ?> <?php if( !empty($boxes_bg['hor']) ) echo $boxes_bg['hor'] ?> <?php if( !empty($boxes_bg['ver']) ) echo $boxes_bg['ver'] ?> !important;
}
<?php echo "\n";
?> <?php endif;
?> <?php if( sith_get_option( 'breaking_title_bg' ) ): ?> .breaking-news span {
<?php if( sith_get_option( 'breaking_title_bg' ) ) echo 'background: '.sith_get_option( 'breaking_title_bg' ).';';
?>
}
<?php endif;
?> <?php if( sith_get_option( 'post_links_color' ) || sith_get_option( 'post_links_decoration' ) ): ?> body.single .post .entry a, body.page .post .entry a, .post-box-title a {
 <?php if( sith_get_option( 'post_links_color' ) ) echo 'color: '.sith_get_option( 'post_links_color' ).';';
?> <?php if( sith_get_option( 'post_links_decoration' ) ) echo 'text-decoration: '.sith_get_option( 'post_links_decoration' ).';';
?>
}
<?php endif;
?> <?php if( sith_get_option( 'post_links_color_hover' ) || sith_get_option( 'post_links_decoration_hover' ) ): ?> body.single .post .entry a:hover, body.page .post .entry a:hover, .post-box-title a:hover {
 <?php if( sith_get_option( 'post_links_color_hover' ) ) echo 'color: '.sith_get_option( 'post_links_color_hover' ).';';
?> <?php if( sith_get_option( 'post_links_decoration_hover' ) ) echo 'text-decoration: '.sith_get_option( 'post_links_decoration_hover' ).';';
?>
}
<?php endif;
?> <?php $footer_bg = sith_get_option( 'footer_background' );
if( !empty( $footer_bg['img']) || !empty( $footer_bg['color'] ) ): ?> footer#theme-footer {
background:<?php if( !empty($footer_bg['color']) ) echo $footer_bg['color'] ?> <?php if( !empty($footer_bg['img']) ) {
?>url('<?php echo $footer_bg['img'] ?>')<?php
}
?> <?php if( !empty($footer_bg['repeat']) ) echo $footer_bg['repeat'] ?> <?php if( !empty($footer_bg['attachment']) ) echo $footer_bg['attachment'] ?> <?php if( !empty($footer_bg['hor']) ) echo $footer_bg['hor'] ?> <?php if( !empty($footer_bg['ver']) ) echo $footer_bg['ver'] ?>;
}
<?php echo "\n";
?> <?php endif;
?> <?php if( sith_get_option( 'footer_title_color' ) ): ?> .footer-widget-top h3 {
<?php if( sith_get_option( 'footer_title_color' ) ) echo 'color: '.sith_get_option( 'footer_title_color' ).';';
?>
}
<?php endif;
?> <?php if( sith_get_option( 'footer_text_color' ) ): ?> .footer-layout, footer#theme-footer {
<?php if( sith_get_option( 'footer_text_color' ) ) echo 'color: '.sith_get_option( 'footer_text_color' ).';';
?>
}
<?php endif;
?> <?php if( sith_get_option( 'footer_links_color' ) ): ?> .footer-layout a, .footer-layout .social-icons a {
<?php if( sith_get_option( 'footer_links_color' ) ) echo 'color: '.sith_get_option( 'footer_links_color' ).' !important;';
?>
}
<?php endif;
?>  <?php if( sith_get_option( 'footer_links_color_hover' ) ): ?> .footer-layout a:hover, .footer-layout .social-icons a:hover {
<?php if( sith_get_option( 'footer_links_color_hover' ) ) echo 'color: '.sith_get_option( 'footer_links_color_hover' ).' !important;';
?>
}
<?php endif;
?>  <?php $css_code = str_replace("<pre>", "", htmlspecialchars_decode( sith_get_option('css')) );
echo $css_code = str_replace("</pre>", "", $css_code ), "\n";
?> <?php if( sith_get_option('css_tablets') ) : ?>  @media (min-width: 768px) and (max-width: 991px) {
<?php $css_code1 = str_replace("<pre>", "", htmlspecialchars_decode( sith_get_option('css_tablets')) );
echo $css_code1 = str_replace("</pre>", "", $css_code1 ), "\n";
?>
}
<?php endif;
?> <?php if( sith_get_option('css_wide_phones') ) : ?> @media (max-width: 767px) {
<?php $css_code2 = str_replace("<pre>", "", htmlspecialchars_decode( sith_get_option('css_wide_phones')) );
echo $css_code2 = str_replace("</pre>", "", $css_code2 ), "\n";
?>
}
<?php endif;
?> <?php if( sith_get_option('css_phones') ) : ?> @media only screen and (max-width: 479px) {
<?php $css_code3 = str_replace("<pre>", "", htmlspecialchars_decode( sith_get_option('css_phones')) );
echo $css_code3 = str_replace("</pre>", "", $css_code3 ), "\n";
?>
}
<?php endif;
?> 
</style>
<?php if( sith_get_option('apple_iPad_retina') ) : ?>
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo sith_get_option('apple_iPad_retina') ?>" />
<?php endif; ?>
<?php if( sith_get_option('apple_iphone_retina') ) : ?>
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo sith_get_option('apple_iphone_retina') ?>" />
<?php endif; ?>
<?php if( sith_get_option('apple_iPad') ) : ?>
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo sith_get_option('apple_iPad') ?>" />
<?php endif; ?>
<?php if( sith_get_option('apple_iphone') ) : ?>
<link rel="apple-touch-icon-precomposed" href="<?php echo sith_get_option('apple_iphone') ?>" />
<?php endif; ?>
<?php
echo htmlspecialchars_decode( sith_get_option('header_code') ) , "\n";
}

function sith_theme_color( $color ){ ?>
<?php
}

?>
