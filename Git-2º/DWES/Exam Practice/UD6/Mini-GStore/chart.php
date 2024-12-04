<?php
    
    session_start();
    
    if (!isset($_SESSION['login_time_stamp'])) {
        $_SESSION['login_time_stamp'] = time();
    }
    if (!isset($_COOKIE["token"])){
        if(time()-$_SESSION["login_time_stamp"]>60) {
            session_unset();
            session_destroy();
            //setcookie('n_product_char',0, time()+3600, "/");
            unset($_SESSION['n_product_char']);
        }
    }

    include('db_vars_inc.php');

    // Verify if ID received from index.php
    try {
        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];

            $connection = new PDO($DSN,$USER,$PASS,$OPTIONS);

            $result = $connection->prepare($PRODUCT_QUERY);
            $result->bindParam(':product_id',$product_id);
            $result->execute();

            $product = $result->fetchObject();
        } else {
            $product_id = null;
        }
    } catch (PDOException $e) {
        echo 'Conection failure: '.$e->getMessage();
    }

    // Add chart if the form is sent
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['qty_products']) && $product_id) {
        $product_qty = intval($_POST['qty_products']);

        if($product_qty > 0) {
            // If the product is already in the chart
            if (isset($_SESSION['chart'][$product_id])) {
                $_SESSION['chart'][$product_id]['qty'] += $product_qty;
            } else {
                $_SESSION['chart'][$product_id] =
                [
                    'id' => $product->Product_id,
                    'name' => $product->Product_name,
                    'img' => $product->Picture,
                    'price' => $product->Price,
                    'qty' => $product_qty
                ];
            }

            // Avoid reloading the qty selection form
            $product_id = null;

            $current_qty = isset($_SESSION['n_product_char']) ? intval($_SESSION['n_product_char']) : 0;
            $_SESSION['n_product_char'] = $current_qty + $product_qty;

            header('location:chart.php');
            exit();
        } else {
            echo 'Please select a quantity higher than 0';
        }
    } else {
        $product_qty = 0;
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
    <header class="main-header">
    <div class="header-text">
            <h1>Grocery Store</h1>
            <h2>Chart</h2>
        </div>
    </header>
    <main>
        <?php
            // Show the chart only if the user is logged
            if (isset($_SESSION['user'])) {
                // CHART         
                echo "<div class='chart'>";
                    echo "<img src='/assets/shopping_chart.png' alt='shopping_chart_img'><br>";
                    if (isset($_SESSION['n_product_char'])) {
                        if ($_SESSION['n_product_char'] == 1) {
                            echo $_SESSION['n_product_char']. ' product';
                        } else {
                            echo $_SESSION['n_product_char']. ' products';
                        }
                    } else {
                        echo '0 products';
                    }
                echo '</div>';
                echo '<br><br>';
            

                // Form to set qty if an id is received
                if ($product_id && $product) {
                    echo '<div class="product_ch">';
                        echo "<h3 class='product_title_ch'>$product->Product_name</h3>";
                        echo "<p class='product_details_ch'>
                            Price: $product->Price ($product->Units unidades disponibles) <br> 
                            $product->Product_description <br>
                            <img src='/assets/$product->Picture' alt='Product picture'><br>";
                        echo "<form method='post'>";
                            echo "<label for='qty_products_add'>How many products do you with to add to the cart?</label><br>";
                            echo "<input type='number' id='qty_products' name='qty_products'>";
                            echo "<Button id='add_item_button'>Añadir</Button>";
                        echo "</form>";
                    echo '</div>';
                
                    // Show only the chart if there is no product_id (the page has been reloaded)
                } else {
                    // Update the session variable with the number of items in the shopping chart
                    $current_qty = isset($_SESSION['n_product_char']) ? intval($_SESSION['n_product_char']) : 0;
                    $_SESSION['n_product_char'] = $current_qty + $product_qty;

                    // Show the list of items in the chart
                    if (!empty($_SESSION['chart'])) {
                        foreach ($_SESSION ['chart'] as $id => $item) {
                            if ($item['qty']>0) {
                                echo '<div class="product_ch">';
                                echo "<h3 class='product_title_ch'>".$item['name']."</h3>";
                                echo "<p class='product_details_ch'>
                                    Price: ".$item['price']."€ (".$item['qty']." selected units.)<br> 
                                    <img src='/assets/".$item['img']."' alt='Product picture'><br>";
                                echo "Delete product. <a href='delete_product.php?id=".$item['id']."'><img src='/assets/trash.png' alt='trash_img' style='width:30px'></a>";
                            echo '</div>';
                            }
                        }
                        
                    }else {
                        echo 'The shopping chart is empty.<br>';
                    }
                    echo "<a href='index.php'><--Back</a>";
                }
            } else {
                echo "<p>Please login: <a href='login.php'>Login</a></p>";
            }
        ?>
    </main>
</body>
</html>