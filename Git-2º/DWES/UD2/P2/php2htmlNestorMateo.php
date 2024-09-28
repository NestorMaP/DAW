/**
* @author NestorM
* @version 28/09/2024
*/


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http_equiv="expires" content="Sat, 07 feb 2016 00:00:00 GMT">
    <title>Práctica 2</title>
    <style>
        #square {
            width: 15px;
            height: 15px;
            margin-left: 5px;
            display: inline-block;
        }
        #table_sec4 {
            border: 1px solid black;
        }

        #table_element {
            border: 1px solid black;
        }

    </style>
</head>
<body>
    <?php
        echo '<ul>';
        for ($i = 1; $i <= 5; $i++) {
            echo '<li><a href="#sec$i">Section $i</a></li>';
        }
    ?>
    <br>
    <section>
        <article id="sec1">
            <h1>Par o Impar</h1>
            <?php
               $v1 = rand(-100,100);
               if ($v1%2 == 0) {
                echo $v1.' es par.';
               } else {
                echo $v1.' es impar.';
               }    
            ?>
        </article>
        <br>

        <article id="sec2">
            <h1>Arcoiris</h1>
            <?php
                $v2 = rand(1,7);
                $color = "";
                $colorEs = "";

                switch ($v2) {
                    case 1:
                        $color = 'red';
                        $colorEs = 'rojo';
                    break;
                    case 2:
                        $color = 'orange';
                        $colorEs = 'naranja';
                    break;
                    case 3:
                        $color = 'yellow';
                        $colorEs = 'amarillo';
                    break;
                    case 4:
                        $color = 'green';
                        $colorEs = 'verde';
                    break;
                    case 5:
                        $color = 'indigo';
                        $colorEs = 'añil';
                    break;
                    case 6:
                        $color = 'blue';
                        $colorEs = 'azul';
                    break;
                    case 7:
                        $color = 'violet';
                        $colorEs = 'violeta';
                    break;
                }

                echo 'Se ha seleccionado el color '.$colorEs.':';
                echo '<div id="square" style="background-color: '.$color.';"></div>';
            ?>
        </article>
        <br>

        <article id="sec3">
            <h1>Estaciones</h1>
            <?php
                $v3 = rand(mktime(0,0,0,1,1,2012),mktime(0,0,0,12,31,2012));
                $date = date('l, j M Y',$v3);
                $season = "";

                if ($v3 >= mktime(0,0,0,3,20,2012) && 
                    $v3 <= mktime(0,0,0,6,20,2012)) {
                    $season = 'primavera';
                } else if ($v3 >= mktime(0,0,0,6,21,2012) && 
                        $v3 <= mktime(0,0,0,9,22,2012)){
                    $season = 'verano';
                }else if ($v3>= mktime(0,0,0,9,23,2012) && 
                        $v3 <= mktime(0,0,0,12,20,2012)){
                    $season = 'otoño';
                }else {
                    $season = 'invierno';
                }

                echo 'La fecha '.$date.'... Es '.$season.'.';
            ?>
        </article>
        <br>

        <article id="sec4">
            <h1>Tabla</h1>
                <?php    
                    $day = (int)date('d',$v3);
                    $month = (int)date('m',$v3);
                
                    // Rows=days & Columns=Months 
                    echo '<table id="table_sec4">';
                        for ($i=1; $i<=$day; $i++){
                            echo '<tr>';
                            for ($j=1; $j<=$month; $j++){
                                echo '<td id="table_element">'.$i*$j.'</td>';
                            }
                            echo '<tr>';
                        }                    
                    echo '</table>';
                ?>
        </article>
        <br>

        <article id="sec5">
            <h1>Cambio</h1>

        </article>
    </section>
</body>
</html>