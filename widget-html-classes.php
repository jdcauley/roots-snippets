<?php

/**
 * Add custom HTML classes to individual widgets from a text field
 */

function roots_widget_classes_input($instance, $widget) {
  if (!isset($instance['classes'])) {
    $instance['classes'] = null;
  }

  $row = "<p>\n";
  $row .= "\t<label for='widget-{$widget->id_base}-{$widget->number}-classes'>HTML Classes:</label>\n";
  $row .= "\t<input type='text' name='widget-{$widget->id_base}[{$widget->number}][classes]' id='widget-{$widget->id_base}-{$widget->number}-classes' class='widefat' value='{$instance['classes']}'>\n";
  $row .= "</p>\n";

  echo $row;
  return $instance;
}
add_filter('widget_form_callback', 'roots_widget_classes_input', 10, 2);

function roots_widget_classes_save($instance, $new_instance) {
  $instance['classes'] = $new_instance['classes'];
  return $instance;
}
add_filter('widget_update_callback', 'roots_widget_classes_save', 10, 2);

function roots_widget_classes($params) {
  global $wp_registered_widgets;
  $widget_id  = $params[0]['widget_id'];
  $widget_obj = $wp_registered_widgets[$widget_id];
  $widget_opt = get_option($widget_obj['callback'][0]->option_name);
  $widget_num = $widget_obj['params'][0]['number'];

  if (isset($widget_opt[$widget_num]['classes']) && !empty($widget_opt[$widget_num]['classes']))
    $params[0]['before_widget'] = preg_replace('/class="/', "class=\"{$widget_opt[$widget_num]['classes']} ", $params[0]['before_widget'], 1);

  return $params;
}
add_filter('dynamic_sidebar_params', 'roots_widget_classes');
