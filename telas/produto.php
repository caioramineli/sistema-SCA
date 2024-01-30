<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/produto.css">
    <script src="../js/produto.js" defer></script>
    <link rel="icon" href="../images/s-icon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <title>Produto</title>
</head>

<body>
    <section class="container-geral">
        <section class="aba-lateral">
            <div class="usuario">
                <img src="../images/produtos.png">
                <h1>Produto</h1>
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
                
                <label for="nome">Nome do produto</label>
                <input type="text" name="nome" class="inputs" onblur="nomecheck()">
                <span class="spans">O nome deve ter no minímo 2 caracteres.</span>

                <label for="preco">Preço</label>
                <input id="preco" type="text" name="preco" class="inputs" onblur="precocheck()">
                <span class="spans">É necessário informar um valor.</span>

                <label for="data_validade">Data de validade</label>
                <input id="data_validade" type="text" name="data_validade" class="inputs" onblur="datacheck()">
                <span class="spans">É necessário informar uma data válida.</span>

                <div class="btns">
                    <button name="btn-enviar" type="button" onclick="Enviar()">Registrar</button>
                    <button type="reset" onclick="limparInputs()" id="cancelar">Cancelar</button>
                    <a href="consulta-produto.php">Consultar</a>
                </div>
            </form>
        </main>
    </section>
</body>

</html>