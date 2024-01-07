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
