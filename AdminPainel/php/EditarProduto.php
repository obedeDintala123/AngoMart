<?php
include("conexao.php");

// Verifica se o código do produto foi passado na URL
if (isset($_GET['produt_cod'])) {
    $produt_cod = $_GET['produt_cod'];

    // Consulta os detalhes do produto
    $stmt = $conn->prepare("SELECT * FROM produto WHERE produt_cod = :cod");
    $stmt->bindParam(':cod', $produt_cod);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produto) {
        die("Produto não encontrado.");
    }
} else {
    die("Código do produto não especificado.");
}
?>

<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add.css">
    <title>Administrator Panel/Editar Produto</title>
</head>

<body>
   <?php
   // Verifica se o parâmetro de status está presente na URL
   if (isset($_GET['status'])) {
       if ($_GET['status'] === 'sucesso') {
           echo "<script>showAlert('Produto editado com Sucesso');</script>";
       } elseif ($_GET['status'] === 'erro') {
           echo "<script>showAlert('Erro ao editar produto');</script>";
       }
   }
   ?>
    <form action="editar.php" method="post">
        <h2>Adicionar Produto</h2>
        <input type="hidden" name="produt_cod" value="<?php echo htmlspecialchars($produto['produt_cod']); ?>">
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
                <option value="Disponivel" <?php if ($produto['estado'] == 'Disponivel') echo 'selected'; ?>>Disponível</option>
                <option value="Esgotado" <?php if ($produto['estado'] == 'Esgotado') echo 'selected'; ?>>Esgotado</option>
            </select>
        </div>

        <button type="submit">Atualizar</button>
    </form>
    <script>
        function showAlert(message) {
            window.alert(message);
        }
    </script>
    
</body>

</html>