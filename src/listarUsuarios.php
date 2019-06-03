<?php 
include 'conexao.php';
$retorno = new stdClass();
//Retorna todos os usuarios.
$usuariosQuery = $pdo->prepare('select * from usuario');
$usuariosQuery->execute();
$usuariosArray = $usuariosQuery->fetchAll();
$retorno->codigo = 1;
$retorno->usuarios = $usuariosArray;
echo json_encode($retorno);
die();
