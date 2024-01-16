<?php
    require "../processamento/funcoesBD.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/consulta-compra.css">
    <link rel="icon" href="../images/s-icon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <title>Compras</title>
</head>

<body>
    <section class="container-geral">
        <section class="aba-lateral">
            <div class="usuario">
                <img src="../images/compra.png">
                <h1>Compras</h1>
            </div>
            <div class="voltar">
                <a href="../telas/tela-inicial.php">
                    <img src="../images/voltar.png">    
                </a>
                <a href="../telas/tela-inicial.php">
                    <h1 id="teste">Voltar</h1>
                </a>
            </div>
        </section>
        <main>
        <section class="container-compras">
                <?php
                $allCompras = ApresentarCompra();
                if ($allCompras != null) {
                    while ($mostrar = mysqli_fetch_assoc($allCompras)) {  
                        echo "<div class='compra'>";
                            echo "<h3>ID: " . $mostrar['id'] . "</h3>";
                            echo "<p> <strong>Fornecedor:</strong> " . $mostrar['fornecedor'] . "</p>";
                            echo "<p> <strong>Produto:</strong> " . $mostrar['produto'] . "</p>";
                            echo "<p> <strong>Quantidade:</strong> " . $mostrar['quantidade'] . "</p>";
                            echo "<p> <strong>Valor total:</strong> " . 'R$ ' . $mostrar['valor_total'] = number_format($mostrar['valor_total'], 2 , ",", ".") . "</p>";
                            echo "<p> <strong>Data da compra:</strong> " . $mostrar['data_compra'] = implode("/",array_reverse(explode("-",$mostrar['data_compra'])))  . "</p>";
                        echo "</div>";
                    }
                }
                ?>
            </section>
        </main>
    </section>
</body>

</html>