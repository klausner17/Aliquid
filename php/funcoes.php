<?php
function login($login = "", $senha = ""){
	include("conecta.php");
	$query = "SELECT * FROM usuario WHERE login LIKE '{$login}'";
	$result = mysqli_query($conexao, $query);
	if (($nro_retorno = mysqli_num_rows($result)) == 0){
		header("Location: ../index.php?erro=true");
	}
	else{
		if (mysqli_fetch_array($result)['senha'] != $senha){
			header("Location: ../index.php?erro=true");
		}
		else{
			setcookie("login_aliquid", $login);
			header("Location: ../novarnc.php");
		}
	}
}

function cadastrar_usuario($nome="", $sobrenome="",$login="", $senha="", $responsavel=""){
	include("conecta.php");
	$query = "INSERT INTO usuario (id, login, nome, sobrenome, senha, responsavel)VALUES (DEFAULT, '{$login}', '{$nome}', '{$sobrenome}', '{$senha}', {$responsavel});";
	if (mysqli_query($conexao, $query) == 1){
		header("Location: ../usuario.php?erro=false");
	}else{
		header("Location: ../usuario.php?erro=true");
	}
}

function cadastrar_lote($codigo="", $descricao=""){
	include("conecta.php");
	$query = "INSERT INTO lote (id, codigo, descricao)VALUES (DEFAULT, '{$codigo}', '{$descricao}');";
	if (mysqli_query($conexao, $query) == 1){
		header("Location: ../lote.php?erro=false");
	}else{
		header("Location: ../lote.php?erro=true");
	}
}

function cadastrar_cliente($nome="", $telefone="", $regiao=""){
	include("conecta.php");
	$query = "INSERT INTO cliente (id, nome, telefone, regiao) VALUES (DEFAULT, '{$nome}', '{$telefone}', '{$regiao}');";
	if (mysqli_query($conexao, $query) == 1){
		header("Location: ../cliente.php?erro=false");
	}else{
		header("Location: ../cliente.php?erro=true");
	}
}

function cadastrar_produto($codigo="", $descricao="", $custo="", $tipo=""){
	include("conecta.php");
	$query = "INSERT INTO produto (id, codigo, descricao, custo, tipo) VALUES (DEFAULT, '{$codigo}', '{$descricao}', {$custo}, {$tipo});";
	if (mysqli_query($conexao, $query) == 1){
		header("Location: ../produtos.php?erro=false");
	}else{
		header("Location: ../produtos.php?erro=true");
	}
}