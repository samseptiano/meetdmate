<?php

class Chat_model extends CI_Model {
  
  function __construct() 
  {
    /* Call the Model constructor */
    parent::__construct();
  }


  function get_last_item()
  {
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get('Chats', 1);
    return $query->result();
  }
  
  
  function insert_message($message,$sender,$receiver,$s,$v)
  {
    $this->message = utf8_encode($message);
    $this->sender = $sender;
    $this->receiver = $receiver;
    $ss = $s;
    $vv = $v;
    $this-> time = time(); 
    if($receiver!='undefined' || $sender!='undefined'){ 

         $where = array(
                        'visitor' => $_REQUEST["sender"],
                        'home' => $_REQUEST["receiver"]
                        );
         $or_where = array(
                        'home' => $_REQUEST["sender"],
                        'visitor' => $_REQUEST["receiver"]
                        );  
      $cek = $this->check_interact($_REQUEST["sender"],$_REQUEST["receiver"])->num_rows();
      if($cek < 1){
       $data = array(
                'home' => $_REQUEST["sender"],
                'visitor' => $_REQUEST["receiver"],
                'home_email' => $ss,
                'visitor_email' => $vv
                ); 
      $this->db->insert('interaction', $data);
      }
      $this->db->insert('Chats', $this);
  }
}

function check_interact($home,$visitor){   
    // $this->db->select('home,visitor');
    //   $this->db->from($table);
    // $this->db->or_group_start(); //this will start grouping
    //   $this->db->where($where);
    //   $this->db->or_where($or_where);
    //   $this->db->group_end(); //this will end grouping
    //   return $this->db->get();
      return $this->db->query("select * from interaction where (home='".$home."' and visitor='".$visitor."') or (home='".$visitor."' and visitor='".$home."')");
  } 

  function get_chat_after($time,$sender,$receiver)
  {
    $this->db->where('time >', $time)->where("((sender = '".$sender."' and receiver='".$receiver."' ) or (sender = '".$receiver."' and receiver='".$sender."') )")->order_by('time', 'DESC')->limit(10); 
    $query = $this->db->get('Chats');
    
    $results = array();
    
    foreach ($query->result() as $row)
    {
      $results[] = array($row->sender, utf8_decode($row->message), $row->time);
    }
    
    return array_reverse($results);
  }

  function create_table()
  { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
    
    /* Specify the table schema */
    $fields = array(
                    'id' => array(
                                  'type' => 'INT',
                                  'constraint' => 5,
                                  'unsigned' => TRUE,
                                  'auto_increment' => TRUE
                              ),
                    'message' => array(
                                  'type' => 'TEXT'
                              ),
                    'sender' => array(
                                  'type' => 'VARCHAR',
                                  'constraint' => 50
                              ),
                    'receiver' => array(
                                  'type' => 'VARCHAR',
                                  'constraint' => 50
                              ),
                      'time' => array(
                          'type' => 'INT'
                        ),
                    'status' => array(
                        'type' => 'ENUM',
                        'constraint' => array('UNREAD','READ')

                      )
              );
    
    /* Add the field before creating the table */
    $this->dbforge->add_field($fields);
    
    
    /* Specify the primary key to the 'id' field */
    $this->dbforge->add_key('id', TRUE);
    
    
    /* Create the table (if it doesn't already exist) */
    $this->dbforge->create_table('Chats', TRUE);
  }


}