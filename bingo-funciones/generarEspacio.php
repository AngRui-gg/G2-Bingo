<?php
function generarEspacio() {
    $carton = [];
    $espacios = 0;
    $columna60 = [00, 00, 00];

    if (rand(1, 4) == 1) {
        $fila60 = rand(0, 2);
        $columna60[$fila60] = 60;
    }

    foreach ($columna60 as $valor) {
        if ($valor == 00) {
            $espacios++;
        }
    }

    for ($i = 0; $i < 18; $i++) {
        if ($espacios < 6 && rand(0, 1) == 0) {
            $carton[] = 00;
            $espacios++;
        } else {
            $carton[] = 1;
        }
    }

    $carton = array_chunk($carton, 6);
    for ($fila = 0; $fila < 3; $fila++) {
        $carton[$fila][] = $columna60[$fila];
    }
    return $carton;
}
?>