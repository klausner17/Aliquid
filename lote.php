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
				<a href="cliente.php">
					<div class="menu-item">Clientes</div>
				</a>
				<div class="item-selecionado">Lotes</div>
				<a href="usuario.php">
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
									Erro ao cadastrar lote.
								</div>
							<?php
							}
							else{
							?>
								<div class="alert alert-success">
									Lote cadastrado com sucesso.
								</div>
							<?php
							}
						}
					?>
					<form class="form-horizontal col-sm-10 medium" action="php/cadastrarlote.php" method="GET">
						<div class="col-sm-12">
							<div class="col-sm-4">
								<label class="control-label">Código</label>
								<input type="text" class="form-control" name="codigo">
							</div>
							<div class="col-sm-10">
								<label class="control-label">Descrição</label>
								<input type="text" class="form-control" name="descricao">
							</div>
							<div class="col-sm-12" style="margin-top: 15px">
								<input type="submit" class="btn btn-info medium" value="Cadastrar">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
			if (isset($_GET['erro'])){
				if ($_GET['erro'] == "true"){
					echo "<script>alert('Erro ao cadastrar lote.')</script>";	
				}
			}
		?>
	</body>
</html>