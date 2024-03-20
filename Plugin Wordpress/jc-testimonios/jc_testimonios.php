<?php
/*
    Plugin Name: Testimonios - Julián Campos
    Plugin URI: https://juliancampos.es
    Description: Añade los testimonios de tus clientes a tu web
    Version: 1.0.0
    Author: Julián Campos Pérez
    Author URI: https://juliancampos.es
    Text Domain: juliancampos
*/

//Funcion que tiene Wordpress para que no todo el mundo pueda acceder a este archivo a través de la URL

if(!defined('ABSPATH')) die();

// Registrar Custom Post Type (la agregamos más abajo)
function jc_testimonios_post_type() {

//los labels nos permiten traducir elementos de la interfaz de Wordpress
	$labels = array(
		'name'                  => _x( 'Testimonios', 'Post Type General Name', 'juliancampos' ),
		'singular_name'         => _x( 'Testimonio', 'Post Type Singular Name', 'juliancampos' ),
		'menu_name'             => __( 'Testimonios', 'juliancampos' ),
		'name_admin_bar'        => __( 'Testimonio', 'juliancampos' ),
		'archives'              => __( 'Archivo', 'juliancampos' ),
		'attributes'            => __( 'Atributos', 'juliancampos' ),
		'parent_item_colon'     => __( 'Testimonio Padre', 'juliancampos' ),
		'all_items'             => __( 'Todos los testimonios', 'juliancampos' ),
		'add_new_item'          => __( 'Agregar Testimonio', 'juliancampos' ),
		'add_new'               => __( 'Agregar Testimonio', 'juliancampos' ),
		'new_item'              => __( 'Nuevo Testimonio', 'juliancampos' ),
		'edit_item'             => __( 'Editar Testimonio', 'juliancampos' ),
		'update_item'           => __( 'Actualizar Testimonio', 'juliancampos' ),
		'view_item'             => __( 'Ver Testimonio', 'juliancampos' ),
		'view_items'            => __( 'Ver Testimonios', 'juliancampos' ),
		'search_items'          => __( 'Buscar Testimonio', 'juliancampos' ),
		'not_found'             => __( 'No Encontrado', 'juliancampos' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'juliancampos' ),
		'featured_image'        => __( 'Imagen Destacada', 'juliancampos' ),
		'set_featured_image'    => __( 'Guardar Imagen destacada', 'juliancampos' ),
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'juliancampos' ),
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'juliancampos' ),
		'insert_into_item'      => __( 'Insertar en Testimonio', 'juliancampos' ),
		'uploaded_to_this_item' => __( 'Agregado en Testimonio', 'juliancampos' ),
		'items_list'            => __( 'Lista de Testimonios', 'juliancampos' ),
		'items_list_navigation' => __( 'Navegación de Testimonios', 'juliancampos' ),
		'filter_items_list'     => __( 'Filtrar Testimonios', 'juliancampos' ),
	);
	$args = array(
		'label'                 => __( 'Testimonio', 'juliancampos' ),
		'description'           => __( 'Testimonios de los clientes', 'juliancampos' ),
		'labels'                => $labels,
//supports: que de lo que tiene Wordpress queremos habilitar
//lo podemos consultar en la doc, url: 
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true, // true = posts , false = paginas
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-admin-comments',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'show_in_rest'			=> true, //esto hará que se muestre en la API
		'rest_base'          => 'testimonios', //nombre del endpoint
    	'rest_controller_class' => 'WP_REST_Posts_Controller',
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);

	//le damos un nombre y lo registramos
	register_post_type( 'jc_testimonios', $args );

}
add_action( 'init', 'jc_testimonios_post_type', 0 );


//Testimonios: http://localhost:8888/wp-json/wp/v2/testimonios
//Imagen destacada: http://localhost:8888/wp-json/wp/v2/media/7 (el id)