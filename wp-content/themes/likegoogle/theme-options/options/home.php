			<div class="panel-head-title-save"><div class="st-panel-content-title"><h2>Homepage</h2></div> <div class="st-panel-title"><?php echo $save ?></div></div>

<div class="sith-options-item"  style=" overflow: visible; ">
<h3>Home Template</h3>
<?php 
					sith_options(
						array(	"name" => "",
								"id" => "home_posts_template",
								"options" => array( "loop-excerpt"=>"Title, Excerpt + Featured image" ,
													"loop-full-content"=>"Full Content",
													"loop-full-thumb"=>"One grid/Full width" ,
													"loop-simple-list"=>"Simple List (No Image/No Excerpt)",
													"loop-1caption"=>"One/Full/Box Caption",
													"loop-2caption"=>"Two/Box Caption",),
								"type" => "radio")); 
								?>
</div>


<div id="hometpl_loop_excerpt">

<div class="sith-options-item">

				<?php
					sith_options(
						array(	"name_checkbox" => "Post title above the image",
								"id" => "post_title_position",
								"type" => "checkbox"));
				?>

<?php
					sith_options(
						array( 	"name" => "Post Title Limit",
								"id" => "title_limit",
								"type" => "short-text"));	
?>

<?php
					sith_options(
						array( 	"name" => "Excerpt Limit",
								"id" => "excerpt_limit",
								"type" => "short-text"));	
?>
</div>

</div>

<div id="hometpl_1caption">
<div class="sith-options-item">
<?php
					sith_options(
						array( 	"name" => "Post Title Limit",
								"id" => "post_caption_title_limit",
								"type" => "short-text"));	
?>
<?php
					sith_options(
						array( 	"name" => "Excerpt Limit",
								"id" => "post_caption_excerpt_limit",
								"type" => "short-text"));	
?>
</div>
            	<div class="sith-options-item">
				<?php
					sith_options(
						array(	"name_checkbox" => "Disable Excerpt",
								"id" => "disable_box_excerpt",
								"type" => "checkbox"));
				 /**/?></div>
</div>


<div id="hometpl_2caption">
<div class="sith-options-item">
<?php
					sith_options(
						array( 	"name" => "Post Title Limit",
								"id" => "post_caption_title_limit",
								"type" => "short-text"));	
?>
<?php
					sith_options(
						array( 	"name" => "Excerpt Limit",
								"id" => "post_caption_excerpt_limit",
								"type" => "short-text"));	
?>
</div>

            	<div class="sith-options-item">
				<?php
					sith_options(
						array(	"name_checkbox" => "Disable Excerpt",
								"id" => "disable_box_excerpt",
								"type" => "checkbox"));
				 /**/?></div>
