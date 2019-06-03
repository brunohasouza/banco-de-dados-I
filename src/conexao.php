<?php 
$user = 'root';
$password = '';
try {
    $pdo = new PDO('mysql:dbname=biblio;host=localhost', $user, $password);
} catch (PDOException $e) {
    echo 'Ocorreu um erro de codigo: ' . $e->getMessage();
}