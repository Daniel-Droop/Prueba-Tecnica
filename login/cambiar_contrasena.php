<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->
    <link href="https://tresplazas.com/web/img/big_punto_de_venta.png" rel="shortcut icon">
    <title>Restablecer Contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            color: black;
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .imagen-container {
            text-align: center;
            margin-top: 30px;
        }

        .imagen-container img {
            max-width: 300px; 
      
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php
 
    include "conexion.php";

 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $correo = $_POST["correo"];
        $nueva_contrasena = $_POST["nueva_contrasena"];


        if (empty($correo) || empty($nueva_contrasena)) {
            echo "Por favor, completa todos los campos.";
        } else {

            $sql_update = "UPDATE usuarios SET contrasena = '$nueva_contrasena' WHERE correo_electronico = '$correo'";

            if ($conexion->query($sql_update) === TRUE) {
                echo "Contraseña restablecida correctamente.";
            } else {
                echo "Error al restablecer la contraseña: " . $conexion->error;
            }
        }
    }
    ?>

    <h1>Restablecer Contraseña</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>
        <br>
        <label for="nueva_contrasena">Nueva contraseña:</label>
        <input type="password" id="nueva_contrasena" name="nueva_contrasena" required>
        <br>
        <input type="submit" value="Restablecer Contraseña">
        <a href="login.php"><button type="button">VOLVER</button></a>
    </form>
    <div class="imagen-container">
        <img src="img/pp.png">
    </div>
</body>
</html>
