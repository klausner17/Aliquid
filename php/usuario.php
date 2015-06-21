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

function cadastrar_usuario($nome="", $sobrenome="",$login="", $senha="", $responsavel="" ){
	include("conecta.php");
	$query = "INSERT INTO usuario (id, login, nome, sobrenome, senha, responsavel)VALUES (DEFAULT, '{$login}', '{$nome}', '{$sobrenome}', '{$senha}', {$responsavel});";
	mysqli_query($conexao, $query);
}