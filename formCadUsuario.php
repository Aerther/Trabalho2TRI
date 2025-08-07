<?php

if(isset($_POST['envio'])) {
    require_once __DIR__."/vendor/autoload.php";

    $user = new Usuario($_POST['email'], $_POST['senha'], $_POST['nome']);

    $user->save();

    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiciona Usuario</title>
</head>
<body>
    <form action='formCadUsuario.php' method='post'>
        <label for='nome'>Nome</label>
        <input type='text' name='nome' id='nome' required>

        <label for='email'>Email</label>
        <input type='email' name='email' id='email' required>

        <label for='senha'>Senha</label>
        <input type='password' name='senha' id=senha' required>

        <input type='submit' name='envio' value='Cadastrar'>
    </form>
</body>
</html>