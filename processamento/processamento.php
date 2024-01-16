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

else if(!empty($_POST['fornecedor']) && !empty($_POST['produto']) && !empty($_POST['quantidade'])){
    
    $fornecedor = $_POST['fornecedor'];
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $valor_total = $_POST['valor_total'];
    $valor_total = preg_replace('/[^0-9]/', '', $valor_total);    
    $valor_total = bcdiv($valor_total, 100, 2);
    $valor_total = strtr($valor_total, '.', '');
    $data_compra = date("Y-m-d");

    CadastrarCompra($fornecedor, $produto, $quantidade, $valor_total, $data_compra);

    header("location: ../telas/compra.php"); #Adicionar caminho para tela referente
    die();
}

?>
