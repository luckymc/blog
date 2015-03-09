<div class="clear"></div>
</div>
<!-- .container /-->
<div class="footer-container">
<div class="container-boxedDISABLED container-full">
<?php sith_banner('banner_bottom' , '<div class="ads-bottom">' , '</div>' ); ?>
<?php get_template_part('footer-widgets');?>
<div class="clear"></div>
<div class="footer-layout">
  <div class="container">
    <div class="left">
      <?php if( sith_get_option( 'footer_text' ) );
else {
	$footer_time = mysql2date('Y',current_time('timestamp'));
echo '&#169; '.$footer_time;''; echo ' - '; echo  bloginfo( 'name' ); echo ' - Powered by <a href="http://www.wordpress.org">WordPress</a> | Designed by <a href="http://www.themenovum.com" title="ThemeNovum" target="_blank">ThemeNovum</a>';
}
if( sith_get_option('footer_text') )

				$footer_vars = array('%year%' , '%site%' , '%url%');
				$footer_val  = array( date('Y') , get_bloginfo('name') , home_url() );
				$footer_text  = str_replace( $footer_vars , $footer_val , sith_get_option( 'footer_text' ));
				echo htmlspecialchars_decode( $footer_text ); 
?>

    </div>
 
  </div>
  <!-- .Container --> 
</div>

</div>
</div>

<?php wp_footer();?>
</body></html>