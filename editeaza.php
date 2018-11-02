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
                if(isset($_GET["id"])){
                    $id=$_GET["id"];
                    require 'connection.php';
                    $sqlDescription="SELECT body, album FROM articles where id=$id";
                    $stmtDesc = $conn->prepare($sqlDescription); 
                    $stmtDesc->execute();
                    $resultDesc = $stmtDesc->fetch();
                    $desc=$resultDesc['body'];
                    $album = $resultDesc['album'];
                    echo "<a href='poze.php'>Poze</a> | 
                        <a href='sterge.php'>Șterge articole</a> | 
                       <a href='admin.php'>Admin</a>
                       <form action='editeazaBackend.php' method='POST'>
                       <label>Descriere:</label><br>
                       <textarea name='body' id='editor'>$desc</textarea>
                       <input type='hidden' name=id value=$id><br>
                       <label>Locatiile se despart cu ,,</label>
                       <input type=text/css name=album value='$album' size=70em>
                       <input type='submit' value='Editează'>
                       </form>";
                }
        }
    }else{
        
            echo '<form action="adminBackend.php" method ="POST">
                    <label>Parola:</label>
                    <input type="text" name="password">
                    <input type="submit" name="Autentificare">    
                </form>';
        }
        ?>
        <script>
        initSample();
    </script>
    </body>
</html>


