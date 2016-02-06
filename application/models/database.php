<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class database extends CI_model{

	public function login() {

		$user= $_POST['username'];
		$pass= $_POST['password'];
		$query=$this->db->query("SELECT * FROM `basic` WHERE `username`= '$user'  ");
		$query=$query->result_array();
		var_dump($query);
		// var_dump($query);
		if($user and $pass)
		{	
			//echo $pass ;
			echo $query[0]['password'];
			if($query[0]['password']==$pass)
			{	echo 'jkds';
				echo('You have been logged in !');
				return $user;
			}
		}
		if(!$user)
		{
			echo('You have not entered the username !');
			return '10';
		}
		if(!$pass)
		{
			echo('You have not entered the password !');
			return '10';
		}
		if(!$query)
		{
			echo('This account does not exist. Create a new account ! ');
			return '20';
		}

		

	}

	public function register() {
		$name= $_POST['name'];
		$chat_id= $_POST['chat_id'];
		$user= $_POST['username'];
		$pass1= $_POST['password1'];
		$pass2=$_POST['password2'];
		$query=$this->db->query("SELECT * FROM `basic` WHERE `username` = '$user' ");
		$query=$query->result_array();
		//var_dump($query);
		//echo array_key_exists('username', $query);
		//echo sizeof($query);
		if(sizeof($query)!=0)
		{
			echo("Username is already in use . Please try another username. Eg- <i>$user".rand(1,50)."</i> .");
			return '20';
		}
		if($pass1 != $pass2)
		{
			echo('Passwords donot match ! ');
			return '20';
		}
		echo('You have been successfully registered');
		$this->db->query("INSERT INTO `basic` (`Name`, `chat_id`, `username`, `password`) VALUES ('$name', '$chat_id', '$user', '$pass1')  ");
		return $user;
	}
}

 ?>