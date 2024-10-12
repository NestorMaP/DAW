<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>
</head>
<body>
    <h2>Howarts information</h2>
    <?php
        include_once('./Classes.inc.php');

        $harryPotter = new Student ('Harry', 'Potter');
        $hermioneGranger = new Student ('Hermione', 'Granger');
        $ronWeasley = new Student ('Ron', 'Weasley');

        $severusSnape = new Teacher ('Severus', 'Snape');

        $potions = new Subject('Potions','Dungeon',$severusSnape);
        $defense = new Subject('Defense against the dark arts','Dueling chamber',$severusSnape);

        $course1997 = new Course (1997);

        $course1997->addSubject($potions);
        $course1997->addSubject($defense);
        $course1997->addStudent($harryPotter);
        $course1997->addStudent($hermioneGranger);
        $course1997->addStudent($ronWeasley);

        $course1997->takeExam($potions);
        $course1997->takeExam($defense);

        echo $course1997->printInfo();
        echo $severusSnape->printInfo();
        echo $harryPotter->printInfo();
        echo $hermioneGranger->printInfo();
        echo $ronWeasley->printInfo();
    ?>
</body>
</html>