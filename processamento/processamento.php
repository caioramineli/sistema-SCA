<?php

session_start();
require "funcoesBD.php";

if(!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['endereco']) && !empty($_POST['telefone']) && !empty($_POST['data_nasc'])){

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];

    // $count_cpf = "SELECT * FROM cliente WHERE cpf = '$cpf'";
    // $result = ConectarBD()->query($count_cpf);
    
    // if ($result->num_rows > 0) {
    //     // Usuário já existe
    //     header("location: ../telas/cliente.php");
    //     // echo "Usuário já cadastrado. Escolha outro nome de usuário.";
    //     // die();
    // }
    
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $data_nasc = $_POST['data_nasc'];
    //     $result=explode('/', $data_nasc);
    //     $dia = $result[0]; 
    //     $mes = $result[1]; 
    //     $ano = $result[2];
    // $data_nasc = $ano. '-' .$mes. '-' .$dia;
    $data_nasc = implode("-",array_reverse(explode("/",$data_nasc)));

    CadastrarCliente($nome, $cpf, $endereco, $telefone, $data_nasc);
    
    header("location: ../telas/cliente.php"); #Adicionar caminho para tela referente
    die();
            

}

// else{
//     // header("location: ../telas/cliente.php");
//     die();
// }


?>