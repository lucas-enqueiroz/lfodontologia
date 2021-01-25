<?php

// Funções de ajuda
function get_field($key, $page_id = 0) {
  $id = $page_id !== 0 ? $page_id : get_the_ID();
  return get_post_meta($id, $key, true);
}

function the_field($key, $page_id = 0) {
  echo get_field($key, $page_id);
}

// carrega os campos personalizados do CMB2
require_once( get_stylesheet_directory(). '/inc/cmb2/services.php' );
require_once( get_stylesheet_directory(). '/inc/cmb2/contato.php' );
require_once( get_stylesheet_directory(). '/inc/cmb2/clinica.php' );

function cmb2_output_file_list( $file_list_meta_key, $img_size = 'medium' ) {

// Get the list of files
$files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

echo '<ul class="file-list-wrap">';
  // Loop through them and output an image
  foreach ( $files as $attachment_id => $attachment_url ) {
  echo '<li class="file-list-image"><a href="'. $attachment_url .'">';
      echo wp_get_attachment_image( $attachment_id, $img_size );
      echo '</a></li>';
  }
  echo '</ul>';
}