<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book's form</title>
</head>
<body>

    <form action="bibliotecaNestorM.php" method="get">
    Title: <input type="text" name="title" id="title">
    <br>
    Author: <input type="text" name="author" id="author">
    <br>
    Publisher: <input type="text" name="publisher" id="publisher">
    <br>
    <label for="languages">Language: </label>
    <select name="language" id="language">
        <option value="English">English</option>
        <option value="Spanish">Spanish</option>
        <option value="Valencian">Valencian</option>
    </select>
    <br>
    Year of edition: <input type="month" name="edition_date" id="edition_year">
    <br>
    ISBN: <input type="number" name="isbn" id="isbn">
    <br>
    <label for="synopsis">Synopsis: </label>
    <textarea name="synopsis" id="synopsis" rows="2" cols="20"></textarea>
    <br>
    <input type="submit" value="Send!">

</form>

</body>
</html>

