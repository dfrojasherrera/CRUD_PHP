<?php

include "model/conection.php";

$id = $_GET["id"];
$sql = $conexion->query("select * from persona where id_persona = $id");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar formulario</title>

    <!--bootstrap styles-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
        <form class="col-4 p-3 m-auto" method="POST">
            <h3 class="text-center text-secondary mb-3">Modificar Registro</h3>

            <?php
            include "controller/modificar_registro.php";

            while ($datos = $sql->fetch_object()) {?>

                 <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
                    <input type="text" name="nombre" value="<?= $datos->nombre ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Apellido de la persona</label>
                    <input type="text" name="apellido" value="<?= $datos->apellido ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">DNI de la persona</label>
                    <input type="text" name="dni" value="<?= $datos->dni ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Fecha de nacimieno</label>
                    <input type="date" name="fecha" value="<?= $datos->fecha_nac ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo</label>
                    <input type="email" name="correo" value="<?= $datos->correo ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div> 
            <?php }   
            ?>

            <button type="submit" class="btn btn-primary mb-3" name="btn_modificar" value="ok">Modificar Registro</button>
        </form>   
</body>
</html>