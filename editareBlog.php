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
            echo '<a href="admin.php">Admin</a>
                  <a href="poze.php">Poze</a><br>
                <a href="stergeBlog.php">Șterge articole din blog</a><br>';
            require 'connection.php';
            $sql="SELECT ID, titlul FROM blog";
            $stmt = $conn->prepare($sql); 
            $stmt->execute();
            $result = $stmt->fetch();
            $count = 1;
            while ($result !=null){
                $id = $result['ID'];
                $resultSub= substr($result['titlul'], 0, 500);
                echo  "<article class=edit style='float:left;background-color:white;margin:10px'><a class='retete' href=editeazaBlog.php?id=$id>$count $resultSub</a></article>";
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


