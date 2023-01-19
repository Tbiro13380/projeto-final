<?php 

include '../config/conexao.php';

extract($_POST);

function clean($string) {
   $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

$conn->query("UPDATE clientes SET `nome`='$nome', `cpf`='".clean($cpf)."', `genero`='".$genero."', `celular`='".clean($celular)."', `email`='$email', `status`='$status', `senha`='".md5($senha)."', `datanasc`='".date('Y-d-m', strtotime($datanasc))."' WHERE `id` = $ID");

die(json_encode(array("status" => true, "message" => "Dados Atualizados")));
