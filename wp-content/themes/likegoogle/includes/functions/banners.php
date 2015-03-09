<?php
function sith_banner( $banner , $before= false , $after = false){
	if(sith_get_option( $banner )):
		echo $before;
		?>
		<?php
		if(sith_get_option( $banner.'_img' )):
			$target = $nofollow ="";
			if( sith_get_option( $banner.'_tab' )) $target='target="_blank"';
			if( sith_get_option( $banner.'_nofollow' )) $nofollow='rel="nofollow"'; ?>
			
			<a href="<?php echo sith_get_option( $banner.'_url' ) ?>" title="<?php echo sith_get_option( $banner.'_alt') ?>" <?php echo $target; echo $nofollow ?>>
				<img src="<?php echo sith_get_option( $banner.'_img' ) ?>" alt="<?php echo sith_get_option( $banner.'_alt') ?>" />
			</a>
		<?php elseif( sith_get_option( $banner.'_publisher' ) ): ?>
		<script type="text/javascript">
			var adWidth = jQuery(document).width();
			google_ad_client = "<?php echo sith_get_option( $banner.'_publisher' ) ?>";
			<?php if( $banner != 'banner_above' && $banner != 'banner_below' ){ ?>if ( adWidth >= 768 ) {
			  google_ad_slot	= "<?php echo sith_get_option( $banner.'_728' ) ?>";
			  google_ad_width	= 728;
			  google_ad_height 	= 90;
			} else <?php } ?> if ( adWidth >= 468 ) {
			  google_ad_slot	= "<?php echo sith_get_option( $banner.'_468' ) ?>";
			  google_ad_width 	= 468;
			  google_ad_height 	= 60;
			}else {
			  google_ad_slot 	= "<?php echo sith_get_option( $banner.'_300' ) ?>";
			  google_ad_width 	= 300;
			  google_ad_height 	= 250;
			}
		</script>
		<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
		<?php elseif(sith_get_option( $banner.'_adsense' )): ?>
			<?php echo do_shortcode(htmlspecialchars_decode(sith_get_option( $banner.'_adsense' ))) ?>
		<?php	
		endif;
		?>
		<?php
		echo $after;
	endif;
}
?>