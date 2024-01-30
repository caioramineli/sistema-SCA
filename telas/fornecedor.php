<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/fornecedor.css">
    <script src="../js/fornecedor.js" defer></script>
    <link rel="icon" href="../images/s-icon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <title>Fornecedor</title>
</head>

<body>
    <section class="container-geral">
        <section class="aba-lateral">
            <div class="usuario">
                <img src="../images/fornecedor.png">
                <h1>Fornecedor</h1>
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

                <label for="cnpj">CNPJ</label>
                <input id="cnpj" type="text" name="cnpj" class="inputs" onblur="cnpjcheck(); onfocus=removeSpanCNPJ()">
                <span class="spans">Digite um CNPJ válido.</span>
                <?php
                    session_start();
                    require "../processamento/funcoesBD.php";
                    if(!empty($_POST['nome']) && !empty($_POST['cnpj']) && !empty($_POST['email']) && !empty($_POST['endereco']) && !empty($_POST['telefone']) && !empty($_POST['prazo'])){
                        $nome = $_POST['nome'];
                        $cnpj = $_POST['cnpj'];
                        $email = $_POST['email'];
                        $endereco = $_POST['endereco'];
                        $telefone = $_POST['telefone'];
                        $prazo = $_POST['prazo'];
                
                        $count_cnpj = "SELECT * FROM fornecedor WHERE cnpj = '$cnpj'";
                        $result = ConectarBD()->query($count_cnpj);

                        if ($result->num_rows > 0) {
                            // Usuário já existe
                            echo "<span id='span-cnpj'>CNPJ já cadastrado. Escolha outro CNPJ.</span>";
                        }
                        else {
                            CadastrarFornecedor($nome, $cnpj, $email, $endereco, $telefone, $prazo);
                            // die();
                        }
                    }
                ?>

                <label for="email">Email</label>
                <input type="email" name="email" class="inputs" onblur="emailcheck()">
                <span class="spans">É necessário informar uma email válido.</span>

                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" class="inputs" onblur="enderecocheck()">
                <span class="spans">É necessário informar um endereço.</span>

                <label for="telefone">Telefone</label>
                <input id="telefone" type="text" name="telefone" class="inputs" onblur="telefonecheck()">
                <span class="spans">É necessário informar um número completo.</span>

                <label for="prazo">Prazo de entrega</label>
                <input id="prazo" type="text" name="prazo" class="inputs" onblur="prazocheck()">
                <span class="spans">É necessário informar um prazo.</span>

                <div class="btns">
                    <button name="btn-enviar" type="button" onclick="Enviar()">Registrar</button>
                    <button type="reset" onclick="limparInputs()" id="cancelar">Cancelar</button>
                    <a href="consulta-fornecedor.php">Consultar</a>
                </div>
            </form>
        </main>
    </section>
</body>

</html>