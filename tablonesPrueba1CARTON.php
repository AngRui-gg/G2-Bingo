<!DOCTYPE html>
<html lang="es">
<head>
    
</head>
<body>
    <h1>Juego del Bingo</h1>
 
    <?php 

        $numBombo= range(1, 60);
        shuffle($numBombo);
        $numTachado= 00;
        $numBlanco =00;

        echo "<h2>Jugador 1 </h2>";

                for ($c = 1; $c <= 1; $c++) 
                {

                    $usados = []; //numeros ya usados

                    //Columna del 60
                    $columna60 = [00, 00, 00];
                    if (rand(1, 4) === 1) // si sale el 1: el 60 está en el cartón
                    {            
                        $columna60[rand(0, 2)] = 60;
                        $usados[] = 60;
                    }

                    //Resto del cartón
                    $resto = [];
                    $blancos = count(array_keys($columna60, 00, true)); // empezamos contando los 00 de la columna del 60
                    for ($i = 0; $i < 18; $i++) 
                    {
                        $valor = rand(0, 1);
                        if ($valor === 0 && $blancos < 6) // máximo 6 blancos en TODO el cartón
                        {   
                            $resto[] = 0;
                            $blancos++;
                        } 
                        else 
                        {
                            $resto[] = 1;
                        }
                    }

                    // Sustituir 0 por 00 y 1 por un número de su columna, sin repetir, y ordenados
                    for ($col = 0; $col < 6; $col++) 
                    {
                        $numerosColumna = [];

                        // Recorremos las 3 filas de esta columna
                        for ($f = 0; $f < 3; $f++) 
                        {
                            $pos = $f * 6 + $col;
                            if ($resto[$pos] === 0) 
                            {
                                $resto[$pos] = 00;
                            } 
                            else 
                            {
                                do 
                                {
                                    $numero = rand($col * 10 + 1, $col * 10 + 10); // rango de la columna
                                } while (in_array($numero, $usados));
                                $usados[] = $numero;
                                $numerosColumna[] = $numero;
                            }
                        }

                        sort($numerosColumna); // de menor a mayor

                        // Colocamos los números ordenados en las posiciones que eran 1
                        $k = 0;
                        for ($f = 0; $f < 3; $f++) 
                        {
                            $pos = $f * 6 + $col;
                            if ($resto[$pos] === 1) 
                            {
                                $resto[$pos] = $numerosColumna[$k];
                                $k++;
                            }
                        }
                    }

                    // Dividir el array en tres filas de 6 y añadir la columna del 60
                    $carton = array_chunk($resto, 6);
                    for ($f = 0; $f < 3; $f++) 
                    {
                        $carton[$f][] = $columna60[$f];
                    }

                    echo "<strong>Cartón $c</strong>";
                    
                    var_dump($carton);

                    // Seguimos sacando el resto de bolas del bombo
                    $jugador = 1;
                    $bingo = false;

                    for ($b = 0; $b < count($numBombo) && !$bingo; $b++)
                    {
                        $bola = $numBombo[$b];
                        echo "<p>Bola nº ".($b + 1).": <strong>$bola</strong></p>";

                        // Tachamos la bola en el cartón (se pone a 0)
                        for ($k = 0; $k < 3; $k++)
                        {
                            $m = array_search($bola, $carton[$k], true);
                            if ($m !== false)
                            {
                                $carton[$k][$m] = $numTachado;
                            }
                        }

                        // Bingo: recorrer el cartón y comprobar si queda algún número sin tachar
                        $completo = true;
                        foreach ($carton as $fila)
                        {
                            foreach ($fila as $casilla)
                            {
                                if ($casilla !== 0)
                                {
                                    $completo = false;
                                }
                            }
                        }

                        if ($completo)
                        {
                            $bingo = true;
                            echo "<h2>¡BINGO! Gana el Jugador $jugador con el Cartón $c (en la bola nº ".($b + 1).")</h2>";
                            var_dump($carton);
                        }
                    }
                }

    ?>
  
 

</body>
</html>