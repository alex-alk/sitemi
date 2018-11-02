<?php
    if(isset($_COOKIE["user"])){
        if($_COOKIE["user"]=="alex"){
            $categorie = $_POST['categorie'];
            $subcategorie = $_POST['subcategorie'];
            if(!empty($subcategorie)){
                require 'connection.php';
                $subcategoriedb = str_replace(' ', '_', $subcategorie);
                $sql = "INSERT INTO categorii (categorie, subcategorie)
                    VALUES (:categorie, :subcategorie)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':categorie', $categorie);
                $stmt->bindParam(':subcategorie', $subcategoriedb);
                $stmt->execute();
                $conn = null;
                header( "Location:index.php" );
            }else{
                header( "Location:index.php" );
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

