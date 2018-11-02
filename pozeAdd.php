<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" lang="ro">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Mircea Iulian</title>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="ckeditor/ckeditor.js"></script>
        <script src="ckeditor/samples/js/sample.js"></script>
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="shortcut icon" href="fav.ico">
    </head>
    <body>
        <a href="index.php">Pagina de start</a><br>
<?php
    if(isset($_COOKIE["user"])){
        if($_COOKIE["user"]=="alex"){
            echo '<a href="poze.php">Poze</a> | 
                <a href="sterge.php">Șterge articol</a> | 
                <a href="editare.php">Editare articole</a><br>
                <a href="admin.php">Admin</a><br>
                <form action="pozeAddBackend.php" method="POST" enctype="multipart/form-data">
                <label>Descriere:</label><br>
                <input type="file" name="poze"><br>
                <input type="submit" value="Adaugă" name="submit">
                </form>';
        }
    }else {
          echo '<form action="adminBackend.php" method ="POST">
                <label>Parola:</label>
                <input type="text" name="password">
                <input type="submit" name="Autentificare">    
                </form>';
            
    }
        ?>
    </body>
    <script>
        initSample();
    </script>
</html>


