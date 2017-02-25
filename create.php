<!DOCTYPE html>
<html>

<head>
	<title> Create Task </title>
	
	<meta charset="utf-8">
	<?php  header('Content-Type: text/html; charset=UTF-8'); ?>
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>

<?php require_once 'IncludePhp/Controller/Controller.php'; ?>
<?php require_once 'nav.html';?>


<main class="container ">

<h2> Criar Tarefa</h2>

<form method="post" action="#">
	
	<p>
	<label> 
		Nome da Tarefa:<br>
		<input type="text" name="name" placeholder="nome" class="form-control" required="required">
	</label>
	</p>
	<p>
	<label> 
		Texto:<br>
		<textarea cols="20" rows="8" name="text" placeholder="Digite a tarefa aqui" 
			class="form-control" required="required"></textarea>
	</label>
	</p>
	<p>
	<label> 
		Data:<br>
		<input type="date" name="date" class="form-control" required="required">
	</label>
	</p>
	
	<button type="submit"> Enviar </button>

</form>

<?php  
	if ($_POST ["name"] != null) {
		makeTask( $_POST ["name"], $_POST ["text"], $_POST["date"], $_SESSION["user"]->getId());
	}
?>

</main>

</body>
</html>