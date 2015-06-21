<html>
	<head>
		<meta charset="UTF-8">
		<title>Aliquid</title>
		<link href="css/bootstrap.css" rel="stylesheet">	
		<link href="css/customstyle.css" rel="stylesheet">
		<style>
			a:hover{text-decoration:none;}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span10 col-sm-2 menu-lateral">
				<div class="item-selecionado">Novo RNC</div>
				<a href="novarrc.php">
					<div class="menu-item">Novo RRC</div>
				</a>
				<a href="consularrnc.php">
					<div class="menu-item">Consulta de RNC</div>
				</a>
				<a href="consultarrrc.php">
					<div class="menu-item">Consulta de RRC</div>
				</a>
				<a href="produtos.php">
					<div class="menu-item">Produtos e peças</div>
				</a>
				<a href="cliente.php">
					<div class="menu-item">Clientes</div>
				</a>
				<a href="lote.php">
					<div class="menu-item">Lotes</div>
				</a>
				<a href="usuario.php">
					<div class="menu-item">Usuários</div>
				</a>
			</div>
				<div class="span10 col-sm-10 conteudo">
					<form class="form-horizontal col-sm-10 medium" action="php/cadastrarrnc.php" method="GET">
						<div class="col-sm-7">
							<label class="control-label">Peça danificada</label>
							<select class="form-control">
								<?php
									include("php/conecta.php");
									$query = "SELECT id, codigo, descricao FROM produto WHERE tipo = 0 ORDER BY codigo";
									$result = mysqli_query($conexao, $query);
									while($row = mysqli_fetch_array($result)){
										echo "<option value=\"{$row['id']}\">{$row['codigo']} - {$row['descricao']}</option>";
									}
								?>
							</select>
						</div>
						<div class="col-sm-3">
							<label class="control-label">Lote da peça</label>
							<select class="form-control">
								<?php
									include("php/conecta.php");
									$query = "SELECT * FROM lote ORDER BY codigo";
									$result = mysqli_query($conexao, $query);
									while($row = mysqli_fetch_array($result)){
										echo "<option value=\"{$row['id']}\">{$row['codigo']} - {$row['descricao']}</option>";
									}
								?>
							</select>
						</div>
						<div class="col-sm-2">
							<label class="control-label">Quantidade</label>
							<input type="text" class="form-control" name="qtde" required>
						</div>
						<div class="col-sm-12">
							<label class=" control-label">Ocorrido</label>
							<textarea class="form-control" name="ocorrido" rows="3" required></textarea>
						</div>
						<div class="col-sm-12">
							<label class=" control-label">Ação imediata</label>
							<textarea class="form-control" name="acaoimediata" rows="3" required></textarea>
						</div>
						
						<div class="col-sm-12">
							<label class=" control-label">Responsável</label>
							<select class="form-control">
								<?php
									include("php/conecta.php");
									$query = "SELECT id, nome, sobrenome FROM usuario WHERE responsavel = 1 ORDER BY nome";
									$result = mysqli_query($conexao, $query);
									while($row = mysqli_fetch_array($result)){
										echo "<option value=\"{$row['id']}\">{$row['nome']} {$row['sobrenome']}</option>";
									}
								?>
							</select>
						</div>
						<div class="col-sm-12" style="margin-top: 15px">
							<input type="submit" class="btn btn-info medium" value="Cadastrar">
						</div>

					</form>
				</div>
			</div>
		</div>
	</body>
</html>