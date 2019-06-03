<?php 
include 'conexao.php';
$retorno = new stdClass();
//Verifica se todos os dados foram enviados
if(!isset($_POST['nome']) or !isset($_POST['email']) or  !isset($_POST['senha']) or  !isset($_POST['dataNascimento']) or  !isset($_POST['rua']) or  !isset($_POST['cidade']) or  !isset($_POST['estado'])){
	$retorno->codigo = 0;
	echo json_encode($retorno);
	die();
}
//Monta o array com os dados do usuario
$usuario['0'] = $_POST['nome'];
$usuario['1'] = $_POST['email'];
$usuario['2'] = $_POST['senha'];
$usuario['3'] = $_POST['dataNascimento'];
$usuario['4'] = $_POST['rua'];
$usuario['5'] = $_POST['cidade'];
$usuario['6'] = $_POST['estado'];
//Realiza o cadastro no banco
$adicionarUsuario = $pdo->prepare('insert into usuario(nome,email,senha,dataNascimento,rua,cidade,estado) values (?,?,?,?,?,?,?)');
if($adicionarUsuario->execute($usuario)){
	$retorno->codigo = 1;
	echo json_encode($retorno);
	die();
}