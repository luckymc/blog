			<div class="panel-head-title-save"><div class="st-panel-content-title"><h2>Sidebars</h2></div> <div class="st-panel-title"><?php echo $save ?></div></div>	
			<div class="sith-options-item">
				<h3>Sidebar Position</h3>
				
					<?php
						$checked = 'checked="checked"';
						$sith_sidebar_pos = sith_get_option('sidebar_pos');
					?>



<?php
					sith_options(
						array(	"name" => "Sidebar Position",
								"id" => "sidebar_pos",
								"options" => array( "right"=>"Right",
													"left"=>"Left" ),
								"type" => "select")); 
								?>
			</div>
			
			<div class="sith-options-item">
				<h3>Add Sidebar</h3>
				<div class="option-item">
					<span class="label">Sidebar Name</span>
					
					<input id="sidebarName" type="text" size="56" style="direction:ltr; text-laign:left" name="sidebarName" value="" />
					<input id="sidebarAdd"  class="small_button" type="button" value="Add" />
					
					<ul id="sidebarsList">
					<?php $sidebars = sith_get_option( 'sidebars' ) ;
						if($sidebars){
							foreach ($sidebars as $sidebar) { ?>
						<li>
							<div class="widget-head"><?php echo $sidebar ?>  <input id="sith_sidebars" name="sith_options[sidebars][]" type="hidden" value="<?php echo $sidebar ?>" /><a class="del-sidebar"></a></div>
						</li>
							<?php }
						}
					?>
					</ul>
				</div>				
			</div>

			<div class="sith-options-item" id="custom-sidebars">
				<h3>Templates - Custom Sidebars</h3>
				<?php
				
				$new_sidebars = array(''=> 'Default');
				if (class_exists('Woocommerce'))
					$new_sidebars ['shop-widget-area'] = __( 'Shop - For WooCommerce Pages', 'sith' ) ;

				if($sidebars){
					foreach ($sidebars as $sidebar) {
						$new_sidebars[$sidebar] = $sidebar;
					}
				}
				
				
				sith_options(				
					array(	"name" => "Home Sidebar",
							"id" => "sidebar_home",
							"type" => "select",
							"options" => $new_sidebars ));
							
				sith_options(				
					array(	"name" => "Single Page Sidebar",
							"id" => "sidebar_page",
							"type" => "select",
							"options" => $new_sidebars ));
							
				sith_options(				
					array(	"name" => "Single Article Sidebar",
							"id" => "sidebar_post",
							"type" => "select",
							"options" => $new_sidebars ));
							
				sith_options(				
					array(	"name" => "Archives Sidebar",
							"id" => "sidebar_archive",
							"type" => "select",
							"options" => $new_sidebars ));



				?>
                </div>

			<div class="sith-options-item">
				<h3>Categories - Custom Sidebar</h3>
<?php
				foreach ($categories_obj as $pn_cat) {
					sith_options(				
						array(	"name" => '<em><small>Category : </small></em> '.$pn_cat->cat_name,
								"id" => "sidebar_cat_".$pn_cat->cat_ID,
								"type" => "select",
								"options" => $new_sidebars )); 
								
				}
?>


			</div>
            
                        			<div class="sith-options-item">
				<h3>Category Sidebar Position</h3>
				<?php
				$sidebar_cat_position = array();
				$sidebar_cat_position['sidebar-right'] = 'Right' ;
				$sidebar_cat_position['sidebar-left'] = 'Left' ;
				$sidebar_cat_position['home-full-layout-nosidebar'] = 'No sidebar' ; 
	
				foreach ($categories_obj as $pn_cat) {
					sith_options(				
						array(	"name" => $pn_cat->cat_name,
								"id" => "sidebar_position_".$pn_cat->cat_ID,
								"type" => "select",
								"options" => $sidebar_cat_position )); 	
				}
				?>
			</div>