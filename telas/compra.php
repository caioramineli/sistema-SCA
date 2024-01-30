<?php
    require "../processamento/funcoesBD.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/compra.css">
    <script src="../js/compra.js" defer></script>
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
            <form id="form" method="POST" action="../processamento/processamento.php">
            
                <label for="fornecedor">Fornecedor</label>
                    <select name="fornecedor" class="inputs" onchange="fornecedorcheck()" onblur="fornecedorcheck()">
                        <option value="">Selecione o fornecedor</option>
                        <?php
                        $allFornecedores = ApresentarFornecedor();
                        if ($allFornecedores != null) {
                            while ($mostrar = mysqli_fetch_assoc($allFornecedores)) {
                                echo "<option value='" . $mostrar['nome'] . "'name='fornecedor'>" . $mostrar['nome'] . "</option>";
                            }
                        }
                    ?>
                </select>
                <span class="spans">É necessário informar um fornecedor.</span>

                <label for="produto">Produto</label>
                <select name="produto" class="inputs" onchange="produtocheck(); getPreco()" onblur="produtocheck()">
                    <option value="">Selecione o produto</option>
                        <?php
                        $allProdutos = ApresentarProduto();
                        if ($allProdutos != null) {
                            while ($mostrar = mysqli_fetch_assoc($allProdutos)) {
                                echo "<option value='" . $mostrar['nome'] . "'name='produto'>" . $mostrar['nome'] . ", R$ " . $mostrar['preco'] = number_format($mostrar['preco'], 2, ',', '.') . "</option>";
                            }
                        }
                    ?>
                </select>
                <span class="spans">É necessário informar um produto.</span>

                <label id="preco">Preço: </label>

                <label for="quantidade">Quantidade</label>
                <input type="number" onkeypress="return event.charCode >= 48" min="1" name="quantidade" id="quantidade" class="inputs" oninput="TamInput()" onchange="getPreco(); quantidadecheck()" onkeyup="getPreco()" onblur="quantidadecheck()">
                <span class="spans">É necessário informar a quantidade.</span>

                <label for="valor_total">Valor Total:</label>
                <input type="text" name="valor_total" id="valor_total" class="inputs" readonly>

                <div class="btns">
                    <button name="btn-enviar" type="button" onclick="Enviar()">Registrar</button>
                    <button type="reset" onclick="limparInputs()" id="cancelar">Cancelar</button>
                    <a href="consulta-compra.php">Consultar</a>
                </div>
            </form>
        </main>
    </section>
</body>

</html>