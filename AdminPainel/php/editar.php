<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Obtém os dados do formulário
        $produt_cod = htmlspecialchars($_POST['produt_cod']);
        $nome_produto = htmlspecialchars($_POST['nomeDoProduto']);
        $preco_produto = htmlspecialchars($_POST['precoProduto']);
        $quantidade = htmlspecialchars($_POST['quantidade']);
        $estado = $_POST['estado'];

        // Atualiza os detalhes do produto, mantendo o código inalterado
        $stmt = $conn->prepare("UPDATE produto SET nome_produt = :nome, preco_produt = :preco, quantidade_produt = :quantidade, estado = :estado WHERE produt_cod = :cod");
        $stmt->bindParam(":nome", $nome_produto);
        $stmt->bindParam(":preco", $preco_produto);
        $stmt->bindParam(":quantidade", $quantidade);
        $stmt->bindParam(":estado", $estado);
        $stmt->bindParam(":cod", $produt_cod);

        if ($stmt->execute()) {
            $status = "sucesso";
        } else {
            $status = "erro";
        }
    } catch (Exception $e) {
        $status = "erro";
    }

    // Redireciona para a página de administração com o status da operação
    header("location:admin.php?status=" . $status);
    exit();
}
