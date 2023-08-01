<?php
session_start();
if(!empty($_POST["btningresar"])){
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
        $usuario=$_POST["usuario"];
        $password=$_POST["password"];
        $sql=$conexion->query("select * from usuarios where correo_electronico='$usuario' and contrasena='$password'");
        if ($datos=$sql->fetch_object()) {
            $_SESSION["id"]=$datos->id;
            $_SESSION["nombre"]=$datos->nombres;
            $_SESSION["apellido"]=$datos->apellidos;
            header("location: ../api/index.php");
        } else {
            echo '<div class="alert alert-danger">usuario inexistente</div>';
        }
        
    } else {
        echo '<div class="alert alert-danger">campos vacios</div>';
    }
    
}
?>