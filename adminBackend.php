<?php
    if(isset($_POST["password"])){
            $password = $_POST["password"];
            if($password == "a"){
                $cookie_name = "user";
                $cookie_value = "alex";
                setcookie($cookie_name, $cookie_value, time() + 36000, "/");
                setcookie("start", time(), time ()+36000);
                header("Location: admin.php");
                die();
            }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/summernote.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/summernote.min.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
        <a href="index.php">Pagina de start</a><br>
        <form action="adminBackend.php" method ="POST">
            <label>Parola:</label>
            <input type="text" name="password">
            <input type="submit" name="Autentificare">    
        </form>
    </body>
</html>