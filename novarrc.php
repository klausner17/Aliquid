<html>
	<head>
		<meta charset="UTF-8">
		<title>Aliquid</title>
		<link href="css/bootstrap.css" rel="stylesheet">	
		<link href="css/customstyle.css" rel="stylesheet">
		<script src="js/geral.js"></script>
		<style>
			a:hover{text-decoration:none;}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="col-sm-2 menu-lateral">
					<a href="novarnc.php">
						<div class="menu-item">Novo RNC</div>
					</a>
					<div class="item-selecionado">Novo RRC</div>
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
					<a href="index.php">
						<div class="menu-item">Sair</div>
					</a>
				</div>
			</div>
				<form class="form-horizontal conteudo col-sm-10 medium" action="php/cadastrarrrc.php" method="GET">
					<?php
						if (isset($_GET['erro'])){
							if ($_GET['erro'] == "true"){
							?>
								<div class="alert alert-danger">
									Erro ao cadastrar novo RRC.
								</div>
							<?php
							}
							else{
							?>
								<div class="alert alert-success">
									RRC cadastrado com sucesso.
								</div>
							<?php
							}
						}
					?>
					<div class="col-sm-6">
						<label class="control-label">Cliente</label>
						<select class="form-control" name="cliente" id="cliente" onchange="seleciona('cliente')">
							<?php
								include("php/conecta.php");
								$query = "SELECT id, nome FROM cliente ORDER BY nome";
								$result = mysqli_query($conexao, $query);
								while($row = mysqli_fetch_array($result)){
									echo "<option value=\"{$row['id']}\">{$row['nome']}</option>";
								}
							?>
						</select>
					</div>
					<div class="col-sm-6">
						<label class="control-label">Produto</label>
						<select class="form-control" name="produto" id="produto" onchange="seleciona('produto')" >
							<?php
								include("php/conecta.php");
								$query = "SELECT * FROM produto WHERE tipo = 1 ORDER BY codigo";
								$result = mysqli_query($conexao, $query);
								while($row = mysqli_fetch_array($result)){
									echo "<option value=\"{$row['id']}\">{$row['codigo']} - {$row['descricao']}</option>";
								}
							?>
						</select>
					</div>
					<div class="col-sm-6">
						<label class="control-label">Serial</label>
						<input type="text" class="form-control" name="serial">
					</div>
					<div class="col-sm-12">
						<label class=" control-label">Ocorrido</label>
						<textarea class="form-control" name="ocorrido" rows="3" required></textarea>
					</div>
					<div class="col-sm-12">
						<label class=" control-label">Ação imediata</label>
						<textarea class="form-control" name="acao" rows="3" required></textarea>
					</div>
					<div class="col-sm-12">
						<label class=" control-label">Responsável</label>
						<select class="form-control" name="responsavel" id="responsavel" onchange="seleciona('responsavel')">
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
		<?php
			if (isset($_GET['erro'])){
				if ($_GET['erro'] == "true"){
					echo "<script>alert('Erro ao cadastrar RRC.')</script>";	
				}
			}
		?>
	</body>
</html>