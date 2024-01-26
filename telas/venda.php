<?php
    require "../processamento/funcoesBD.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/venda.css">
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
                <a href="../telas/tela-inicial.php">
                    <img src="../images/voltar.png">    
                </a>
                <a href="../telas/tela-inicial.php">
                    <h1 id="teste">Voltar</h1>
                </a>
            </div>
        </section>
        <main>
        <form>
            
            <section class="container-flex">
                <div class="flex-column">
                    <label for="cliente">Cliente</label>
                        <select name="cliente" class="inputs" onchange="clientecheck()" onblur="clientecheck()">
                            <option value="">Selecione o cliente</option>
                            <?php
                            $allclientes = ApresentarCliente();
                            if ($allclientes != null) {
                                while ($mostrar = mysqli_fetch_assoc($allclientes)) {
                                    echo "<option value='" . $mostrar['cpf'] . "'name='cliente'>" . $mostrar['nome'] . "</option>";
                                }
                            }
                        ?>
                    </select>
                    <span class="spans">É necessário informar um cliente.</span>
                </div>
            
                <div class="flex-column">
                    <label for="produto">Produto</label>
                    <select name="produto" class="inputs" onchange="getPreco(); produtocheck()" onblur="produtocheck()">
                        <option value="">Selecione o produto</option>
                            <?php
                                $allProdutos = ApresentarProduto();
                                if ($allProdutos != null) {
                                    while ($mostrar = mysqli_fetch_assoc($allProdutos)) {
                                        echo "<option value='" . $mostrar['id'] . "'name='produto'>" . $mostrar['nome'] . ", R$ " . $mostrar['preco'] = number_format($mostrar['preco'], 2, ',', '.') . "</option>";
                                    }
                                }
                            ?>
                    </select>
                    <span class="spans">É necessário informar um produto.</span>
                </div>
            </section>

            <label id="preco">Preço: </label>

            <section class="container-flex">
                <div class="flex-column">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" onkeypress="return event.charCode >= 48" min="1" name="quantidade" id="quantidade" class="inputs" oninput="TamInput()" onchange="getPreco(); quantidadecheck()" onkeyup="getPreco()" onblur="quantidadecheck()">
                    <span class="spans">É necessário informar a quantidade.</span>
                </div>

                <div class="flex-column">
                    <label for="valor_total">Valor Total:</label>
                    <input type="text" name="valor_total" id="valor_total_input" class="inputs" readonly>
                </div>
            </section>

            <table id="tabela" >
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Cód. Pdt.</th>
                        <th>Valor</th>
                        <th>Qtd.</th>
                        <th>Valor Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                    </tr>
                </tbody>
            </table>
            <span class="spans">É necessário adicionar pelo menos um produto para realizar a venda!</span>

            <div class="btns">
                <button type="button" name="btn-adicionar" onclick="adicionarNaTabela()">Adicionar</button>
                <button type="button" name="btn-enviar" onclick="abrirModal(); ArmazenarQtd()">Finalizar</button>
                <button type="reset" onclick="limparInputs()" id="cancelar">Cancelar</button>
                <a href="consulta-venda.php">Consultar</a>
            </div>
        </form>
        <section class="container-modal" id="modal">
                <form id="form" method="POST">
                    <img src="../images/close.png" onclick="fecharModal()" id="fechar-modal">
                    <h4>Finalizar Venda</h4>

                    <label for="cliente_venda" id="cliente_venda">Cliente: </label>
                    <!-- <input type="text" name="cliente_venda" id="cliente_venda" class="inputs" readonly> -->

                    <label id="cpf">CPF: </label>
                    <label id="valor_total_venda">Valor Total: </label>

                    <label for="tipo_pagamento">Método de pagamento</label>

                    <select name="tipo_pagamento" class="inputs" onchange="pagamentocheck()" onblur="pagamentocheck()">
                        <option value="">Selecione o método de pagamento</option>
                        <option value="Dinheiro">Dinheiro</option>
                        <option value="Pix">Pix</option>
                        <option value="Cartão">Cartão</option>
                    </select>
                    <span class="spans">É necessário informar o tipo de pagamento.</span>

                    <div class="btns-modal">
                        <button name="btn-enviar" type="button" onclick="Confirmar()">Confirmar</button>
                        <button type="reset" onclick="fecharModal()">Cancelar</button>
                    </div>
                </form>
            </section>
        </main>
    </section>
</body>

</html>