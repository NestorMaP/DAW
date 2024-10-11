<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book's form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        // Variables from the form
        $title = $author = $publisher = $language = 
        $edition_date = $isbn = $synopsis = $empty_field = 
        $cover = $sample = '';
        $errors = [];

        //REGEXP ACTIVITY 3 & 4
        $title_regexp = '/^.{1,30}$/';
        $author_regexp = '/^([a-zA-Z]\.|[a-zA-Z]+)(\s([a-zA-Z]\.|[a-zA-Z]+))+$/';
        $publisher_regexp = '/^[a-zA-Z0-9\s]{1,20}$/';
        $language_regexp = '/^(Spanish)|(English)|(Valencian)+$/';
        $isbn_regexp = '/^[0-9]{13}$/';
        $synopsis_regexp = '/^(\b[a-zA-Z0-9]+\b[\s]*){1,50}$/';

        $cover_regexp = '/^[a-zA-Z0-9]+\.((jpg)|(png))$/';
        $sample_regexp = '/^[a-zA-Z0-9]+\.(pdf)$/';

        // Check if the form has been sent
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Validate empty fields
            if (empty($_POST['title']) || empty($_POST['author']) || empty($_POST['publisher']) ||
                empty($_POST['language']) || empty($_POST['edition_date']) || empty($_POST['isbn']) || 
                empty($_POST['synopsis'])) {
                $errors['empty_field'] = '<-- ALL FIELDS MUST BE COMPLETED -->.';
            }

            // Validate Title
            $title = clean_input($_POST['title']);
            /* 
            ACTIVITY 2
            $title = clean_input($_POST['title']);
            if(strlen($title) > 30) {
                $errors['title'] = '<-- Max 30 characters';
            }
            */
            if (!preg_match($title_regexp,$title)) {
                $errors['title'] = '<-- Max. 30 characters';
            }
            
            // Validate Author
            $author = clean_input($_POST['author']);
            /*
            ACTIVITY 2
            
            $author_array = explode(' ', $author);
            if (str_word_count($author) < 2) {
                $errors['author'] = '<-- Name and Surename[s]';
            } else {
                foreach ($author_array as $substring) {
                    if (strlen($substring) > 2 && !ctype_alpha($substring)) {
                        $errors['author'] = '<-- No special characters allowed';
                        break;
                    }
                }
            }
            */
            if (!preg_match($author_regexp,$author)) {
                $errors['author'] = '<-- Name & surename with no special characters';
            }

            // Validate publisher
            $publisher = clean_input($_POST['publisher']);
            /*
            ACTIVITY 2
                if(strlen($publisher) > 20) {
                $errors['publisher'] = '<-- Max 20 characters';
            } else if (!ctype_alpha($publisher)) {
                $errors ['publisher'] = '<-- No special characters allowed';
            }
            */
            if (!preg_match($publisher_regexp,$publisher)) {
                $errors['publisher'] = '<-- Max 20 non-special characters';
            }

            // Edit year of edition
            $edition_date = clean_input($_POST['edition_date']);
            $edition_date_array = explode ('-', $edition_date);
            $edition_date = $edition_date_array[0];

            // Edit language          
            $language = clean_input($_POST['language']);
            if (!preg_match($language_regexp,$language)) {
                $errors['language'] = '<-- Please select a valid option';
            }
            // Validate ISBN
            $isbn = clean_input($_POST['isbn']);
            /*
            ACTIVITY 2
            if (!ctype_digit($isbn)) {
                // Although the form should validate the followning...
                $errors['isbn'] = '<-- Only numerical characters';
            } else if (strlen($isbn) < 13 || strlen($isbn) > 13) {
                $errors['isbn'] = '<-- ISBN must contain exactly 13 characters';
            }
            */
            if (!preg_match($isbn_regexp,$isbn)) {
                $errors['isbn'] = '<-- Please select a valid option';
            }
            // Validate Synopsis
            $synopsis = clean_input($_POST['synopsis']);
            /*
            ACTIVITY 2
            if (str_word_count($synopsis) > 50) {
                $errors['synopsis'] = '<-- The synopsis should not be longer than 50 words';
            }
            */
            
            if (!preg_match($synopsis_regexp,$synopsis)) {
                $errors['synopsis'] = '<-- Please select a valid option';
            }
            
            // Validate Cover
            if ($_FILES['cover']['error'] != UPLOAD_ERR_OK) {
                echo 'Error: ';
                switch ($_FILES['cover']['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE: 
                        echo 'File is too big';
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo 'File could not be uploaded completely';
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo 'The file could not be uploaded';
                        break;
                    default:
                        echo 'Undetermined error';
                }
                exit();
            }
            if (($_FILES['cover']['type'] != 'image/jpg') && 
                ($_FILES['cover']['type'] != 'image/png') &&
                ($_FILES['cover']['type'] != 'image/jpeg')) {
                echo 'Pictures shoud be .jpg or .png<br>';
                echo 'Type: '.$_FILES['cover']['type'];
                exit();
            }
            if (is_uploaded_file($_FILES['cover']['tmp_name']) === true) {
                $new_path = '.\\img\\'.$_FILES['cover']['name'];
                if (is_file($new_path) === true) {
                    echo 'There is already a file with that name';
                    exit();
                }
                if(!move_uploaded_file($_FILES['cover']['tmp_name'], $new_path)) {
                    $errors['cover'] = 'They file could not be moved to its destination';
                }
            }else {
                $errors['cover'] = 'Error: Possible attack. Name: '. $_FILES['cover']['name'];
            }

            // Validate Sample
            if ($_FILES['sample']['error'] != UPLOAD_ERR_OK) {
                echo 'Error: ';
                switch ($_FILES['sample']['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE: 
                        echo 'PDF file is too big';
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo 'PDF file could not be uploaded completely';
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo 'PDF fhe file could not be uploaded';
                        break;
                    default:
                        echo 'Undetermined error';
                }
                exit();
            }elseif ($_FILES['sample']['size'] > 2000000) {
                $errors['sample'] = 'The file should not be bigger than 2MB';
            }
            if ($_FILES['sample']['type'] != 'application/pdf') {
                echo 'Document must be .pdf<br>';
                echo 'Type: '.$_FILES['cover']['type'];
                exit();
            }
            if (is_uploaded_file($_FILES['sample']['tmp_name']) === true) {
                $new_path = '.\\img\\'.$_FILES['sample']['name'];
                if (is_file($new_path) === true) {
                    echo 'There is already a file with that name';
                    exit();
                }
                if(!move_uploaded_file($_FILES['sample']['tmp_name'], $new_path)) {
                    $errors['sample'] = 'They file could not be moved to its destination';
                }
            }else {
                $errors['sample'] = 'Error: Possible attack. Name: '. $_FILES['sample']['name'];
            }
            
            // If everything is correct, the form is processed
            if (empty($errors)) {
                echo '<h3>The form was properly processed!</h3>';
                include 'bibliotecaNestorM.php';
                exit(); // If everything is correct we stop the execution
            }
        }
        // Function to clean the input
        function clean_input ($input) {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }

    ?>

    <!-- 
    ACTIVITY 1
    <form action="bibliotecaNestorM.php" method="get">
    -->
    <h1>Book Form</h1>
    <form action="#" method="post" enctype="multipart/form-data">
    
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000"> <!-- 2MB -->
        
        <label for="title">Title: </label>
        <input type="text" name="title" id="title" value="<?php echo $title; ?>">
        <span class="error"><?php echo isset($errors['title']) ? $errors['title'] : '' ?></span>
        <br>

        <label for="author">Author: </label>
        Author: <input type="text" name="author" id="author" value="<?php echo $author; ?>">
        <span class="error"><?php echo isset($errors['author']) ? $errors['author'] : '' ?></span>
        <br>

        <label for="publisher">Publisher: </label>
        <input type="text" name="publisher" id="publisher" value="<?php echo $publisher; ?>">
        <span class="error"><?php echo isset($errors['publisher']) ? $errors['publisher'] : '' ?></span>
        <br>

        <label for="languages">Language: </label>
        <select name="language" id="language">
            <option value="English">English</option>
            <option value="Spanish">Spanish</option>
            <option value="Valencian">Valencian</option>
        </select>
        <br>

        <label for="edition_year">Year of edition: </label>
        <input type="month" name="edition_date" id="edition_year" value="<?php echo $edition_date; ?>">
        <span class="error"><?php echo isset($errors['edition_date']) ? $errors['edition_date'] : '' ?></span>
        <br>

        <label for="isbn">ISBN: </label>
        <input type="number" name="isbn" id="isbn" value="<?php echo $isbn; ?>">
        <span class="error"><?php echo isset($errors['isbn']) ? $errors['isbn'] : '' ?></span>
        <br>

        <label for="synopsis">Synopsis: </label>
        <textarea name="synopsis" id="synopsis" rows="2" cols="20"><?php echo $synopsis ?></textarea>
        <span class="error"><?php echo isset($errors['synopsis']) ? $errors['synopsis'] : '' ?></span>
        <br>
        
        <!--External files-->
        <label for="cover">Cover: </label>
        <input type="file" name="cover" id="cover">
        <span class="error"><?php echo isset($errors['cover']) ? $errors['cover'] : '' ?></span>
        <br>

        <label for="samle">Sample: </label>
        <input type="file" name="sample" id="sample">
        <span class="error"><?php echo isset($errors['sample']) ? $errors['sample'] : '' ?></span>
        <br>

        <!--Errors-->
        <span class="error"><?php echo isset($errors['empty_field']) ? $errors['empty_field'] : '' ?></span>
        <br>
        <input type="submit" value="Send!">

    </form>
</body>
</html>