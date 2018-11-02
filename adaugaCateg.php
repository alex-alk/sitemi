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
            echo 10+((($_COOKIE["start"]-time()))/3600) . " ore rămase<br>";
            echo '<a href="poze.php">Poze</a> | 
                <a href="sterge.php">Șterge articol</a> | 
                <a href="editare.php">Editare articole</a>
                <form action=adaugaCategBackend.php method=POST>
                    <select name=categorie>
                        <option value=CICLOTURISM>CICLOTURISM</option>
                    </select>
                    <label>Subcategorie: </label>
                    <input type=text name=subcategorie>
                    <input type=submit value=Adaugă>
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
</html>


