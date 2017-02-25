<?php

require_once 'IncludePhp/Model/VarsDB.php';
require_once 'IncludePhp/Model/User.php';
require_once 'IncludePhp/Model/Task.php';

try {
	
	$conn = new PDO( "mysql:host={$server};dbname={$dbname}", $username, $password );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

} catch ( PDOException $e ) {
	echo $e->getMessage();
}


function isUser($user) {

	global $conn;
	
	$sql = "SELECT * FROM chat_users WHERE name=:name and password=:password";
	$parameters = [ 
			':name' => $user->getName(),
			':password' => $user->getPassword() 
	];
	
	try {
	
		$query = $conn->prepare( $sql );
		$query->execute( $parameters );
		
		$re = $query->rowCount();
		$user->setId( $query->fetch( PDO::FETCH_ASSOC )["id"] );
	
	} catch ( PDOException $e ) {
		echo $e->getMessage();
	}
	
	return $re == 1 ? true : false;
}


function readDayTasks($id, $day) {
	
	global $conn;
	
	$sql = "SELECT * FROM tasks where id_user=:id_user and day=:day";
	$parameters = [ 
			':id_user' => $id,
			':day' => $day 
	];
	
	try {
		
		$query = $conn->prepare( $sql );
		$query->setFetchMode( PDO::FETCH_CLASS, 'Task' );
		
		$query->execute( $parameters );
		
	} catch ( PDOException $e ) {
		echo $e->getMessage();
	}
	
	return $query->fetchAll();
}


function createTask($task) {
	
	global $conn;
	
	$sql = "INSERT INTO tasks (`id`, `name`, `id_user`, `text`, `day`)" .
		" VALUES (NULL, :name, :id_user, :text, :day)";
	
	$parameters = [ 
			':name' => $task->getName(),
			':id_user' => $task->getId_user(),
			':text' => $task->getText(),
			':day' => $task->getDay() 
	];
	
	try {
		
		$query = $conn->prepare( $sql );
		$query->execute( $parameters );
	
	} catch ( PDOException $e ) {
		echo $e->getMessage();
	}
}


function readtask($id, $id_user){

	global $conn;

	$sql = "SELECT * FROM tasks WHERE id=:id AND id_user=:id_user";
	$parameters = [
			':id' => $id,
			':id_user' => $id_user
	];

	try {

		$query = $conn->prepare( $sql );
		$query->setFetchMode( PDO::FETCH_CLASS, 'Task' );
		$query->execute( $parameters );

	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	return $query->fetchAll();
}


function readTasks($id_user) {
	
	global $conn;
	
	$sql = "SELECT * FROM tasks WHERE id_user=:id_user ORDER BY day ASC";
	$parameters = [ ':id_user' => $id_user ];
	
	try {
		
		$query = $conn->prepare( $sql );
		$query->setFetchMode( PDO::FETCH_CLASS, 'Task' );
		$query->execute( $parameters );
		
	} catch ( PDOException $e ) {
		echo $e->getMessage();
	}
	
	return $query->fetchAll();
}


function updateTasks($task){
	
	global $conn;
	
	$sql = "UPDATE tasks SET name=:name, text=:text, day=:day WHERE id=:id AND id_user=:id_user";
	$parameters = [
			':name' => $task->getName(),
			':text' => $task->getText(),
			':day' => $task->getDay(),
			':id' => $task->getId(),
			':id_user' => $task->getId_user()
	];
	
	
	
	try {
		
		$query = $conn->prepare( $sql );
		echo $query->execute( $parameters );
			
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}

function deleteTask($id, $id_user){
	
	global $conn;
	
	$sql = "DELETE FROM tasks WHERE id=:id AND id_user=:id_user";
	$parameters = [
			':id' => $id,
			':id_user' => $id_user
	];
	
	try {
	
		$query = $conn->prepare( $sql );
		$query->execute( $parameters );
		
		
	
	} catch (PDOException $e) {
		echo $e->getMessage();
	}	
}

