
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
        <main id='photos'>
        <a href="index.php">Pagina de start</a><br>
        <?php
            if(isset($_COOKIE["user"])){
                if($_COOKIE["user"]=="alex"){
                    echo '<a href="admin.php">Admin</a><br>
                          <a href="editare.php">Editare articole</a><br>
                          <a href="pozeAdd.php">Adaugă poze</a><br>
                          <a href="pozeSterge.php">Șterge poze</a><br>
                          <button id="zoom" style=";position:absolute;top:50px;left:200px">Zoom out</button>';
                    $dir = "uploads/";
                    $count=0;
                    if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                            if($count>=2){
                            echo "<div class='figure'><img src='uploads/$file' alt=img class=pozeAlbum><br>";
                            echo '<span class=urlPoze>uploads/'.$file . "</span></div>";}
                            $count++;
                        }
                    closedir($dh);
                    }
                }
            }else{
                echo '<form action="adminBackend.php" method ="POST">
                <label>Parola:</label>
                <input type="text" name="password">
                <input type="submit" name="Autentificare">    
                </form>';
            }
        ?>
        </main>
    </body>
</html>


