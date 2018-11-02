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
            echo '<a href="admin.php">Admin</a>';
            require 'connection.php';
            $sql="SELECT id, nume, subiect FROM mesaje";
            $stmt = $conn->prepare($sql); 
            $stmt->execute();
            $result = $stmt->fetch();
            $count = 1;
            while ($result !=null){
                $id = $result['id'];
                $nume = $result['nume'];
                $subiect=$result['subiect'];
                echo  htmlentities("<div class=mesaje><a  style='color:black' href=mesaj.php?id=$id>$count. $nume | $subiect</a>"
                        . "<a class=stergeMesaj href='mesajeSterge.php?id=$id'>Șterge</a></div>");
                $result = $stmt->fetch();
                $count ++;
            }
            $stmt->closeCursor();
            $conn = null;
        }
    }else{
            echo '<form action="admin.php" method ="POST">
                    <label>Parola:</label>
                    <input type="text" name="password">
                    <input type="submit" name="Autentificare">    
                </form>';
        }
?>
    </body>
</html>


