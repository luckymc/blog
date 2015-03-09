<?php
add_action("admin_init", "posts_init");
function posts_init(){
	add_meta_box("sith_post_options", "Post Options", "sith_post_options_module", "post", "normal", "high");
	add_meta_box("sith_page_options", "Page Options", "sith_page_options_module", "page", "normal", "high");
}

function sith_post_options_module(){
	global $post ;
	$get_meta = get_post_custom($post->ID);
	
	if( !empty($get_meta["sith_sidebar_pos"][0]) )
		$sith_sidebar_pos = $get_meta["sith_sidebar_pos"][0];
		
	if( !empty($get_meta["sith_review_criteria"][0]) )
		$sith_review_criteria = unserialize($get_meta["sith_review_criteria"][0]);
?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
		  jQuery('.on-of').checkbox({empty:'<?php echo get_template_directory_uri(); ?>/panel/images/empty.png'});
		 });
		jQuery(function() {
			jQuery( "#sith-reviews-list" ).sortable({placeholder: "sith-review-state-highlight"});
		});
	</script>
		<input type="hidden" name="sith_hidden_flag" value="true" />

	
		<div class="sith-options-item">
			<h3>Sidebar Options</h3>

				<?php
					$checked = 'checked="checked"';
				?>
<?php
					sith_post_options(
						array(	"name" => "Sidebar Position",
								"id" => "sith_sidebar_pos",
								"options" => array( "default"=>"Default" ,
													"right"=>"Right",
													"left"=>"Left",
													"full"=>"No Sidebar" ),
								"type" => "select")); 
								?>

			<?php
			$sidebars = sith_get_option( 'sidebars' ) ;
			$new_sidebars = array(''=> 'Default');
			
			if (class_exists('Woocommerce'))
				$new_sidebars ['shop-widget-area'] = __( 'Shop - For WooCommerce Pages', 'sith' ) ;
					
			if($sidebars){
				foreach ($sidebars as $sidebar) {
					$new_sidebars[$sidebar] = $sidebar;
				}
			}
					
			sith_post_options(				
				array(	"name" => "Choose Sidebar",
						"id" => "sith_sidebar_post",
						"type" => "select",
						"options" => $new_sidebars ));
			?>
		</div>
		

		<div class="sith-options-item">
			<h3>General Options</h3>
			<?php	

			sith_post_options(				
				array(	"name" => "Hide Post Meta",
						"id" => "sith_hide_meta",
						"type" => "select",
						"options" => array( "" => "" ,
											"yes" => "Yes" ,
											"no" => "No")));
											
			sith_post_options(				
				array(	"name" => "Hide Share Buttons",
						"id" => "sith_hide_share",
						"type" => "select",
						"options" => array( "" => "" ,
											"yes" => "Yes" ,
											"no" => "No")));
											
			sith_post_options(				
				array(	"name" => "Hide Related Posts",
						"id" => "sith_hide_related",
						"type" => "select",
						"options" => array( "" => "" ,
											"yes" => "Yes" ,
											"no" => "No")));
			?>
		</div>

	
  <?php
}



/*********************************************************************************************/

