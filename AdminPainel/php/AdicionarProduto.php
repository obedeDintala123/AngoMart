<?php

include("conexao.php");
$status = "";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        try {
        $nome_produto = htmlspecialchars($_POST['nomeDoProduto']);
        $preco_produto = htmlspecialchars($_POST['precoProduto']);
        $quantidade = htmlspecialchars($_POST['quantidade']);
        $estado = htmlspecialchars($_POST['estado']);

        $stmt = $conn->prepare("INSERT INTO produto (nome_produt, preco_produt, quantidade_produt, estado) VALUES (:nome, :preco, :quantidade, :estado)");
        $stmt->bindParam(":nome", $nome_produto);
        $stmt->bindParam(":preco", $preco_produto);
        $stmt->bindParam(":quantidade", $quantidade);
        $stmt->bindParam(":estado", $estado);

        if ($stmt->execute()) {
           $status = "sucesso";
        } else {
            $status = "erro";
        }
    }
    catch (Exception $e) {
        $status = "erro";
    }
    header("location:admin.php?status=".$status);
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add.css">
    <title>Administrator Panel/Adicionar Produto</title>
</head>

<body>
   <?php
   // Verifica se o parâmetro de status está presente na URL
   if (isset($_GET['status'])) {
       if ($_GET['status'] === 'sucesso') {
           echo "<script>showAlert('Produto Adicionado com Sucesso');</script>";
       } elseif ($_GET['status'] === 'erro') {
           echo "<script>showAlert('Erro ao adicionar produto');</script>";
       }
   }
   ?>
    <form method="post">
        <h2>Adicionar Produto</h2>
        <div class="nomeProduto-content">
            <label for="nomeDoProduto">Nome do Produto</label>
            <input type="text" placeholder="Digite o nome do produto" name="nomeDoProduto" required>
        </div>
        <div class="precoProduto-content">
            <label for="precoProduto">Preço do Produto</label>
            <input type="text" placeholder="Digite o preço do produto" name="precoProduto" required>
        </div>
        <div class="quantidadeProduto-content">
            <label for="quantidadeProduto">Quantidade</label>
            <input type="number" placeholder="Selecione a quantidade" name="quantidade" required>
        </div>
        <div class="estadoProduto-content">
            <select name="estado" required>
                <option value="" selected disabled>Selecione uma das opções</option>
                <option value="Disponivel">Disponivel</option>
                <option value="Esgotado">Esgotado</option>
            </select>
        </div>

        <button type="submit">Adicionar</button>
    </form>
    <script>
        function showAlert(message) {
            window.alert(message);
        }
    </script>
</body>

</html>