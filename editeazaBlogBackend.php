<?php
    if(isset($_COOKIE["user"])){
        if($_COOKIE["user"]=="alex"){
            $body = $_POST["body"];
            $id = $_POST["id"];
            $titlul = $_POST['titlul'];
            require 'connection.php';
            $sql = "UPDATE blog SET body=:body, titlul=:titlul WHERE id='$id'";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':body', $body);
            $stmt->bindParam(':titlul', $titlul);
            $stmt->execute();
            $conn = null;
            header( "Location:editareBlog.php" );
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

