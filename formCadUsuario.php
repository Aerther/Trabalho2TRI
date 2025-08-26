<?php

if(isset($_POST['envio'])) {
    require_once __DIR__."/vendor/autoload.php";

    $mesmoEmail = false;

    $user = new Usuario($_POST['email'], $_POST['senha1'], $_POST['nome']);


    if($user->checkForDoubleEmail()) {
        $mesmoEmail = true;
    } else {
        $user->save();
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
    <link rel="stylesheet" href="./src/styles/edit.css">

    <script defer>

        <?php

        if($mesmoEmail) {echo "alert('Email já está sendo utilizado');";}

        ?>

    </script>

    <title>Cadastrar Usuário</title>
</head>
<body>
    <div id="container">
        <form action='formCadUsuario.php' method='post'>
            <section>
                <h2>Cadastrar Usuário</h2>
            </section>

            <section>
                <label for='nome'>Nome</label>
                <input type='text' name='nome' id='nome' required class="input-text">
            </section>

            <section>
                <label for='email'>Email</label>
                <input type='email' name='email' id='email' required class="input-text">
            </section>

            <section>
                <label for='senha'>Senha</label>
                <input type='password' name='senha1' id='senha1' required class="input-text">
            </section>

            <section class="links">
                <section>
                    <a href="index.php">Voltar a página de login</a>
                </section>

                <input type='submit' name='envio' value='Cadastrar'>
            </section>
        </form>
    </div>
</body>
</html>