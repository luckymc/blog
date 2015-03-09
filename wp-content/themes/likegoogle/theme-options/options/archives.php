			<div class="panel-head-title-save"><div class="st-panel-content-title"><h2>Archives Settings</h2></div> <div class="st-panel-title"><?php echo $save ?></div></div>	
            
            
            			<div class="sith-options-item">
				<h3>Category Template</h3>
				<?php
				$cate_template = array();
				//$cate_template[''] = 'Disabled';
				$cate_template['loop-excerpt'] = 'Title, Excerpt + Featured image' ;
				$cate_template['loop-full-content'] = 'Full Content';
				$cate_template['loop-full-thumb'] = 'One grid/Full width' ;
				$cate_template['loop-simple-list'] = 'Simple List (No Image/No Excerpt)';
				$cate_template['loop-1caption'] = 'One/Full/Box Caption';
				$cate_template['loop-2caption'] = 'Two/Box Caption';

				/*while ( $custom_slider->have_posts() ) {
					$custom_slider->the_post();
					$cate_template[get_the_ID()] = get_the_title();
				}*/
	
				foreach ($categories_obj as $pn_cat) {
					sith_options(				
						array(	"name" => $pn_cat->cat_name,
								"id" => "cate_template_".$pn_cat->cat_ID,
								"type" => "select",
								"options" => $cate_template )); 	
				}
				?>
			</div>