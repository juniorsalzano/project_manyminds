<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['title'] = "Login - Manyminds";
		$this->load->view('pages/login',$data);
	}

	public function store(){
		$this->load->model("usuario_model");
		$email    = $_POST['email'];
		$password = md5($_POST['password']);

		$user = $this->usuario_model->login($email,$password);

		if($user) {
			$this->session->set_userdata("logged_user" ,$user);
			$this->session->set_userdata("tipoOperador",$user['tipo']);
			$this->session->set_userdata("id_logado"   ,$user['id']);
			redirect("dashboard");
		} else {
			redirect("login");
		}
	}

	public function logout(){
		$this->session->unset_userdata("logged_user",$user);
		redirect("login");
	}
}
