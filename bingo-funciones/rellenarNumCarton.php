<?php
function rellenarNumCarton($carton) {
    $usados = [];
    for ($fila = 0; $fila < 3; $fila++) {
        if ($carton[$fila][6] == 60) {
            $usados[] = 60;
        }
    }

    for ($col = 0; $col < 6; $col++) {
        $numerosColumna = [];
        for ($fila = 0; $fila < 3; $fila++) {
            if ($carton[$fila][$col] == 1) {
                do {
                    $numero = rand(($col * 10) + 1, ($col * 10) + 10);
                } while (in_array($numero, $usados));
                $usados[] = $numero;
                $numerosColumna[] = $numero;
            }
        }
        sort($numerosColumna);
        $indice = 0;
        for ($fila = 0; $fila < 3; $fila++) {
            if ($carton[$fila][$col] == 1) {
                $carton[$fila][$col] = $numerosColumna[$indice];
                $indice++;
            }
        }
    }
    return $carton;
}
?>