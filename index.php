<html>
	<head>
		<meta charset="UTF-8">
		<title>Aliquid Login</title>
		<link href="css/bootstrap.css" rel="stylesheet">	
		<link href="css/customstyle.css" rel="stylesheet">
	</head>
	<body>
		<div class="container back-container col-sm-12 medium">
			<div class="col-sm-3"></div>
			<form class="form-horizontal col-sm-6" action="php/login.php" method="GET">
				<?php
						setcookie('aliquid_user');
						if (isset($_GET['erro'])){
						?>
							<div class="alert alert-danger">
								Erro ao tentar entrar no sistema. Verifique sua senha e seu login.
							</div>
						<?php
						}
					?>
				<h1>Aliquid - Controle de RNC e RRC</h1>
				<label class="control-label">Login</label>
				<input type="text" class="form-control" name="login" placeholder="Login" required>
				<label class="control-label">Senha</label>
				<input type="password" class="form-control" name="senha" placeholder="******" required>
				<input class="btn btn-info medium" style="margin-top:15px" type="submit" value="Entrar">
			</form>
		</div>
	</body>
</html>