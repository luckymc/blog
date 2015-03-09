<?php
//Sub Categories
function bm_dont_display_it($content) {
  if (!empty($content)) {
    $content = str_ireplace('<li class="cat-item-none">' .__( "No categories" ). '</li>', "", $content);
  }
  return $content;
}
add_filter('wp_list_categories','bm_dont_display_it');
?>