<?php
function login($login = "", $senha = ""){
	include("conecta.php");
	$query = "SELECT * FROM usuario WHERE login LIKE '{$login}'";
	$result = mysqli_query($conexao, $query);
	$row = mysqli_fetch_assoc($result);
	if ($row == null){
		header("Location: ../index.php?erro=true");
	}
	else{
		if ($row['senha'] != $senha){
			header("Location: ../index.php?erro=true");
		}
		else{
			setcookie("aliquid_user",$row['id']);
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

function cadastrar_rnc($usuario="", $peca="", $lote="", $qtde="", $ocorrido="", $acao="", $responsavel=""){
	include("conecta.php");
	$query = "INSERT INTO rnc (id, id_usuario, id_peca, id_lote, quantidade, ocorrido, acao_imediata, responsavel) VALUES (DEFAULT, {$usuario}, {$peca}, {$lote}, {$qtde}, '{$ocorrido}', '{$acao}', {$responsavel});";
	if (mysqli_query($conexao, $query) == 1){
		header("Location: ../novarnc.php?erro=false");
	}else{
		header("Location: ../novarnc.php?erro=true");
	}
}

function cadastrar_rrc($usuario, $produto, $cliente, $serial, $ocorrido, $acao, $responsavel){
	include("conecta.php");
	$query = "INSERT INTO rrc (id, id_usuario, id_produto, id_cliente, serial, ocorrido, acao, responsavel) VALUES (DEFAULT, {$usuario}, {$produto}, {$cliente}, '{$serial}', '{$ocorrido}', '{$acao}', {$responsavel});";
	if (mysqli_query($conexao, $query) == 1){
		header("Location: ../novarrc.php?erro=false");
	}else{
		header("Location: ../novarrc.php?erro=true");
	}
}
