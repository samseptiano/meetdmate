<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UlalaRegister extends CI_Controller {

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
		if($this->session->userdata('status_user') == "login"){
			redirect(base_url("home"));
		}
		else{
			$this->load->view('register');
		}
	}
	//REGISTER ACCOUNT
	public function processregister()
	{

		$address = $this->input->post('address');
		$lat =  $this->input->post('lat');
		$lon =  $this->input->post('lon');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$email = $this->input->post('email');
		$city = $this->input->post('city');
		$place_birth = $this->input->post('place_birth');
		$date_birth = $this->input->post('date_birth');
		$race = $this->input->post('race');
		$height = $this->input->post('height');
		$weight = $this->input->post('weight');
		$gender = $this->input->post('gender');
		$religion_filter = $this->input->post('religion');

	if($this->input->post('religion') == '-'){
		$religion_filter = "all";
	}

	if($address !="" && $lat != "" && $lon !="" && $fname !="" && $lname !="" && $email !="" && $city !="" && $place_birth !="" && $date_birth !="" && $race !="" && $height !="" && $weight !="" && $gender !=""){
		$expl = explode("-",$this->input->post('province'));
		$interest = "";

		foreach($_POST['interest'] as $interest1) {
 		$interest .= $interest1.", ";	
 			}
 		
		if(!empty($interest)){

			$genders = $this->input->post('gender');

			if($genders == "M"){
				$photo = '/asset/img/default/man.jpg';
			}
			if($genders == 'O'){
			$photo = '/asset/img/default/other.png';
			}
			else{
				$photo = '/asset/img/default/woman.PNG';
			}

		$data = array(
				'id_user'  => "U-".time().uniqid(),
				'password' => crypt($this->input->post('password'),"madafaka"),
				'fname' => ucfirst ($this->input->post('fname')),
				'lname' => ucfirst ($this->input->post('lname')),
				'email' => $this->input->post('email'),
				'province' => $expl[0],
				'city' => $this->input->post('city'),
				'address' => $address,
				'lat' => $lat,
				'lon' => $lon,
				'place_birth' => ucfirst ($this->input->post('place_birth')),
				'date_birth' => $this->input->post('date_birth'),
				'photo_path' => $photo,
				'SQ' =>0,
				'cet' =>0,
				'pmp' =>0,
				'ta' =>0,
				'cse' =>0,
				'EQ' => 0,
				'ea' =>0,
				'em' =>0,
				'sea' =>0,
				'rm' =>0,
				'religion' => $this->input->post('religion'),
				'race' => $this->input->post('race'),
				'height' => $this->input->post('height'),
				'weight' => $this->input->post('weight'),
				'instagram' => "",
				'twitter' => "",
				'interest' => $interest,
				'gender' => $this->input->post('gender'),
				'register_date' => date('Y-m-d h+5:i:sa'),
				'gender_filter' => 'all',
				'religion_filter' => $religion_filter,
				'height_filter' => '130-200',
				'weight_filter' => '40-200',
				'age_filter' => '17-80',
				'race_filter' => $this->input->post('race'),
				'token' => "",
				'test_eq' => 'undone',
				'test_sq' => 'undone',
			);
			$cek = $this -> cekAvailable();
			if($cek < 1){
				if ($this->m_register->insertUser("user",$data))
				{

						$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Registration Succeed!!!</div>');
						redirect(base_url("register"));
				}
				else
				{
					// error
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Something Went Wrong When Register!!!</div>');
					redirect(base_url("register"));
				}
			}
		}
		else{
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Choose At Least 1 Interest</div>');
					redirect(base_url("register"));
			}
		}
		else{
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please Fill Blank Form</div>');
					redirect(base_url("register"));
		}
	}

	private function cekAvailable(){
		$email = $this->input->post('email');
		
		$where = array(
			'email' => $email
			);
		$cek = $this->m_register->checkAvailData("user",$where)->num_rows();
		return $cek;
	}
	function check_availability_email(){
		$this->load->helper('email');
		$email = $this->input->post('email');
		if($email != ""){
				if(valid_email($email)){
						$where = array(
						'email' => $email
						);
					  $user_count = $this->m_register->checkAvailData("user",$where)->num_rows();

					if($user_count > 0) {
					      echo "<span class='status-not-available' style='color:red' > Email Have Been Used!.</span>";
					  }
					else{
					      echo "<span class='status-available' style='color:green' > Email Available!.</span>";
					  }
				}
				else{
					echo "<span class='status-available' style='color:red' > Email Not Valid!.</span>";
				}	
		}
		else{
			//echo "<span class='status-available' style='color:green' > Email Kosong atau Tidak Valid!.</span>";
		}
	}
}
