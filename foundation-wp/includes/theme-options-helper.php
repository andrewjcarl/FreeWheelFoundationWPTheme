<?php

/*
 *  Helper functions to format HTML 
 *
 ******************************/

/*
 *  A text input formatter
 *
 ******************/
function theme_text_input($id, $label, $placeholder) {
  global $theme_options;

  $field = '<div class="form-group">';
  $field .=   '<label for="'.$id.'">'.$label.'</label>';
  $field .=   '<input type="text" class="form-control" name="bootstrap_theme_options['.$id.'] id="'.$id.'" placeholder="'.$placeholder.'" value="'. $theme_options[$id] .'">';
  $field .= '</div>';

  return $field;
}

/*
 *  A radio button formatter
 *
 ******************/
function theme_checkbox_input($id, $label) {
  global $theme_options;

  $checked = ($theme_options[$id] == "yes") ? "checked='checked'" : "";

  $field = '<div class="form-group">';

  $field .=   '<label>';

  $field .=     '<input type="checkbox" name="bootstrap_theme_options['.$id.'] id="'.$id.'" value="'. esc_attr($theme_options[$id]) .'">';

  $field .=     $label . '</label>';

  $field .= '</div>';

  return $field;

}





?>