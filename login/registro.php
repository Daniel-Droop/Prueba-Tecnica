<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->
    <link href="https://tresplazas.com/web/img/big_punto_de_venta.png" rel="shortcut icon">
    <title>Registro de Usuario</title>
    
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
            max-width: 300px; /* Tamaño máximo de la imagen */
      
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener datos del formulario
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["correo_electronico"];
        $contrasena = $_POST["contrasena"];

        // Validación básica de campos (puedes agregar más validaciones según tus necesidades)
        if (empty($nombre) || empty($apellido) || empty($correo) || empty($contrasena)) {
            echo "Por favor, completa todos los campos.";
        } else {
            // Incluir el archivo de conexión a la base de datos
            include "conexion.php";

            // Consulta para insertar el nuevo usuario en la tabla "usuarios"
            $sql = "INSERT INTO usuarios (nombre, apellido, correo_electronico, contrasena) VALUES ('$nombre', '$apellido', '$correo', '$contrasena')";

            if ($conexion->query($sql) === TRUE) {
                echo "Nuevo usuario registrado correctamente.";
            } else {
                echo "Error al registrar el nuevo usuario: " . $conexion->error;
            }

            // Cerrar la conexión
            $conexion->close();
        }
    }
    ?>

    <h1>Registro de Usuario</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre:</label>
        <br>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="apellido">Apellido:</label>
        <br>
        <input type="text" id="apellido" name="apellido" required>
        <br>
        <label for="correo">Correo electrónico:</label>
        <br>
        <input type="email" id="correo" name="correo_electronico" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <br>
        <input type="password" id="contrasena" name="contrasena" required>
        <br>
        <input type="submit" value="Registrarse">
        <a href="login.php"><button type="button">VOLVER</button></a>
    </form>
    <div class="imagen-container">
        <img src="img/pp.png">
    </div>
</body>
</html>
