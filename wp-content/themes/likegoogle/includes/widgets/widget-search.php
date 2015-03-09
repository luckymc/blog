<?php
add_action( 'widgets_init', 'sith_search_widget' );
function sith_search_widget() {
	register_widget( 'sith_search' );
}
class sith_search extends WP_Widget {
	function sith_search() {
		$widget_ops = array( 'classname' => 'search'  );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'search-widget' );
		$this->WP_Widget( 'search-widget',/*theme_name .*/' [st] Search', $widget_ops, $control_ops );
	}
	function widget( $args, $instance ) { ?>
	<div>
 <form method="get" id="search-form" class="search-widget" action="<?php echo home_url( '/' ); ?>" >
  <input type="text" class="search-field s form-control input-sm" name="s" value="<?php _e( 'Search...', 'sith' ); ?>" onfocus="if (this.value == '<?php _e( 'Search...', 'sith' ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Search...', 'sith' ); ?>';}" />
  <button type="submit" class="search-button" name="submit" value="<?php _e( 'Search...', 'sith' ); ?>"></button>
</form>
	</div><!-- .search-widget /-->		
<?php
	}
}
?>