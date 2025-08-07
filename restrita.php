<?php
session_start();

if(!isset($_SESSION['idUsuario'])){
    header("location:index.php");
}

require_once __DIR__."/vendor/autoload.php";

$livros = Livro::findAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
</head>
<body>
    <?php

    foreach($livros as $livro) {
        echo "<p>'{$livro["Titulo"]}'</p>";
    }

    ?>
</body>
</html>