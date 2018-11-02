<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reteta</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <a href="index.php">Pagina de start</a><br>
        <?php
        $id = $_GET["id"];
        require 'connection.php';
        $sql="SELECT Title,Description FROM recipes WHERE ID=$id";
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $result = $stmt->fetch();
        while ($result !=null){
            echo '<b>'.$result['Title'].'</b>'."<br>";
            echo $result['Description']."<br>";
            $result = $stmt->fetch();
        }
        $stmt->closeCursor();
        $conn = null;
        ?>
    </body>
</html>

