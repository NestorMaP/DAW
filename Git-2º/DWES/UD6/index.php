<?php
    session_start();
    // Deals with the user session if the user is permanently logged (max 1 day)
    include('is_previously_logged.php');

    if (!isset($_SESSION['login_time_stamp'])) {
        $_SESSION['login_time_stamp'] = time();
    }
    if (!isset($_COOKIE["token"])){
        if(time()-$_SESSION["login_time_stamp"]>60) {
            session_unset();
            session_destroy();
            setcookie('n_product_char','', time()-1, "/");            
        }
    }
    // Cookie to store the number of products in the chart
    if (!isset($_COOKIE['n_product_char'])) {
        setcookie('n_product_char','0',time()+3600,'/');
    }
    
?>
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
            <h2>Home Page</h2>
        </div>
        <div class="header-icons">
            <?php
                include('db_vars_inc.php');

                echo "<div class='chart'>";
                    // CHART
                    echo "<a href='chart.php'><img src='/assets/shopping_chart.png' alt='shopping_chart_img'></a> <br>";
                    if (isset($_COOKIE['n_product_char'])) {
                        if ($_COOKIE['n_product_char'] == 1) {
                            echo $_COOKIE['n_product_char']." product";
                        } else {
                            echo $_COOKIE['n_product_char']." products";
                        }
                    } else {
                        echo '0 products';
                    }
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
                echo "<div class='users'>";     
                // USERS
                    if (isset($_SESSION['user']) && $_SESSION['user']['rol'] == 'admin') {
                        echo "<a href='users.php'><img src='/assets/users.png' alt='users_img'></a><br>";
                        echo "Users<br>";
                    }
                echo "</div>"
            ?>
        </div>
    </header>
    <?php
        // MAIN
        if(isset($_SESSION['user'])) {
            try {
                $connection = new PDO($DSN,$USER,$PASS,$OPTIONS);
                $result = $connection ->query($MAIN_QUERY);
                

                // ECHOES
                while ($product = $result->fetchObject()) {
                    echo '<div class="product">';
                        echo "<h3 class='product_title'>$product->Product_name</h3>";
                        echo "<p class='product_details'>
                            Price: $product->Price ($product->Units unidades disponibles) <br> 
                            $product->Product_description <br>
                            <img src='/assets/$product->Picture' alt='Product picture'>";
                            // No need to check the picture existance as the SQL does it itself adding the default value of "No_image_available.svg"
                            
                        echo "<a href=chart.php?id=$product->Product_id><Button>Añadir</Button></a><br><br>";
                    echo '</div>';
                }
            } catch (PDOException $e) {
                echo 'Connexion failure: '. $e->getMessage();
            }
        }
    ?>
</body>
</html>