</div>







            <div class="sith-options-item">
				<?php
					sith_options(
						array(	"name_checkbox" => "Enable Full Layout (No sidebar)",
								"id" => "full_home_nosidebar",
								"type" => "checkbox"));
				?>
			</div>
            


		<div class="homepage-template" id="hometpl_builder">
 			
			<div class="sith-options-item">
				<h3>Home Builder <a id="collapse-all">[-] Collapse All</a>
					<a id="expand-all">[+] Expand All</a></h3>
				<div class="option-item">

					<select style="display:none" id="cats_default">
						<?php foreach ($categories as $key => $option) { ?>
						<option value="<?php echo $key ?>"><?php echo $option; ?></option>
						<?php } ?>
					</select>
				
					
					<div style="clear:both"></div>
					<div class="home-builder-buttons">
                <a id="add-recent" title="Recent Posts"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/builder-recentposts.png" /></a>
				<a id="catbox1"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/builder-list.png" /></a>
                <a id="catbox2"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/builder-add-cat2.png" /></a>
                <a id="catbox3"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/builder-1wide.png" /></a>
				<a id="add-slider" title="Scrolling Box"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/builder-scrollingbox.png" /></a>
				<a id="add-ads" title="Ads / Custom Content"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/builder-ads-custom.png" /></a>
				<a id="add-news-picture" title="News in picture"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/builder-pic1.png" /></a>
                        <a id="add-news-picture2" title="News in picture 2"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/builder-pic2.png" /></a>
						<a id="add-news-videos" title="Videos box"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/builder-add-video.png" /></a>
						<a id="add-divider" title="Divider"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/builder-divider.png" /></a>
					</div>
										
					<ul id="cat_sortable">
						<?php
							$cats = get_option( 'sith_home_cats' ) ;
							$i=0;
							if($cats){
								foreach ($cats as $cat) { 
									$i++;
									?>
									<li id="listItem_<?php echo $i ?>" class="ui-state-default">
			
								<?php 
									if( $cat['type'] == 'n' ) :	?>

<div class="widget-head">News Box 1
  <?php if( !empty($cat['id']) ) echo get_the_category_by_ID( $cat['id'] ); ?>
  <a class="toggle-open">+</a> <a class="toggle-close">-</a> </div>
<div class="widget-content">
<label><span>Box Category:</span>
  <select name="sith_home_cats[<?php echo $i ?>][id]" id="sith_home_cats[<?php echo $i ?>][id]">
    <?php foreach ($categories as $key => $option) { ?>
    <option value="<?php echo $key ?>" <?php if ( $cat['id']  == $key) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
    <?php } ?>
  </select>
</label>
<label><span>Posts Order:</span>
  <select name="sith_home_cats[<?php echo $i ?>][order]" id="sith_home_cats[<?php echo $i ?>][order]">
    <option value="latest" <?php if( $cat['order'] == 'latest' || $cat['order']=='' ) echo 'selected="selected"'; ?>>Latest Posts</option>
    <option  <?php if( $cat['order'] == 'rand' ) echo 'selected="selected"'; ?> value="rand">Random Posts</option>
  </select>
</label>
<label for="sith_home_cats[<?php echo $i ?>][number]"><span>Number of posts to show :</span>
  <input style="width:50px;" id="sith_home_cats[<?php echo $i ?>][number]" name="sith_home_cats[<?php echo $i ?>][number]" value="<?php  if( !empty($cat['number']) ) echo $cat['number']  ?>" type="text" />
</label>
<label for="sith_home_cats[<?php echo $i ?>][offset]"><span>Offset - number of post to pass over</span>
  <input style="width:50px;" id="sith_home_cats[<?php echo $i ?>][offset]" name="sith_home_cats[<?php echo $i ?>][offset]" value="<?php  if( !empty($cat['offset']) ) echo $cat['offset']  ?>" type="text" />
</label>
<label style="display:none !important">
<span style="float:left;">Box Style:</span>
<ul class="sith-cats-options sith-options">
  <li>
    <input id="sith_home_cats[<?php echo $i ?>][style]" name="sith_home_cats[<?php echo $i ?>][style]" type="radio" value="catbox1" <?php if( $cat['style'] == 'catbox1' || $cat['style']=='catbox1' ) echo 'checked="checked"'; ?> />
  </li>
</ul>
</label>
<?php elseif( $cat['type'] == 'box2' ) :	?>
<div class="widget-head">News Box 2
  <?php if( !empty($cat['id']) ) echo get_the_category_by_ID( $cat['id'] ); ?>
  <a class="toggle-open">+</a> <a class="toggle-close">-</a> </div>
<div class="widget-content">
<label><span>Box Category:</span>
  <select name="sith_home_cats[<?php echo $i ?>][id]" id="sith_home_cats[<?php echo $i ?>][id]">
    <?php foreach ($categories as $key => $option) { ?>
    <option value="<?php echo $key ?>" <?php if ( $cat['id']  == $key) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
    <?php } ?>
  </select>
</label>
<label><span>Posts Order:</span>
  <select name="sith_home_cats[<?php echo $i ?>][order]" id="sith_home_cats[<?php echo $i ?>][order]">
    <option value="latest" <?php if( $cat['order'] == 'latest' || $cat['order']=='' ) echo 'selected="selected"'; ?>>Latest Posts</option>
    <option  <?php if( $cat['order'] == 'rand' ) echo 'selected="selected"'; ?> value="rand">Random Posts</option>
  </select>
</label>
<label for="sith_home_cats[<?php echo $i ?>][number]"><span>Number of posts to show :</span>
  <input style="width:50px;" id="sith_home_cats[<?php echo $i ?>][number]" name="sith_home_cats[<?php echo $i ?>][number]" value="<?php  if( !empty($cat['number']) ) echo $cat['number']  ?>" type="text" />
</label>
<label for="sith_home_cats[<?php echo $i ?>][offset]"><span>Offset - number of post to pass over</span>
  <input style="width:50px;" id="sith_home_cats[<?php echo $i ?>][offset]" name="sith_home_cats[<?php echo $i ?>][offset]" value="<?php  if( !empty($cat['offset']) ) echo $cat['offset']  ?>" type="text" />
</label>
<label style="display:none !important">
<span style="float:left;">Box Style:</span>
<ul class="sith-cats-options sith-options">
  <li>
    <input id="sith_home_cats[<?php echo $i ?>][style]" name="sith_home_cats[<?php echo $i ?>][style]" type="radio" value="catbox2" <?php if( $cat['style'] == 'catbox2' || $cat['style']=='catbox2' ) echo 'checked="checked"'; ?> />
  </li>
</ul>
</label>
<?php elseif( $cat['type'] == 'box3' ) :	?>
<div class="widget-head">News Box 3
  <?php if( !empty($cat['id']) ) echo get_the_category_by_ID( $cat['id'] ); ?>
  <a class="toggle-open">+</a> <a class="toggle-close">-</a> </div>
<div class="widget-content">
<label><span>Box Category:</span>
  <select name="sith_home_cats[<?php echo $i ?>][id]" id="sith_home_cats[<?php echo $i ?>][id]">
    <?php foreach ($categories as $key => $option) { ?>
    <option value="<?php echo $key ?>" <?php if ( $cat['id']  == $key) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
    <?php } ?>
  </select>
</label>
<label><span>Posts Order:</span>
  <select name="sith_home_cats[<?php echo $i ?>][order]" id="sith_home_cats[<?php echo $i ?>][order]">
    <option value="latest" <?php if( $cat['order'] == 'latest' || $cat['order']=='' ) echo 'selected="selected"'; ?>>Latest Posts</option>
    <option  <?php if( $cat['order'] == 'rand' ) echo 'selected="selected"'; ?> value="rand">Random Posts</option>
  </select>
</label>
<label for="sith_home_cats[<?php echo $i ?>][number]"><span>Number of posts to show :</span>
  <input style="width:50px;" id="sith_home_cats[<?php echo $i ?>][number]" name="sith_home_cats[<?php echo $i ?>][number]" value="<?php  if( !empty($cat['number']) ) echo $cat['number']  ?>" type="text" />
</label>
<label for="sith_home_cats[<?php echo $i ?>][offset]"><span>Offset - number of post to pass over</span>
  <input style="width:50px;" id="sith_home_cats[<?php echo $i ?>][offset]" name="sith_home_cats[<?php echo $i ?>][offset]" value="<?php  if( !empty($cat['offset']) ) echo $cat['offset']  ?>" type="text" />
</label>
<label style="display:none !important">
<span style="float:left;">Box Style:</span>
<ul class="sith-cats-options sith-options">
  <li>
    <input id="sith_home_cats[<?php echo $i ?>][style]" name="sith_home_cats[<?php echo $i ?>][style]" type="radio" value="catbox3" <?php if( $cat['style'] == 'catbox3' || $cat['style']=='catbox3' ) echo 'checked="checked"'; ?> />
  </li>
</ul>
</label>


<?php elseif( $cat['type'] == 'recent' ) :	?>
										<div class="widget-head"> Recent Posts 
											<a class="toggle-open">+</a>
											<a class="toggle-close">-</a>
										</div>
										<div class="widget-content">
											<label><span style="float:left;">Exclude This Categories : </span><select multiple="multiple" name="sith_home_cats[<?php echo $i ?>][exclude][]" id="sith_home_cats[<?php echo $i ?>][exclude][]">
												<?php foreach ($categories as $key => $option) { ?>
												<option value="<?php echo $key ?>" <?php if ( @in_array( $key , $cat['exclude'] ) ) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
												<?php } ?>
											</select></label>
											<label for="sith_home_cats[<?php echo $i ?>][title]"><span>Box Title :</span><input id="sith_home_cats[<?php echo $i ?>][title]" name="sith_home_cats[<?php echo $i ?>][title]" value="<?php   if( !empty($cat['title']) ) echo $cat['title']  ?>" type="text" /></label>
											<label for="sith_home_cats[<?php echo $i ?>][number]"><span>Number of posts to show :</span><input style="width:50px;" id="sith_home_cats[<?php echo $i ?>][number]" name="sith_home_cats[<?php echo $i ?>][number]" value="<?php   if( !empty($cat['number']) ) echo $cat['number']  ?>" type="text" /></label>
											<label for="sith_home_cats[<?php echo $i ?>][offset]"><span>Offset - number of post to pass over</span><input style="width:50px;" id="sith_home_cats[<?php echo $i ?>][offset]" name="sith_home_cats[<?php echo $i ?>][offset]" value="<?php   if( !empty($cat['offset']) ) echo $cat['offset']  ?>" type="text" /></label>
											<label for="sith_home_cats[<?php echo $i ?>][display]"><span>Display Mode:</span>
												<select id="sith_home_cats[<?php echo $i ?>][display]" name="sith_home_cats[<?php echo $i ?>][display]">
													<option value="default" <?php if ( $cat['display'] == 'default') { echo ' selected="selected"' ; } ?>>Default Style</option>
													<option value="blog" <?php if ( $cat['display'] == 'blog') { echo ' selected="selected"' ; } ?>>Blog Style</option>
												</select>
											</label>
											<label for="sith_home_cats[<?php echo $i ?>][pagi]"><span>Show Pagination:</span>
												<select id="sith_home_cats[<?php echo $i ?>][pagi]" name="sith_home_cats[<?php echo $i ?>][pagi]">
													<option value="n" <?php if ( $cat['pagi'] == 'n') { echo ' selected="selected"' ; } ?>>No</option>
													<option value="y" <?php if ( $cat['pagi'] == 'y') { echo ' selected="selected"' ; } ?>>Yes</option>
												</select>
											</label>
											<p class="sith_message_hint">WordPress WARNING: Setting the offset option breaks pagination, set pagination option to "NO" if you want to use the offset option.</p>
											<input id="sith_home_cats[<?php echo $i ?>][boxid]" name="sith_home_cats[<?php echo $i ?>][boxid]" value="<?php  if(empty($cat['boxid'])) echo $cat['type'].'_'.rand(200, 3500); else echo $cat['boxid'];  ?>" type="hidden" />
										
									<?php elseif( $cat['type'] == 's' ) : ?>
										<div class="widget-head scrolling-box"> Scrolling Box : <?php if( !empty($cat['id']) ) echo get_the_category_by_ID( $cat['id'] ); ?>
											<a class="toggle-open">+</a>
											<a class="toggle-close">-</a>
										</div>
										<div class="widget-content">
											<label><span>Box Category : </span><select name="sith_home_cats[<?php echo $i ?>][id]" id="sith_home_cats[<?php echo $i ?>][id]">
												<?php foreach ($categories as $key => $option) { ?>
												<option value="<?php echo $key ?>" <?php if ( $cat['id']  == $key) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
												<?php } ?>
											</select></label>
											<label for="sith_home_cats[<?php echo $i ?>][title]"><span>Box Title :</span><input id="sith_home_cats[<?php echo $i ?>][title]" name="sith_home_cats[<?php echo $i ?>][title]" value="<?php   if( !empty($cat['title']) ) echo $cat['title']  ?>" type="text" /></label>
											<label for="sith_home_cats[<?php echo $i ?>][number]"><span>Number of posts to show :</span><input style="width:50px;" id="sith_home_cats[<?php echo $i ?>][number]" name="sith_home_cats[<?php echo $i ?>][number]" value="<?php   if( !empty($cat['number']) ) echo $cat['number']  ?>" type="text" /></label>
											<label for="sith_home_cats[<?php echo $i ?>][offset]"><span>Offset - number of post to pass over</span><input style="width:50px;" id="sith_home_cats[<?php echo $i ?>][offset]" name="sith_home_cats[<?php echo $i ?>][offset]" value="<?php   if( !empty($cat['offset']) ) echo $cat['offset']  ?>" type="text" /></label>
											<input id="sith_home_cats[<?php echo $i ?>][boxid]" name="sith_home_cats[<?php echo $i ?>][boxid]" value="<?php  if(empty($cat['boxid'])) echo $cat['type'].'_'.rand(200, 3500); else echo $cat['boxid'];  ?>" type="hidden" />
									<?php elseif( $cat['type'] == 'ads' ) : ?>
										<div class="widget-head ads-box"> Ads / Custom Content
											<a class="toggle-open">+</a>
											<a class="toggle-close">-</a>
										</div>
										<div class="widget-content">
											<textarea cols="36" rows="5" name="sith_home_cats[<?php echo $i ?>][text]" id="sith_home_cats[<?php echo $i ?>][text]"><?php  if( !empty($cat['text']) ) echo stripslashes($cat['text']) ; ?></textarea>
											<small>Supports <strong>Text, HTML and Shortcodes</strong> .</small>

										
<?php elseif( $cat['type'] == 'news-pic' ) : ?>
										<div class="widget-head news-pic-box">  News In Picture
											<a class="toggle-open">+</a>
											<a class="toggle-close">-</a>
										</div>
										<div class="widget-content">
											<label><span>Box Category : </span><select name="sith_home_cats[<?php echo $i ?>][id]" id="sith_home_cats[<?php echo $i ?>][id]">
												<?php foreach ($categories as $key => $option) { ?>
												<option value="<?php echo $key ?>" <?php if ( $cat['id']  == $key) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
												<?php } ?>
											</select></label>
											<label for="sith_home_cats[<?php echo $i ?>][title]"><span>Box Title :</span><input id="sith_home_cats[<?php echo $i ?>][title]" name="sith_home_cats[<?php echo $i ?>][title]" value="<?php if( !empty($cat['title']) ) echo $cat['title']  ?>" type="text" /></label>
											<label for="sith_home_cats[<?php echo $i ?>][offset]"><span>Offset - number of post to pass over</span><input style="width:50px;" id="sith_home_cats[<?php echo $i ?>][offset]" name="sith_home_cats[<?php echo $i ?>][offset]" value="<?php  if( !empty($cat['offset']) ) echo $cat['offset']  ?>" type="text" /></label>
											<label>

												<ul class="sith-cats-options sith-options" style="display:none;">
													<li>
														<input id="sith_home_cats[<?php echo $i ?>][style]" name="sith_home_cats[<?php echo $i ?>][style]" type="radio" value="default" <?php if( $cat['style'] == 'default' || $cat['style']=='' ) echo 'checked="checked"'; ?> />
													</li>

												</ul>
											</label>
											<input id="sith_home_cats[<?php echo $i ?>][boxid]" name="sith_home_cats[<?php echo $i ?>][boxid]" value="<?php  if(empty($cat['boxid'])) echo $cat['type'].'_'.rand(200, 3500); else echo $cat['boxid'];  ?>" type="hidden" />
                                            
<?php elseif( $cat['type'] == 'news-pic2' ) : ?>
										<div class="widget-head news-pic-box">  News In Picture
											<a class="toggle-open">+</a>
											<a class="toggle-close">-</a>
										</div>
										<div class="widget-content">
											<label><span>Box Category : </span><select name="sith_home_cats[<?php echo $i ?>][id]" id="sith_home_cats[<?php echo $i ?>][id]">
												<?php foreach ($categories as $key => $option) { ?>
												<option value="<?php echo $key ?>" <?php if ( $cat['id']  == $key) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
												<?php } ?>
											</select></label>
											<label for="sith_home_cats[<?php echo $i ?>][title]"><span>Box Title :</span><input id="sith_home_cats[<?php echo $i ?>][title]" name="sith_home_cats[<?php echo $i ?>][title]" value="<?php if( !empty($cat['title']) ) echo $cat['title']  ?>" type="text" /></label>
											<label for="sith_home_cats[<?php echo $i ?>][offset]"><span>Offset - number of post to pass over</span><input style="width:50px;" id="sith_home_cats[<?php echo $i ?>][offset]" name="sith_home_cats[<?php echo $i ?>][offset]" value="<?php  if( !empty($cat['offset']) ) echo $cat['offset']  ?>" type="text" /></label>
											<label style="display:none;">

												<ul class="sith-cats-options sith-options">
													<li>
														<input id="sith_home_cats[<?php echo $i ?>][style]" name="sith_home_cats[<?php echo $i ?>][style]" type="radio" value="row" <?php if( $cat['style'] == 'row' || $cat['style']=='' ) echo 'checked="checked"'; ?> />
													</li>

												</ul>
											</label>
											<input id="sith_home_cats[<?php echo $i ?>][boxid]" name="sith_home_cats[<?php echo $i ?>][boxid]" value="<?php  if(empty($cat['boxid'])) echo $cat['type'].'_'.rand(200, 3500); else echo $cat['boxid'];  ?>" type="hidden" />
								
								<?php elseif( $cat['type'] == 'videos' ) : ?>
										<div class="widget-head news-pic-box">Videos
											<a class="toggle-open">+</a>
											<a class="toggle-close">-</a>
										</div>
										<div class="widget-content">
											<label><span>Box Category : </span><select name="sith_home_cats[<?php echo $i ?>][id]" id="sith_home_cats[<?php echo $i ?>][id]">
												<?php foreach ($categories as $key => $option) { ?>
												<option value="<?php echo $key ?>" <?php if ( $cat['id']  == $key) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
												<?php } ?>
											</select></label>
											<label for="sith_home_cats[<?php echo $i ?>][title]"><span>Box Title :</span><input id="sith_home_cats[<?php echo $i ?>][title]" name="sith_home_cats[<?php echo $i ?>][title]" value="<?php if( !empty($cat['title']) )  echo $cat['title']  ?>" type="text" /></label>
											<label for="sith_home_cats[<?php echo $i ?>][offset]"><span>Offset - number of post to pass over</span><input style="width:50px;" id="sith_home_cats[<?php echo $i ?>][offset]" name="sith_home_cats[<?php echo $i ?>][offset]" value="<?php  if( !empty($cat['offset']) )  echo $cat['offset']  ?>" type="text" /></label>
											<input id="sith_home_cats[<?php echo $i ?>][boxid]" name="sith_home_cats[<?php echo $i ?>][boxid]" value="<?php  if(empty($cat['boxid'])) echo $cat['type'].'_'.rand(200, 3500); else echo $cat['boxid'];  ?>" type="hidden" />
								
									<?php elseif( $cat['type'] == 'divider' ) : ?>
										<div class="widget-head news-pic-box">  Divider
											<a class="toggle-open">+</a>
											<a class="toggle-close">-</a>
										</div>
										<div class="widget-content">
											<label for="sith_home_cats[<?php echo $i ?>][height]"><span>Height :</span><input id="sith_home_cats[<?php echo $i ?>][height]" name="sith_home_cats[<?php echo $i ?>][height]" value="<?php  echo $cat['height']  ?>" type="text" style="width:50px;" /> px</label>

									<?php endif; ?>
									
									
											<input id="sith_home_cats[<?php echo $i ?>][type]" name="sith_home_cats[<?php echo $i ?>][type]" value="<?php  echo $cat['type']  ?>" type="hidden" />
											<a class="del-cat"></a>
										
										</div>
									</li>
							<?php } 
							} else{?>
							<?php } ?>
					</ul>

					<script>
						var nextCell = <?php echo $i+1 ?> ;
						var templatePath =' <?php echo get_template_directory_uri(); ?>';
					</script>
				</div>
                
                			<div>
				<h3>News Boxes Settings</h3>
				<?php
					sith_options(
						array( 	"name" => "First News Excerpt Length",
								"id" => "home_exc_length",
								"type" => "short-text"));	
		
					sith_options(
						array(	"name_checkbox" => "Author Meta",
								"id" => "box_meta_author",
								"type" => "checkbox",
								"extra_text" => 'This option not applied on Scrolling boxes and Recent posts Blog Style .')); 			
					sith_options(
						array(	"name_checkbox" => "Date Meta",
								"id" => "box_meta_date",
								"type" => "checkbox"));
					sith_options(
						array(	"name_checkbox" => "Categories Meta",
								"id" => "box_meta_cats",
								"type" => "checkbox",
								"extra_text" => 'This option not applied on Scrolling boxes and Recent posts Blog Style .')); 
					sith_options(
						array(	"name_checkbox" => "Comments Meta",
								"id" => "box_meta_comments",
								"type" => "checkbox",
								"extra_text" => 'This option not applied on Scrolling boxes and Recent posts Blog Style .')); 
				
				
				
									sith_options(
						array(	"name_checkbox" => "Home Builder Disabled?",
								"id" => "disable_home_builder",
								"type" => "checkbox",
								)); 
				
				?>
			</div>	
                	
			</div>
            
            
            
			
			<div class="sith-options-item">
				<h3>Categories Tabs Box</h3>
				
				<?php
				sith_options(
					array(	"name_checkbox" => "Show Category Tabs Box",
							"id" => "home_tabs_box",
							"type" => "checkbox")); 
							
					if( sith_get_option('home_tabs') )
						$sith_home_tabs = sith_get_option('home_tabs') ;
					else 
						$sith_home_tabs = array();
					
					$sith_home_tabs_new = array();					
					
					foreach ($sith_home_tabs as $key1 => $option1) {
						if ( array_key_exists( $option1 , $categories) )
							$sith_home_tabs_new[$option1] = $categories[$option1];
					}
					foreach ($categories as $key2 => $option2) {
						if ( !in_array( $key2 , $sith_home_tabs) )
							$sith_home_tabs_new[$key2] = $option2;
					}
				?>
					
				<div class="option-item">
					<span class="label">Choose Categories : </span>
					<div class="clear"></div> <p></p>
					<ul id="tabs_cats">
						<?php foreach ($sith_home_tabs_new as $key => $option) { ?>
						<li><input id="sith_home_tabs" name="sith_options[home_tabs][]" type="checkbox" <?php if ( in_array( $key , $sith_home_tabs) ) { echo ' checked="checked"' ; } ?> value="<?php echo $key ?>">
						<span><?php echo $option; ?></span></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>