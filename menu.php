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
                <a href="editare.php">Editare articole</a>';
                require 'connection.php';
                    $sql="SELECT categorie,culoareText,culoareFundal FROM menu";
                    $stmt = $conn->prepare($sql); 
                    $stmt->execute();
                    $result = $stmt->fetch();
                    echo '<form action=menuBackend.php method=POST>';
                    
                        $categorie=$result['categorie'];
                        $culoareText=$result['culoareText'];
                        $culoareFundal=$result['culoareFundal'];
                        echo '<label>Categorie: </label>';
                        echo "<select name=categorie>";
                                $sql='SELECT categorie FROM menu';
                                $stmt = $conn->prepare($sql); 
                                $stmt->execute();
                                $result = $stmt->fetch();
                                while ($result !=null){
                                    $categorie = $result['categorie'];
                                    echo "<option value=$categorie>$categorie";
                                    $result = $stmt->fetch();
                                }
                                $stmt->closeCursor();
                                $conn = null;
                        echo "</select>
                              <label>Culoare text: </label>
                              <input type=text name=culoareText>
                              <label>Culoare fundal: </label>
                              <input type=text name=culoareFundal>";
                    
                    $conn=null;
                    echo '<input type=submit value=Modifică>
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


