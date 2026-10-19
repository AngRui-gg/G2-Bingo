<?php
function bombo($carton) {
    $numBombo = range(1, 60);
    shuffle($numBombo);

    foreach ($numBombo as $bola) {
        echo "Ha salido la bola: " . $bola . "<br>";
        for ($fila = 0; $fila < 3; $fila++) {
            for ($col = 0; $col < 7; $col++) {
                if ($carton[$fila][$col] == $bola) {
                    $carton[$fila][$col] = 00;
                }
            }
        }
        $bingo = true;
        for ($fila = 0; $fila < 3; $fila++) {
            for ($col = 0; $col < 7; $col++) {
                if ($carton[$fila][$col] != 00) {
                    $bingo = false;
                }
            }
        }
        if ($bingo) {
            echo "<h2>¡BINGO!</h2>";
            echo "Bola ganadora: " . $bola . "<br>";
            break;
        }
    }
    return $carton;
}
?>