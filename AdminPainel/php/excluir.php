<?php
include("conexao.php");

header('Content-Type: application/json');

// Decodifica o corpo da requisição JSON
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['accao']) && $data['accao'] === "btnDeleteClicado") {
    $produto_code = $data['produto_code'];

    // Verifica se o código do produto foi fornecido e é numérico
    if (is_numeric($produto_code)) {
        try {
            $conn->beginTransaction();  // Inicia uma transação

            // Prepara a consulta para evitar SQL Injection
            $stmt = $conn->prepare("DELETE FROM produto WHERE produt_cod = :p_c");
            $stmt->bindParam(':p_c', $produto_code, PDO::PARAM_INT);

            // Executa a consulta
            $stmt->execute();

            $conn->commit();  // Confirma a transação

            // Verifica se a exclusão foi bem-sucedida
            if ($stmt->rowCount() > 0) {
                $response = array("mensagem" => "Produto excluído com sucesso");
            } else {
                $response = array("mensagem" => "Produto não encontrado");
            }

        } catch (PDOException $e) {
            $conn->rollBack();  // Reverte a transação em caso de erro
            $response = array("mensagem" => "Erro ao excluir o produto: " . $e->getMessage());
        }

    } else {
        $response = array("mensagem" => "Código de produto inválido");
    }

    // Retorna a resposta em formato JSON
    echo json_encode($response);
}
?>
