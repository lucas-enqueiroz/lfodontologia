<?php

// CMB2 SINGLE SERVICES PAGE
add_action('cmb2_admin_init', 'cmb2_fields_clinica_banner');

function cmb2_fields_clinica_banner() {
  $cmb = new_cmb2_box([
    'id'            => 'clinica_box',
    'title'         => 'Serviço',
    'object_types'  => [ 'page' ],
    'show_on'       => [
      'key'   => 'page-template',
      'value' => 'page-clinica.php',
    ],
  ]);

  $cmb->add_field([
    'name'    => 'Banner',
    'id'      => 'foto_banner',
    'type'    => 'file',
    'options' => [ 'url' => false, ],
  ]);
}



add_action( 'cmb2_admin_init', 'cmb2_fields_clinica_contato' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_fields_clinica_contato() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_clinic_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( [
      'id'            => 'clinic_metabox',
      'title'         => 'Project',
      'object_types'  => [ 'page' ],
      'show_on'       => [
        'key'   => 'page-template',
        'value' => 'page-clinica.php',
      ],
      'show_names'    => true, // Show field names on the left
   ] );

  $cmb->add_field( [
      'name'         => 'Imagens da Clínica',
      'desc'         => 'Adicione imagens da clínica.',
      'id'           => $prefix . 'file_list',
      'classes'      => 'foobox',
      'type'         => 'file_list',
      'preview_size' => [ 300, 300 ],
      'query_args'   => [ 'type' => [ 'image/jpg' ] ],
      'text'         => [
        'add_upload_files_text' => 'Adicionar / Atualizar imagens',
        'remove_image_text'     => 'Remover imagem',
        'file_text'             => 'Imagem',
        'file_download_text'    => 'Download',
        'remove_text'           => 'Remover',
      ],
   ] );

}