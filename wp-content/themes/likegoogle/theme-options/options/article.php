<div class="panel-head-title-save"><div class="st-panel-content-title"><h2>Article Settings</h2></div> <div class="st-panel-title"><?php echo $save ?></div></div>
			
			<div class="sith-options-item">
				<h3>Article Elements</h3>
				<?php

					sith_options(
						array(	"name_checkbox" => "Post Author Box",
								"desc" => "",
								"id" => "post_authorbio",
								"type" => "checkbox"));

					sith_options(
						array(	"name_checkbox" => "Next/Prev Article",
								"desc" => "",
								"id" => "post_nav",
								"type" => "checkbox")); 

					sith_options(
						array(	"name_checkbox" => "OG Meta",
								"desc" => "",
								"id" => "post_og_cards",
								"type" => "checkbox")); 

				?>
			</div>
			
			<div class="sith-options-item">

				<h3>Post Meta Settings</h3>
				<?php
					sith_options(
						array(	"name_checkbox" => "Post Meta :",
								"id" => "post_meta",
								"type" => "checkbox"));

					sith_options(
						array(	"name_checkbox" => "Author Meta",
								"id" => "post_author",
								"type" => "checkbox"));

					sith_options(
						array(	"name_checkbox" => "Date Meta",
								"id" => "post_date",
								"type" => "checkbox"));


					sith_options(
						array(	"name_checkbox" => "Categories Meta",
								"id" => "post_cats",
								"type" => "checkbox"));


					sith_options(
						array(	"name_checkbox" => "Comments Meta",
								"id" => "post_comments",
								"type" => "checkbox"));


					sith_options(
						array(	"name_checkbox" => "Tags Meta",
								"id" => "post_tags",
								"type" => "checkbox"));

								
				?>	
			</div>

				
			<div class="sith-options-item">

				<h3>Share Post Settings</h3>
				<?php
					sith_options(
						array(	"name_checkbox" => "Bottom Share Post Buttons :",
								"id" => "share_post",
								"type" => "checkbox"));

					sith_options(
						array(	"name_checkbox" => "Top Share Post Buttons :",
								"id" => "share_post_top",
								"type" => "checkbox"));

					sith_options(
						array(	"name_checkbox" => "Tweet Button",
								"id" => "share_tweet",
								"type" => "checkbox"));
								
					sith_options(
						array(	"name" => "Twitter Username <small>(optional)</small>",
								"id" => "share_twitter_username",
								"type" => "text"));
						
					sith_options(
						array(	"name_checkbox" => "Facebook Like Button",
								"id" => "share_facebook",
								"type" => "checkbox"));
								
					sith_options(
						array(	"name_checkbox" => "Google+ Button",
								"id" => "share_google",
								"type" => "checkbox"));
								
																
					sith_options(
						array(	"name_checkbox" => "Linkedin Button",
								"id" => "share_linkdin",
								"type" => "checkbox"));
																					
					sith_options(
						array(	"name_checkbox" => "StumbleUpon Button",
								"id" => "share_stumble",
								"type" => "checkbox"));
								
																			
					sith_options(
						array(	"name_checkbox" => "Pinterest Button",
								"id" => "share_pinterest",
								"type" => "checkbox"));
								
				?>	
			</div>
            
            

				
			<div class="sith-options-item">

				<h3>Related Posts Settings</h3>
				<?php
					sith_options(
						array(	"name_checkbox" => "Related Posts",
								"id" => "related",
								"type" => "checkbox"));
								
					sith_options(
						array(	"name" => "Number of posts to show",
								"id" => "related_number",
								"type" => "short-text"));
								
					sith_options(
						array(	"name" => "Query Type",
								"id" => "related_query",
								"options" => array( "category"=>"Category" ,
													"tag"=>"Tag",
													"author"=>"Author" ),
								"type" => "radio")); 
				?>
			</div>