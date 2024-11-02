<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery Store</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <header class="main-header">
        <div class="header-text">    
            <h1>Grocery Store</h1>
            <h2>Users</h2>
        </div>
        <div class="header-icons">
        
            <?php
            include('db_vars_inc.php');

                echo "<div class='chart'>";
                    // CHART
                    echo "<a href='chart.php'><img src='/assets/shopping_chart.png' alt='shopping_chart_img'></a> <br>";
                    if(isset($_COOKIE['n_product_char'])) {
                        if ($_COOKIE['n_product_char'] == 1) {
                            echo $_COOKIE['n_product_char']." producto";
                        } else {
                            echo $_COOKIE['n_product_char']." productos";
                        }
                    }   
                    echo '<br>';
                echo "</div>";
                echo "<div class='login'>"; 
                    // LOGIN
                    echo "<a href='login.php'><img src='/assets/login.png' alt='login_img'></a><br>";
                    if (isset($_SESSION['user'])) {
                        echo $_SESSION['user']['id'].'<br>';
                    } else {
                        echo "Login<br>";
                    }
                echo "</div>";
        echo "</div>";
    echo "</header>";
        // MAIN
        try {
            $connection = new PDO($DSN,$USER,$PASS,$OPTIONS);
            $result = $connection ->query($USER_QUERY);
            

            // ECHOES
            while ($user = $result->fetchObject()) {
                echo '<div class="users">';
                    echo "<p>User: $user->user_id // E-mail: $user->email_id // Rol: $user->rol</p>";        
                echo '</div>';
            }
        } catch (PDOException $e) {
            print 'Connexion failure: '. $e->getMessage();
        }
        
        echo "<a href='index.php'><--Back</a>";
    ?>
</body>
</html>