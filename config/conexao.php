<?php

define("HOST", "localhost:3307");
define("BANCO", "feras_projeto");
define("USER", "root");
define("PASS", "root");

try{
	$conn = new PDO("mysql:host=".HOST.";dbname=".BANCO."", USER, PASS);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->exec("set names utf8");
}catch(PDOException $e){
	echo "Erro na conexão com banco de dados: " . $e->getMessage();
}