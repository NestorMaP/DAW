<?php
    session_start();

    if (!isset($_SESSION['login_time_stamp'])) {
        $_SESSION['login_time_stamp'] = time();
    }
    if (!isset($_COOKIE["token"])){
        if(time()-$_SESSION["login_time_stamp"]>60) {
            session_unset();
            session_destroy();        
        }
    }
    // Session variable to store the number of products in the chart
    if (!isset($_SESSION['n_product_char'])) {
        $_SESSION['n_product_char'] = 0;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery Store</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <?php include('db_vars_inc.php') ?>
    <header class="main-header">
        <div class="header-text">
            <h1>Grocery Store</h1>
            <h2>Home Page</h2>
        </div>
        
    </header>
    <main>
        
        <?php
        // CHECK IF ANY ARTICLE FORM HAS BEEN SUBMITED AND ADD IT TO A SESSION VARIABLE
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $product_name = $_POST['product'];
            if(!isset($_SESSION['product'][$product_name])) {
                $_SESSION['product'][$product_name] = 1;
            } else {
                $_SESSION['product'][$product_name]++;
            }
            $_SESSION['n_product_char']++;
        }
            echo '<div class="chart-manager">';
                // Check if the user has logged
                if (!isset($_SESSION['user'])) {
                    echo 'Login to add items to the chart<br>';
                    echo '<a href="./login.php">Login</a><br><br>';
                } else {
                    echo 'Hello '.$_SESSION['user']['name'].'. ';
                    // Check how many items are in the chart
                    if ($_SESSION['n_product_char'] == 0) {
                        echo 'Your chart is empty.<br><br>';
                    } else {
                        echo 'This is your chart:<br><br>';
                        foreach ($_SESSION['product'] as $key => $val) {
                            echo $key.': '.$val.'<br>';
                        }
                    }
                    echo '<br><a href="./logout.php">Logout</a><br><br>';
                }
                
            echo '</div>';

            
            try{
                $connection = new PDO($DSN, $USER, $PASS, $OPTIONS);
                $result = $connection->query($MAIN_QUERY);

                // ECHOES
                while ($product = $result->fetchObject()) {
                    echo '<div class="product">';
    
                            echo "<h3 class='product_title'>$product->Product_name</h3>";
                            echo "<p class='product_details'>
                                Price: $product->Price ($product->Units unidades disponibles) <br> 
                                $product->Product_description <br>
                                <img src='/assets/$product->Picture' alt='Product picture'>";
                                // No need to check the picture existance as the SQL does it itself adding the default value of "No_image_available.svg"
                        echo '<form method="post" action="#" id="product'.$product->Product_id.'">';      
                            echo '<input type="hidden" name="product" value="'.$product->Product_name.'">';
                            //Show button only if the user logged
                            if(isset($_SESSION['user'])) {
                                echo '<button type="submit" value="Submit">Add</button>';
                            }
                            //echo "<a href=chart.php?id=$product->Product_id><Button>Añadir</Button></a><br><br>";
                        echo '</form>';
                    echo '</div>';
                }
            } catch (PDOException $e) {
                echo 'Connection failure: '. $e->getMessage();
            }
        ?>
    </main>
</body>
</html>