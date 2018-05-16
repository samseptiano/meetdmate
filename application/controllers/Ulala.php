<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulala extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
		$this->load->model('m_login');
		$this->load->library('encrypt');
		if($this->session->userdata('status_user') != "login"){
			redirect(base_url("login"));
		}

	}


	//LOAD VIEW
	public function index()
	{
		$where = array(
				'id_user' => $this->session->userdata('id')
				);
			$data['user'] = $this->m_login->tampil_data("user",$where)->result();
			$this->load->view('index',$data);
	}
	public function profile()
	{
		$where = array(
				'id_user' => $this->session->userdata('id')
				);
			$data['user'] = $this->m_login->tampil_data("user",$where)->result();
			$this->load->view('profile',$data);
	}
	public function edit_profile()
	{
		$where = array(
				'id_user' => $this->session->userdata('id')
				);
			$data['user'] = $this->m_login->tampil_data("user",$where)->result();
			$this->load->view('edit_profile',$data);
	}
	public function edit_searchfriend()
	{
		$where = array(
				'id_user' => $this->session->userdata('id')
				);
			$data['user'] = $this->m_login->tampil_data("user",$where)->result();
			$this->load->view('edit_searchfriend',$data);
	}

	public function process_edit_profile()
	{
		$interest="";
		$expl = explode("-",$this->input->post('province'));
		for($i=0;$i<9;$i++){
			if($this->input->post('interest'.$i) == ""){
				continue;
			}
			else{
			$interest .= $this->input->post('interest'.$i).", ";
			}
		}

		$gender = $this->input->post('gender');
		if($gender == 'F'){
			$photo = '/asset/img/default/woman.PNG';
		}
		else if($gender == 'O'){
			$photo = '/asset/img/default/other.png';
		}
		else{
			$photo = '/asset/img/default/man.jpg';
		}

		// for($j=0;$j<count($interests);$j++){
		// 	$interest .= $interests[$j].", ";
		// }

 		if(!empty($interest)){
 			$data = array(
						'fname' => ucfirst ( utf8_encode($this->input->post('fname'))),
						'lname' => ucfirst ( utf8_encode($this->input->post('lname'))),
						'city' => $this->input->post('city'),
						'lat' => $this->input->post('lat'),
						'lon' => $this->input->post('lon'),
						'address' => $this->input->post('address'),
						'province' => $expl[0],
						'twitter' => $this->input->post('twitter'),
						'instagram' => $this->input->post('instagram'),
						'height' => $this->input->post('height'),
						'weight' => $this->input->post('weight'),
						'gender' => $gender,
						'photo_path' => $photo,
						'religion' => $this->input->post('religion'),
						'race' => $this->input->post('race'),
						'place_birth' => ucfirst ( $this->input->post('place_birth')),
						'date_birth' => $this->input->post('date_birth'),
						'interest' => $interest
					);
 			$where = array(
 					'id_user' => $this->session->userdata('id')
 				);
			$this->m_login->updateData("user",$data,$where);
			$this->session->unset_userdata('lat');
			$this->session->unset_userdata('lon');

			$data_session = array(
				'lat' => $this->input->post('lat'),
				'lon' => $this->input->post('lon')
				);

			$this->session->set_userdata($data_session);
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Update Successfully!!!</div>');
			redirect('profile');

		}
		else{
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops!!! Something Went Wrong</div>');
					redirect(base_url("profile"));
		}
	}

	public function about()
	{
				$this->load->view('about_us');
	}

	public function savefilter()
	{
		$h[0] = $this->input->post('heightmin');
		$h[1] = $this->input->post('heightmax');
		$w[0] = $this->input->post('weightmin');
		$w[1] = $this->input->post('weightmax');
		$a[0] = $this->input->post('agemin');
		$a[1] = $this->input->post('agemax');

		sort($h);
		sort($w);
		sort($a);

				$data = array(
						'gender_filter' => $this->input->post('gender'),
						'religion_filter' => $this->input->post('religion'),
						'height_filter' => $h[0]."-".$h[1],
						'weight_filter' =>  $w[0]."-".$w[1],
						'age_filter' =>  $a[0]."-".$a[1],
						'race_filter' => $this->input->post('race'),
					);

 			$where = array(
 					'id_user' => $this->session->userdata('id')
 				);
			$this->m_login->updateData("user",$data,$where);
			redirect('searchfriends');
	}

	public function getfriends($gender,$religion,$height,$weight,$race,$age){

		$umur1 = date('Y') - explode('-', $age)[0];
		$umur2 = date('Y') - explode('-', $age)[1];

		$where = array(
			'id_user' => $this->session->userdata('id'),
			);

		$heightarr = " and height > ".explode('-', $height)[0]." and height < ".explode('-', $height)[1];
		$weightarr = " and weight > ".explode('-', $weight)[0]." and weight < ".explode('-', $weight)[1];
		$agearr = " and date_birth > '".$umur2."-01-01' and date_birth < '".$umur1."-01-01'";

				//filter interest
			// $data['user'] = $this->m_login->auth("user",$where);
			// $interest = $data['user']->interest ;
			// $interests = explode(",", $interest);

			// for($i=0;$i<sizeof($interests);$i++){
			// 	$interestss[$i] = '%'.$interests[$i].'%';
			// }

			// $strimplode = implode(",", $interestss);

		$page =  $_GET['page'];
		$this->load->model('m_login');
		if($gender=="all" and $religion =="all" and $race == 'all'){
			$friends = $this->m_login->getfriends($page, '', ''/*,'and interest like "'.$strimplode.'" '*/,$heightarr,$weightarr,'',$agearr);
		}
		else if($gender=="all" and $religion !="all" and $race == 'all'){
			$friends = $this->m_login->getfriends($page, '', 'and religion = "'.$religion.'" '/*,''*/,$heightarr,$weightarr,'',$agearr);
		}
		else if($gender=="all" and $religion !="all" and $race != 'all'){
			$friends = $this->m_login->getfriends($page, '', 'and religion = "'.$religion.'" '/*,''*/,$heightarr,$weightarr,'and race = "'.$race.'" ');
		}
		else if($gender=="all" and $religion =="all" and $race != 'all'){
			$friends = $this->m_login->getfriends($page, '', ''/*,''*/,$heightarr,$weightarr, 'and race = "'.$race.'" ',$agearr);
		}
		else if($gender!="all" and $religion =="all" and $race == 'all'){
			$friends = $this->m_login->getfriends($page, 'and gender = "'.$gender.'" ', ''/*,''*/,$heightarr,$weightarr, '',$agearr);
		}
		else if($gender!="all" and $religion !="all" and $race == 'all'){
			$friends = $this->m_login->getfriends($page, 'and gender = "'.$gender.'" ', 'and religion = "'.$religion.'" '/*,''*/,$heightarr,$weightarr, '',$agearr);
		}
		else if($gender!="all" and $religion =="all" and $race != 'all'){
			$friends = $this->m_login->getfriends($page, 'and gender = "'.$gender.'" ', ''/*,''*/,$heightarr,$weightarr, 'and race = "'.$race.'" ',$agearr);
		}
		else{
			$friends = $this->m_login->getfriends($page, 'and gender = "'.$gender.'" ', 'and religion = "'.$religion.'" '/*,''*/,$heightarr,$weightarr,$agearr);
		}
		foreach($friends as $friend){
		$a = date('Y') - explode('-', $friend->date_birth)[0];
		echo "<div class='column'>
          <div class='card'>
            <center><a href='".base_url()."profile-friend/".$friend->id_user."'><img src='".base_url().$friend->photo_path."' class='img-thumbnail' style='width:50%'></a></center>
            <div class='container'>";
             if(strlen($friend->fname) <= 11){
             	echo "<center><h5>".$friend->fname."</h5></center>
              <center><p class='title'>";
             }
             else{
             	echo "<center><h5>".substr($friend->fname,0,11) ."...</h5></center>
              <center><p class='title'>";
             }
              if(strlen($friend->city.", ".$friend->province) <= 15){
              	echo $friend->city.", ".$friend->province."</p></center>";
              }
              else{
              echo substr($friend->city.", ".$friend->province,0,15)."...</p></center>";
          		}
          	echo "<center><p>(".$a." Tahun)</p></center>";
                 $Emotional =abs($this->session->userdata('eq')-$friend->EQ);
                  $Spiritual = abs($this->session->userdata('sq')-$friend->SQ);

              		//$Emotional=0;
              		//$Spiritual=0;



                  $Spiritualsama = (96-$Spiritual)/96;
                  $Spiritualbeda = ($Spiritual-0)/96;

                  $Emotionalsama = (160-$Emotional)/160;
                  $Emotionalbeda = ($Emotional-0)/160;


                  // $cond1 = min($Spiritualmin,$Emotionalmax);
                  //   $z0 = ($cond1*(100-0))+0; //bertambah
                  //   echo $z0."<br>"; 
                  // $cond2 = min($Spiritualmin,$Emotionalmin);
                  //   $z1 = ($cond2*(100-0))+0; //bertambah
                  //   echo $z1."<br>"; 
                  // $cond3 = min($Spiritualmax,$Emotionalmax);
                  //   $z2 = (100-($cond3*(100-0))); //berkurang
                  //   echo $z2."<br>"; 
                  // $cond4 = min($Spiritualmax,$Emotionalmin);
                  //   $z3 = ($cond4*(100-0))+0; //bertambah
                  //   echo $z3."<br>"; 


                  //dibalik karena semakin kecil semakin baik
                  $cond1 = min($Spiritualbeda,$Emotionalsama);
                    $z0 = (100-($cond1*(100-0))); //cocok
                    //echo $z0."<br>"; 
                  $cond2 = min($Spiritualbeda,$Emotionalbeda);
                    $z1 = (100-($cond2*(100-0))); //cocok
                    //$z1 = ($cond2*(100-0))+0; //tidak cocok
                    //echo $z1."<br>"; 
                  $cond3 = min($Spiritualsama,$Emotionalsama);
                    $z2 = ($cond3*(100-0))+0; //tidak cocok
                    //$z2 = (100-($cond3*(100-0))); //cocok
                    //echo $z2."<br>"; 
                  $cond4 = min($Spiritualsama,$Emotionalbeda);
                    $z3 = (100-($cond4*(100-0))); //cocok
                    //echo $z3."<br>"; 

                  $zt = (($cond1*$z0) + ($cond2*$z1) + ($cond3*$z2) + ($cond4*$z3))/($cond1+$cond2+$cond3+$cond4);

                  	//APAKAH INI DIPERLUKAN??
                   $tingkat = (((($friend->EQ + $this->session->userdata('eq'))/2)+(($friend->SQ + $this->session->userdata('sq'))/2))/2)/((52+110)/2);

                   		//rata2 rata skor eq 110 (http://australiatests.com/eqtest/)
                   		//rata2 rata skor sq 52  (The Spiritual Intelligence Self Report Inventory (Sisri 24) Instrument Reliability Among Delinquent Teenagers )

                   if(round($zt*$tingkat,3) >= 100){
                   	echo "<center><p>Your Score: ".round($zt,3)." % Match!</p>";
                   }
                   else{
                   	echo "<center><p>Score: ". round($zt*$tingkat,3) ." %!</p>";
                   }
              		//echo "<center><p>Your Score: ". round($zt*$tingkat,3) ." % Match!</p>";

              		  $lat1 = $friend->lat;
              		  $lon1 = $friend->lon;
              		  $lat2 = $this->session->userdata('lat');
              		  $lon2 = $this->session->userdata('lon');
					  $pi80 = M_PI / 180;
					    $lat1 *= $pi80;
					    $lon1 *= $pi80;
					    $lat2 *= $pi80;
					    $lon2 *= $pi80;

					    $r = 6372.797; // mean radius of Earth in km
					    $dlat = $lat2 - $lat1;
					    $dlon = $lon2 - $lon1;
					    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
					    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
					    $km = $r * $c;// Distance in km

              echo "<center><p><span class='fa fa-map-marker'></span> ". round($km,3) ." km</p>";
              echo "</center><p><a class='button' href='". base_url()."message/". $friend->id_user."'>Message</a></p></div></div></div>";
		}exit;
}

