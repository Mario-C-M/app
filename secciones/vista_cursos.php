<?php include('../templates/cabecera.php'); ?>
<?php include('../secciones/cursos.php'); ?>
<div class="row">
        <div class="col-12">
            <br/>
            <div class="row">
            <div class="col-md-5">
            <form action="" method="post">
            <div class="card">
                <div class="card-header">Cursos</div>
                <div class="card-body">
                <div class="mb-3">
                    <label for="" class="form-label">ID</label>
                    <input type="text" 
                            class="form-control" 
                            name="id" 
                            id="id"
                            aria-describedby="helpId" placeholder="ID">
                </div>
                <div class="mb-3">
                    <label for="nombre_curso" class="form-label">Nombre</label>
                    <input type="text" 
                    class="form-control" 
                    name="nombre_curso" 
                    id="nombre_curso" 
                    aria-describedby="HelpId" placeholder="Nombre del curso">
                </div> 

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="agregar" class="btn btn-primary">Agregar</button>
                    <button type="submit" name="accion" value="editar" class="btn btn-secondary">Editar</button>
                    <button type="submit" name="accion" value="borrar" class="btn btn-dark">Borrar</button>
                </div>

                </div>
            </div>
</div>
</form>


<div class="col-md-7">


<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del curso</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaCursos as $curso){ ?> 
                <!-- listaCursos coincide con listaCursos de cursos.php -->
            <tr class="">
                <td><?php echo $curso['id'];?> </td> <!-- Campo id de la bd -->
                <td><?php echo $curso['nombre_curso'];?> </td> <!-- Campo nombre_curso de la tabla cursos de la bd -->
                <td>Seleccionar</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>




</div>
</div>
</div>
<?php include('../templates/pie.php'); ?>