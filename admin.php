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
        <script src="js/main.js"></script>
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
                <a href="editare.php">Editare articole</a> | 
                <a href="editareBlog.php">Editare blog</a>
                <a href="adaugaCateg.php"> | Adaugă categorii</a>
                <a href="stergeCateg.php"> | Șterge categorii</a>
                <a href="mesaje.php"> | Mesaje</a>
                <a href="menu.php"> | Menu</a>
                <a href="slides.php"> | Poze slideshow</a>
                <form action="adaugaBackend.php" method="POST">
                    <label>Titlul(apare doar in pagina de editare sau stergere)</label>
                    <input type=text/css name=titlulArt required><br>
                    <label>Descriere:</label><br>
                    <textarea name="body" id="editor"></textarea><br>
                    <p>Categorie: </p>
                    <select name="category" id=selectCategory>
                        <option value="HOME">HOME</option>
                        <option value="DESPRE_MINE">DESPRE MINE</option>
                        <option value="BLOG">BLOG</option>
                        <option value="PRIMUL_TRASEU_CICLOTURISTIC">PRIMUL TRASEU CICLOTURISTIC</option>
                        <option value="TURUL_ROMANIEI">TURUL ROMANIEI</option>
                        <option value="DESPRE_EUROVELO_TOUR">DESPRE EUROVELO TOUR</option>
                        <option value="ECHIPAMENT">ECHIPAMENT</option>
                        <option value="MASS-MEDIA">MASS-MEDIA</option>
                        <option value="SPONSORI">SPONSORI</option>
                        <option value="CONTACT">CONTACT</option>
                        <option value="DONEAZA">DONEAZA</option>';
                                require 'connection.php';
                                $sql="SELECT subcategorie FROM categorii where categorie='CICLOTURISM'";
                                $stmt = $conn->prepare($sql); 
                                $stmt->execute();
                                $result = $stmt->fetch();
                                while ($result !=null){
                                    $subcateg = $result['subcategorie'];
                                    $subcategdb = str_replace(' ', '_', $subcateg);
                                    echo "<option value=$subcategdb>$subcateg";
                                    $result = $stmt->fetch();
                                }
                                $stmt->closeCursor();
                                $conn = null; 
                    echo '</select>
                    <label class=hidden>Titlul: </label>
                    <input type=text name=titlul class=hidden>
                    <label class=hidden>URL imagine blog: </label>
                    <input type=text name=imageURL class=hidden>
                    <label id=adaugă> Adaugă imagini pentru album(URL): </label><h2 id=add>+</h2><br>
                    <input type="submit" value="Adaugă" id=s>
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
    <script>
        initSample();
    </script>
</html>


