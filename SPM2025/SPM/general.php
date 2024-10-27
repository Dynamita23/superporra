<?php 

require 'admin/config.php';
require 'functionsS.php';

$conexion = conexion($bd_config);
// $id_articulo = (int)limpiarDatos($_GET['id']);
$id_articulo = id_articulo($_GET['id']);

if (!$conexion) {
	header('Location: error.php');
}

if (empty($id_articulo)) {
	header('Location: index.php');
}

$post2 = obtener_semanal($conexion);

if (!$post2) {
	// Redirigimos al index si no hay post
	header('Location: index.php');
}

$post2 = $post2[0];

$post = obtener_post_por_id($conexion, $id_articulo);

if (!$post) {
	// Redirigimos al index si no hay post
	header('Location: index.php');
}

$post = $post[0];

$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

// Si no hay post entonces redirigimos
if(!$posts){
	header('Location: error.php');
}

require 'views/general.view.php';

?>