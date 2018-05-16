<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UlalaLogin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
		$this->load->model('m_login');
		$this->load->library('encrypt');

	}


	//LOAD VIEW
	public function index()
	{
		if($this->session->userdata('status_user') == "login"){
			redirect(base_url("home"));
		}
		else{
			$this->load->view('login');
		}
	}
	//REGISTER ACCOUNT
	public function processlogin()
	{
		$email = $this->input->post('email');
		$password = crypt($this->input->post('password'),"madafaka");
		$where = array(
			'email' => $email,
			);

		//$cek = $this->m_login->cek_login("siswa",$where)->num_rows();
		$data['user'] = $this->m_login->auth("user",$where);
		$emaildb = $data['user']->email ;
		$passworddb = $data['user']->password ;
		if($emaildb == $email && $passworddb == $password){

			$data_session = array(
				'email' => $email,
				'id' => $data['user']->id_user, 
				'status_user' => "login",
				'sq' => $data['user']->SQ,
				'eq' => $data['user']->EQ,
				'lat' => $data['user']->lat,
				'lon' => $data['user']->lon
				);
			$this->session->set_userdata($data_session);

			redirect(base_url("home"));

		}
		else{
			$this->session->set_flashdata('err_message', '<div class="alert alert-danger text-center">Oops! Your Email/Password Wrong!!!</div>');
			redirect(base_url("login"));
		}

	}

	function logout(){

		$where = array(
			'id_user' => $this->session->userdata('id')
			);
		$this->session->sess_destroy();
		redirect(base_url('home'));
	}

	function forgotpassword(){
		$this->load->helper(array('email'));
        $this->load->library(array('email'));

		$email = $this->input->post('oldemail');
		$where = array(
			'email' => $email
			);
		$cek = $this->m_login->tampil_data("user",$where)->num_rows();
		if($cek > 0){
					$token = md5($email).time();
					$data = array(
							'token' => $token
						);
					$where = array(
						'email' => $email
						);
					$this->m_login->updateData('user',$data,$where);

					$config = Array(
						  'protocol' => 'smtp',
						  'smtp_host' => 'ssl://smtp.googlemail.com',
						  'smtp_port' => 465,
						  'smtp_user' => 'info.meetdmate@gmail.com', // change it to yours
						  'smtp_pass' => 'meetdmatefuzzy', // change it to yours
						  'mailtype' => 'html',
						  'charset' => 'iso-8859-1',
						  'wordwrap' => TRUE
						);


					 $message = " Hai Pengguna meetd'mate, \r\n Silahkan klik link dibawah ini untuk reset password anda. \r\n \r\n ".base_url().
					'reset-password/'. $token . " \r\n\r\n Terima kasih \r\n MeetD'Mate";
			          $this->load->library('email', $config);
				      $this->email->set_newline("\r\n");
				      //$this->email->set_mailtype("html");
				      $this->email->from('info.meetdmate@gmail.com'); // change it to yours
				      $this->email->to($email);// change it to yours
				      $this->email->subject('Permintaan Reset Password Akun');
				      $this->email->message($message);
				      if($this->email->send())
				     {
				     $this->session->set_flashdata('err_message', '<div class="alert alert-warning text-center">Token Sent!!! Please check Your Email</div>');
						redirect(base_url("login"));
				     }
				     else
				    {
				     show_error($this->email->print_debugger());
				    }
				}
				else{
					$this->session->set_flashdata('err_message', '<div class="alert alert-danger text-center">Oops! Your Email Wrong!!!</div>');
					redirect(base_url("login"));
				}
	}

	function resetpassword($token="undefined"){
		$where = array(
			'token'=>$token
			);
		$cek = $this->m_login->tampil_data("user",$where)->num_rows();
		if($cek > 0){
			$this->load->view('password_reset');

		}
		else{
			redirect(base_url("login"));
		}
		

	}

	function updatepassword(){
		$token = $this->input->post('token');
		$password = $this->input->post('password');
		$where = array(
			'token'=> $token
			);
		$data = array(
			'password' => crypt($password,"madafaka"),
			'token' => ""
			);
		$this->m_login->updateData('user',$data,$where);
		redirect(base_url("login"));
	}

		
}
