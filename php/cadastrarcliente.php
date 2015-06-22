<?php
	include("funcoes.php");
	$nome = $_GET['nome'];
	$telefone = $_GET['telefone'];
	$regiao = $_GET['regiao'];
	cadastrar_cliente($nome, $telefone,$regiao);
?>