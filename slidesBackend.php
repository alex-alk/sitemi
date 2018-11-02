<?php
    if(isset($_COOKIE["user"])){
        if($_COOKIE["user"]=="alex"){
            $property = 'urls';
            $imploded = $_POST['urls'];
            require 'connection.php';
                    $sql = "UPDATE misc SET value=:value WHERE property='$property'";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':value', $imploded);
                    $stmt->execute();
                    $conn = null;
                    header( "Location:index.php" );
        }
    }else{
        echo 'Utilizatorul nu este autentificat';
        echo '<form action="adminBackend.php" method ="POST">
                    <label>Parola:</label>
                    <input type="text" name="password">
                    <input type="submit" name="Autentificare">    
                </form>';
    }

