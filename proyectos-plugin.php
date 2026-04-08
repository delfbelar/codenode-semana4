<?php
/*
Plugin Name: Proyectos Plugin
Description: Plugin que registra el CPT Proyecto
Version: 1.0
Author: Delfina Belardinelli
*/

if ( ! defined("ABSPATH") ) exit;

function registrar_cpt_proyecto() {

$args = array(
'label' => 'Proyectos',
'public' => true,
'show_in_rest' => true,
'supports' => array('title','editor','thumbnail'),
'menu_icon' => 'dashicons-portfolio'
);

register_post_type('proyecto', $args);

}

add_action('init','registrar_cpt_proyecto');

// Añadir campo ACF a la REST API
function agregar_acf_rest() {

register_rest_field(
'proyecto',
'descripcion_corta',
array(
'get_callback' => function($post){
return get_field('descripcion_corta',$post['id']);
}
)
);

}

add_action('rest_api_init','agregar_acf_rest');