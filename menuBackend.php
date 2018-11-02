<?php
    if(isset($_COOKIE["user"])){
        if($_COOKIE["user"]=="alex"){
            $culoareText = $_POST['culoareText'];
            $culoareFundal = $_POST['culoareFundal'];
            $categorie = $_POST['categorie'];
            $css = "<style>#$categorie:hover{color:$culoareText;background-color:$culoareFundal}</style>";
            require 'connection.php';
            $sql = "UPDATE menu set culoareText=:culoareText, culoareFundal=:culoareFundal, css=:css WHERE
                    categorie='$categorie'";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':culoareText', $culoareText);
            $stmt->bindParam(':culoareFundal', $culoareFundal);
            $stmt->bindParam(':css', $css);
            $stmt->execute();
            $conn = null;
            header( "Location:index.php" );
       }else{
        echo 'Utilizatorul nu este autentificat';
        echo '<form action="adminBackend.php" method ="POST">
                    <label>Parola:</label>
                    <input type="text" name="password">
                    <input type="submit" name="Autentificare">    
                </form>';
        }
    }

