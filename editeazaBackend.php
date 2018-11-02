<?php
    if(isset($_COOKIE["user"])){
        if($_COOKIE["user"]=="alex"){
            $body = $_POST["body"];
            $id = $_POST["id"];
            $album = $_POST['album'];
            require 'connection.php';
            $sql = "UPDATE articles SET body=:body, album=:album WHERE id='$id'";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':body', $body);
            $stmt->bindParam(':album', $album);
            $stmt->execute();
            $conn = null;
            header( "Location:editare.php" );
            exit;
        }
    }else{
        echo 'Utilizatorul nu este autentificat';
        echo '<form action="adminBackend.php" method ="POST">
                    <label>Parola:</label>
                    <input type="text" name="password">
                    <input type="submit" name="Autentificare">    
                </form>';
    }

