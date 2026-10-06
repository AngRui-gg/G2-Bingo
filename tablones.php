<!DOCTYPE html>
<html lang="es">
<head>
    
</head>
<body>
    <h1>Juego del Bingo</h1>
 
    <?php 
        for ($j = 1; $j <= 4; $j++) 
        {
            echo "<h2>Jugador $j</h2>";

                for ($c = 1; $c <= 3; $c++) 
                {

                    $usados = []; //numeros ya usados

                    //Columna del 60
                    $columna60 = ["-", "-", "-"];
                    if (mt_rand(1, 4) === 1) {            // si sale el 1: el 60 está en el cartón
                        $columna60[mt_rand(0, 2)] = 60;
                        $usados[] = 60;
                    }

                    //Resto del cartón
                    $resto = [];
                    $blancos = 0;
                    for ($i = 0; $i < 18; $i++) {
                        $valor = mt_rand(0, 1);
                        if ($valor === 0 && $blancos < 6) {   // máximo 6 blancos
                            $resto[] = 0;
                            $blancos++;
                        } else {
                            $resto[] = 1;
                        }
                    }

                    // Sustituir 0 por "-" y 1 por un número del 1 al 60 sin repetir numeros o valores
                    for ($i = 0; $i < 18; $i++) {
                        if ($resto[$i] === 0) {
                            $resto[$i] = "-";
                        } else {
                            do {
                                $numero = mt_rand(1, 60);
                            } while (in_array($numero, $usados));
                            $usados[] = $numero;
                            $resto[$i] = $numero;
                        }
                    }

                    // Dividir el array en tres filas de 6 y añadir la columna del 60
                    $carton = array_chunk($resto, 6);
                    for ($f = 0; $f < 3; $f++) {
                        $carton[$f][] = $columna60[$f];
                    }

                    echo "<strong>Cartón $c</strong>";
                    var_dump($carton);
                }
            }

    ?>
  
 

</body>
</html>