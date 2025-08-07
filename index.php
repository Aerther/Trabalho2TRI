<?php

if(isset($_POST['envio'])) {
    require_once __DIR__."/vendor/autoload.php";

    $user = new Usuario($_POST['email'], $_POST['senha'], "Jose");

    if($user->authenticate()){
        header("location: restrita.php");
    } else {
        header("location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
</head>
<body>
    <div id="container">
        <form action="index.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" required>

            <input type="submit" value="Entrar" name="envio">

            <a href="formCadUsuario.php">Cadastrar Usuário</a>
        </form>
    </div>
</body>
</html>