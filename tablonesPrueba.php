<!DOCTYPE html>
<html lang="es">
<head>
    
</head>
<body>
    <h1>Juego del Bingo</h1>
 
    <?php 

        $numBombo= range(1, 60);
        shuffle($numBombo);
        $numTachado= 99;
        $numBlanco =00;

        print($numBombo[0]);
        echo "<h2>Jugador 1 </h2>";

                for ($c = 1; $c <= 3; $c++) 
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
                    for ($k = 0; $k < 3; $k++)// recorremos las 3 filas
                    {
                        $m = array_search($numBombo[0], $carton[$k], true);// posición del número en la fila

                        if ($m !== false)// si lo ha encontrado
                        {
                            $carton[$k][$m] = $numTachado;
                        }
                    }

                    echo "<h2>Tachado</h2>";
                    var_dump($carton);    
                }

    ?>
  
 

</body>
</html>