<?php
    session_start();
    // Deals with the session if the user is permanently logged (max 1 day)
    include('is_previously_logged.inc.php');

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
            <h2>Log in</h2>
        </div>
    </header>
    <main>
        <?php
            include('db_vars_inc.php');

            // FORM VALIDATION
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Form Vars
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
                echo '<p>User added succesfully</p>';
                header('Refresh:1; url=login.php');
            }
        ?>
        <?php
            if (!isset($check_login) && (!isset($_SESSION['user']))) {
        ?>
                <form method="post" action="#" id="login_form">
                <label for="user_or_email">User or e-mail:</label>
                <input type="text" id="user_or_email" name="user_or_email"
                <?php 
                    // Get value from signup
                    if(isset($_SESSION['username'])) {
                
                        echo "value=".$_SESSION['username'];
                    }
                ?>
                ><br>


                <label for="password">Password:</label>
                <input type="password" id="password" name="password"
                <?php 
                    // Get value from signup
                    if(isset($_SESSION['password'])) {
                
                        echo "value=".$_SESSION['password'];
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
            } else if (!isset($check_login) && (isset($_SESSION['user']))) {
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

                // Unset session variables from signup.php
                unset($_SESSION['username']);
                unset($_SESSION['password']);

                // If the user has marked the checkbox 'Keep Logged'
                if (isset($_POST['remember'])) {
                    include ('keep_logged.php');
                }
                header('location:index.php');
            } else if ($check_login == false) {
                echo "<p>The login has failed. <a href='login.php?logged=ok'>Try again</a></p>";
            }
        ?>
    </main>
</body>
</html>