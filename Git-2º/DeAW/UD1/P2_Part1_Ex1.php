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
    <p><strong>Exercici 1:</strong> Escriure un programa php que emmagatzene en un array un conjunt de 10
números qualssevol. El programa visualitzarà els elements del array utilitzant el bucle foreach:</p>
    
    <?php
        $array = array(4,8,15,16,23,42,37,73,1024,13)
    ?>

    <ol type="a">
        <li>Només el contingut del array<br></li>
            <?php
                foreach($array as $value)
                    print "$value ";
            ?>
            <br><br>
        <li>La posició i el contingut<br></li>
            <?php
                foreach($array as $key => $value) {
                    print "[$key] => $value<br>";
                }
            ?>
           
    </ol>


</body>
</html>