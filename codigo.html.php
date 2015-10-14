<?php

	$entidad = $oficina = $dc = $cuenta = "";

?>

<html>
<head>
	<title>CCC</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.css">
</head>
<body>
	<div class="container">
	<h1>Formulario de Cuenta Codigo Cliente</h1>
	<br>
	<hr>
	<br>
	<form action="" method="post">
		<div class="form-group">
			<label for="codigo1">Entidad:
				<input type="text" name="entidad">
			</label>
		</div>
		<br>
		<div class="form-group">	
			<label for="codigo2">Oficina:
				<input type="text" name="oficina">
			</label>
		</div>
		<br>
		<div class="form-group">	
			<label for="codigo3">DC:
				<input type="text" name="dc">
			</label>
		</div>
		<br>
		<div class="form-group">	
			<label for="codigo4">Cuenta:
				<input type="text" name="cuenta">
			</label>
		</div>
		<br>
		<hr>
		<br>
		<div>
			<input type="submit" class="btn btn-info" value="Comprobar">
		</div>
	</form>
	</div>
</body>
</html>