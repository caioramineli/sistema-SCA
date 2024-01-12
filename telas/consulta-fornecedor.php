<?php
    require "../processamento/funcoesBD.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/consulta-fornecedor.css">
    <link rel="icon" href="../images/s-icon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Fornecedores</title>
</head>

<body>
    <section class="container-geral">
        <section class="aba-lateral">
            <div class="usuario">
                <img src="../images/fornecedor.png">
                <h1>Fornecedor</h1>
            </div>
            <div class="voltar">
                <a href="fornecedor.php">
                    <img src="../images/voltar.png">    
                </a>
                <a href="fornecedor.php">
                    <h1 id="teste">Voltar</h1>
                </a>
            </div>
        </section>
        <main>
        <section class="container-fornecedor">
            <?php
            $allFornecedor = ApresentarFornecedor();
            if ($allFornecedor != null) {
                while ($mostrar = mysqli_fetch_assoc($allFornecedor)) {  
                    echo "<div class='fornecedor'>";
                        echo "<h3>" . $mostrar['nome'] . "</h3>";
                        echo "<p> <strong>CNPJ:</strong> " . $mostrar['cnpj'] . "</p>";
                        echo "<p> <strong>Email:</strong> " . $mostrar['email'] . "</p>";
                        echo "<p> <strong>Endereço:</strong> " . $mostrar['endereco'] . "</p>";
                        echo "<p> <strong>Telefone:</strong> " . $mostrar['telefone'] . "</p>";
                        echo "<p> <strong>Prazo de entrega:</strong> " . $mostrar['prazo'] . "</p>";
                    echo "</div>";
                }
            }
            ?>
        </section>
        </main>
    </section>
</body>

</html>