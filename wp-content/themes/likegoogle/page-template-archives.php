<?php 
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>

<div class="custom-container<?php echo post_sidebar_pos //Extremely important ?>">
  <div class="content">
    <?php if ( ! have_posts() ) : ?>
    <div id="post-0" class="post not-found container-posts">
      <h1 class="post-title"><?php echo lang_not_found; ?></h1>
      <div class="entry">
        <p><?php echo lang_not_found_msg; ?></p>
        <?php get_search_form(); ?>
      </div>
    </div>
    <?php endif; ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php $get_meta = get_post_custom($post->ID);  ?>
    <article class="container-posts post">
      <div class="page-head" style="margin-bottom:0px;">
        <h1 class="page-title">
          <?php the_title(); ?>
        </h1>
      </div>
      <div class="page-header-bar"></div>
      <div class="post-inner">
        <div class="clear"></div>
        <div class="entry">
          <?php get_template_part( 'includes/single-head' ); ?>
          <?php the_content(); ?>
          <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( $lang_pages ), 'after' => '</div>' ) ); ?>
          <?php
					$where = apply_filters( 'getarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'" );
					$join = apply_filters( 'getarchives_join', '' );
					$query = "SELECT YEAR(post_date) AS `year`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date) ORDER BY post_date DESC";
					$key = md5($query);
					$cache = wp_cache_get( 'wp_get_archives' , 'general');
					if ( !isset( $cache[ $key ] ) ) {
						$arcresults = $wpdb->get_results($query);
						$cache[ $key ] = $arcresults;
						wp_cache_set( 'wp_get_archives', $cache, 'general' );
					} else {
						$arcresults = $cache[ $key ];
					}
					if ($arcresults) {
						foreach ( (array) $arcresults as $arcresult) { ?>
          <h2 class="timeline-head"><?php echo $arcresult->year ?></h2>
          <?php 
						$year = (int) $arcresult->year;
						$query = new WP_Query( 'year='.$year.'&no_found_rows=1&posts_per_page=100' ); ?>
          <ul class="timeline">
            <?php while ( $query->have_posts() ) : $query->the_post()?>
            <li> <span>
              <?php the_time('j F') ?>
              </span><a href="<?php the_permalink(); ?>" title="<?php printf( __( '%s', 'sith' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
              <?php the_title(); ?>
              </a> </li>
            <?php endwhile; ?>
          </ul>
          <?php	}
					}	 
					?>
        </div>
        <!-- .entry /--> 
        
      </div>
      <!-- .post-inner --> 
    </article>
    <!-- .container-posts -->
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
    <?php edit_post_link( __( $lang_edit ), '<span class="edit-link">', '</span>' ); ?>
    <?php comments_template( '', true ); ?>
  </div>
  <!-- .content -->
  
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
