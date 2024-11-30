<?php
/**
 * @author NestorM
 * @version 30/11/2024
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity 2</title>
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
        echo 'ul';
        for ($i=1; $i<=5; $i++) {
            echo '<li><a href="#sec'.$i.'">Section '.$i.'</a></li>';
        }
    ?>
    <br>
    <section>
        <article id="sec1">
            <h1>Par o impar</h1>
            <?php 
                $v1 = rand(-100,100);
                if ($v1%2 == 0) {
                    echo $v1.' es par.';
                } else {
                    echo $v1.' es impar';
                }
            ?>
        </article>
        <br>

        <article id="sec2">
            <h1>ARcoiris</h1>
            <?php
                $v2 = rand(1,7);
                $color = "";
                
                switch ($v2) {
                    case 1:
                        $color = 'red';
                    break;
                    case 2:
                        $color = 'orange';
                    break;
                    case 3:
                        $color = 'yellow';
                    break;
                    case 4:
                        $color = 'green';
                    break;
                    case 5:
                        $color = 'indigo';
                    break;
                    case 6:
                        $color = 'blue';
                    break;
                    case 7:
                        $color = 'violet';
                    break;
                }
                echo 'The color selected is '.$color.':';
                echo '<div id="square" style="background-color: '.$color.'"></div>'     
            ?>
        </article>
        <br>

        <article id="sec3">
            <h1>Seasons</h1>
            <?php
                $v3 = rand(mktime(0,0,0,1,1,2024),mktime(0,0,0,31,12,2024));
                $date = date('l, j M Y', $v3);
                $season = '';

                if ($v3 >= mktime(0,0,0,3,20,2024) && 
                    $v3 <= mktime(0,0,0,6,20,2024)) {
                    $season = 'spring';
                } else if ($v3 >= mktime(0,0,0,6,21,2024) && 
                        $v3 <= mktime(0,0,0,9,22,2024)){
                    $season = 'summer';
                }else if ($v3>= mktime(0,0,0,9,23,2024) && 
                        $v3 <= mktime(0,0,0,12,20,2024)){
                    $season = 'fall';
                }else {
                    $season = 'winter';
                }

                echo 'The date '.$date.' ...is '.$season.'.';
            ?>
        </article>
        <br>
        
        <article id="sec4">
            <h1>Table</h1>
            <?php
                $day = intval(date('d',$v3));
                $month = intval(date('m', $v3));

                // Rows=days $$ Columns=months
                echo '<table id="table_sec4">';
                    for ($i=1; $i<=$day; $i++){
                        echo '<tr>';
                            for ($j=1; $j<=$month; $j++) {
                                echo '<td id="table_element">'.$i*$j.'</td>';
                            }
                        echo '</tr>';
                    }
                echo '</table>'
            ?>
        </article>
        <br>

        <article id="sec5">
            <h1>Change</h1>
            <?php
                $v5 = rand(1,1000);
                echo 'Total €: '.$v5.'<br>';

                $n500 = intval($v5/500);
                $v5 -= ($n500*500);
                echo $n500.' billetes de 500.<br>';

                $n200 = intval($v5/200);
                $v5 -= ($n200*200);
                echo $n200.' billetes de 200.<br>';

                $n100 = intval($v5/100);
                $v5 -= ($n100*100);
                echo $n100.' billetes de 100.<br>';

                $n50 = intval($v5/50);
                $v5 -= ($n50*50);
                echo $n50.' billetes de 50.<br>';

                $n20 = intval($v5/20);
                $v5 -= ($n500*500);
                echo $n20.' billetes de 20.<br>';

                $n10 = intval($v5/10);
                $v5 -= ($n10*10);
                echo $n10.' billetes de 10.<br>';

                $n5 = intval($v5/5);
                $v5 -= ($n5*5);
                echo $n5.' billetes de 5.<br>';

                $n2 = intval($v5/2);
                $v5 -= ($n2*2);
                echo $n2.' monedas de 2.<br>';

                $n1 = intval($v5/1);
                $v5 -= ($n1*1);
                echo $n1.' monedas de 1.<br>';

                
            ?>
        </article>
    </section>
</body>
</html>