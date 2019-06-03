<?php 
include 'conexao.php';
$retorno = new stdClass();
//Verifica se todos os dados foram enviados
if(!isset($_POST['anuncioId']) or !isset($_POST['userId']) or  !isset($_POST['tipo'])){
	$retorno->codigo = 0;
	echo json_encode($retorno);
	die();
}
//Valida se o anuncio existe
$validarAnuncio = $pdo->prepare('select * from anuncios where anuncioId = ?');
$validarAnuncio->execute([$_POST['anuncioId']]);
if($validarAnuncio->rowCount() == 0){
	$retorno->codigo = 2;
	echo json_encode($retorno);
	die();
}
//Valida se o usuario existe
$validarUsuario = $pdo->prepare('select * from usuario where userId = ?');
$validarUsuario->execute([$_POST['userId']]);
if($validarUsuario->rowCount() == 0){
	$retorno->codigo = 3;
	echo json_encode($retorno);
	die();
}
//Monta o array com os dados da compra
$compra['0'] = $_POST['anuncioId'];
$compra['1'] = $_POST['userId'];
$compra['2'] = date('Y-m-d');
$compra['3'] = 0;
$compra['4'] = $_POST['tipo'];
//Realiza o cadastro no banco
$criarCompra = $pdo->prepare('insert into pedidos(anuncioId,userId,dataCompra,status,tipo) values (?,?,?,?,?)');
if($criarCompra->execute($compra)){
	$retorno->codigo = 1;
	echo json_encode($retorno);
	die();
}