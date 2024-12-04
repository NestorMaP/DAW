<?php
    header('Content-Type: application/json; charset=utf-8');

    include ('db_vars_inc.php');

    // Check if the id exists in the URL
    if (isset($_GET['product'])) {
        $product_id = intval($_GET['product']);
    
        try {
            $conn = new PDO($DSN,$USER,$PASS,$OPTIONS);
            $stmt = $conn->prepare($PRODUCT_ID_QUERY);
            $stmt->bindParam(':product_id',$product_id);
            $stmt->execute();
            $product = $stml->fetchObject();

            if($product) {
                echo json_encode($product);
            } else {
                echo json_encode(['error' => 'Product no found']);
            }
    
        } catch (PDOException $e) {
            die(json_encode(['error' => 'Connexion failure: '. $e->getMessage()]));
        }
    } else {
        $conn = new PDO($DSN,$USER,$PASS,$OPTIONS);
        $stmt = $conn->prepare($MAIN_QUERY);

        $products = [];
        while ($product = $stmt->fetchObject()) {
            $products[] = $product;
        }
        echo json_encode($products);
    }

    // Closing connection
    $conn = null;

?>