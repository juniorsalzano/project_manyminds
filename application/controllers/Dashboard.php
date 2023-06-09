<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		permission();
  }

	public function index()
	{
		$data['title'] = 'Dashboard - Manyminds';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav-top',$data);
		$this->load->view('pages/dashboard',$data);
		$this->load->view('templates/footer',$data);
		$this->load->view('templates/js',$data);
	}
}
