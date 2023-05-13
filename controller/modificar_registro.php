<?php

if (!empty($_POST["btn_modificar"])) {
    if (!empty($_POST["nombre"]) and 
        !empty($_POST["apellido"]) and  
        !empty($_POST["dni"]) and
        !empty($_POST["fecha"]) and
        !empty($_POST["correo"])) {

        //echo "Todo ok";
        $id = $_GET["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];

        $sql = $conexion->query("update persona set nombre='$nombre', apellido='$apellido', dni='$dni', fecha_nac='$fecha', correo='$correo' where id_persona = $id");

        if($sql == 1){
            header("location:index.php");
        }
        else{
            echo "<div class='alert alert-danger'>Error al modificar registro</div>";
        }
    }
    else {
        echo "<div alert class='alert alert-warning'>No se han completado todos los campos</div>";
    }
}

?>