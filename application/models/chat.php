<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class chat extends CI_model{

	public function chatu($usr)
	{
		$msg=$_POST['msg'];
		$user=$usr;
		echo $msg;
		echo $user;
		$this->db->query("INSERT INTO `chat` (`username`, `msg`) VALUES ( '$user','$msg') ");

		$res=$this->db->query("SELECT `username`, `msg` FROM `chat` ORDER BY `chat_sno` DESC LIMIT 10 ");
		$res=$res->result_array();
		echo $res[$x]['username'];
		for($x=0; $x<10; $x++)
		{
			echo ($res[$x]['username']. " posted: <br> ".$res[$x]['msg'] ."<br><br>");
		}
	}
}