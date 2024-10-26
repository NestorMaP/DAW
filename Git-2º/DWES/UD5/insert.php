<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
    <?php
        include('db_vars.inc.php');
    ?>
    <h1>Video Games DB</h1>
    <h2>Insert Video Game</h2>
    
    <!-- FORM -->
    <form action="process.php" method="post" enctype="multipart/form-data">
        
        <h3>Mandatory data:</h3>
        
        <div class="form_field">
            <label for="release_year">Release Year: </label>
            <input type="number" name="release_year" id="release_year">
            <br>
        </div>

        <div class="form_field">
            <label for="platform_name">Platform: </label>
            <select name="platform_name" id="platform_name">
                <option value="" selected disabled hidden>Choose one</option>
                <?php // Query to show all the different platforms
                    $connection = new PDO($DSN,$USER,'',$OPTIONS);
                    $result = $connection ->query($PLATFORM_LIST);
                    while($platform = $result->fetchObject()) {
                        echo "<option>{$platform->platform_name}</option>";
                    }
                ?>
            </select>
            <br>
        </div>
        <div class="form_field">
            <label for="game_name">Name: </label>
            <input type="text" name="game_name" id="game_name">
            <br>
        </div>
        
        <div class="form_field">
            <label for="genre_name">Genre: </label>
            <select name="genre_name" id="genre_name">
                <option value="" selected disabled hidden>Choose one</option>
                <?php // Query to show all the different platforms
                    $connection = new PDO($DSN,$USER,'',$OPTIONS);
                    $result = $connection ->query($GENRE_LIST);
                    while($genre = $result->fetchObject()) {
                        echo "<option>{$genre->genre_name}</option>";
                    }
                ?>
            </select>
            <br>
        </div>
        
        <div class="form_field">
            <label for="publisher_name">Publisher: </label>
            <input type="text" name="publisher_name" id="publisher_name">
            <br>
        </div>
        <div class="form_field">
            <input type="submit" value="Send!" id="submit">
        </div>

    </form>
</body>
</html>