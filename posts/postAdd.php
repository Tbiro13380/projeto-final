<?php 

include '../config/conexao.php';

extract($_POST);

if(!$nome){
    die(json_encode(array("status" => false, "message" => "Insira o nome")));
}

if(!$cpf){
    die(json_encode(array("status" => false, "message" => "Insira o CPF")));
}

if(!$genero){
    die(json_encode(array("status" => false, "message" => "Insira o genero")));
}

if(!$celular){
    die(json_encode(array("status" => false, "message" => "Insira o numero de celular")));
}

if(!$email){
    die(json_encode(array("status" => false, "message" => "Insira o email")));
}

if(!$status){
    die(json_encode(array("status" => false, "message" => "Insira o status")));
}

if(!$senha){
    die(json_encode(array("status" => false, "message" => "Insira a senha")));
}

if(!$datanasc){
    die(json_encode(array("status" => false, "message" => "Insira a data de nascimento")));
}

function clean($string) {
   $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

$data = date('Y-d-m', strtotime($datanasc));

$conn->query("INSERT INTO `clientes`(`nome`, `cpf`, `genero`, `celular`, `email`, `status`, `senha`, `datanasc`) VALUES ('$nome', '".clean($cpf)."', '$genero', '".clean($celular)."', '$email', '$status', '".md5($senha)."', '".$data."')");

die(json_encode(array("status" => true, "message" => "Usuario Cadastrado")));
