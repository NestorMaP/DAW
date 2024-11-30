<?php
    /**
     * @author NestorM
     * @version 30/11/2024
     */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>
<body>
    <h1>Array Sort</h1>
    <?php
        //Create array and show it
        $array_length = rand(0,10);
        $array = [];
        for ($i=0; $i<$array_length; $i++) {
            $array[] = rand(0,100);
        }
        echo '<pre>'.print_r($array, true).'</pre>';

        // Order array
        for ($i=1; $i<count($array); $i++) {
            if ($array[$i]<$array[$i-1]) {
                $temp = $array[$i-1];
                $array[$i-1] = $array[$i];
                $array[$i] = $temp;
                $i=0;
            }
        }
        echo '<pre>'.print_r($array,true).'</pre>';
    ?>
</body>
</html>