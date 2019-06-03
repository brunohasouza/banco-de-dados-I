<?php 
include 'conexao.php';
$retorno = new stdClass();
//Retorna todos os usuarios.
$livrosQuery = $pdo->prepare('select * from livros');
$livrosQuery->execute();
$livrosArray = $livrosQuery->fetchAll();
$retorno->codigo = 1;
$retorno->livros = $livrosArray;
echo json_encode($retorno);
die();
