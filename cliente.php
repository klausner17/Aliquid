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
				<a href="novarnc.php">
					<div class="menu-item">Novo RNC</div>
				</a>
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
				<div class="item-selecionado">Clientes</div>
				<a href="lote.php">
					<div class="menu-item">Lotes</div>
				</a>
				<a href="usuariorio.php">
					<div class="menu-item">Usuários</div>
				</a>
				<a href="index.php">
					<div class="menu-item">Sair</div>
				</a>
			</div>
				<div class="span10 col-sm-10 conteudo">
					<?php
						if (isset($_GET['erro'])){
							if ($_GET['erro'] == "true"){
							?>
								<div class="alert alert-danger">
									Erro ao cadastrar cliente.
								</div>
							<?php
							}
							else{
							?>
								<div class="alert alert-success">
									Cliente cadastrado com sucesso.
								</div>
							<?php
							}
						}
					?>
					<form class="form-horizontal col-sm-10 medium" action="php/cadastrarcliente.php" method="GET">
						<div class="col-sm-6">
							<label class="control-label">Nome</label>
							<input type="text" class="form-control" name="nome">
							<label class="control-label">Telefone</label>
							<input type="text" class="form-control" name="telefone">
							<label class="control-label">Região</label>
							<select class="form-control" name="regiao">
								<option>Centro-Oeste</option>
								<option>Nordeste</option>
								<option>Norte</option>
								<option>Sudeste</option>
								<option>Sul</option>
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