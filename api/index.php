<?php
session_start();
if (empty($_SESSION["id"])){
    header("location: ../login/login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pokemon API</title>
    <style>
        .column {
            float: left;
            width: 30%;
            padding: 25px;
      
        }
        .pokemon-button {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 5px;
        }
        .pokemon-link {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 5px;
            text-decoration: none;
            color: #000;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <a href="../login/salida.php">salir</a>
    <?php
    $apiUrl = 'https://pokeapi.co/api/v2/pokemon/';
    $totalPokemons = 898;
    $resultsPerPage = 50;
    $totalPages = ceil($totalPokemons / $resultsPerPage);
    $allPokemons = array();

    for ($page = 1; $page <= $totalPages; $page++) {
        $requestUrl = $apiUrl . '?offset=' . (($page - 1) * $resultsPerPage) . '&limit=' . $resultsPerPage;
        $response = file_get_contents($requestUrl);

        if ($response === false) {
            echo 'Error en la solicitud para la página ' . $page;
            continue;
        }
        $data = json_decode($response, true);
        $allPokemons = array_merge($allPokemons, $data['results']);
    }
    $totalPokemons = count($allPokemons);
    $columnSize = ceil($totalPokemons / 3);
    $columns = array_chunk($allPokemons, $columnSize);
    for ($i = 0; $i < 3; $i++) {
        echo '<div class="column">';
        foreach ($columns[$i] as $pokemon) {
            $name = ucfirst($pokemon['name']);
            echo '<a class="pokemon-link" href="pokemon.php?name=' . $pokemon['name'] . '">' . $name . '</a>';
        }
        echo '</div>';
    }
    ?>
</body>
</html>