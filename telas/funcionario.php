<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/funcionario.css">
    <script src="../js/funcionario.js" defer></script>
    <link rel="icon" href="../images/s-icon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionário</title>
</head>

<body>
    <section class="container-geral">
        <section class="aba-lateral">
            <div class="usuario">
                <img src="../images/funcionario.png">
                <h1>Funcionário</h1>
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
            <form id="form" action="" method="POST">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" onblur="nomecheck()">
                <span id="span-nome"></span>

                <label for="cpf">CPF</label>
                <input type="text" name="cpf" maxlength="14" id="cpf" onblur="cpfcheck()">
                <span id="span-cpf"></span>

                <label for="salario">Salário</label>
                <input type="text" name="salario" id="salario">
                <label for="sexo">Sexo</label>

                <select name="sexo" id="sexo">
                    <option value="Masculuino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select>

                <label for="endereco">Endereço</label>
                <input type="text" name="endereco">

                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" onblur="telefonecheck()">
                <span id="span-telefone"></span>

                <label for="data_nasc">Data de nascimento</label>
                <input type="text" name="data_nasc" id="data_nasc" onblur="datacheck()">
                <span id="span-data"></span>

                <div class="btns">
                    <button name="btn-enviar" type="submit" onclick="Enviar()">Registrar</button>
                    <button onclick="limparInputs()" id="cancelar">Cancelar</button>
                    <a href="consulta-funcionario.php">Consultar</a>
                </div>
            </form>
        </main>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
</body>

</html>