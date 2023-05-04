<?php
//INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'Primer Curso');
include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();
//se imprime el array


$consulta=$conexionBD->prepare("SELECT * FROM cursos"); //consulta toda la información de la tabla cursos
$consulta->execute();//lo ejecuta
$listaCursos=$consulta->fetchAll();//lo guarda en el array


?>