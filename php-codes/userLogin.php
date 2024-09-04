<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userLogin.css">
    <title>AngoMart/Login</title>
</head>
<body>
    <?php
    if(isset($_GET['error']) && $_GET['error'] == '1'):
    ?>
    <script>window.alert("Email ou senha errada!");</script>
    <?php endif; ?>

    <div class="form-container">
        <form action="../php-codes/login.php" method="post">
            <h1>Login</h1>
            <div class="email-content">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="" placeholder="Digite o seu email" required>
            </div>
            <div class="senha-content">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="" placeholder="Digite a sua senha" required>
            </div>
            <a href="">Esqueceu a senha?</a>
            <div class="button-content">
                <input type="submit" value="Acessar">
            </div>
        </form>
        <div class="signup-content">
            <span class=titule-signup"">Olá, amigo!</span>
            <p>Introduza os seus dados pessoais e comece a viajar connosco</p>
            <a href="userSignup.php">SignUp</a>
        </div>
    </div>
</body>
</html>