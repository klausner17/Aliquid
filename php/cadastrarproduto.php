<?php
	include("funcoes.php");
	$codigo = $_GET['codigo'];
	$descricao = $_GET['descricao'];
	$custo = $_GET['custo'];
	$tipo = $_GET['tipo'];
	cadastrar_produto($codigo, $descricao, $custo, $tipo);
?>