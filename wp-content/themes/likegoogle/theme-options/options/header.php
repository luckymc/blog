			<div class="panel-head-title-save"><div class="st-panel-content-title"><h2>Header Settings</h2></div> <div class="st-panel-title"><?php echo $save ?></div></div>
			
			<div class="sith-options-item">
				<h3>Logo</h3>
				<?php
					sith_options(
						array( 	"name" => "Logo Setting",
								"id" => "logo_setting",
								"type" => "radio",
								"options" => array( "logo"=>"Custom Image Logo" ,
													"title"=>"Text logo - Title/Description" )));

					sith_options(
						array(	"name" => "Logo Image",
								"id" => "logo",
								"help" => "",
								"type" => "upload")); 


					sith_options(
						array(	"name_checkbox" => "Full Width Logo",
								"id" => "full_logo",
								"type" => "checkbox",
								"extra_text" => '*Recommended logo width : 728px')); 

	
				?>

			</div>
            <div class="sith-options-item">
				<h3>Logo Position</h3>
            
            <?php
								sith_options(
						array( 	"name" => "Logo Position",
								"id" => "header_position",
								"type" => "radio",
								"options" => array( "header_pos_default"=>"Default" ,
													"header_pos_center"=>"Header Center",
													"header_pos_right"=>"Right" )
													));
													
													?>
            
            
            </div>
            			<div class="sith-options-item">
				<h3>Custom Favicon</h3>
				<?php
					sith_options(
						array(	"name" => "Custom Favicon",
								"id" => "favicon",
								"type" => "upload"));
				?>
			</div>
     
			

			<div class="sith-options-item">

				<?php
					sith_options(
						array(	"name_checkbox" => "Hide Top menu",
								"id" => "top_menu",
								"type" => "checkbox"));

					sith_options(
						array(	"name_checkbox" => "Hide Main Nav",
								"id" => "main_nav",
								"type" => "checkbox"));	
	

													sith_options(
						array(	"name_checkbox" => "Disable Header Search?",
								"id" => "header_search",
								"type" => "checkbox")); 					
								
													sith_options(
						array(	"name_checkbox" => "Disable Top Social Icons?",
								"id" => "header_social_icons",
								"type" => "checkbox")); 
		
				?>		
			</div>
			

			
			<div class="sith-options-item">
				<h3>Breadcrumbs Settings</h3>
				<?php
			
					sith_options(
						array(	"name_checkbox" => "Breadcrumbs ",
								"id" => "breadcrumbs",
								"type" => "checkbox")); 
			
					sith_options(
						array(	"name" => "Breadcrumbs Delimiter",
								"id" => "breadcrumbs_delimiter",
								"type" => "short-text"));
				?>
			</div>