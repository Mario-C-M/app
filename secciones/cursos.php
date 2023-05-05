<?php
//INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'Primer Curso');
include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();
//se imprime el array

// si se reciben datos en el valor id, se asigna a la variable $id, de lo contrario se asigna un valor null
$id=isset($_POST['id'])?$_POST['id']:'';
// igual para el nombre del curso
$nombre_curso=isset($_POST['nombre_curso'])?$_POST['nombre_curso']:'';
//identificar la acción del usuario
$accion= isset($_POST['accion'])?$_POST['accion']:''; //Evalúa el contenido por medio del isset y qué acción realiza el usuario
if ($accion!=''){ //si la acción es diferente de vacío
    switch ($accion) { //evalúa la acción
        case 'agregar': //realiza un INSERT
            $sql="INSERT INTO cursos(id, nombre_curso) VALUES(NULL, '$nombre_curso')";
            echo $sql;
            break;
            case 'editar': //realiza un UPDATE
            $sql="UPDATE cursos SET nombre_curso='$nombre_curso' WHERE id='$id'";
            echo $sql;
            break;
            case 'borrar': //realiza un DELETE
            $sql="DELETE FROM cursos WHERE id='$id'";
            echo $sql;
            break;
    }
}
//se crea la consulta
$consulta=$conexionBD->prepare("SELECT * FROM cursos"); //consulta toda la información de la tabla cursos
$consulta->execute();//lo ejecuta
$listaCursos=$consulta->fetchAll();//lo guarda en el array


?>