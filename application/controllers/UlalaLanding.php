<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UlalaLanding extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
		$this->load->model('m_register');
		$this->load->library('encrypt');
	}


	//LOAD VIEW
	public function index()
	{
			$this->load->view('landing/index');
	}
	public function SQ()
	{
			$this->load->view('landing/SQ');
	}
	public function EQ()
	{
			$this->load->view('landing/EQ');
	}
	public function about()
	{
			$this->load->view('landing/about');
	}
	
}
