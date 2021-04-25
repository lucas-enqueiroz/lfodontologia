<?php

// CMB2 SERVICES TAXONOMY
add_action('cmb2_admin_init', 'cmb2_fields_services_taxonomy');

function cmb2_fields_services_taxonomy() {

	$cmb_term = new_cmb2_box( [
		'id'                => 'services-types',
		'title'             => 'Category Metabox', // Doesn't output for term boxes
		'object_types'      => [ 'term' ], // Tells CMB2 to use term_meta vs post_meta
		'taxonomies'        => [ 'tipos_servico' ], // Tells CMB2 which taxonomies should have these fields
		'new_term_section'  => true, // Will display in the "Add New Category" section
		'context'           => 'normal',
		'priority'          => 'high',
		'show_names'        => true, // Show field names on the left
   ] );

	$cmb_term->add_field( [
		'name'    => 'Icone da Categoria',
		'desc'    => 'Adicione uma imagem referente a categoria',
		'id'      => 'category_icon',
		'type'    => 'file',
    'options' => [ 'url' => false, ],
   ] );

	$cmb_term->add_field( [
		'name'        => 'Características da Categoria',
		'desc'        => 'Adicione características referente a categoria (um por linha).',
		'id'          => 'category_caracteristics',
    'type'        => 'text',
    'repeatable'  => 'true',
   ] );

}

// CMB2 SINGLE SERVICES PAGE
add_action('cmb2_admin_init', 'cmb2_fields_single_services');

function cmb2_fields_single_services() {
  $cmb = new_cmb2_box( [
    'id'            => 'single_servicos_box',
    'title'         => 'Serviço',
    'object_types'  => [ 'service' ],
  ] );

  $cmb->add_field([
    'name'    => 'Banner',
    'id'      => 'foto_banner',
    'type'    => 'file',
    'options' => [ 'url' => false, ],
    'text'    => [ 'add_upload_file_text' => 'Adicionar/Atualizar banner' ],
  ]);

  $cmb->add_field([
    'name'    => 'Resumo',
    'id'      => 'service_resume',
    'desc'    => 'Coloque aqui o resumo do serviço',
    'type'    => 'wysiwyg',
  ]);

  $serviceContent = $cmb->add_field([
    'name'        => 'Conteúdo do serviço',
    'id'          => 'service_content',
    'type'        => 'group',
    'repeatable'  => true,
    'options'     => [
      'group_title'     =>  'Serviço {#}', // since version 1.1.4, {#} gets replaced by row number
      'remove_confirm'  => 'Deseja realmente remover esse serviço?', // Performs confirmation before removing group.
      'sortable'        => true,
      'add_button'      => 'Adicionar Serviço',
      'remove_button'   => 'Remover Serviço',
    ],
  ]);

  $cmb->add_group_field($serviceContent, [
    'name'    => 'Foto do Serviço',
    'id'      => 'service_photo',
    'type'    => 'file',
    'options' => [ 'url' => false, ],
    'text'    => [ 'add_upload_file_text' => 'Adicionar/Atualizar foto do serviço' ],
  ]);
  
  $cmb->add_group_field($serviceContent, [
    'name'    => 'Descrição',
    'desc'    => 'Coloque aqui a descrição do serviço',
    'id'      => 'service_description',
    'type'    => 'wysiwyg',
  ]);

  $cmb->add_field( [
    'name' => 'Vídeo',
    'desc' => 'Insira o link do youtube, twitter, ou instagram. Para saber mais suportes pode visitar <a href="https://wordpress.org/support/article/embeds/">https://wordpress.org/support/article/embeds/</a>.',
    'id'   => 'service_embed',
    'type' => 'oembed',
   ] );
}