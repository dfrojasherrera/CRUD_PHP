<?php

if (!empty($_POST["btn_registrar"])) {
    if (!empty($_POST["nombre"]) and 
        !empty($_POST["apellido"]) and  
        !empty($_POST["dni"]) and
        !empty($_POST["fecha"]) and
        !empty($_POST["correo"])) {

        //echo "Todo ok";
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];

        $sql = $conexion->query("insert into persona(nombre, apellido, dni, fecha_nac, correo)values('$nombre', '$apellido', '$dni', '$fecha', '$correo')");

        if($sql == 1){
            echo "<div class='alert alert-success'>Persona registrada correctamente</div>";
        }
        else{
            echo "<div class='alert alert-danger'>Error al registrar persona</div>";
        }
    }
    else {
        echo "<div alert class='alert alert-warning'>No se han completado todos los campos</div>";
    }
}



?>