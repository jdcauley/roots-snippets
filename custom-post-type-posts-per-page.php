<?php

/**
 * Custom posts per page for custom post types
 */
function roots_custom_posts_per_page($query) {
  if (is_post_type_archive('base_service')) {
    $query->query_vars['posts_per_page'] = -1;
  }
  if (is_post_type_archive('base_portfolio')) {
    $query->query_vars['posts_per_page'] = -1;
  }
  return $query;
}
if (!is_admin()) {
  add_action('pre_get_posts', 'roots_custom_posts_per_page');
}
