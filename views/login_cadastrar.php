<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastrar</title>
		
		<link href="<?php echo BASE; ?>assets/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div id="navbar">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="<?php echo BASE; ?>login">Rede Social</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo BASE; ?>login/entrar">Login</a></li>
						<li><a href="<?php echo BASE; ?>login/cadastrar">Cadastrar</a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="container">
			<h1>Cadastrar</h1>

			<?php if(!empty($erro)): ?>
				<div class="alert alert-danger"><?php echo $erro; ?></div>
			<?php endif; ?>

			<form method="POST">
				<div class="form-group">
					<label for="nome">Nome:</label>
					<input type="text" class="form-control" name="nome" id="nome" />
				</div>
				
				<div class="form-group">
					<label for="email">E-mail:</label>
					<input type="email" class="form-control" name="email" id="email" />
				</div>

				<div class="form-group">
					<label for="senha">Senha:</label>
					<input type="password" class="form-control" name="senha" id="senha"/>
				</div>

				<div class="radio">
					<strong>Sexo:</strong><br/>
					<label><input type="radio" name="sexo" value="0" />Mulher</label><br/>
					<label><input type="radio" name="sexo" value="1" checked="checked" />Homem</label>
				</div>

				<button type="submit" class="btn btn-default">Cadastrar</button>
			
			</form>
		</div>
	</body>
</html>