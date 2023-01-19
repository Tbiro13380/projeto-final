<?php

include '../config/conexao.php';

if(!$_POST['email']){
    die(json_encode(array('status' => false, 'message' => 'Insira o seu E-mail')));
}

if(!$_POST['senha']){
    die(json_encode(array('status' => false, 'message' => 'Insira a sua senha')));
}

$query = $conn->query("SELECT * FROM clientes WHERE email = '".$_POST['email']."' and senha = '".md5($_POST['senha'])."'");

if ( $query->rowCount() != 1 ) {
    die(json_encode(array('status' => false, 'message' => 'Login Invalido')));
}

$ln = $query->fetch();

if(!isset($_SESSION)) {
    session_start();
}

$_SESSION['UsuarioID'] = $ln['id'];
$_SESSION['UsuarioSenha'] = $ln['senha'];
$_SESSION['UsuarioNome'] = $ln['nome'];
$_SESSION['Status'] = $ln['status'];
$_SESSION['UsuarioEmail'] = $ln['email'];

die(json_encode(array('status' => true)));