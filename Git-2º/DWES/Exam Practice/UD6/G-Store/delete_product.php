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
        session_start();

        // Delete from session
        $current_qty = $_SESSION['chart'][$_GET['id']]['qty'];
        $_SESSION['chart'][$_GET['id']]['qty'] = 0;

        // Delete from Cookie
        $current_char_qty = isset($_SESSION['n_product_char']) ? intval($_SESSION['n_product_char']) : 0;
        $_SESSION['n_product_char'] = $current_char_qty - $current_qty;

        echo "Item deleted successfully<br>";

        echo "<a href='chart.php'><--Back</a>";
    ?>
</body>
</html>