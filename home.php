<!DOCTYPE html>
<html>
<head>
	<title> Home </title>
	
	<meta charset="utf-8">
	<?php  header('Content-Type: text/html; charset=UTF-8'); ?>
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>

<body>

<?php require_once 'IncludePhp/Controller/Controller.php';?>
<?php require_once 'nav.html';?>

<section class="jumbotron text-center">
      <div class="container">
        <h2 class="jumbotron-heading"> Bem vindo ao Task's</h2>
        <p>       
			User: <?= $_SESSION["user"]->getName(); ?> <br>
			id:   <?= $_SESSION["user"]->getId(); ?> <br>
        </p>
      </div>
</section>

<main class="container">

	<div class="row text-center">
		<?php 		
		searchDayTasks($_SESSION["user"]->getId(), date("Y-m-d"));
		?>
	</div>

</main>

</body>
</html>