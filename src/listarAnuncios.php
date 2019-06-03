<?php 
include 'conexao.php';
$retorno = new stdClass();
//Retorna todos os Anuncios.
$anunciosQuery = $pdo->prepare('select * from anuncios');
$anunciosQuery->execute();
$anunciosArray = $anunciosQuery->fetchAll();
$retorno->codigo = 1;
$retorno->anuncios = $anunciosArray;
echo json_encode($retorno);
die();
