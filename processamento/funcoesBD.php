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
