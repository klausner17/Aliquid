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
				<div class="item-selecionado">Produtos e peças</div>
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
					<form class="form-horizontal col-sm-10 medium" action="php/cadastrarproduto.php" method="GET">
						<div class="col-sm-6">
							<label class="control-label">Código</label>
							<input type="text" class="form-control" name="codigo">
							<label class="control-label">Descrição</label>
							<input type="text" class="form-control" name="descricao">
							<label class="control-label">Custo</label>
							<input type="text" class="form-control" name="custo">
							<input type="radio" name="tipo" value="0" checked>
							<label class="control-label">Peça</label>
							<input type="radio" name="tipo" value="1">
							<label class="control-label">Produto</label>
						</div>
						<div class="col-sm-12" style="margin-top: 15px">
							<input type="submit" class="btn btn-info medium" value="Cadastrar">
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
			if (isset($_GET['erro'])){
				if ($_GET['erro'] == "true"){
					echo "<script>alert('Erro ao cadastrar produto.')</script>";	
				}
			}
		?>
	</body>
</html>