<?php

session_start();
require "funcoesBD.php";

#CADASTRO DE USUARIO
if(!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['endereco']) && !empty($_POST['telefone']) && !empty($_POST['data_nasc'])){
    #Questionar $_POST???

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $data_nasc = $_POST['data_nasc'];
        $result=explode('/', $data_nasc);
        $dia = $result[0]; 
        $mes = $result[1]; 
        $ano = $result[2];
    $data_nasc = $ano. '-' .$mes. '-' .$dia;

    CadastrarCliente($nome, $cpf, $endereco, $telefone, $data_nasc);

    header("location: ../telas/cliente.php"); #Adicionar caminho para tela referente
    die();
}


?>