<?php
    session_start();
    // Deals with the session if the user is permanently logged (max 1 day)
    include('is_previously_logged.php');
    if (!isset($_SESSION['login_time_stamp'])) {
        $_SESSION['login_time_stamp'] = time();
    }
    if (!isset($_COOKIE["token"])){
        if(time()-$_SESSION["login_time_stamp"]>60) {
            session_unset();
            session_destroy();
            setcookie('n_product_char','', time()-1, "/");
            //unset($_COOKIE['n_product_char']);
        }
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
            <h2>Log in</h2>
        </div>
    </header>
<?php
    include('db_vars_inc.php');

    // FORM VALIDATION
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // Form vars
        $user_or_email = $_POST['user_or_email'];
        $password = $_POST['password'];
        

        // Check DB
        try {
            $connection = new PDO($DSN,$USER,$PASS,$OPTIONS);
            $result = $connection ->query($USER_QUERY);
            
            // Check if the login is successful
            $check_login = false;
            
            while ($registered_user = $result->fetchObject()) {
                if (
                    (($registered_user->user_id == $user_or_email) || ($registered_user->email_id == $user_or_email)) &&
                    (password_verify($password, $registered_user->password))
                    ) {
                    $user_id = $registered_user->user_id;
                    $user_email = $registered_user-> email_id;
                    $user_name = $registered_user->first_name;
                    $user_surname = $registered_user->last_name;
                    $user_rol = $registered_user->rol;
                    $user_phone = $registered_user->mobile_no;
                    $check_login = true;
                } 
            }

        } catch (PDOException $e) {
            print 'Connexion failure: '. $e->getMessage();
        }
    }
?>


<?php

    if (isset($_GET['register'])) {
        echo "<p>User added successfully</p>";
        header("Refresh:1; url=login.php");
    }

?>
<?php if (!isset($check_login) && !isset($_SESSION['user'])) { ?>
    <!-- LOGIN FORM -->
    <form method="post" action="#" id="login_form">
        <label for="user_or_email">User or e-mail:</label>
        <input type="text" id="user_or_email" name="user_or_email"
        <?php 
            // Get value from signup
            if(isset($_COOKIE['username'])) {
        
                echo "value=".$_COOKIE['username'];
            }
        ?>
        ><br>


        <label for="password">Password:</label>
        <input type="password" id="password" name="password"
        <?php 
            // Get value from signup
            if(isset($_COOKIE['password'])) {
        
                echo "value=".$_COOKIE['password'];
            }
        ?>
        ><br>

        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Keep logged</label><br><br>

        <button type="submit" form="login_form" value="Submit">Enter</button>
        <br>
        <p>Or register... <a href="signup.php">Register</a></p>
    </form>

<?php
    // Login page after the user has logged in
    } else if (!isset($check_login) && isset($_SESSION['user'])) {
        echo "User: ".$_SESSION['user']['id']."<br>";
        echo "E-mail: ".$_SESSION['user']['email']."<br>";
        echo "Name: ".$_SESSION['user']['name']."<br>";
        echo "Surname: ".$_SESSION['user']['surname']."<br>";
        echo "Phone Number: ".$_SESSION['user']['phone']."<br>";
        echo "<br>";
        echo "<a href='logout.php'>Logout</a>";
        
    } else if ($check_login == true) {
        $_SESSION['user'] = 
        [
            'id' => $user_id,
            'email' => $user_email,
            'name' => $user_name,
            'surname' => $user_surname,
            'rol' => $user_rol,
            'phone' => $user_phone
        ];

        // Unset cookies from signup
        setcookie('username','',time()-1);
        setcookie('password','',time()-1);

        // If the user has marked the checkbox 'Keep logged'
        if (isset($_POST['remember'])) {
            include ('keep_logged.php');
        }

        header('location:index.php');
    } else if ($check_login == false) {
        echo "<p>The login has failed. <a href='login.php?logged=ok'>Try again</a></p>";
    }
?>
</body>
</html>