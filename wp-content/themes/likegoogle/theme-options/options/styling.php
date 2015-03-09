
<div class="panel-head-title-save">
  <div class="st-panel-content-title">
    <h2>Styling</h2>
  </div>
  <div class="st-panel-title"><?php echo $save ?></div>
</div>
<div class="sith-options-item">
  <div class="option-item">
    <?php
											sith_options(
						array(	"name" => "Primary Color",
								"id" => "theme_color",
								"type" => "color"));
					?>
  </div>
</div>
<div class="sith-options-item">
  <h3>Body Styling</h3>
  <?php

					sith_options(
						array(	"name" => "Links Decoration",
								"id" => "links_decoration",
								"type" => "select",
								"options" => array( ""=>"Default" ,
													"none"=>"none",
													"underline"=>"underline",
													"overline"=>"overline",
													"line-through"=>"line-through" )));

					sith_options(
						array(	"name" => "Links Color on mouse over",
								"id" => "links_color_hover",
								"type" => "color"));
	
					sith_options(
						array(	"name" => "Links Decoration on mouse over",
								"id" => "links_decoration_hover",
								"type" => "select",
								"options" => array( ""=>"Default" ,
													"none"=>"none",
													"underline"=>"underline",
													"overline"=>"overline",
													"line-through"=>"line-through" )));
					sith_options(
						array(	"name" => "Highlighted Text Color",
								"id" => "highlighted_color",
								"type" => "color"));
				?>
</div>
<div class="sith-options-item">
  <h3>Body Background</h3>
  <?php
					sith_options(
						array(	"name" => "Custom Background",
								"id" => "background",
								"type" => "background"));
				?>
  <?php
					sith_options(
						array(	"name_checkbox" => "Full Screen Background",
								"id" => "background_full",
								"type" => "checkbox"));
				?>
</div>
<div class="sith-options-item">
  <h3>Top Navigation Styling</h3>
  <?php
							
					sith_options(
						array(	"name" => "Links Color",
								"id" => "topnav_links_color",
								"type" => "color"));
								
					sith_options(
						array(	"name" => "Background Color on mouse over",
								"id" => "topnav_background_links_color_hover",
								"type" => "color"));
								
					sith_options(
						array(	"name" => "Links Color on mouse over",
								"id" => "topnav_links_color_hover",
								"type" => "color"));
				?>
  <?php

					sith_options(
						array(	"name" => "Sub Menu Links Color",
								"id" => "topnav_submenu_links_color",
								"type" => "color"));

					sith_options(
						array(	"name" => "Current Item Background Color",
								"id" => "topnav_current_links_background",
								"type" => "color"));
								
					sith_options(
						array(	"name" => "Current Item Links Color",
								"id" => "topnav_current_links_color",
								"type" => "color"));
									
				?>
</div>
<div class="sith-options-item">
  <h3>Header Background</h3>
  <?php
					sith_options(
						array(	"name" => "Background",
								"id" => "header_background",
								"type" => "background"));
								
								
				sith_options(
						array(	"name" => "Text Color",
								"id" => "header_text_color",
								"type" => "color"));
				sith_options(
						array(	"name" => "Link Color",
								"id" => "header_links_color",
								"type" => "color"));

				?>
</div>

			<div class="sith-options-item">
				<h3>Main Navigation Styling</h3>
				<?php
					sith_options(
						array(	"name" => "Mai Nav Background",
								"id" => "mainnav_background",
								"type" => "background"));
								
					sith_options(
						array(	"name" => "Links Color",
								"id" => "mainnav_links_color",
								"type" => "color"));
								
					sith_options(
						array(	"name" => "Main Background Color on mouse over",
								"id" => "mainnav_background_links_color_hover",
								"type" => "color"));
								
					sith_options(
						array(	"name" => "Links Color on mouse over",
								"id" => "mainnav_links_color_hover",
								"type" => "color"));

					sith_options(
						array(	"name" => "Sub Menu Background",
								"id" => "mainnav_submenu_background2",
								"type" => "color"));

					sith_options(
						array(	"name" => "Sub Menu Links Color",
								"id" => "mainnav_submenu_links_color",
								"type" => "color"));

								
					sith_options(
						array(	"name" => "Current Item Background Color",
								"id" => "mainnav_current_links_background",
								"type" => "color"));
								
					sith_options(
						array(	"name" => "Current Item Links Color",
								"id" => "mainnav_current_links_color",
								"type" => "color"));
									
				?>
			</div>

<div class="sith-options-item">
  <?php								
					sith_options(
						array(	"name" => "Search Button Icon Color",
								"id" => "search_button_color",
								"type" => "color"));
				?>
</div>
<div class="sith-options-item">
  <h3>Breadcrumbs</h3>
  <?php
							
					sith_options(
						array(	"name" => "Breadcrumbs Text Color",
								"id" => "breadcrumbs_text_color",
								"type" => "color"));
								
					sith_options(
						array(	"name" => "Breadcrumbs Link Color",
								"id" => "breadcrumbs_links_color",
								"type" => "color"));
								
					sith_options(
						array(	"name" => "Breadcrumbs Link Color on mouse over",
								"id" => "breadcrumbs_links_color_hover",
								"type" => "color"));
									
				?>
</div>

<div class="sith-options-item">
  <h3>Post Styling</h3>
  <p class="sith_message_hint">
Title, Excerpt + Featured image,One grid/Full width
Simple List (No Image/No Excerpt)
  </p>
  <?php
				
					sith_options(
						array(	"name" => "Post Links Color",
								"id" => "post_title_color",
								"type" => "color"));
					sith_options(
						array(	"name" => "Post Links Color on mouse over",
								"id" => "post_title_color_hover",
								"type" => "color"));									
				?>
</div>

<div class="sith-options-item">
  <h3>Post Caption Design</h3>
  <p class="sith_message_hint"> One/Full/Box Caption, Two/Box Caption </p>
  <?php
				
					sith_options(
						array(	"name" => "Title Background",
								"id" => "postcaption_bg_title",
								"type" => "color"));
					sith_options(
						array(	"name" => "Title Color",
								"id" => "postcaption_color_title",
								"type" => "color"));
							
					sith_options(
						array(	"name" => "Excerpt Background",
								"id" => "postcaption_bg_excerpt",
								"type" => "color"));
								
					sith_options(
						array(	"name" => "Excerpt Color",
								"id" => "postcaption_color_excerpt",
								"type" => "color"));
									
				?>
</div>
<div class="sith-options-item">
  <h3>Widgets</h3>
  <?php
								
					sith_options(
						array(	"name" => "Widget Title Color",
								"id" => "widget_title_color",
								"type" => "color"));
																
					sith_options(
						array(	"name" => "Widget Links Color",
								"id" => "widget_links_color",
								"type" => "color"));
					sith_options(
						array(	"name" => "Widget Links Color on mouse over",
								"id" => "widget_links_color_hover",
								"type" => "color"));	
									
				?>
</div>
<div class="sith-options-item">
  <h3>Footer Background</h3>
  <?php
					sith_options(
						array(	"name" => "Footer Text color",
								"id" => "footer_text_color",
								"type" => "color"));
				?>
  <?php
					sith_options(
						array(	"name" => "Links Color",
								"id" => "footer_links_color",
								"type" => "color"));
				?>
  <?php
					sith_options(
						array(	"name" => "Links Color on mouse over",
								"id" => "footer_links_color_hover",
								"type" => "color"));
				?>
</div>
