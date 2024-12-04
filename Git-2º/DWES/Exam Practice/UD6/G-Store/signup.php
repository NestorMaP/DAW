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
            <h2>Register User</h2>
        </div>
    </header>
    <main>
        <?php
            include('db_vars_inc.php');
            include('functions.inc.php');
        
            // FORM VALIDATION
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Form vars
                $user = $_POST['user'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $encrypted_password = encryptPassword($password);
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $phone = $_POST['phone'];

                // Check DB
                try {
                    $connection = new PDO ($DSN,$USER,$PASS,$OPTIONS);
                    $result = $connection->query($USER_QUERY);

                    // Check if the user already exists
                    $check_existance = false;

                    while ($registered_user = $result->fetchObject()) {
                        if (($registered_user->user_id == $user) || ($registered_user->email_id == $email)) {
                            $check_existance = true;
                        }
                    }
                } catch (PDOException $e) {
                    echo 'Connection failure: '.$e->getMessage();
                }
            }
        ?>
        <?php if (!isset($check_existance)) { ?>
            <!-- LOGIN FORM (only if the variable check existance is not set) -->
            <form method="post" action="#" id="login_form">
                <label for="user">User:</label>
                <input type="text" id="user" name="user" placeholder="Max 20 characters"><br>

                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email"><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br>

                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name"><br>

                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name"><br>

                <label for="phone">Mobile Phone:</label>
                <input type="tel" id="phone" name="phone"><br>

                <button type="submit" form="sign-up_form" value="Submit">Register</button>
            </form>

    <?php 
        } else if ($check_existance == false) {
            // If the user doesn't exists it's added to the DB
            try {
                $connection = new PDO($DSN,$USER,$PASS,$OPTIONS);
                $result = $connection->prepare($REGISTER_USER_QUERY);

                $result->bindParam(':user_id', $user);
                $result->bindParam(':email_id', $email);
                $result->bindParam(':password', $encrypted_password);
                $rol_default = 'user';
                $result->bindParam(':rol', $rol_default);
                $result->bindParam(':first_name', $first_name);
                $result->bindParam(':last_name', $last_name);
                $result->bindParam(':mobile_no', $phone);

                $result->execute();

                $_SESSION['username'] = $user;
                $_SESSION['password'] = $password;

                header('location: login:php?register=ok');
                exit();
            } catch (PDOException $e) {
                echo 'Connection failure: '.$e->getMessage();
            }
        } else if ($check_existance == true) {     
    ?>
            <p>This user already has an account.</p><br>
            <a href="index.php"><--Back</a>
    <?php } ?>
    </main>
    
</body>
</html>