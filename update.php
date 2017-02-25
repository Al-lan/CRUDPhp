<!DOCTYPE html>
<html>

<head>
	<title> Update Tasks </title>
	
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

<?php
$task;
if($_GET["id"] == null){
	echo "<p> Digite o id da tarefa para modificar </p> ";
}else{
	$task = readtask($_GET["id"], $_SESSION["user"]->getId())["0"];
}
?>

<section class="container-fluid">	
	
	<form method="get" action="#">
		
	<p>
	<label> 
		Id: <br>
		<input type="text" name="id" class="form-control" required="required">
	</label>
	</p>
	
	<button type="submit" > Enviar </button>
	
	</form>

</section>

<br> 

<section class="container-fluid">

<?php if($_GET["id"] != null): ?>

<form method="post" action="#">
	
	<p>
	<label> 
		Nome da Tarefa:<br>
		<input type="text" name="name" placeholder="nome" class="form-control" required="required" 
			value="<?=$task->getName()?>" >
	</label>
	</p>
	<p>
	<label> 
		Texto:<br>
		<textarea cols="20" rows="8" name="text" placeholder="Digite a tarefa aqui" 
			class="form-control" required="required"> <?=$task->getText()?> </textarea>
	</label>
	</p>
	<p>
	<label> 
		Dia:<br>
		<input type="date" name="day" class="form-control" required="required" value="<?=$task->getDay()?>">
	</label>
	</p>
	
	<button type="submit"> Enviar </button>

</form>

<?php else: ?>
	<br> <br> <p> Nenhum id colocado </p>	
<?php endif; ?>

</section>

<?php  

if ($_POST["name"] != null) {
	changeTasks($_GET["id"], $_POST["name"], $_POST["text"], $_POST["day"], $_SESSION["user"]->getId());
}
?>

</main>

</body>
</html>