function delete_permanent(){
	$where = array(
		'id_user'=>$this->session->userdata('id')
		);
	$this->m_login->delete("user",$where);
	$this->db->query("delete from interaction where (home = '".$this->session->userdata('id')."' and visitor = '".$idmessage."') or (home = '".$idmessage."' and visitor = '".$this->session->userdata('id')."') ");
	$this->session->sess_destroy();
	redirect(base_url('home'));
}

	function keep_read(){
		
	$data2 = array(
 		'sender' => $this->input->post('sender')
 		);
 		echo json_encode($data2);

		$data = array(
		'status'=>'Read'
		);
	 $where = array('Chats.receiver'=>$this->session->userdata('id'), 'Chats.sender'=>$data2['sender']);
		$this->m_login->update_data_join("Chats",$data,$where);      
	}

	function deletemessage($idmessage){ //masih rancu, kalo satu keapus dua belah pihak keapus
		$this->db->query("delete from interaction where (home = '".$this->session->userdata('id')."' and visitor = '".$idmessage."') or (home = '".$idmessage."' and visitor = '".$this->session->userdata('id')."') ");
		$this->db->query("delete from  Chats where (sender = '".$this->session->userdata('id')."' and receiver = '".$idmessage."') or (sender = '".$idmessage."' and receiver = '".$this->session->userdata('id')."') ");
		redirect('inbox');

	}

	public function searchfriend()
	{
		$where = array('id_user' => $this->session->userdata('id'));
			$data['user'] = $this->m_login->auth("user",$where);
			$sqdb = $data['user']->test_sq ;
			$eqdb = $data['user']->test_eq ;
			$gender = $data['user']->gender ;
			if($sqdb != 'undone' && $eqdb != 'undone'){
					//$where=array('id_user !=' => $this->session->userdata('id'), 'gender !=' => $gender);
					$data['user'] = $this->m_login->tampil_data("user",$where)->result();
					//$this->load->view('search_friend',$data);
					$this->load->view('search_friend',$data);
			}
			else{
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You Have Not Test SQ and EQ Yet!!!</div>');
				redirect('home');
			}
	}
	public function chatting($id = "undefined") 
	{

		$where = array('id_user' => $this->session->userdata('id'));
		$data['user'] = $this->m_login->auth("user",$where);
			$sqdb = $data['user']->test_sq ;
			$eqdb = $data['user']->test_eq ;
			$gender = $data['user']->gender ;
			if($sqdb != 'undone' && $eqdb != 'undone'){
							$where = array(
							'id_user' => $id,
							);
					$data['user'] = $this->m_login->auth("user",$where);
					$userdb = $data['user']->id_user ;

					if($userdb == "undefined" || $userdb ==""){
						redirect('home');
					}
					else{
							$where = array('id_user' => $id);
			    			$data['chat'] = $this->m_login->tampil_data("user",$where)->result();
						    $this->load->view('message',$data);
						}
			}
			else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You Have Not Test SQ and EQ Yet!!!</div>');
				redirect('home');
			}


		
  	}
  	public function get_Chats() {
    /* Connect to the mySQL database - config values can be found at:
    /application/config/database.php */
    $dbconnect = $this->load->database();
    
    /* Load the database model:
    /application/models/simple_model.php */
    $this->load->model('Chat_model');
    
    /* Create a table if it doesn't exist already */
    $this->Chat_model->create_table();
    
    echo json_encode($this->Chat_model->get_chat_after($_REQUEST["time"],$_REQUEST["sender"],$_REQUEST["receiver"]));
    $data = array(
	'status'=>'READ'
	);
  }
  
  public function insert_chat() {
    /* Connect to the mySQL database - config values can be found at:
    /application/config/database.php */
    $dbconnect = $this->load->database();
    
    /* Load the database model:
    /application/models/simple_model.php */
    $this->load->model('Chat_model');
    
    /* Create a table if it doesn't exist already */
    $this->Chat_model->create_table();

    $this->Chat_model->insert_message($_REQUEST["message"],$_REQUEST["sender"],$_REQUEST["receiver"],$_REQUEST["s"],$_REQUEST["v"]); 
    

  }
  
  public function time() {
  	$date = new DateTime();
    echo "[{\"time\":" +  $date->getTimestamp() + "}]";
  }

  function inbox(){
		$where = array('visitor'=>$this->session->userdata('id'));
		$or_where = array('home'=>$this->session->userdata('id'));
		$data['chat'] = $this->m_login->tampil_data_or("interaction",$where,$or_where)->result();
		

		$where = array('Chats.receiver'=>$this->session->userdata('id'),'Chats.status'=>'UNREAD');
		$data['chat2'] = $this->m_login->tampil_data_join("Chats",$where)->result();

		$this->load->view('inbox',$data);

	//$data['chat'] = $this->m_login->queri($this->session->userdata('id'))->result();
		//$this->load->view('inbox',$data);
	}
	function inbox_fragment(){
		$where = array('visitor'=>$this->session->userdata('id'));
		$or_where = array('home'=>$this->session->userdata('id'));
		$data['chat'] = $this->m_login->tampil_data_or("interaction",$where,$or_where)->result();
		

		$where = array('Chats.receiver'=>$this->session->userdata('id'),'Chats.status'=>'UNREAD');
		$data['chat2'] = $this->m_login->tampil_data_join("Chats",$where)->result();
		
		$this->load->view('inbox_fragment',$data);

	//$data['chat'] = $this->m_login->queri($this->session->userdata('id'))->result();
		//$this->load->view('inbox',$data);
	}  
		
	public function friendprofile($id)
	{
		$where = array('id_user' => $this->session->userdata('id'));
		$data['user'] = $this->m_login->auth("user",$where);
			$sqdb = $data['user']->test_sq ;
			$eqdb = $data['user']->test_eq ;
			$gender = $data['user']->gender ;
			if($sqdb != 'undone' && $eqdb != 'undone'){
				$where = array(
					'id_user' => $id
					);
				$data['user'] = $this->m_login->tampil_data("user",$where)->result();
				$this->load->view('profile-friend',$data);
			}
			else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You Have Not Test SQ and EQ Yet!!!</div>');
				redirect('home');
			}
	}

	function update_photo(){
			//load the helper
			$this->load->helper('form');
			$rand = "USERPIC-".$this->session->userdata('id');
			//Configure
			//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
			$new_name = $rand;
			$config['file_name'] = $new_name;
			$upload_path = '/asset/img/user_profile/';
			$config['upload_path'] = '.'.$upload_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '4000';
			$config['max_width'] = '3500';
			$config['max_height'] = '3500';
			$config['overwrite'] = TRUE;   
			
			//load the upload library
			$this->load->library('upload', $config);
	    	$this->upload->initialize($config);
	    	$this->upload->set_allowed_types('*');

			$data['upload_data'] = '';
	    
			//if not successful, set the error message
			if (!$this->upload->do_upload('userfile')) {
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">'.$this->upload->display_errors().'</div>');

			} 
			//else, set the success message
			else { 
					//unlink('./asset/img/user_profile/'.$data['upload_data']['file_name']);
	      			$data['upload_data'] = $this->upload->data();
	      			$config['image_library'] = 'gd2';  
                     $config['source_image'] = './asset/img/user_profile/'.$data['upload_data']['file_name'];  
                     $config['create_thumb'] = TRUE;  
                     $config['maintain_ratio'] = TRUE;  
                     $config['quality'] = 70;  
                     $config['width'] = 500;  
                     $config['height'] = 500;  
                     //$config['new_image'] = './asset/img/user_profile/'.$data['upload_data']['file_name'];  
                     $this->load->library('image_lib', $config);  
                    // $this->image_lib->clear();
    				$this->image_lib->initialize($config);
                     $this->image_lib->resize();  
                     if ( ! $this->image_lib->resize()){
 						 echo $this->image_lib->display_errors();
 					}
 					
		      		$data = array(
					'photo_path' => $upload_path.$config['file_name'].'_thumb.'.pathinfo($data["upload_data"]["file_name"], PATHINFO_EXTENSION)
					);
					$where = array(
					'id_user' => $this->session->userdata('id')
					);

					$this->m_login->updateData('user',$data,$where);
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Photo Updated!!!</div>');
			}
			
			//load the view/upload.php
			redirect('profile');
	}

	function delete_photo($gender){
		if($gender == 'F'){
			$photo = '/asset/img/default/woman.PNG';

		}
		else if($gender == 'O'){
			$photo = '/asset/img/default/other.png';
		}
		else{
			$photo = '/asset/img/default/man.jpg';

		 }
		$data = array(
			'photo_path' => $photo
			);
		$where = array(
			'id_user' => $this->session->userdata('id')
			);

		$datas['user'] = $this->m_login->tampil_data_row("user",$where);
		$pathfoto = ".".$datas['user']->photo_path;

		if(unlink($pathfoto)){
		$this->m_login->updateData('user',$data,$where);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Photo Deleted Successfully!!!</div>');
		redirect('profile');
		}
		else{
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center"Photo Deleted Successfully!!!');
		redirect('profile');
		}
	}

	function EQtest(){
		$where = array('id_user' => $this->session->userdata('id'));
		$data['user'] = $this->m_login->auth("user",$where);
		$eqdb = $data['user']->test_eq ;
		if($eqdb == 'undone'){
			$where = array();
			$data['eq'] = $this->m_login->tampil_data("eq_questions",$where)->result();
			$this->load->view('EQ-test',$data);
		}
		else{
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You Have Tested This Test!!!</div>');
			redirect('home');
		}
	}
	function SQtest(){
		$where = array('id_user' => $this->session->userdata('id'));
		$data['user'] = $this->m_login->auth("user",$where);
		$sqdb = $data['user']->test_sq ;
		if($sqdb == 'undone'){
			$where = array();
			$data['sq'] = $this->m_login->tampil_data("sq_questions",$where)->result();
			$this->load->view('SQ-test',$data);
		}
		else{
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You Have Tested This Test!!!</div>');
			redirect('home');
		}
	}

	function processEQtest(){
		$total=0;
		$ea=0;$em=0;$sea=0;$rm=0;
		for($i = 1; $i <= count($this->input->post('answer')); $i++) 
			{
				if($this->input->post('answer['.$i.']') == ""){
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> You Must Finish All Questions!!!</div>');
					redirect('home');
				}
				else{
					if(1 <= $i && $i <= 10){
						$ea = $ea + $this->input->post('answer['.$i.']');
					}
					else if(11 <= $i && $i <= 20){
						$em = $em + $this->input->post('answer['.$i.']');
					}
					else if(21 <= $i && $i <= 30){
						$sea = $sea + $this->input->post('answer['.$i.']');
					}
					else{
						$rm = $rm + $this->input->post('answer['.$i.']');
					}

					$total = $total + $this->input->post('answer['.$i.']');
				}
			}
		$data = array(
					'EQ' =>$total,
					'ea' =>$ea,
					'em' =>$em,
					'sea' =>$sea,
					'rm' =>$rm,
					'test_eq' => 'done',
				);
		$where = array(
					'id_user' => $this->session->userdata('id')
				);
		$this->session->unset_userdata('eq');
		$this->session->set_userdata('eq', $total);
		$this->m_login->updateData('user',$data,$where);
		redirect('home');
	}

	function processSQtest(){
		$total=0;
		$cet=0;$pmp=0;$ta=0;$cse=0;
		for($i = 1; $i <= count($this->input->post('answer')); $i++) 
			{
				if($this->input->post('answer['.$i.']') == ""){
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> You Must Finish All Questions!!!</div>');
					redirect('home');
				}
				else{
					if($i == 1 || $i == 3 || $i == 5 || $i == 9 || $i == 17 || $i == 21){
						$cet = $cet + $this->input->post('answer['.$i.']');
					}
					else if($i == 7 || $i == 11 || $i == 15 || $i == 19 || $i == 23){
						$pmp = $pmp + $this->input->post('answer['.$i.']');
					}
					else if($i == 2 || $i == 6 || $i == 10 || $i == 14 || $i == 18 || $i == 22){
						if($i == 6){
							$aaa = abs(4-$this->input->post('answer['.$i.']'));
							$ta = $ta + $aaa;
						}
						else{
							$ta = $ta + $this->input->post('answer['.$i.']');
						}
					}
					else{
						$cse = $cse + $this->input->post('answer['.$i.']');
					}

					$total = $total + $this->input->post('answer['.$i.']') + $aaa;
					$aaa = 0;
				}
			}

		$data = array(
					'SQ' =>$total,
					'cet' =>$cet,
					'pmp' =>$pmp,
					'ta' =>$ta,
					'cse' =>$cse,
					'test_sq' => 'done',
				);

		$where = array(
					'id_user' => $this->session->userdata('id')
				);
		$this->session->unset_userdata('sq');
		$this->session->set_userdata('sq' , $total);
		$this->m_login->updateData('user',$data,$where);
		redirect('home');
	}

	function processeditpassword(){
		$oldpass = crypt($this->input->post('oldpass'),"madafaka");
		$newpass = crypt($this->input->post('newpass'),"madafaka");
		$where = array(
			'id_user' => $this->session->userdata('id')
		);

		$data['user'] = $this->m_login->auth("user",$where);
		$passdb = $data['user']->password;
			if($oldpass == $passdb){
					$datas = array(
						'password' => $newpass,
					);
						$this->m_login->updateData('user',$datas,$where);
						$this->session->set_flashdata('msg','<div class="alert alert-success text-center">New Password Updated!!!</div>');
						redirect('home');
			}
			else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Your Old Password Is Wrong!!!</div>');
				redirect('home');

			}
	}

	


}
?>