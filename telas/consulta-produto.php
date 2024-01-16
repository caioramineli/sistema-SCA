<?php
    require "../processamento/funcoesBD.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/consulta-produto.css">
    <link rel="icon" href="../images/s-icon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Produtos</title>
</head>

<body>
    <section class="container-geral">
        <section class="aba-lateral">
            <div class="usuario">
                <img src="../images/produtos.png">
                <h1>Produto</h1>
            </div>
            <div class="voltar">
                <a href="produto.php">
                    <img src="../images/voltar.png">    
                </a>
                <a href="produto.php">
                    <h1 id="teste">Voltar</h1>
                </a>
            </div>
        </section>
        <main>
            <section class="container-produto">
                <?php
                    $allProdutos = ApresentarProduto();
                    if ($allProdutos != null) {
                        while ($mostrar = mysqli_fetch_assoc($allProdutos)) {
                            echo "<div class='produto'>";
                                echo "<h3>" . $mostrar['nome'] . "</h3>";
                                echo "<p> <strong>Código:</strong> " . $mostrar['id'] . "</p>";
                                echo "<p> <strong>Preço:</strong> " . 'R$ '. $mostrar['preco'] = number_format($mostrar['preco'], 2 , ",", ".") . "</p>";
                                echo "<p> <strong>Data de validade:</strong> " . $mostrar['data_validade'] = implode("/",array_reverse(explode("-",$mostrar['data_validade']))) . "</p>";
                                echo "<p> <strong>Estoque:</strong> " . $mostrar['estoque'] . "</p>";
                            echo "</div>";
                        }
                    }
                ?>
            </section>
        </main>
    </section>
</body>

</html>