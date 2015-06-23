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
				<div class="col-sm-2 menu-lateral">
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
					<a href="lote.php">
						<div class="menu-item">Lotes</div>
					</a>
					<div class="item-selecionado">Usuários</div>
					<a href="index.php">
						<div class="menu-item">Sair</div>
					</a>
				</div>
				<div class="conteudo col-sm-10">
					<form class="form-horizontal medium" action="php/cadastrarusuario.php" method="GET">
						<?php
						if (isset($_GET['erro'])){
							if ($_GET['erro'] == "true"){
							?>
								<div class="alert alert-danger">
									Erro ao cadastrar novo usuário.
								</div>
							<?php
							}
							else{
							?>
								<div class="alert alert-success">
									Usuário cadastrado com sucesso.
								</div>
							<?php
							}
						}
						?>
						<div class="col-sm-6">
							<label class="control-label">Nome</label>
							<input type="text" class="form-control" name="nome">
						</div>
						<div class="col-sm-6">
							<label class="control-label">Sobrenome</label>
							<input type="text" class="form-control" name="sobrenome">
						</div>
						<div class="col-sm-6">
							<label class="control-label">Login</label>
							<input type="text" class="form-control" name="login">
						</div>
						<div class="col-sm-6">
							<label class="control-label">Senha</label>
							<input type="password" class="form-control" name="senha">
						</div>
						<div class="col-sm-6">
							<input type="checkbox" name="responsavel" value="1">
							<label class="control-label">Reponsável?</label>
						</div>
						<div class="col-sm-12" style="margin-top: 15px">
							<input type="submit" class="btn btn-info medium" value="Cadastrar">
						</div>
					</form>
					<div class="col-sm-12" style="margin-top:50px;">
						<?php
						include("php/funcoes.php");
						consultar_usuario();
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>