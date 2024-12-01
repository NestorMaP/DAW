<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stark FAmily Tree</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <?php
        $people = [];

        include_once('./Person.inc.php');

        $eddardStark = new Person('Eddard', 'Stark', 45, 'male', 'Stark');
        $catelynStark = new Person('Catelyn', 'Stark', 40, 'female', 'Stark');
        
        $robbStark = new Person('Robb', 'Stark', 25, 'male', 'Stark');
        $sansaStark = new Person('Sansa', 'Stark', 20, 'female', 'Stark');
        $aryaStark = new Person('Arya', 'Stark', 16, 'female', 'Stark');
        $brandonStark = new Person('Brandon', 'Stark', 13, 'male', 'Stark');
        $rickonStark = new Person('Rickon', 'Stark', 10, 'male', 'Stark');
        
        $eddardStark->setSpouse($catelynStark);

        $eddardStark->addChild($robbStark);
        $eddardStark->addChild($sansaStark);
        $eddardStark->addChild($aryaStark);
        $eddardStark->addChild($brandonStark);
        $eddardStark->addChild($rickonStark);

        $catelynStark->addChild($robbStark);
        $catelynStark->addChild($sansaStark);
        $catelynStark->addChild($aryaStark);
        $catelynStark->addChild($brandonStark);
        $catelynStark->addChild($rickonStark);
    
        $people = [$eddardStark, $catelynStark, $robbStark, $sansaStark, $aryaStark, $brandonStark, $rickonStark];
    ?>
    <table>
        <tr>
            <th>Id</th>
            <th>Picture</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>Gender</th>
            <th>House</th>
            <th>Father</th>
            <th>Mother</th>
            <th>Spouse</th>
            <th>Children</th>
            <th>Siblings</th>
        </tr>
        <tbody>
            <?php
                foreach($people as $person) {
                    echo '<tr>';
                        echo '<td>'.$person->getId().'</td>';
                        echo '<td><img src="./assets/'.$person->getPicture().'" alt="'.strtolower($person->getName()).' picture"></td>';
                        echo '<td>'.$person->getName().'</td>';
                        echo '<td>'.$person->getSurname().'</td>';
                        echo '<td>'.$person->getAge().'</td>';
                        echo '<td>'.$person->getGender().'</td>';
                        echo '<td>'.$person->getHOuse().'</td>';
                        echo '<td>'.$person->getFather().'</td>';
                        echo '<td>'.$person->getMother().'</td>';
                        echo '<td>'.$person->getSpouse().'</td>';
                        echo '<td>'.$person->getChildren().'</td>';
                        echo '<td>'.$person->getSiblings().'</td>';
                    echo '<tr>';
                }
            ?>
        </tbody>
    </table>
</body>
</html>