<?php
include("conexao.php");

$email = htmlspecialchars(trim($_POST['email']));
$senha = htmlspecialchars(trim($_POST['senha']));

try {
    $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        header("location:../index.html");
        exit();
    } else {
        header("location:../php-codes/userLogin.php?error=1"); 
        exit();
    }
 
} catch (PDOException $e) {
    echo "Erro ao autenticar usuário: " . $e->getMessage();
}
?>
