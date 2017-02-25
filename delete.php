<!DOCTYPE html>
<html>

<head>
	<title> update Tasks </title>

	<meta charset="utf-8">
	<?php  header('Content-Type: text/html; charset=UTF-8'); ?>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
<?php require_once 'IncludePhp/Controller/Controller.php';?>
<?php require_once 'nav.html';?>

<main>

<section class="container-fluid">	
	
	<h3> Digite o id sa tarefa para deleta-la </h3>
	
	<form method="post" action="#">
	
	<p>
	<label> 
		Id: <br>
		<input type="text" name="id" class="form-control" required="required">
	</label>
	</p>
	
	<button type="submit" > Enviar </button>
	
	</form>

</section>
<?php 
if($_POST["id"] != null){
	deleteTask($_POST["id"], $_SESSION["user"]->getId());
}
?>
</main>

</body>
</html>

