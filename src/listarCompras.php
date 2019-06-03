<?php 
include 'conexao.php';
$retorno = new stdClass();
//Retorna todos os Anuncios.
$comprasQuery = $pdo->prepare('select * from pedidos');
$comprasQuery->execute();
$comprasArray = $comprasQuery->fetchAll();
$retorno->codigo = 1;
$retorno->compras = $comprasArray;
echo json_encode($retorno);
die();