function sith_page_options_module(){
	global $post ;
	$get_meta = get_post_custom($post->ID);
	$sith_sidebar_pos = $get_meta["sith_sidebar_pos"][0];
	
	if( !empty( $get_meta["sith_review_criteria"][0] ) )
		$sith_review_criteria = unserialize($get_meta["sith_review_criteria"][0]);

	$categories_obj = get_categories();
	$categories = array();
	foreach ($categories_obj as $pn_cat) {
		$categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
	}
	
?>	
	<script type="text/javascript">
		jQuery(document).ready(function($) {
		  jQuery('.on-of').checkbox({empty:'<?php echo get_template_directory_uri(); ?>/panel/images/empty.png'});
		 });
		jQuery(function() {
			jQuery( "#sith-reviews-list" ).sortable({placeholder: "sith-review-state-highlight"});
		});
	</script>
		<input type="hidden" name="sith_hidden_flag" value="true" />	
		
	
	
		<div class="sith-options-item">
			<h3>Sidebar Options</h3>
	<?php
					sith_post_options(
						array(	"name" => "Sidebar Position",
								"id" => "sith_sidebar_pos",
								"options" => array( "default"=>"Default" ,
													"right"=>"Right",
													"left"=>"Left",
													"full"=>"No Sidebar" ),
								"type" => "select")); 
								?>
			<?php
			$sidebars = sith_get_option( 'sidebars' ) ;
			$new_sidebars = array(''=> 'Default');
			
			if (class_exists('Woocommerce'))
				$new_sidebars ['shop-widget-area'] = __( 'Shop - For WooCommerce Pages', 'sith' ) ;
					
			if($sidebars){
				foreach ($sidebars as $sidebar) {
					$new_sidebars[$sidebar] = $sidebar;
				}
			}
					
			sith_post_options(				
				array(	"name" => "Choose Sidebar",
						"id" => "sith_sidebar_post",
						"type" => "select",
						"options" => $new_sidebars ));
			?>
		</div>
		

  <?php
}

add_action('save_post', 'save_post');
function save_post( $post_id ){
	global $post;
	
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return $post_id;
		
    if (isset($_POST['sith_hidden_flag'])) {
	
		$custom_meta_fields = array(
			'sith_rss_feed',
			'sith_hide_meta',
			'sith_hide_author',
			'sith_hide_share',
			'sith_hide_related',
			'sith_sidebar_pos',
			'sith_sidebar_post',
			'sith_post_head',
			'sith_post_slider',
			'sith_googlemap_url',
			'sith_video_url',
			'sith_embed_code',
			'sith_audio_m4a',
			'sith_audio_mp3',
			'sith_audio_oga',
			'sith_audio_soundcloud',
			'sith_audio_soundcloud_play',
			'sith_hide_above',
			'sith_banner_above',
			'sith_hide_below',
			'sith_banner_below',
			'sith_posts_num',
			'post_color',
			'post_background_full',
			'sith_review_position',
			'sith_review_style',
			'sith_review_summary',
			'sith_review_total');
			
		foreach( $custom_meta_fields as $custom_meta_field ){
			if(isset($_POST[$custom_meta_field]) )
				update_post_meta($post_id, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])) );
			else
				delete_post_meta($post_id, $custom_meta_field);
		}
		
		if(isset($_POST[ 'sith_review_criteria' ]) )
			update_post_meta($post_id, 'sith_review_criteria', $_POST['sith_review_criteria']);
		
		if(isset($_POST[ 'sith_blog_cats' ]) )		
			update_post_meta($post_id, 'sith_blog_cats', $_POST['sith_blog_cats']);
			
		if(isset($_POST[ 'post_background' ]) )
			update_post_meta($post_id, 'post_background', $_POST['post_background']);
			
		if(isset($_POST[ 'sith_authors' ]) )	
			update_post_meta($post_id, 'sith_authors', $_POST['sith_authors']);


		$get_meta = get_post_custom($post_id);

		$total_counter = $score = 0;
		if( isset( $get_meta['sith_review_criteria'][0] ))
		$criterias = unserialize( $get_meta['sith_review_criteria'][0] );
		
		if( !empty($criterias) && is_array($criterias) ){
			foreach( $criterias as $criteria){ 
				if( $criteria['name'] && $criteria['score'] && is_numeric( $criteria['score'] )){
					if( $criteria['score'] > 100 ) $criteria['score'] = 100;
					if( $criteria['score'] < 0 ) $criteria['score'] = 1;
						
				$score += $criteria['score'];
				$total_counter ++;
				}
			}
			if( !empty( $score ) && !empty( $total_counter ) )
				$total_score =  $score / $total_counter ;

			update_post_meta($post_id, 'sith_review_score', $total_score);
		}
	}
}




