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
				<div class="item-selecionado">Consulta de RNC</div>
				<a href="consultarrrc.php">
					<div class="menu-item">Consulta de RRC</div>
				</a>
				<a href="produtos.php">
					<div class="meu-item">Produtos e peças</div>
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