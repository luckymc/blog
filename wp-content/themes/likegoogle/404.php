<?php get_header(); ?>
<?php
if( sith_get_option( 'posts_display') != 'posts_content'): 
$layout_style_post = 'loop-full-content';
endif;
?>

<div class="<?php echo $layout_style_post ?> custom-container">
  <div class="content">
    <div class="container-posts post error404">
      <div class="page-head">
        <h2 class="page-title"><?php echo lang_not_found; ?></h2>
      </div>
      <div class="page-header-bar"></div>
      <div class="post-inner">
        <div class="entry" style="border:1px solid #ddd; background:#fff; padding:8px;">
          <p><?php echo lang_not_found_msg; ?></p>
          <div id="sitemap">
            <div class="sitemap-col">
              <h2><?php echo lang_pages; ?></h2>
              <ul id="sitemap-pages">
                <?php wp_list_pages('title_li='); ?>
              </ul>
            </div>
            <!-- end .sitemap-col -->
            
            <div class="sitemap-col">
              <h2><?php echo lang_categories; ?></h2>
              <ul id="sitemap-categories">
                <?php wp_list_categories('title_li='); ?>
              </ul>
            </div>
            <!-- end .sitemap-col -->
            
            <div class="sitemap-col">
              <h2><?php echo lang_tags; ?></h2>
              <ul id="sitemap-tags">
                <?php $tags = get_tags();
								if ($tags) {
									foreach ($tags as $tag) {
										echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li> ';
									}
								} ?>
              </ul>
            </div>
            <!-- end .sitemap-col -->
            
            <div class="sitemap-col<?php echo ' last'; ?>">
              <h2><?php echo lang_authors; ?></h2>
              <ul id="sitemap-authors" >
                <?php wp_list_authors('optioncount=1&exclude_admin=0'); ?>
              </ul>
            </div>
            <!-- end .sitemap-col --> 
            
          </div>
          <!-- end #sitemap --> 
          
        </div>
        <!-- .entry /--> 
        
      </div>
      <!-- .post-inner --> 
    </div>
    <!-- .container-posts --> 
  </div>
</div>
<?php get_footer(); ?>
