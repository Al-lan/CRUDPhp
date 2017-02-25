<?php


class Task{

	private $id;
	private $name;
	private $id_user;
	private $text;
	private  $day;

	function getId(){
		return $this->id;
	}
	
	function setId($id){
		$this->id = $id;
	}
		
	function getName(){
		return $this->name;
	}

	function setName($name){
		$this->name = $name;
	}

	function getId_user(){
		return $this->id_user;
	}
	
	function setId_user($id_user){
		$this->id_user = $id_user;
	}
	
	function getText(){
		return $this->text;
	}
	
	function setText($text){
		$this->text = $text;
	}
	
	function getDay(){
		return $this->day;
	}

	function setDay($day){
		$this->day = $day;
	}

}