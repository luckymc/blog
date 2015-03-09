			<div class="panel-head-title-save"><div class="st-panel-content-title"><h2>Integration</h2></div> <div class="st-panel-title"><?php echo $save ?></div></div>	
            
            
            			<div class="sith-options-item">
				<h3>Header Code</h3>
				<div class="option-item">
					<small>The following code will add to the &lt;head&gt; tag. Useful if you need to add additional scripts such as CSS or JS.</small>
					<textarea id="header_code" name="sith_options[header_code]" style="width:100%" rows="7"><?php echo htmlspecialchars_decode(sith_get_option('header_code'));  ?></textarea>				
				</div>
			</div>
			
			<div class="sith-options-item">
				<h3>Footer Code</h3>
				<div class="option-item">
					<small>The following code will add to the footer before the closing  &lt;/body&gt; tag. Useful if you need to Javascript or tracking code.</small>

					<textarea id="footer_code" name="sith_options[footer_code]" style="width:100%" rows="7"><?php echo htmlspecialchars_decode(sith_get_option('footer_code'));  ?></textarea>				
				</div>
			</div>	
            
			<div class="sith-options-item">
				<h3>Custom CSS</h3>	
				<div class="option-item">
					<p><strong>Global CSS :</strong></p>
					<textarea id="sith_css" name="sith_options[css]" style="width:100%" rows="7"><?php echo sith_get_option('css');  ?></textarea>
				</div>	
				<div class="option-item">
					<p><strong>Tablets CSS :</strong> Width from 768px to 985px</p>
					<textarea id="sith_css" name="sith_options[css_tablets]" style="width:100%" rows="7"><?php echo sith_get_option('css_tablets');  ?></textarea>
				</div>
				<div class="option-item">
					<p><strong>Wide Phones CSS :</strong> Width from 480px to 767px</p>
					<textarea id="sith_css" name="sith_options[css_wide_phones]" style="width:100%" rows="7"><?php echo sith_get_option('css_wide_phones');  ?></textarea>
				</div>
				<div class="option-item">
					<p><strong>Phones CSS :</strong> Width from 320px to 479px</p>
					<textarea id="sith_css" name="sith_options[css_phones]" style="width:100%" rows="7"><?php echo sith_get_option('css_phones');  ?></textarea>
				</div>	
			</div>	
            
            
            