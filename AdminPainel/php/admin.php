<?php
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>AngoMart/Administrator Panel</title>
</head>
<body>
    <header>
        <div class="logo-busca-content">
            <h1>AngoMart</h1>
            <div class="buscarProduto">
                <input type="text" placeholder="Buscar produto">
                <img class="search" src="../imagens/search (1).png" alt="Search">
            </div>
        </div>
        <div class="adicionar-produto">
            <img class="add" src="../imagens/adicionar-aplicativos.png" alt="Adicionar Produtos">
            <a href="AdicionarProduto.php">Adicionar Produto</a>
        </div>

        <div class="admin-profile">

        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Código do Produto</th>
                    <th>Nome do Produto</th>
                    <th>Preço do Produto</th>
                    <th>Quantidade</th>
                    <th>Estado</th>
                    <th>Acções</th>
                </tr>
            </thead>
            <tbody>
               <?php
               $stmt = $conn -> query("SELECT * FROM produto");
               
               if($stmt->rowCount() == 0) {
                echo "<tr><td>Sem Registro</td><td>Sem Registro</td><td>Sem Registro</td><td>Sem Registro</td><td>Sem Registro</td><td>Desabilitado</td></tr>";
               }
               else{
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $row['produt_cod'] = str_pad($row['produt_cod'], 4, "0", STR_PAD_LEFT);
                    echo "
                    <tr>
                    <td class='produt_cod'>{$row['produt_cod']}</td>
                    <td>{$row['nome_produt']}</td>
                    <td>{$row['preco_produt']}Kz</td>
                    <td>{$row['quantidade_produt']}</td>
                    <td>{$row['estado']}</td>
                    <td class='button-td'>
                        
                         <td class='button-td'>
                               <a href='EditarProduto.php?produt_cod={$row['produt_cod']}' class='editar-button'>Editar</a>
                               <button type='button' class='excluir-button' data-produto-cod='{$row['produt_cod']}'>Excluir</button>
                           </td>
                    </td>
                    </tr>
                    ";
                }
               }
               ?>
            </tbody>
        </table>
    </main>
    <script src="../js/delete.js"></script>
</body>
</html>