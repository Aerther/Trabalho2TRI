<?php
session_start();

if(!isset($_SESSION['idUsuario'])){
    header("location:index.php");
}

require_once __DIR__."/vendor/autoload.php";

$livros = Livro::findAll();
$livros_favoritos = Livro::getLivrosFavoritos();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./src/styles/reset.css">
    <link rel="stylesheet" href="./src/styles/user.css">

    <title>Livros</title>
</head>
<body>
    <div id="container">
        <nav>
            <h1>Zmaaon</h1>

            <div>
                <a href="restrita.php?page=favoritos"> favoritos</a>
                <a href="restrita.php?page=listagem"> lista de livros</a>
            </div>
        </nav>

        <main>
            <div></div>

            <div>
                <?php

                if($_GET["page"] == "listagem") {
                    foreach($livros as $livro) {
                        echo "<div class='mostrarlivro'>{$livro->getTitulo()} <a href='process.php?idlivro={$livro->getIdLivro()}'> <img src='./src/images/estrela.png' alt='Adicionar aos Favoritos'> </a> </div>";
                    }
                } else if($_GET["page"] == "favoritos") {
                    foreach($livros_favoritos as $livro) {
                        echo "<div class='mostrarlivro'>{$livro->getTitulo()} <a href='remove.php?idlivro={$livro->getIdLivro()}'> <img src='./src/images/lixeiravermelha.png' alt='Remover dos Favoritos'></a> </div>";
                    }
                } else {
                    echo "<p>Nenhuma página foi selecionada</p>";
                }

                ?>
            </div>

            <div></div>
        </main>
    </div>
</body>
</html>