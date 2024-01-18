<?php
    require "../processamento/funcoesBD.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/consulta-despesa.css">
    <link rel="icon" href="../images/s-icon.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src='http://momentjs.com/downloads/moment.min.js'></script>
    <script src="../js/consulta-despesa.js" defer></script>
    <title>Despesas</title>
</head>

<body>
    <section class="container-geral">
        <section class="aba-lateral">
            <div class="usuario">
                <img src="../images/despesas.png">
                <h1>Despesas</h1>
            </div>
            <div class="container-pagar">
                <button onclick="abrirModal()">Pagar Despesa</button>
            </div>
            <div class="voltar">
                <a href="../telas/despesa.php">
                    <img src="../images/voltar.png">    
                </a>
                <a href="../telas/despesa.php">
                    <h1 id="teste">Voltar</h1>
                </a>
            </div>  
        </section>
        <main>
        <section class="container-despesas">
                <?php
                $allDespesas = ApresentarDespesa();
                if ($allDespesas != null) {
                    while ($mostrar = mysqli_fetch_assoc($allDespesas)) {  
                        echo "<div class='despesa'>";
                            echo "<h3>ID: " . $mostrar['id'] . "</h3>";
                            echo "<p> <strong>Tipo:</strong> " . $mostrar['tipo_despesa'] . "</p>";
                            echo "<p> <strong>Nome:</strong> " . $mostrar['nome'] . "</p>";
                            echo "<p> <strong>Descrição:</strong> " . $mostrar['descricao'] . "</p>";
                            echo "<p> <strong>Valor:</strong> " . 'R$ ' . $mostrar['valor'] = number_format($mostrar['valor'], 2 , ",", ".") . "</p>";
                            echo "<p> <strong>Data de vencimento:</strong> " . "<span class='data'>". $mostrar['data_ven'] = implode("/",array_reverse(explode("-",$mostrar['data_ven'])))."</span>" . "</p>";
                            echo "<p> <strong>Situação:</strong> " . "<span class='situacao'>" . $mostrar['status'] . "</span>". "</p>";
                        echo "</div>";
                    }
                }
                ?>
            </section>
            <section class="container-modal" id="modal">
                <form id="form" method="POST" action="../processamento/processamento.php">
                    <img src="../images/close.png" onclick="fecharModal()" id="fechar-modal">
                    <h4>Pagar Despesa</h4>

                    <label for="tipo_despesa">Despesa</label>
                    <select name="tipo_despesa" class="inputs" onchange="despesacheck(); getPreco()" onblur="despesacheck()">
                        <option value="">Selecione a despesa</option>
                        <?php
                        $allDespesas= ApresentarDespesaPaga();
                        if ($allDespesas!= null) {
                            while ($mostrar = mysqli_fetch_assoc($allDespesas)) {
                                echo "<option value='" . $mostrar['id'] . "'name='nome_despesa'>" . $mostrar['nome'] . ", R$ " . $mostrar['valor'] = number_format($mostrar['valor'], 2, ',', '.'). "</option>";
                            }
                        }
                    ?>
                </select>
                <span class="spans">É necessário informar uma despesa.</span>

                <label id="valor_total">Valor Total:</label>

                <div class="btns">
                    <button name="btn-enviar" type="submit" onclick="Pagar()">Pagar</button>
                    <button type="reset" onclick="fecharModal()">Cancelar</button>
        
                </div>
                </form>
            </section>
        </main>
    </section>
</body>

</html>