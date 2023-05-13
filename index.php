<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap styles-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">



    <title>Crud en PHP y Mysql</title>
</head>
<body>

    <script>
        function eliminar(){
            let respuesta = confirm("Estas seguro de eliminar este registro?");
            return respuesta;
        }
    </script>
    
    <h1 class="text-center p-3">CRUD EN PHP!</h1>

    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary mb-3">Registro de personas</h3>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
                <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido de la persona</label>
                <input type="text" name="apellido" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">DNI de la persona</label>
                <input type="text" name="dni" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de nacimieno</label>
                <input type="date" name="fecha" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="btn_registrar" value="ok">Registrar</button>

            <?php
            
            include "model/conection.php";
            include "controller/eliminar_registro.php";
            include "controller/registro_persona.php";


            ?>
        </form>

        <div class="col-8 p-4">
            <h3 class="text-center text-secondary mb-3">Información de personas</h3>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Correo</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "model/conection.php";
                    $sql = $conexion->query("select * from persona");
                    while ($datos = $sql->fetch_object()) {?>
                    <tr>
                        <th scope="row"><?= $datos->id_persona?></th>
                        <td><?= $datos->nombre?></td>
                        <td><?= $datos->apellido?></td>
                        <td><?= $datos->dni?></td>
                        <td><?= $datos->fecha_nac?></td>
                        <td><?= $datos->correo?></td>
                        <td>
                            <a href="modificar_registro.php?id=<?= $datos->id_persona?>" class="btn btn-small btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <a onclick="return eliminar()" href="index.php?id=<?= $datos->id_persona?>" class="btn btn-small btn-danger"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <?php    
                    }
                    ?>
                
                </tbody>
            </table>
        </div>
    </div>

    <!--bootstrap scripts-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>