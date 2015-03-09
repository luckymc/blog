<?php
include (TEMPLATEPATH . '/includes/widgets/widget-facebook.php');
include (TEMPLATEPATH . '/includes/widgets/widget-google.php');
include (TEMPLATEPATH . '/includes/widgets/widget-ads.php');
include (TEMPLATEPATH . '/includes/widgets/widget-video.php');
include (TEMPLATEPATH . '/includes/widgets/widget-posts.php');
include (TEMPLATEPATH . '/includes/widgets/widget-category.php');
include (TEMPLATEPATH . '/includes/widgets/widget-comments-avatar.php');
include (TEMPLATEPATH . '/includes/widgets/widget-text-html.php');
include (TEMPLATEPATH . '/includes/widgets/widget-social.php');
include (TEMPLATEPATH . '/includes/widgets/widget-search.php');
?>
<?php
function remove_default_widgets() {
     unregister_widget('WP_Widget_Search');
     unregister_widget('WP_Widget_Text');
}

add_action( 'widgets_init', 'remove_default_widgets' );
?>