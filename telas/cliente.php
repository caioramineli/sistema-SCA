<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/cliente.css">
    <script src="../js/cliente.js" defer></script>
    <link rel="icon" href="../images/s-icon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>

<body>
    <section class="container-geral">
        <section class="aba-lateral">
            <div class="usuario">
                <img src="../images/cliente.svg">
                <h1>Cliente</h1>
            </div>
            <div class="voltar">
                <a href="../php/tela-inicial.php">
                    <img src="../images/voltar.png">    
                </a>
                <a href="../php/tela-inicial.php">
                    <h1 id="teste">Voltar</h1>
                </a>
            </div>
        </section>
        <main>
            <form action="../processamento/processamento.php" method="POST">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" onblur="nomecheck(value)">
                <span id="span-nome"></span>
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" maxlength="14" id="cpf" onblur="cpfcheck(value)">
                <span id="span-cpf"></span>
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" onblur="telefonecheck(value)">
                <span id="span-telefone"></span>
                <label for="data_nasc">Data de nascimento</label>
                <input type="text" name="data_nasc" id="data_nasc" onblur="datacheck(value)">
                <span id="span-data"></span>
                <div class="btns">
                    <input type="submit" value="Registrar">
                    <button>Cancelar</button>
                    <button><a href="consulta-cliente.php">Consultar</a></button>
                </div>
            </form>
        </main>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
</body>

</html>