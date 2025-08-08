<?php

if(isset($_POST['envio'])) {
    require_once __DIR__."/vendor/autoload.php";

    $user = new Usuario($_POST['email'], $_POST['senha'], "Jose");

    if($user->authenticate()) {
        header("location: restrita.php");
    } else {
        header("location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./src/styles/reset.css">
    <link rel="stylesheet" href="./src/styles/index.css">
    <script src="./src/js/script.js" defer></script>

    <title>Login</title>
</head>
<body>
    <div id="container">
        <form action="index.php" method="post">
            <section>
                <h2>Login</h2>
            </section>

            <section>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required class="input-text">
            </section>

            <section>
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" required class="input-text">
            </section>

            <section class="links">
                <section>
                    <a href="formCadUsuario.php">Não Possui Cadastro?</a>
                    <label for="alternar"><input type="checkbox" id="alternar" name="alternar"> Mostrar Senha</label>
                </section>

                <input type="submit" value="Entrar" name="envio">
            </section>
        </form>
    </div>
</body>
</html>