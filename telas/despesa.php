<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/despesa.css">
    <script src="../js/despesa.js" defer></script>
    <link rel="icon" href="../images/s-icon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <title>Despesas</title>
</head>

<body>
    <section class="container-geral">
        <section class="aba-lateral">
            <div class="usuario">
                <img src="../images/despesas.png">
                <h1>Despesas</h1>
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
                <label for="tipo_despesa">Tipo de despesa</label>
                <select name="tipo_despesa" class="inputs" onblur="tipocheck()" onchange="tipocheck()">
                    <option value="">Selecione o tipo de despesa</option>
                    <option value="Operacional">Operacional</option>
                    <option value="Administrativa">Administrativa</option>
                </select>
                <span class="spans">É necessário informar o tipo da despesa.</span>
                
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="inputs" onblur="nomecheck()">
                <span class="spans">O nome deve ter no minímo 3 caracteres.</span>

                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" class="inputs" onblur="descricaocheck()">
                <span class="spans">O descrição deve ter no minímo 5 caracteres.</span>

                <label for="valor">Valor</label>
                <input type="text" id="valor" name="valor" class="inputs" onblur="valorcheck()">
                <span class="spans">É necessário informar um valor.</span>

                <label for="data_ven">Data de vencimento</label>
                <input id="data_ven" type="text" name="data_ven" class="inputs" onblur="datacheck()">
                <span class="spans">É necessário informar uma data válida.</span>

                <div class="btns">
                    <button name="btn-enviar" type="submit" onclick="Enviar()">Registrar</button>
                    <button type="reset" onclick="limparInputs()" id="cancelar">Cancelar</button>
                    <a href="consulta-despesa.php">Consultar</a>
                    <!-- <a href="consulta-cliente.php">Pagar Despesas</a> -->
                </div>
            </form>
        </main>
    </section>
</body>

</html>