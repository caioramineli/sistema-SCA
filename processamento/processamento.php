<?php

session_start();
require "funcoesBD.php";

if(!empty($_POST['nome']) && !empty($_POST['preco']) && !empty($_POST['data_validade'])){

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $preco = preg_replace('/[^0-9]/', '', $preco);    
    $preco = bcdiv($preco, 100, 2);
    $preco = strtr($preco, '.', '');
    $data_validade = $_POST['data_validade'];
    $data_validade = implode("-",array_reverse(explode("/",$data_validade)));
    $estoque = 0;

    CadastrarProduto($nome, $preco, $data_validade, $estoque);
    
    header("location: ../telas/produto.php"); #Adicionar caminho para tela referente
    die();
}


?>