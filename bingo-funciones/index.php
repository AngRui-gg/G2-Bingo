<?php
require '/generarEspacio.php';
require  '/rellenarNumCarton.php';
require  '/bombo.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bingo PHP</title>
</head>
<body>
<h1>Jugador 1</h1>
<?php
for ($c = 1; $c <= 1; $c++) {
    $carton = generarEspacio();
    $carton = rellenarNumCarton($carton);
    echo '<h2>Cartón inicial</h2><div>';
    print_r($carton);
    echo '</div>';
    $carton = bombo($carton);
    echo '<h2>Cartón final</h2><div>';
    print_r($carton);
    echo '</div>';
}
?>
</body>
</html>
