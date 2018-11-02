<?php
    if(isset($_COOKIE["user"])){
        if($_COOKIE["user"]=="alex"){
            $body = $_POST['body'];
            $category = $_POST['category'];
            $titlul = $_POST['titlul'];
            $imageURL = $_POST['imageURL'];
            $titlulArt = $_POST['titlulArt'];
            if(isset($_POST['count'])){
                $count = $_POST['count'];
                for($i=1;$i<=$count;$i++){
                    $c[] = $_POST["$i"];
                }
                $imploded = implode(",,",$c);
            }
            require 'connection.php';
            if($category==="BLOG"){
                    if(isset($_POST['count'])){
                        $sql = "INSERT INTO blog (body,titlul,URL,album)
                        VALUES (:body, :titlul, :URL, :album)";
                    }else{
                        $sql = "INSERT INTO blog (body,titlul,URL)
                        VALUES (:body, :titlul, :URL)";
                    }
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':body', $body);
                    $stmt->bindParam(':titlul', $titlul);
                    $stmt->bindParam(':URL', $imageURL);
                    if(isset($_POST['count'])){
                        $stmt->bindParam(':album', $imploded);
                    }
            }else {
                    if(isset($_POST['count'])){
                        $sql = "INSERT INTO articles (body,category, album, titlulArt)
                            VALUES (:body, :category, :album, :titlulArt)";
                    }else{
                        $sql = "INSERT INTO articles (body,category, titlulArt)
                            VALUES (:body, :category, :titlulArt)";
                    }
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':body', $body);
                    $stmt->bindParam(':category', $category);
                    $stmt->bindParam(':titlulArt', $titlulArt);
                    if(isset($_POST['count'])){
                        $stmt->bindParam(':album', $imploded);
                    }
            }
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

