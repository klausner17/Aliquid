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

function consultar_rnc(){
	include ("conecta.php");
	$query = "SELECT reg.id, us.nome, pe.descricao, lo.descricao, re.nome
				FROM rnc reg, usuario us, produto pe, lote lo, usuario re
				WHERE 
						reg.id_usuario =  us.id 
					and	reg.id_peca = pe.id
					and	reg.id_lote = lo.id
					and reg.responsavel = re.id
				ORDER BY id;";
	$result = mysqli_query($conexao, $query);
	?>
	<table class="table">
		<tr>
			<td><b>Id</b></td>
			<td><b>Criador</b></td>
			<td><b>Peça</b></td>
			<td><b>Lote</b></td>
			<td><b>Responsavel</b></td>
		</tr>
		<tr>
	<?php
	while($row = mysqli_fetch_array($result)){
		echo "<td>{$row[0]}</td>";
		echo "<td>{$row[1]}</td>";
		echo "<td>{$row[2]}</td>";
		echo "<td>{$row[3]}</td>";
		echo "<td>{$row[4]}</td>";
		echo "<td><a href='detalhernc.php?id={$row[0]}'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a></td>";
		echo "<td><a href='php/removerrnc.php?id={$row[0]}'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>";
		echo "</tr>";
	}
	echo "</table>";
}

function consultar_rrc(){
	include ("conecta.php");
	$query = "SELECT reg.id, us.nome, cl.nome, pr.descricao, reg.serial, re.nome
				FROM rrc reg, usuario us, produto pr, cliente cl, usuario re
				WHERE 
						reg.id_usuario =  us.id 
					and	reg.id_produto = pr.id
					and	reg.id_cliente = cl.id
					and reg.responsavel = re.id
				ORDER BY id;";
	$result = mysqli_query($conexao, $query);
	?>
	<table class="table">
		<tr>
			<td><b>Id</b></td>
			<td><b>Criador</b></td>
			<td><b>Cliente</b></td>
			<td><b>Produto</b></td>
			<td><b>Serial</b></td>
			<td><b>Responsavel</b></td>
		</tr>
		<tr>
	<?php
	while($row = mysqli_fetch_array($result)){
		echo "<td>{$row[0]}</td>";
		echo "<td>{$row[1]}</td>";
		echo "<td>{$row[2]}</td>";
		echo "<td>{$row[3]}</td>";
		echo "<td>{$row[4]}</td>";
		echo "<td>{$row[5]}</td>";
		echo "<td><a href='php/consultarRrcCompleto.php?id={$row[0]}'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a></td>";
		echo "<td><a href='php/removerrrc.php?id={$row[0]}'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>";
		echo "</tr>";
	}
	echo "</table>";
}

function consultar_usuario(){
	include ("conecta.php");
	$query = "SELECT id, nome, sobrenome, login, responsavel
				FROM usuario
				ORDER BY nome;";
	$result = mysqli_query($conexao, $query);
	?>
	<table class="table">
		<tr>
			<td><b>Id</b></td>
			<td><b>Nome</b></td>
			<td><b>sobrenome</b></td>
			<td><b>Login</b></td>
			<td><b>Responsavel</b></td>
		</tr>
		<tr>
	<?php
	while($row = mysqli_fetch_array($result)){
		echo "<td>{$row[0]}</td>";
		echo "<td>{$row[1]}</td>";
		echo "<td>{$row[2]}</td>";
		echo "<td>{$row[3]}</td>";
		if ($row[4] == 0)
			echo "<td>não</td>";
		else
			echo "<td>sim</td>";
		echo "<td><a href='php/removerusuario.php?id={$row[0]}'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>";
		echo "</tr>";
	}
	echo "</table>";
}

function consultar_lote(){
	include ("conecta.php");
	$query = "SELECT id, codigo, descricao
				FROM lote
				ORDER BY codigo;";
	$result = mysqli_query($conexao, $query);
	?>
	<table class="table">
		<tr>
			<td><b>Id</b></td>
			<td><b>Codigo</b></td>
			<td><b>Descrição</b></td>
		</tr>
		<tr>
	<?php
	while($row = mysqli_fetch_array($result)){
		echo "<td>{$row[0]}</td>";
		echo "<td>{$row[1]}</td>";
		echo "<td>{$row[2]}</td>";
		echo "<td><a href='php/removerlote.php?id={$row[0]}'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>";
		echo "</tr>";
	}
	echo "</table>";
}

