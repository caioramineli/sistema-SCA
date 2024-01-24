<?php
    require "../processamento/funcoesBD.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/consulta-venda.css">
    <script src="../js/venda.js" defer></script>
    <link rel="icon" href="../images/s-icon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <title>Vendas</title>
</head>

<body>
    <section class="container-geral">
        <section class="aba-lateral">
            <div class="usuario">
                <img src="../images/vendas.png">
                <h1>Vendas</h1>
            </div>
            <div class="voltar">
                <a href="../telas/venda.php">
                    <img src="../images/voltar.png">    
                </a>
                <a href="../telas/venda.php">
                    <h1 id="teste">Voltar</h1>
                </a>
            </div>
        </section>
        <main>
            <section class="container-vendas">
                <?php
                    $allvendas = ApresentarVenda();
                    if ($allvendas != null) {
                        while ($mostrar = mysqli_fetch_assoc($allvendas)) {  
                            echo "<div class='venda'>";
                                echo "<h3>ID: " . $mostrar['id'] . "</h3>";
                                echo "<p> <strong>Cliente:</strong> " . $mostrar['cliente'] . "</p>";
                                echo "<p> <strong>CPF:</strong> " . $mostrar['fk_cpf'] . "</p>";
                                echo "<p> <strong>Valor total:</strong> " . 'R$ ' . $mostrar['valor_total'] = number_format($mostrar['valor_total'], 2 , ",", ".") . "</p>";
                                echo "<p> <strong>Método de Pagamento:</strong> " . $mostrar['tipo_pagamento'] . "</p>";
                                echo "<p> <strong>Data da venda:</strong> " . $mostrar['data_venda'] = implode("/",array_reverse(explode("-",$mostrar['data_venda']))) . "</p>";
                            echo "</div>";
                        }
                    }
                ?>
            </section>
        </main>
    </section>
</body>

</html>