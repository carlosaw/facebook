<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Facebook</title>
		
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
						<li><a href="<?php echo BASE; ?>login/sair">Sair</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<?php 
				$this->loadViewInTemplate($viewName, $viewData); 
			?>
		</div>
	</body>
</html>