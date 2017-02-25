<!DOCTYPE html>
<html>
<head>
	<title> Read Task </title>
	
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
	<section class="row">
		<?php 
		searchUserTasks($_SESSION["user"]->getId());
		?>
	</section>
</main>

</body>
</html>