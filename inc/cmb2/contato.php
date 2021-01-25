<?php
add_action('cmb2_admin_init', 'cmb2_fields_contato');

function cmb2_fields_contato() {
  $cmb = new_cmb2_box([
    'id'            => 'contato_box',
    'title'         => 'Contato',
    'object_types'  => ['page'],
    'show_on'       => [
      'key'   => 'page-template',
      'value' => 'page-contato.php',
    ],
  ]);

  $cmb->add_field([
    'name'    => 'Banner',
    'id'      => 'foto_banner',
    'type'    => 'file',
    'options' => [ 'url' => false, ],
  ]);

  $contato_info = $cmb->add_field([
    'name'        => 'Informação de Contato',
    'id'          => 'contato_info',
    'type'        => 'group',
    'repeatable'  => true,
    'options'     => [
      'sortable'      => true,
      'add_button'    => 'Adicionar Contato',
      'remove_button' => 'Remover Contato',
    ],
  ]);

  $cmb->add_group_field($contato_info, [
    'name'  => 'Título do Contato',
    'id'    => 'contato_titulo',
    'type'  => 'text',
  ]);

  $cmb->add_group_field($contato_info, [
    'name'  => 'Link do Contato',
    'id'    => 'contato_link',
    'type'  => 'text_url',
  ]);

  $cmb->add_group_field($contato_info, [
    'name'          => 'Ícone do contato',
    'id'            => 'contato_icon',
    'type'          => 'file',
    'options'       => [ 'url' => false ],
    'query_args'    => [ 'type' => [ 'image/svg' ] ],
    'preview_size'  => 'thumbnail',
  ]);

  $cmb->add_group_field($contato_info, [
    'name'        => 'Informação do Contato',
    'id'          => 'contato_info',
    'type'        => 'textarea_small',
    'attributes'  => [
        'placeholder' => 'Coloque a informação principal de contato aqui!',
        'rows'        => 3,
        'required'    => 'required',
    ],
  ]);
  
  $redes_sociais = $cmb->add_field([
    'name'        => 'Redes Sociais',
    'id'          => 'redes_sociais',
    'type'        => 'group',
    'repeatable'  => true,
    'options'     => [
      'sortable'      => true,
      'add_button'    => 'Adicionar Rede',
      'remove_button' => 'Remover Rede',
    ],
  ]);

  $cmb->add_group_field($redes_sociais, [
    'name'  => 'Link Social',
    'id'    => 'link_social',
    'type'  => 'text_url',
  ]);

  $cmb->add_group_field($redes_sociais, [
    'name'          => 'Imagem Social',
    'id'            => 'imagem_social',
    'classes'       => 'contato_social_img',
    'type'          => 'file',
    'options'       => [ 'url' => false ],
    'query_args'    => [ 'type' => [ 'image/svg' ] ],
    'preview_size'  => 'thumbnail',
  ]);

  $cmb->add_group_field($redes_sociais, [
    'name'  => 'Nome da Rede Social',
    'id'    => 'nome_social',
    'type'  => 'text',
  ]);

  $cmb->add_field([
    'name'  => 'Resumo Historia',
    'id'    => 'resumo_historia',
    'type'  => 'textarea_small',
  ]);
}