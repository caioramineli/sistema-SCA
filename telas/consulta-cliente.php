<?php
    require "../processamento/funcoesBD.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/consulta-cliente.css">
    <link rel="icon" href="../images/s-icon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Clientes</title>
</head>

<body>
    <section class="container-geral">
        <section class="aba-lateral">
            <div class="usuario">
                <img src="../images/cliente.svg">
                <h1>Cliente</h1>
            </div>
            <div class="voltar">
                <a href="cliente.php">
                    <img src="../images/voltar.png">    
                </a>
                <a href="cliente.php">
                    <h1 id="teste">Voltar</h1>
                </a>
            </div>
        </section>
        <main>
        <section class="container-cliente">
            <?php
            $allCliente = ApresentarCliente();

            if ($allCliente != null) {
                while ($mostrar = mysqli_fetch_assoc($allCliente)) {
                    echo "<div class='cliente'>";
                    echo "<h3>" . $mostrar['nome'] . "</h3>";
                    echo "<p> <strong>CPF:</strong> " . $mostrar['cpf'] . "</p>";
                    echo "<p> <strong>Endereço:</strong> " . $mostrar['endereco'] . "</p>";
                    echo "<p> <strong>Telefone:</strong> " . $mostrar['telefone'] . "</p>";
                    echo "<p> <strong>Data de nascimento:</strong> " . $mostrar['data_nasc'] = implode("/",array_reverse(explode("-",$mostrar['data_nasc']))) . "</p>";
                    echo "</div>";
                }
            }
            ?>
        </section>
        </main>
    </section>
</body>

</html>