<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2_P1_Ex1</title>
</head>
<body>
    <h1>PRÀCTICA 2: ARQUITECTURA WEB</h1>
    <h2>Part 1: Primers programes en PHP</h2>
    <p><strong>Exercici 1:</strong> Defineix un array amb 10 números qualssevol i visualitzar el seu factorial d'aquests
    números.</p>
    
    <?php
        $array = array(3,5,7,11,13,17,23,29,31,37);
    
        foreach($array as $key => $value){
            $fact = $value;
            for ($i=$value-1;$i>0;$i--){
                $fact *= $i;
            }
            print "[$key] => [$fact]<br>";
        }
    ?>
    
</body>
</html>