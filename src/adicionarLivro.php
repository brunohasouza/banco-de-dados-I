<?php 
include 'conexao.php';
$retorno = new stdClass();
//Verifica se todos os dados foram enviados
if(!isset($_POST['titulo']) or !isset($_POST['sinopse']) or  !isset($_POST['autor']) or  !isset($_POST['editora']) or  !isset($_POST['ano']) or  !isset($_POST['paginas'])){
	$retorno->codigo = 0;
	echo json_encode($retorno);
	die();
}
//Monta o array com os dados do livro
$livro['0'] = $_POST['titulo'];
$livro['1'] = $_POST['sinopse'];
$livro['2'] = $_POST['autor'];
$livro['3'] = $_POST['editora'];
$livro['4'] = $_POST['ano'];
$livro['5'] = $_POST['paginas'];
//Realiza o cadastro no banco
$adicionarLivro = $pdo->prepare('insert into livros(titulo,sinopse,autor,editora,ano,paginas) values (?,?,?,?,?,?)');
if($adicionarLivro->execute($livro)){
	$retorno->codigo = 1;
	echo json_encode($retorno);
	die();
}