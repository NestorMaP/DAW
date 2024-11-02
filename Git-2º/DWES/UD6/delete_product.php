<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery Store</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
    <header class="main-header">
        <div class="header-text">
            <h1>Grocery Store</h1>
            <h2>Delete Product</h2>
        </div>
    </header>
    <?php
        ini_set('session.gc_maxlifetime',60);
        session_set_cookie_params(60);
        session_start();

        // Delete from session
        $current_qty = $_SESSION['chart'][$_GET['id']]['qty'];
        $_SESSION['chart'][$_GET['id']]['qty'] = 0;

        // Delete from Cookie
        $current_char_qty = isset($_COOKIE['n_product_char']) ? intval($_COOKIE['n_product_char']) : 0;
        setcookie('n_product_char',$current_char_qty - $current_qty, time()+60, "/");

        echo "Item deleted successfully<br>";

        echo "<a href='chart.php'><--Back</a>";
    ?>
</body>
</html>