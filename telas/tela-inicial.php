<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/tela-inicial.css">
    <script src="../js/tela-inicial.js" defer></script>
    <link rel="icon" href="../images/s-icon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
</head>

<body>
    <section class="container-geral">
        <section class="aba-lateral">
            <div class="usuario">
                <img src="../images/usuario.png">
                <h1>Usuário</h1>
            </div>
            <div class="voltar">
                <a href="../telas/login.php">
                    <img src="../images/voltar.png">
                </a>
                <a href="../telas/login.php">
                    <h1 id="teste">Voltar</h1>
                </a>
            </div>
        </section>
        <main>
            <section class="container-cards">
                <a href="funcionario.php">
                    <div class="card" onmousemove="mudarCor(0)" onmouseout="desmudarCor(0)">
                        <h1>funcionários</h1>
                        <div class="select">
                            <h4 id="hover">SELECIONAR</h5>
                        </div>
                    </div>
                </a>
                <a href="compra.php">
                    <div class="card" onmousemove="mudarCor(1)" onmouseout="desmudarCor(1)">
                        <h1>compras</h1>
                        <div class="select">
                            <h4 id="hover">SELECIONAR</h5>
                        </div>
                    </div>
                </a>
                <a href="fornecedor.php">
                    <div class="card" onmousemove="mudarCor(2)" onmouseout="desmudarCor(2)">
                        <h1>fornecedores</h1>
                        <div class="select">
                            <h4 id="hover">SELECIONAR</h5>
                        </div>
                    </div>
                </a>
                <a href="cliente.php">
                    <div class="card" onmousemove="mudarCor(3)" onmouseout="desmudarCor(3)">
                        <h1>clientes</h1>
                        <div class="select">
                            <h4 id="hover">SELECIONAR</h5>
                        </div>
                    </div>
                </a>
                <a href="venda.php">
                    <div class="card" onmousemove="mudarCor(4)" onmouseout="desmudarCor(4)">
                        <h1>vendas</h1>
                        <div class="select">
                            <h4 id="hover">SELECIONAR</h5>
                        </div>
                    </div>
                </a>
                <a href="produto.php">
                    <div class="card" onmousemove="mudarCor(5)" onmouseout="desmudarCor(5)">
                        <h1>produtos</h1>
                        <div class="select">
                            <h4 id="hover">SELECIONAR</h5>
                        </div>
                    </div>
                </a>
                <a href="despesa.php">
                    <div class="card" onmousemove="mudarCor(6)" onmouseout="desmudarCor(6)">
                        <h1>despesas</h1>
                        <div class="select">
                            <h4 id="hover">SELECIONAR</h5>
                        </div>
                    </div>
                </a>
            </section>
        </main>
    </section>
</body>

</html>