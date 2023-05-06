<?php

include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();
//se imprime el array

// si se reciben datos en el valor id, se asigna a la variable $id, de lo contrario se asigna un valor null
$id=isset($_POST['id'])?$_POST['id']:'';
// igual para el nombre del curso
$nombre_curso=isset($_POST['nombre_curso'])?$_POST['nombre_curso']:'';
//identificar la acción del usuario
$accion= isset($_POST['accion'])?$_POST['accion']:''; //Evalúa el contenido por medio del isset y qué acción realiza el usuario

// print_r($_POST);

if($accion!=''){ //si la acción es diferente de vacío
    switch ($accion) { //evalúa la acción
        
            case 'agregar': //realiza un INSERT
            $sql="INSERT INTO cursos(id, nombre_curso) VALUES(NULL, :nombre_curso)";
            $consulta=$conexionBD->prepare($sql); //prepara la consulta
            $consulta->bindParam(':nombre_curso',$nombre_curso);//pasamos un parámetro
            $consulta->execute();//ejecutamos
            break;

            case 'editar': //realiza un UPDATE
            $sql="UPDATE cursos SET nombre_curso=:nombre_curso WHERE id=:id";
            $consulta=$conexionBD->prepare($sql); //prepara la consulta
            $consulta->bindParam(':id',$id); //pasamos el parámetro se reemplaza id en este parametro
            $consulta->bindParam(':nombre_curso',$nombre_curso); //pasamos el parámetro se reemplaza nombre_curso en este parametro
            $consulta->execute(); //ejecutamos
            // echo $sql;
            break;

            case 'borrar': //realiza un DELETE
            $sql="DELETE FROM cursos WHERE id=:id";
            $consulta=$conexionBD->prepare($sql); //prepara la consulta
            $consulta->bindParam(':id',$id); //pasamos el parámetro
            $consulta->execute(); //ejecutamos
            // echo $sql;
            break;
            
            case 'Seleccionar': //seleccionamos el recurso
            $sql="SELECT * FROM cursos WHERE id=:id"; //se busca el id
            $consulta=$conexionBD->prepare($sql); //prepara la consulta
            $consulta->bindParam(':id',$id); //pasamos el parámetro
            $consulta->execute(); //ejecutamos
            $curso=$consulta->fetch(PDO::FETCH_ASSOC);//obtiene la información con fetch_assoc de todos los recursos recuperados del SELECT id
            // print_r($curso); //se imprime el array. se utilizó para la prueba de funcionamiento
            $nombre_curso=$curso['nombre_curso']; //se recupera la información de la consulta sql SELECT
            // echo $nombre_curso; //se imprime el valor por pantalla
            break;
    }
}
//se crea la consulta
$consulta=$conexionBD->prepare("SELECT * FROM cursos"); //consulta toda la información de la tabla cursos
$consulta->execute();//lo ejecuta
$listaCursos=$consulta->fetchAll();//lo guarda en el array


?>