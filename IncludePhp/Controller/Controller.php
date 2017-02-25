<?php

require_once 'IncludePhp/Model/User.php';
require_once 'DataBaseUtil.php';

session_start();

function autenticate($name, $password){
	
	$user = new User();
	
	$user->setName($name);
	$user->setPassword($password);
	
	if(isUser($user)){
		
		$_SESSION["user"] = $user;
		header("location:home.php");		
	} else {
		
		echo "<h5> Password or User is incorrect </h5>";
	}	
}

function searchDayTasks($id, $date){
	
	$result = readDayTasks($id, $date);
		
	if(count($result) == 0){	
		echo "<h3 class='container'>Não há Tarefas para hoje </h3><br>";
		
	}else{
		
		echo "<h3 class='container'>Ha ".count($result)." tarefas para hoje </h3><br>";
		foreach ( $result as $t ){
		
			print "<div class='col-lg-4'>";
			print "<h2>".$t->getName()."</h2>";
			print "id:".$t->getId();
			print "<p>".$t->getText()."</p>";
			print "<p>".$t->getDay()."</p>";
			print "</div>";
		}
	}
}


function makeTask($name, $text, $day, $id_user){
	
	$task = new Task();
	
	$task->setName($name);
	$task->setId_user($id_user);
	$task->setText($text);
	$task->setDay($day);
	
	createTask($task);
}


function searchUserTasks($id_user){
	
	$result = readTasks($id_user);
	
	if(count($result) == 0){
		echo "<h3 class='container'> Não há Tarefas para voce </h3><br>";
	
	}else{
		echo "<h3 class='container'> Há ".count($result)." tarefas no total </h3><br>";
		
		foreach ( $result as $t ){
			echo  "<div class='col-lg-5'>";
			echo  "<h2>".$t->getName()."</h2>";
			echo  "<h6> id:".$t->getId()." </h6>";
			echo  "<p>".$t->getText()."</p>";
			echo  "<h5>".$t->getDay()."</h5>";
			echo  "</div>";
		}
	}	
}


function changeTasks($id ,$name, $text, $day, $id_user){
	
	$task = new Task();
	
	$task->setId($id);
	$task->setName($name);
	$task->setText($text);
	$task->setDay($day);
	$task->setId_user($id_user);
	
	updateTasks($task);
}


