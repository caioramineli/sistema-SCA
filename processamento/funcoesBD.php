<?php
    function ConectarBD(){
        $conexao = mysqli_connect("localhost", "root", "", "sca");
        return ($conexao);
    }
    
    function CadastrarCliente($nome, $cpf, $endereco, $telefone, $data_nasc){
        $conexao = ConectarBD();
        $inserir = "INSERT INTO cliente VALUES ('$nome', '$cpf', '$endereco', '$telefone' , '$data_nasc')";

        mysqli_query($conexao, $inserir);
    }

    function ApresentarCliente(){
        $conexao = ConectarBD();
        $buscar = "SELECT * FROM cliente order by nome";
        $apresentar = mysqli_query($conexao, $buscar);
        return $apresentar;
    }

    function CadastrarFuncionario($nome, $cpf, $salario, $sexo, $endereco, $telefone, $data_nasc){
        $conexao = ConectarBD();
        $inserir = "INSERT INTO funcionario VALUES ('$nome', '$cpf', '$salario', '$sexo', '$endereco', '$telefone', '$data_nasc')";

        mysqli_query($conexao, $inserir);
    }

    function ApresentarFuncionario(){
        $conexao = ConectarBD();
        $buscar = "SELECT * FROM funcionario order by nome";
        $apresentar = mysqli_query($conexao, $buscar);
        return $apresentar;
    }

    function CadastrarFornecedor($nome, $cnpj, $email, $endereco, $telefone, $prazo){
        $conexao = ConectarBD();
        $inserir = "INSERT INTO fornecedor VALUES ('$nome', '$cnpj', '$email', '$endereco', '$telefone', '$prazo')";

        mysqli_query($conexao, $inserir);
    }

    function ApresentarFornecedor(){
        $conexao = ConectarBD();
        $buscar = "SELECT * FROM fornecedor order by nome";
        $apresentar = mysqli_query($conexao, $buscar);
        return $apresentar;
    }

    function CadastrarProduto($nome, $preco, $data_validade, $estoque){
        $conexao = ConectarBD();
        $inserir = "INSERT INTO produto (nome, preco, data_validade, estoque) VALUES ('$nome', '$preco', '$data_validade', '$estoque');";

        mysqli_query($conexao, $inserir);
    }

    function ApresentarProduto(){
        $conexao = ConectarBD();
        $buscar = "SELECT * FROM produto order by id";
        $apresentar = mysqli_query($conexao, $buscar);
        return $apresentar;
    }

    function CadastrarCompra($fornecedor, $produto, $quantidade, $valor_total, $data_compra){
        $conexao = ConectarBD();
        $inserir = "INSERT INTO compra (fornecedor, produto, quantidade, valor_total, data_compra) VALUES ('$fornecedor', '$produto', '$quantidade', '$valor_total', '$data_compra');";
        $inserir_estoque = "UPDATE produto SET estoque = estoque + $quantidade WHERE nome = '$produto';";
        mysqli_query($conexao, $inserir);
        mysqli_query($conexao, $inserir_estoque);
    }

    function ApresentarCompra(){
        $conexao = ConectarBD();
        $buscar = "SELECT * FROM compra order by id";
        $apresentar = mysqli_query($conexao, $buscar);
        return $apresentar;
    }

    function CadastrarDespesa($tipo_despesa, $nome, $descricao, $valor, $data_ven, $status){
        $conexao = ConectarBD();
        $inserir = "INSERT INTO despesa (tipo_despesa, nome, descricao, valor, data_ven, status) VALUES ('$tipo_despesa', '$nome', '$descricao', '$valor', '$data_ven', '$status');";
        mysqli_query($conexao, $inserir);
    }

    function ApresentarDespesa(){
        $conexao = ConectarBD();
        $buscar = "SELECT * FROM despesa order by id";
        $apresentar = mysqli_query($conexao, $buscar);
        return $apresentar;
    }

    function ApresentarDespesaPaga(){
        $conexao = ConectarBD();
        $buscar = "SELECT * FROM despesa WHERE status = 'Não paga' order by id;";
        $apresentar = mysqli_query($conexao, $buscar);
        return $apresentar;
    }

    function PagarDespesa($id){
        $conexao = ConectarBD();
        $atualizar = "UPDATE despesa SET status = 'Paga' WHERE id= '$id';";
        mysqli_query($conexao, $atualizar);
    }

    function CadastrarTeste($valor){
        $conexao = ConectarBD();
        $inserir = "INSERT INTO teste (valor) VALUES ('$valor');";
        mysqli_query($conexao, $inserir);
    }

    function CadastrarVenda($cliente, $fk_cpf, $valor_total, $tipo_pagamento, $data_venda){
        $conexao = ConectarBD();
        $inserir = "INSERT INTO venda (cliente, fk_cpf, valor_total, tipo_pagamento, data_venda) VALUES ('$cliente', '$fk_cpf', '$valor_total', '$tipo_pagamento', '$data_venda');";
        // $inserir_estoque = "UPDATE produto SET estoque = estoque + $quantidade WHERE nome = '$produto';";
        mysqli_query($conexao, $inserir);
        // mysqli_query($conexao, $inserir_estoque);
    }

    function ApresentarVenda(){
        $conexao = ConectarBD();
        $buscar = "SELECT * FROM venda order by id";
        $apresentar = mysqli_query($conexao, $buscar);
        return $apresentar;
    }
?>