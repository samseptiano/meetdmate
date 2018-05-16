<?php 
//===============================================================================================//beforelogin 
class m_login extends CI_Model{	

	public function auth($table,$where)
	{
    $this->db->select('id_user,password,email,token,EQ,SQ, gender, interest, lat, lon, test_sq, test_eq');
    $q1 = $this->db->get_where($table,$where);
    return $q1->row();
	}
	function tampil_data($table,$where){
		return $this->db->get_where($table, $where);
	}
	function tampil_data_limit($table,$where,$limit){
		return $this->db->get_where($table, $where,$limit);
	}

	//yang dikomen filter interest
	function getfriends($page, $gender, $religion/*,$interest*/, $height, $weight, $race, $age){


              		   $lat2 = $this->session->userdata('lat');
              		   $lon2 = $this->session->userdata('lon');
					   $pi80 = M_PI / 180;
					   $lat2 *= $pi80;
					   $lon2 *= $pi80;

					   $offset = 12*$page;
					   $limit = 12;
			$sql = "select * from user where id_user != '".$this->session->userdata("id")."' "/*.$interest*/.$age." ".$height." ".$weight." ".$race." and SQ != '0' and EQ != '0' ".$gender." ".$religion." order by 6373 * atan2(sqrt(sin((".$lat2."-lat*".M_PI."/180) / 2) * sin((".$lat2."-lat*".M_PI."/180) / 2) + cos(lat*".M_PI."/180) * cos(".$lat2.") * sin((".$lon2."-lon*".M_PI."/180) / 2) * sin((".$lon2."-lon*".M_PI."/180) / 2)),sqrt(1-sin((".$lat2."-lat*".M_PI."/180) / 2) * sin((".$lat2."-lat*".M_PI."/180) / 2) + cos(lat*".M_PI."/180) * cos(".$lat2.") * sin((".$lon2."-lon*".M_PI."/180) / 2) * sin((".$lon2."-lon*".M_PI."/180) / 2))) limit $offset ,$limit";
			$result = $this->db->query($sql)->result();
			return $result;
	}

	function tampil_data_join($table,$where){
		$this->db->select('count(Chats.message) as message, Chats.sender ');
		$this->db->from($table);
		$this->db->join('user', 'user.id_user = Chats.sender');
		$this->db->where($where);
		$this->db->order_by("MAX(time)","desc");
		$this->db->group_by('Chats.sender');
		//$this->db->limit(1);
		return $this->db->get();
	}
	function queri($receiver){
		return $this->db->query("SELECT tt.*
								FROM Chats tt
								INNER JOIN
								    (SELECT sender, MAX(time) AS MaxTime, message, receiver
								    FROM Chats where receiver = '".$receiver."' 
								    GROUP BY sender) groupedtt 
								ON tt.sender = groupedtt.sender 
								AND tt.time = groupedtt.MaxTime
								where tt.receiver = '".$receiver."' and tt.status = 'UNREAD' order by groupedtt.MaxTime desc ");
	}

	function tampil_data_or($table,$where,$or_where){

	$this->db->distinct();
	$this->db->select('home,visitor,home_email,visitor_email');
    $this->db->from($table);
	$this->db->or_group_start(); //this will start grouping
    $this->db->where($where);
    $this->db->or_where($or_where);
    $this->db->group_end(); //this will end grouping
    return $this->db->get();

		// $this->db->query("SELECT DISTINCT `home`, `visitor`, `home_email`, `visitor_email` FROM `interaction` WHERE ( `visitor` = 'U-150788942759e0911345744' OR `home` = 'U-150788942759e0911345744' )");
	}

	function insertData($table,$data)
    {
		return $this->db->insert($table, $data);
	}

	function updateData($table,$data,$where)
    {
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function tampil_data_row($table,$where)//for tutor
	{
    $this->db->select('id_user,fname,password,lname,email,token,photo_path,interest');
    $q1 = $this->db->get_where($table,$where);
    return $q1->row();
	}

	public function auth_jawaban_test($table,$where)//for tes siswa
	{
    $this->db->select('answer');
    $q1 = $this->db->get_where($table,$where)->result_array();
    $arr = array();
    foreach ($q1 as $row)
		{
		    $arr[]=$row['answer'];

		}
		return $arr;
	}

function update_data_join($table,$data,$where){
		$this->db->join('user', 'user.id_user = Chats.sender');
		$this->db->where($where);
		$this->db->from($table);
		$this->db->update($table,$data);
	}

function delete($table,$where){
	$this->db->delete($table,$where);
}	

}