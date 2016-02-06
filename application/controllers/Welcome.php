<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function index()
	{
		//$this->load->helper('url');
		//$this->load->view('welcome_message');
		$this->load->view('Home.html');

		

		//$this->load->view('index.html');
	}
	public function Fun()
	{
		//$this->load->model('database');
		$this->load->view('Register.html');

		# code...
	}
	//In model if there is only funtion,then name the function same asthe class name, then you 
	//wont have to explicitly call the function afrom the controller. Only loading the 
	//particuler will do.

	public function login()
	{
		$this->load->model('database');
		$q=$this->database->login();
		//var_dump($q);
		if($q=='10')
		{
			 $q=$this->database->login();
		}
		if($q=='20')
		{
			$q=$this->database->register();
		}
		else
		{
			//$this->load->model('chat');
			//$this->chat->chatu($q);
			//Load the page after the register or login has been done.
			//echo "kjsdfhnkl";
			$data['xx']=$q;
			$this->load->view('Chat_Page.html', $data);
		}
	}

	public function register()
	{

		$this->load->model('database');
		$q=$this->database->register();
		if( $q=='20')
		{	
			// $this->load->view('index.html');
			$q=$this->database->register();
		}
		else 
		{
			//$this->load->model('chat');
			//$this->chat->chatu($q);
			$data['xx']=$q;
			$this->load->view('Chat_Page.html', $data);

			//Load the home page after the register or login is done.
		}
	}

	public function chat()
	{
		

		$this->load->model('chat');
		$user=$_GET['usr'];
		//$user=$_usr;
		$this->chat->chatu($user);
	}
}
