<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Pokemon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        h1 {
            margin-bottom: 10px;
        }
        img {
            max-width: 200px;
            margin-bottom: 10px;
        }
        h2 {
            margin-bottom: 5px;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        li {
            margin-bottom: 5px;
        }
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-decoration: none;
            color: #000;
            transition: background-color 0.3s ease;
        }
        .back-button:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_GET['name'])) {
        $pokemonName = $_GET['name'];
        $apiUrl = 'https://pokeapi.co/api/v2/pokemon/' . $pokemonName;
        $response = file_get_contents($apiUrl);

        if ($response !== false) {
            $pokemonData = json_decode($response, true);
            echo '<h1>' . ucfirst($pokemonName) . '</h1>';
            echo '<img src="' . $pokemonData['sprites']['front_default'] . '" alt="' . $pokemonName . '">';
            echo '<h2>Habilidades:</h2>';
            echo '<ul>';
            foreach ($pokemonData['abilities'] as $abilityData) {
                echo '<li>' . $abilityData['ability']['name'] . '</li>';
            }
            echo '</ul>';
        } else {
            echo 'Error al obtener los detalles del Pokemon.';
        }
    } else {
        echo 'Pokemon no seleccionado.';
    }
    ?>
    <a class="back-button" href="index.php">Regresar</a>
</body>

</html>
