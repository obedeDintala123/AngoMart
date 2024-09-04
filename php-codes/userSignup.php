<?php
session_start();
if(isset($_SESSION['mesg'])){
    echo "<script>window.alert('" . $_SESSION['mesg'] . "');</script>";
    unset($_SESSION['mesg']);
}
?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userSignUp.css">
    <title>AngoMart/SignUp</title>
</head>
<body>
    <div class="form-container">
        <div class="signin-content">
            <span class=titule-signup"">Bem-vindo de volta</span>
            <p>Acesse a sua conta agora mesmo!</p>
            <a href="userLogin.php">Login</a>
        </div>
        <form action="cadastrar.php" method="post">
            <h1>SignUp</h1>
            <div class="username-content">
                <label for="username">Nome</label>
                <input type="text" name="username" id="" placeholder="Digite o seu nome de utilizador" required>
            </div>
            <div class="email-content">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="" placeholder="Digite o seu email" required>
            </div>
            <div class="senha-content">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="" placeholder="Digite a sua senha" required>
            </div>
            <div class="button-content">
                <input type="submit" value="Cadastrar">
            </div>
        </form>
    </div>
</body>
</html>