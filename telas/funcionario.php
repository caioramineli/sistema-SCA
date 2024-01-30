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
                <a href="../telas/tela-inicial.php">
                    <img src="../images/voltar.png">
                </a>
                <a href="../telas/tela-inicial.php">
                    <h1 id="teste">Voltar</h1>
                </a>
            </div>
        </section>
        <main>
            <form id="form" method="POST">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="inputs" onblur="nomecheck()">
                <span class="spans">O nome deve ter no minímo 3 caracteres.</span>

                <label for="cpf">CPF</label>
                <input type="text" name="cpf" maxlength="14" class="inputs" id="cpf" onblur="cpfcheck(); removeSpanCPF()">
                <span class="spans">Digite um CPF válido.</span>
                <?php
                    session_start();
                    require "../processamento/funcoesBD.php";
                    if(!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['salario']) && !empty($_POST['sexo']) && !empty($_POST['endereco']) && !empty($_POST['telefone']) && !empty($_POST['data_nasc'])){
                        $nome = $_POST['nome'];
                        $cpf = $_POST['cpf'];
                        $salario = $_POST['salario'];
                        $salario = preg_replace('/[^0-9]/', '', $salario);    
                        $salario = bcdiv($salario, 100, 2);
                        $salario = strtr($salario, '.', '');
                        $sexo = $_POST['sexo'];
                        $endereco = $_POST['endereco'];
                        $telefone = $_POST['telefone'];
                        $data_nasc = $_POST['data_nasc'];
                        $data_nasc = implode("-",array_reverse(explode("/",$data_nasc)));
                        $count_cpf = "SELECT * FROM funcionario WHERE cpf = '$cpf'";
                        $result = ConectarBD()->query($count_cpf);

                        if ($result->num_rows > 0) {
                            // Usuário já existe
                            echo "<span id='span-cpf'>CPF já cadastrado. Escolha outro CPF.</span>";
                        }
                        else {
                            CadastrarFuncionario($nome, $cpf, $salario , $sexo, $endereco, $telefone, $data_nasc);
                        }
                    }
                ?>
                <label for="salario">Salário</label>
                <input type="text" name="salario" id="salario" class="inputs" onblur="salariocheck()">
                <span class="spans">É necessário informar o salário.</span>

                <label for="sexo">Sexo</label>
                <select name="sexo">
                    <option value="Masculuino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select>

                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" class="inputs" onblur="enderecocheck()">
                <span class="spans">É necessário informar um endereço.</span>

                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="inputs" onblur="telefonecheck()">
                <span class="spans">É necessário informar um número completo.</span>

                <label for="data_nasc">Data de nascimento</label>
                <input type="text" name="data_nasc" id="data_nasc" class="inputs" onblur="datacheck()">
                <span class="spans">É necessário informar uma data válida.</span>

                <div class="btns">
                    <button name="btn-enviar" type="button" onclick="Enviar()">Registrar</button>
                    <button type="reset" onclick="limparInputs()" id="cancelar">Cancelar</button>
                    <a href="consulta-funcionario.php">Consultar</a>
                </div>
            </form>
        </main>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
</body>

</html>