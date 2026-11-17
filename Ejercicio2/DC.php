<?php

$jason = file("heroes.csv");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DC</title>
    <link rel="stylesheet" href="examen.css">
</head>

<body>
    <h1>Listado de Superheroes</h1>
    <?php for ($i = 0; $i < count($jason); $i++) {
        if ($i !== 0) {
            $linea = explode(";", $jason[$i]);
            if ($linea[1] === "DC Comics") {
                echo "<img alt=" . $linea[0] . " src=" . $linea[5] . ">";
                for ($j = 0; $j < count($linea) - 1; $j++) {
                    echo "<p>" . $linea[$j] . "</p>";
                }
            }

        }

    } ?>
</body>

</html>