<p class="single-meta"> <span class="date"><?php echo get_the_time(get_option('date_format')); ?></span> <span class="pm-categories">
  <?php   $i = 0;
      foreach((get_the_category()) as $cat) {
        echo '<a href="'.get_category_link($cat->cat_ID).'">' . $cat->cat_name . '</a>';
        if (++$i == 1) break;
      }  ?>
  </span> <span class="pm-comments">
  <?php comments_popup_link( __(lang_leave_a_comment), __( lang_one_comment), __('% '.lang_comments) ); ?>
  </span> </p>
