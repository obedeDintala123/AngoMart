<?php
include("conexao.php");

$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$senha = htmlspecialchars(password_hash($_POST['senha'], PASSWORD_BCRYPT));

$stmt = $conn -> prepare("SELECT COUNT(*) FROM usuario WHERE email = :email");
$stmt -> bindParam(":email", $email);
$stmt->execute();
$emailCount = $stmt->fetchColumn();

if($emailCount > 0){
    session_start();
    $_SESSION['mesg'] = "Este email já existe";
    header("location:userSignup.php");
    exit();
}

else{
$stmt = $conn -> prepare("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)");
$stmt -> bindParam(":nome", $username);
$stmt -> bindParam(":email", $email);
$stmt -> bindParam(":senha", $senha);

if($stmt->execute()){
    echo "<script>alert('Usuario cadastrado com sucesso');</script>";
    header("location:../index.html");
    exit();
}

else{
    echo "Usuario não cadastrado";
}

}

?>