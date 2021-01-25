<?php
/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */

define( 'WP_DEBUG_LOG', true );define( 'WP_DEBUG_DISPLAY', true );

function oceanwp_child_enqueue_parent_style() {
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );
	// Load the stylesheet

	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [ 'oceanwp-style', 'lf-style' ], $version );
	wp_enqueue_style( 'lf-style', get_stylesheet_directory_uri() . '/assets/css/style.min.css', [], false, false );
	
}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );

// Função para registrar os Scripts e o CSS
function lfodonto_scripts() {

	// Registrar Main
	wp_register_script( 'main-script', get_stylesheet_directory_uri() . '/assets/js/script.js', [], false, true );

	// Carrega o Script
	wp_enqueue_script( 'main-script' );	
}
add_action( 'wp_enqueue_scripts', 'lfodonto_scripts' );


require_once( get_stylesheet_directory(). '/inc/cmb2/load.php' );


// Custom Images Sizes
function my_custom_sizes() {
	// add_image_size('small', 300, 300, true);
	add_image_size('service-banner', 1200, 630, true);
}
add_action('after_setup_theme', 'my_custom_sizes');

function custom_post_type_services() {
	register_post_type('service', [
		'label' 					=> 'Serviços',
		'description' 		=> 'Serviços prestados',
		'public' 					=> true,
		'show_ui' 				=> true,
		'show_in_menu' 		=> true,
		'capability_type' => 'post',
		'map_meta_cap' 		=> true,
		'hierarchical' 		=> true,
		'rewrite' 				=> ['slug' => 'servico', 'with_front' => true],
		'query_var' 			=> true,
		'supports' 				=> [ 'title', 'editor', 'revisions', 'thumbnail', 'page-attributes', 'post-formats' ],
    'show_in_rest' 		=> true,
		'labels' 					=> [
			'name' 								=> 'Serviços',
			'singular_name' 			=> 'Serviço',
			'menu_name' 					=> 'Serviços',
			'add_new' 						=> 'Adicionar Novo',
			'add_new_item' 				=> 'Adicionar Novo Serviço',
			'edit' 								=> 'Editar',
			'edit_item' 					=> 'Editar Serviço',
			'new_item' 						=> 'Novo Serviço',
			'view' 								=> 'Ver Serviço',
			'view_item' 					=> 'Ver Serviço',
			'search_items' 				=> 'Procurar Serviços',
			'not_found' 					=> 'Nenhum Serviço Encontrado',
			'not_found_in_trash' 	=> 'Nenhum Serviço Encontrado no Lixo',
		]
	]);
}
add_action('init', 'custom_post_type_services');

function categoria_servico() {
  register_taxonomy( 'service_type', [ 'service' ], 
    [
			'hierarchical' 					=> true,
			'label' 								=> 'Tipo de Serviço',
			'show_ui' 							=> true,
			'query_var' 						=> true,
			'rewrite' 							=> [ 'slug' => 'servicos' ],
			'show_admin_column' 		=> true,
			"public" 								=> true,
			"publicly_queryable" 		=> true,
			"show_in_menu" 					=> true,
			"show_in_nav_menus" 		=> true,
			"show_in_rest" 					=> true,
			"show_in_quick_edit" 		=> true,
			// "rest_base" 						=> "service",
			// "rest_controller_class" => "WP_REST_Terms_Controller",
		]
  );
}
add_action( 'init', 'categoria_servico' );

function new_excerpt($length) {
	return 20;
}
add_filter('excerpt_length', 'new_excerpt');

function banner_style(){
?>

<style type="text/css">
.lfodonto-banner,
.service-banner {
  background: linear-gradient(rgba(0, 0, 0, 0.7),
      rgba(0, 0, 0, 0.4),
      rgba(0, 0, 0, 0.2),
      rgba(0, 0, 0, 0)), url('<?php the_field('foto_banner'); ?>') no-repeat center;
  background-attachment: fixed;
  background-size: cover;
}
</style>
<?php
}
add_action('wp_head', 'banner_style');

function whatsapp_link(){
?>

<a class="float-whatsapp" href="https://wa.me/5511945402048?text=Ola, gostaria de agendar uma consulta" target="_blank">
  <i aria-hidden="true" class="fab fa-whatsapp"></i>
</a>
<?php
}
add_action('wp_footer', 'whatsapp_link');

require_once( get_stylesheet_directory(). '/inc/shortcode/contact.php' );