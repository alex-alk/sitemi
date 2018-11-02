<?php
            $body = $_POST['nume'];
            $category = $_POST['email'];
            $titlul = $_POST['subiect'];
            $imageURL = $_POST['mesaj'];
            require 'connection.php';
                        $sql = "INSERT INTO mesaje (nume,email,subiect,mesaj)
                        VALUES (:nume, :email, :subiect, :mesaj)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':nume', $body);
                    $stmt->bindParam(':email', $titlul);
                    $stmt->bindParam(':subiect', $imageURL);
                    $stmt->bindParam(':mesaj', $imageURL);
            $stmt->execute();
            $conn = null;
            header( "Location:index.php?categorie=CONTACT&mesaj=trimis" );
        

