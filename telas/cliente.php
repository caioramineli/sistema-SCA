<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/cliente.css">
    <script src="../js/cliente.js" defer></script>
    <link rel="icon" href="../images/s-icon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
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
                <input type="text" name="nome" class="inputs" onblur="nomecheck()">
                <span class="spans">O nome deve ter no minímo 3 caracteres.</span>

                <label for="cpf">CPF</label>
                <input id="cpf" type="text" name="cpf" class="inputs" onblur="cpfcheck(); onfocus=removeSpanCPF()">
                <span class="spans">Digite um CPF válido.</span>
                <?php
                    session_start();
                    require "../processamento/funcoesBD.php";
                    if(!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['endereco']) && !empty($_POST['telefone']) && !empty($_POST['data_nasc'])){
                        $nome = $_POST['nome'];
                        $cpf = $_POST['cpf'];
                        $endereco = $_POST['endereco'];
                        $telefone = $_POST['telefone'];
                        $data_nasc = $_POST['data_nasc'];
                        $data_nasc = implode("-",array_reverse(explode("/",$data_nasc)));
                        $count_cpf = "SELECT * FROM cliente WHERE cpf = '$cpf'";
                        $result = ConectarBD()->query($count_cpf);

                        if ($result->num_rows > 0) {
                            // Usuário já existe
                            echo "<span id='span-cpf'>CPF já cadastrado. Escolha outro CPF.</span>";
                        }
                        else {
                            CadastrarCliente($nome, $cpf, $endereco, $telefone, $data_nasc);
                            // die();
                        }
                    }
                ?>
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" class="inputs" onblur="enderecocheck()">
                <span class="spans">É necessário informar um endereço.</span>

                <label for="telefone">Telefone</label>
                <input id="telefone" type="text" name="telefone" class="inputs" onblur="telefonecheck()">
                <span class="spans">É necessário informar um número completo.</span>

                <label for="data_nasc">Data de nascimento</label>
                <input id="data_nasc" type="text" name="data_nasc" class="inputs" onblur="datacheck()">
                <span class="spans">É necessário informar uma data válida.</span>

                <div class="btns">
                    <button name="btn-enviar" type="button" onclick="Enviar()">Registrar</button>
                    <button type="reset" onclick="limparInputs()" id="cancelar">Cancelar</button>
                    <a href="consulta-cliente.php">Consultar</a>
                </div>
            </form>
        </main>
    </section>
</body>

</html>