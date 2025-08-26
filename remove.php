<?php

session_start();

if(!isset($_SESSION['idUsuario'])){
    header("location: index.php");
}

require_once __DIR__."/vendor/autoload.php";

$livro = Livro::find($_GET["idlivro"]);

$livro->removeLivro();

header("location: restrita.php?page=favoritos");

?>