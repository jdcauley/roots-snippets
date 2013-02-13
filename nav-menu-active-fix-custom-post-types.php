<?php

/**
 * Fix nav menu active classes for custom post types
 */
function roots_cpt_active_menu($menu) {
  if ('base_service' === get_post_type()) {
    $menu = str_replace('active', '', $menu);
    $menu = str_replace('menu-services', 'menu-services active', $menu);
  }
  if ('base_portfolio' === get_post_type()) {
    $menu = str_replace('active', '', $menu);
    $menu = str_replace('menu-portfolio', 'menu-portfolio active', $menu);
  }
  return $menu;
}
add_filter('nav_menu_css_class', 'roots_cpt_active_menu', 400);
