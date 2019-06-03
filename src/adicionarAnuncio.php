<?php 
include 'conexao.php';
$retorno = new stdClass();
//Verifica se todos os dados foram enviados
if(!isset($_POST['descricao']) or !isset($_POST['condicao']) or  !isset($_POST['livroId']) or  !isset($_POST['userId']) or  !isset($_POST['valor'])){
	$retorno->codigo = 0;
	echo json_encode($retorno);
	die();
}
//Valida se o livro existe
$validarLivro = $pdo->prepare('select * from livros where livroId = ?');
$validarLivro->execute([$_POST['livroId']]);
if($validarLivro->rowCount() == 0){
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
//Monta o array com os dados do anúncio
$anuncio['0'] = $_POST['descricao'];
$anuncio['1'] = $_POST['condicao'];
$anuncio['2'] = date('Y-m-d');
$anuncio['3'] = $_POST['livroId'];
$anuncio['4'] = $_POST['userId'];
$anuncio['5'] = $_POST['valor'];
//Realiza o cadastro no banco
$anuncioLivro = $pdo->prepare('insert into anuncios(descricao,condicao,dataCriacao,livroId,userId,valor) values (?,?,?,?,?,?)');
if($anuncioLivro->execute($anuncio)){
	$retorno->codigo = 1;
	echo json_encode($retorno);
	die();
}