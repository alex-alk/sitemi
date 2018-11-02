<?php
    if(isset($_COOKIE["user"])){
        if($_COOKIE["user"]=="alex"){
            if(isset($_GET["id"])){
                $id=$_GET["id"];
                $sqlDel="Delete FROM categorii where id=$id";
                require 'connection.php';
                $stmt = $conn->prepare($sqlDel);
                $stmt->execute();
                $stmt->closeCursor();
                $conn = null;
                header( "Location:stergeCateg.php" );
                exit;
            }
        }
    }else{
        echo 'Utilizatorul nu este autentificat';
        echo '<form action="adminBackend.php" method ="POST">
                    <label>Parola:</label>
                    <input type="text" name="password">
                    <input type="submit" name="Autentificare">    
                </form>';
    }
?>