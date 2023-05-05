<?php
//INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'Primer Curso');
include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();
//se imprime el array

// si se reciben datos en el valor id, se asigna a la variable $id, de lo contrario se asigna un valor null
$id=isset($_POST['id'])?$_POST['id']:'';
// igual para el nombre del curso
$nombre_curso=isset($_POST['nombre_curso'])?$_POST['nombre_curso']:'';
// igual para la acción
$accion=isset($_POST['accion'])?$_POST['accion']:'';
//identificar la acción
if ($accion) {
    switch ($accion) {
        case 'agregar':
            $sql="INSERT INTO cursos(id, nombre_curso) VALUES(NULL, '$nombre_curso')";
            $conexionBD->ejecutarConsulta($sql);
            break;
    }
    
}


$consulta=$conexionBD->prepare("SELECT * FROM cursos"); //consulta toda la información de la tabla cursos
$consulta->execute();//lo ejecuta
$listaCursos=$consulta->fetchAll();//lo guarda en el array


?>