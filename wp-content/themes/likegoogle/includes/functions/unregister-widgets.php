<?php
// unregister all widgets
 function unregister_default_widgets() {
unregister_widget('WP_Widget_Text');
 }
 add_action('widgets_init', 'unregister_default_widgets', 11);
?>