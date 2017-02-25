<!DOCTYPE html>
<html>
<head>
	<title> Tasks </title>
	
	<meta charset="utf-8">
	<?php  header('Content-Type: text/html; charset=UTF-8'); ?>
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>

<?php require_once 'IncludePhp/Controller/Controller.php';?>

<main class="container-fluid bg-1 text-center">

<h1> Tarefas </h1>

<form method="post" action="#">
	
	<p>
		<label> Usuario: <br> <br>
		<input type="text" name="name"	placeholder="Usuario" class="form-control">
		</label>
	</p>
	
	<p>
		<label> Senha: <br> <br>
		<input type="Password" name="password" placeholder="Senha" class="form-control">
		</label>
	</p>

	<button type="submit"> Entrar </button>

</form>

	
<?php  
	if ($_POST ["name"] != null || $_POST["password"] != null) {
		autenticate ( $_POST ["name"], $_POST ["password"] );
	}
?>
</main>

</body>
</html>