function consultar_cliente(){
	include ("conecta.php");
	$query = "SELECT id, nome, telefone, regiao
				FROM cliente
				ORDER BY nome;";
	$result = mysqli_query($conexao, $query);
	?>
	<table class="table">
		<tr>
			<td><b>Id</b></td>
			<td><b>Nome</b></td>
			<td><b>Telefone</b></td>
			<td><b>Regiaõ</b></td>
		</tr>
		<tr>
	<?php
	while($row = mysqli_fetch_array($result)){
		echo "<td>{$row[0]}</td>";
		echo "<td>{$row[1]}</td>";
		echo "<td>{$row[2]}</td>";
		echo "<td>{$row[3]}</td>";
		echo "<td><a href='php/removercliente.php?id={$row[0]}'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>";
		echo "</tr>";
	}
	echo "</table>";
}

function consultar_produto(){
	include ("conecta.php");
	$query = "SELECT id, codigo, descricao, custo, tipo
				FROM produto
				ORDER BY codigo;";
	$result = mysqli_query($conexao, $query);
	?>
	<table class="table">
		<tr>
			<td><b>Id</b></td>
			<td><b>Código</b></td>
			<td><b>Descrição</b></td>
			<td><b>Custo</b></td>
			<td><b>Tipo</b></td>
		</tr>
		<tr>
	<?php
	while($row = mysqli_fetch_array($result)){
		echo "<td>{$row[0]}</td>";
		echo "<td>{$row[1]}</td>";
		echo "<td>{$row[2]}</td>";
		echo "<td>{$row[3]}</td>";
		if ($row[4] == 0)
			echo "<td>peça</td>";
		else
			echo "<td>produto</td>";
		echo "<td><a href='php/removerproduto.php?id={$row[0]}'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>";
		echo "</tr>";
	}
	echo "</table>";
}

function exibirRncCompleta($id=""){
	include ("conecta.php");
	$query = "SELECT reg.id, us.nome, pe.descricao, lo.descricao, reg.ocorrido, reg.acao_imediata, re.nome
				FROM rnc reg, usuario us, produto pe, lote lo, usuario re
				WHERE 
						reg.id_usuario =  us.id 
					and	reg.id_peca = pe.id
					and	reg.id_lote = lo.id
					and reg.responsavel = re.id
					and reg.id = {$id}
				ORDER BY reg.id DESC";
	$result = mysqli_query($conexao, $query);
	$row = mysqli_fetch_array($result);
	echo "<p>{$row[0]}</p>
	<p>{$row[1]}</p>
	<p>{$row[2]}</p>
	<p>{$row[3]}</p>
	<p>{$row[4]}</p>
	<p>{$row[5]}</p>
	<p>{$row[6]}</p>";
}

function excluir_usuario($id=""){
	include ("conecta.php");
	$query = "DELETE FROM usuario WHERE id = {$id};";
	mysqli_query($conexao, $query);
	header("Location: ../usuario.php");
}

function excluir_lote($id=""){
	include ("conecta.php");
	$query = "DELETE FROM lote WHERE id = {$id};";
	mysqli_query($conexao, $query);
	header("Location: ../lote.php");
}

function excluir_cliente($id=""){
	include ("conecta.php");
	$query = "DELETE FROM cliente WHERE id = {$id};";
	mysqli_query($conexao, $query);
	header("Location: ../cliente.php");
}

function excluir_produto($id=""){
	include ("conecta.php");
	$query = "DELETE FROM produto WHERE id = {$id};";
	mysqli_query($conexao, $query);
	header("Location: ../produtos.php");
}

function excluir_rnc($id=""){
	include ("conecta.php");
	$query = "DELETE FROM rnc WHERE id = {$id};";
	mysqli_query($conexao, $query);
	header("Location: ../consularrnc.php");
}
function excluir_rrc($id=""){
	include ("conecta.php");
	$query = "DELETE FROM rrc WHERE id = {$id};";
	mysqli_query($conexao, $query);
	header("Location: ../consultarrrc.php");
}