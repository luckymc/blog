			<div class="panel-head-title-save"><div class="st-panel-content-title"><h2>Banners Settings</h2></div> <div class="st-panel-title"><?php echo $save ?></div></div>

			<div class="sith-options-item">
				<h3>Top Banner Area</h3>
				<?php
					sith_options(				
						array(	"name_checkbox" => "Top Banner",
								"id" => "banner_top",
								"type" => "checkbox"));
				?>
				<div class="sith-accordion">
					<h3 class="accordion-head1">Image Ad</h3>
					<div class="sith-accordion-contnet2">
				<?php
					sith_options(			
						array(	"name" => "Top Banner Image",
								"id" => "banner_top_img",
								"type" => "upload")); 
								
					sith_options(					
						array(	"name" => "Top Banner Link",
								"id" => "banner_top_url",
								"type" => "text")); 
								
					sith_options(				
						array(	"name" => "Alternative Text For The image",
								"id" => "banner_top_alt",
								"type" => "text"));
								
					sith_options(
						array(	"name_checkbox" => "Open The Link In a new Tab",
								"id" => "banner_top_tab",
								"type" => "checkbox"));

					sith_options(
						array(	"name_checkbox" => "Nofollow",
								"id" => "banner_top_nofollow",
								"type" => "checkbox"));
				?>
					</div>
					<h3 class="accordion-head1">Responsive Google AdSense</h3>
					<div class="sith-accordion-contnet2">
				<?php
					sith_options(					
						array(	"name" => "Publisher ID",
								"id" => "banner_top_publisher",
								"type" => "text"));

					sith_options(					
						array(	"name" => "728x90 (Leaderboard) - ad ID",
								"id" => "banner_top_728",
								"type" => "text"));
								
					sith_options(					
						array(	"name" => "468x60 (Banner) - ad ID",
								"id" => "banner_top_468",
								"type" => "text"));
								
					sith_options(					
						array(	"name" => "300x250 (Medium Rectangle) - ad ID",
								"id" => "banner_top_300",
								"type" => "text"));

				?>
					</div>

				</div>

			</div>
	
	
		
	
