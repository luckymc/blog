<?php
function panel_options() { 

	$categories_obj = get_categories('hide_empty=0');
	$categories = array();
	foreach ($categories_obj as $pn_cat) {
		$categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
	}
	
	$sliders = array();
	$custom_slider = new WP_Query( array( 'post_type' => 'sith_slider', 'posts_per_page' => -1, 'no_found_rows' => 1  ) );
	while ( $custom_slider->have_posts() ) {
		$custom_slider->the_post();
		$sliders[get_the_ID()] = get_the_title();
	}
	
	
$save='
	<div class="theme-options-submit">
		<input type="hidden" name="action" value="test_theme_data_save" />
        <input type="hidden" name="security" value="'. wp_create_nonce("test-theme-data").'" />
		<input name="save" class="theme-options-save" type="submit" value="Save Changes" />    
	</div>'; 
$checkbox_begin = '<div class="st-custom-checkbox">';
$checkbox_end = '</div>';

$radio_begin = '<div class="st-custom-radio">';
$radio_end = '</div>';
?>

<div id="save-alert"></div>
<div class="themenovum-panel st-custom-checkbox">
  <div class="logo">
    <h2>
      <?php bloginfo('name'); echo' &lsaquo; '; echo 'Theme Options &lsaquo; '; echo theme_name; echo ' Theme';?>
    </h2>
  </div>
  <div class="themenovum-panel-tabs">

    <ul>
      <li class="sith-tabs general"><a href="#tab-general"><span></span>Welcome</a></li>
      <li class="sith-tabs header"><a href="#tab-header"><span></span>Header</a></li>
      <li class="sith-tabs homepage"><a href="#tab-homepage"><span></span>Homepage</a></li>
      <li class="sith-tabs archives"><a href="#tab-archives"><span></span>Archives</a></li>
      <li class="sith-tabs article"><a href="#tab-article"><span></span>Post Settings</a></li>
      <li class="sith-tabs sidebars"><a href="#tab-sidebars"><span></span>Sidebars</a></li>
      <li class="sith-tabs footer"><a href="#tab-footer"><span></span>Footer</a></li>
      <li class="sith-tabs banners"><a href="#tab-banners"><span></span>Ads</a></li>
      <li class="sith-tabs styling"><a href="#tab-styling"><span></span>Colors</a></li>
      <li class="sith-tabs social"><a href="#tab-social"><span></span>Social</a></li>
      <li class="sith-tabs translations"><a href="#tab-translations"><span></span>Translations</a></li>
      <li class="sith-tabs integration"><a href="#tab-integration"><span></span>Integration</a></li>
    </ul>
    <div class="clear"></div>
  </div>
  <!-- .themenovum-panel-tabs -->
  
  <div class="themenovum-panel-content">
    <form action="/" name="sith_form" id="sith_form">
      <div id="tab-general" class="tabs-wrap">
        <?php include (TEMPLATEPATH . '/theme-options/options/welcome.php'); ?>
      </div>
      <!-- General Settings -->
      
      <div id="tab-header" class="tabs-wrap">
        <?php include (TEMPLATEPATH . '/theme-options/options/header.php'); ?>
      </div>
      <!-- Header Settings -->
      
      <div id="tab-homepage" class="tabs-wrap">
        <?php include (TEMPLATEPATH . '/theme-options/options/home.php'); ?>
      </div>
      <!-- Homepage Settings -->
      
      <div id="tab-social" class="tabs-wrap">
        <?php include (TEMPLATEPATH . '/theme-options/options/social.php'); ?>
      </div>
      <!-- Social Networking -->
            
      <div id="tab-article" class="tab_content tabs-wrap">
        <?php include (TEMPLATEPATH . '/theme-options/options/article.php'); ?>
      </div>
      <!-- Article Settings -->
      
      <div id="tab-footer" class="tabs-wrap">
        <?php include (TEMPLATEPATH . '/theme-options/options/footer.php'); ?>
      </div>
      <!-- Footer Settings -->
      
      <div id="tab-banners" class="tab_content tabs-wrap">
        <?php include (TEMPLATEPATH . '/theme-options/options/banners.php'); ?>
      </div>
      <!-- Banners Settings -->
      
      <div id="tab-sidebars" class="tab_content tabs-wrap">
        <?php include (TEMPLATEPATH . '/theme-options/options/sidebars.php'); ?>
      </div>
      <!-- Sidebars -->
      
      <div id="tab-archives" class="tab_content tabs-wrap">
        <?php include (TEMPLATEPATH . '/theme-options/options/archives.php'); ?>
      </div>
      <!-- Archives -->

      <div id="tab-styling" class="tab_content tabs-wrap">
        <?php include (TEMPLATEPATH . '/theme-options/options/styling.php'); ?>
      </div>
      <!-- Styling -->
      
      <div id="tab-integration" class="tab_content tabs-wrap">
        <?php include (TEMPLATEPATH . '/theme-options/options/integration.php'); ?>
      </div>
      <!-- Integration -->
      
      
      <div id="tab-translations" class="tab_content tabs-wrap">
        <?php include (TEMPLATEPATH . '/theme-options/options/translations.php'); ?>
      </div>
      <div class="themenovum-footer">
      <?php echo $save; ?>
    </form>
    <form method="post">
      <div class="theme-options-reset">
        <input type="hidden" name="resetnonce" value="<?php echo wp_create_nonce('reset-action-code'); ?>" />
        <input name="reset" class="theme-options-reset-button" type="submit" onClick="if(confirm('All settings will be rest .. Are you sure ?')) return true ; else return false; " value="Reset All Settings" />
        <input type="hidden" name="action" value="reset" />
      </div>
  </div>
</div>
<!-- .themenovum-panel-content -->
<div class="clear"></div>
</div>
<!-- .themenovum-panel -->
<?php 
}
?>
