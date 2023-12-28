<?php
    function ConectarBD(){
        $conexao = mysqli_connect("localhost", "root", "", "sca");
        return ($conexao);
    }
    
    function CadastrarCliente($nome, $cpf, $endereco, $telefone, $data_nasc){
        $conexao = ConectarBD();
        $inserir = "INSERT INTO cliente VALUES ('$nome', '$cpf', '$endereco', '$telefone' , '$data_nasc')";

        mysqli_query($conexao, $inserir);
        #Comando responsável por executar comando SQL no php.
    }

    function ApresentarCliente(){
        $conexao = ConectarBD();
        $buscar = "SELECT * FROM cliente";
        $apresentar = mysqli_query($conexao, $buscar);

        return $apresentar;
    }
?>