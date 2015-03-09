			<div class="panel-head-title-save"><div class="st-panel-content-title"><h2>Footer Settings</h2></div> <div class="st-panel-title"><?php echo $save ?></div></div>
            
            
            			<div class="sith-options-item">
				<h3>Footer Text</h3>
				<div class="option-item">
					<textarea id="sith_footer_text" name="sith_options[footer_text]" style="width:100%" rows="4"><?php 				
				echo htmlspecialchars_decode(sith_get_option('footer_text'));  ?></textarea>				
					
				</div>
			</div>

			
			<div class="sith-options-item">
				<h3>Footer Layout</h3>
					<div class="option-item">

					<?php
						$checked_footer = 'checked="checked"';
						$sith_footer_widgets = sith_get_option('footer_widgets');
					?>
					<ul id="footer-widgets-options" class="sith-options">
						<li>
							<input id="sith_footer_widgets"  name="sith_options[footer_widgets]" type="radio" value="footer-1c" <?php if($sith_footer_widgets == 'footer-1c') echo $checked_footer; ?> />
							<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/footer-widgets-1.png" /></a>
						</li>
						<li>
							<input id="sith_footer_widgets"  name="sith_options[footer_widgets]" type="radio" value="footer-2c" <?php if($sith_footer_widgets == 'footer-2c') echo $checked_footer; ?> />
							<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/footer-widgets-2.png" /></a>
						</li>
                        
						<li>
							<input id="sith_footer_widgets"  name="sith_options[footer_widgets]" type="radio" value="footer-3c" <?php if($sith_footer_widgets == 'footer-3c' || !$sith_footer_widgets ) echo $checked_footer; ?> />
							<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/footer-widgets-3.png" /></a>
						</li>
                        
						<li>
							<input id="sith_footer_widgets"  name="sith_options[footer_widgets]" type="radio" value="footer-4c" <?php if($sith_footer_widgets == 'footer-4c') echo $checked_footer; ?> />
							<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/footer-widgets-4.png" /></a>
						</li>
						<li>

						<li>
							<input id="sith_footer_widgets"  name="sith_options[footer_widgets]" type="radio" value="disable" <?php if($sith_footer_widgets == 'disable') echo $checked_footer; ?> />
							<a class="checkbox-select" href="#"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/footer-widgets-0.png" /></a>
						</li>

					</ul>
				</div>
			</div>