/*********************************************************/

function sith_post_options($value){
	global $post;
?>

	<div class="option-item" id="<?php echo $value['id'] ?>-item">
		<span class="label"><?php  echo $value['name']; ?></span>
	<?php
		$id = $value['id'];
		$get_meta = get_post_custom($post->ID);
		
		if( isset( $get_meta[$id][0] ) )
			$current_value = $get_meta[$id][0];
			
	switch ( $value['type'] ) {
	
		case 'text': ?>
			<input  name="<?php echo $value['id']; ?>" id="<?php  echo $value['id']; ?>" type="text" value="<?php if( !empty($current_value) )  echo $current_value ?>" />
		<?php 
		break;

		case 'checkbox':
			if( !empty( $current_value ) ){$checked = "checked=\"checked\"";  } else{$checked = "";} ?>
				<input class="on-of" type="checkbox" name="<?php echo $value['id'] ?>" id="<?php echo $value['id'] ?>" value="true" <?php echo $checked; ?> />			
		<?php	
		break;
		
		case 'select':
		?>
			<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
				<?php foreach ($value['options'] as $key => $option) { ?>
				<option value="<?php echo $key ?>" <?php if ( !empty( $current_value ) && $current_value == $key) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
				<?php } ?>
			</select>
		<?php
		break;
		
		case 'textarea':
		?>
			<textarea style="direction:ltr; text-align:left; width:430px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="textarea" cols="100%" rows="3" tabindex="4"><?php if( !empty($current_value) ) echo $current_value  ?></textarea>
		<?php
		break;
		
		case 'background':
			if( !empty( $current_value ) )
				$current_value = unserialize($current_value);
		?>
				<input id="<?php echo $value['id']; ?>-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="<?php echo $value['id']; ?>[img]" value="<?php if( !empty( $current_value['img'] ) ) echo $current_value['img']; ?>" />
				<input id="upload_<?php echo $value['id']; ?>_button" type="button" class="small_button" value="Upload" />
					
				<div style="margin-top:15px; clear:both">
					<div id="<?php echo $value['id']; ?>colorSelector" class="color-pic"><div style="background-color:<?php if( !empty( $current_value['color'] ) ) echo $current_value['color'] ; ?>"></div></div>
					<input style="width:80px; margin-right:5px;"  name="<?php echo $value['id']; ?>[color]" id="<?php  echo $value['id']; ?>color" type="text" value="<?php if( !empty( $current_value['color'] ) ) echo $current_value['color'] ; ?>" />
					
					<select name="<?php echo $value['id']; ?>[repeat]" id="<?php echo $value['id']; ?>[repeat]" style="width:96px;">
						<option value="" <?php if ( empty( $current_value['repeat'] ) ) { echo ' selected="selected"' ; } ?>></option>
						<option value="repeat" <?php if ( !empty( $current_value['repeat'] ) && $current_value['repeat']  == 'repeat' ) { echo ' selected="selected"' ; } ?>>repeat</option>
						<option value="no-repeat" <?php if ( !empty( $current_value['repeat'] ) && $current_value['repeat']  == 'no-repeat') { echo ' selected="selected"' ; } ?>>no-repeat</option>
						<option value="repeat-x" <?php if ( !empty( $current_value['repeat'] ) &&  $current_value['repeat'] == 'repeat-x') { echo ' selected="selected"' ; } ?>>repeat-x</option>
						<option value="repeat-y" <?php if ( !empty( $current_value['repeat'] ) &&  $current_value['repeat'] == 'repeat-y') { echo ' selected="selected"' ; } ?>>repeat-y</option>
					</select>

					<select name="<?php echo $value['id']; ?>[attachment]" id="<?php echo $value['id']; ?>[attachment]" style="width:96px;">
						<option value="" <?php if ( empty( $current_value['attachment'] ) ) { echo ' selected="selected"' ; } ?>></option>
						<option value="fixed" <?php if ( !empty( $current_value['attachment'] ) && $current_value['attachment']  == 'fixed' ) { echo ' selected="selected"' ; } ?>>Fixed</option>
						<option value="scroll" <?php if ( !empty( $current_value['attachment'] ) &&  $current_value['attachment']  == 'scroll') { echo ' selected="selected"' ; } ?>>scroll</option>
					</select>
					
					<select name="<?php echo $value['id']; ?>[hor]" id="<?php echo $value['id']; ?>[hor]" style="width:96px;">
						<option value="" <?php if ( empty($current_value['hor']) ) { echo ' selected="selected"' ; } ?>></option>
						<option value="left" <?php if ( !empty( $current_value['hor'] ) && $current_value['hor']  == 'left' ) { echo ' selected="selected"' ; } ?>>Left</option>
						<option value="right" <?php if ( !empty( $current_value['hor'] ) && $current_value['hor']  == 'right') { echo ' selected="selected"' ; } ?>>Right</option>
						<option value="center" <?php if ( !empty( $current_value['hor'] ) && $current_value['hor'] == 'center') { echo ' selected="selected"' ; } ?>>Center</option>
					</select>
					
					<select name="<?php echo $value['id']; ?>[ver]" id="<?php echo $value['id']; ?>[ver]" style="width:100px;">
						<option value="" <?php if ( empty( $current_value['ver'] ) ) { echo ' selected="selected"' ; } ?>></option>
						<option value="top" <?php if ( !empty( $current_value['ver'] ) && $current_value['ver']  == 'top' ) { echo ' selected="selected"' ; } ?>>Top</option>
						<option value="center" <?php if ( !empty( $current_value['ver'] ) && $current_value['ver'] == 'center') { echo ' selected="selected"' ; } ?>>Center</option>
						<option value="bottom" <?php if ( !empty( $current_value['ver'] ) && $current_value['ver']  == 'bottom') { echo ' selected="selected"' ; } ?>>Bottom</option>

					</select>
				</div>
				<div id="<?php echo $value['id']; ?>-preview" class="img-preview" <?php if( empty( $current_value['img'] )  ) echo 'style="display:none;"' ?>>
					<img src="<?php if( !empty( $current_value['img'] ) ) echo $current_value['img'] ; else echo get_template_directory_uri().'/panel/images/spacer.png'; ?>" alt="" />
					<a class="del-img" title="Delete"></a>
				</div>
					
				<script>
				jQuery('#<?php echo $value['id']; ?>colorSelector').ColorPicker({
					color: '<?php echo $current_value['color'] ; ?>',
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						jQuery('#<?php echo $value['id']; ?>colorSelector div').css('backgroundColor', '#' + hex);
						jQuery('#<?php echo $value['id']; ?>color').val('#'+hex);
					}
				});
				sith_styling_uploader('<?php echo $value['id']; ?>');
				</script>
		<?php
		break;
		
		
		case 'color':
		?>
			<div id="<?php echo $value['id']; ?>colorSelector" class="color-pic"><div style="background-color:<?php if( !empty( $current_value ) ) echo $current_value ; ?>"></div></div>
			<input style="width:80px; margin-right:5px;"  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if( !empty( $current_value ) ) echo $current_value ; ?>" />
							
			<script>
				jQuery('#<?php echo $value['id']; ?>colorSelector').ColorPicker({
					color: '<?php echo $current_value ; ?>',
					onShow: function (colpkr) {
						jQuery(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						jQuery(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						jQuery('#<?php echo $value['id']; ?>colorSelector div').css('backgroundColor', '#' + hex);
						jQuery('#<?php echo $value['id']; ?>').val('#'+hex);
					}
				});
				</script>
		<?php
		break;
	} ?>
	</div>
<?php
}
?>