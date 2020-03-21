<?php 
class M_user_list extends CI_Model
{
     public function __construct()
	  { 
         parent::__construct(); 
      } 
      var $table = "db_user";  
      var $select_column = array("id", "user_name", "pass_word", "level_access", "avatar_user","hide_show");  
      var $order_column = array(null, "user_name", "pass_word", "level_access", null, "hide_show");  
      public function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("user_name", $_POST["search"]["value"]);  
                $this->db->or_like("pass_word", $_POST["search"]["value"]);  
                 $this->db->or_like("level_access", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }  
      }  
      public function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      public function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      public function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }  
     public function insert_user($insert_data)  
      {  
           $this->db->insert('db_user', $insert_data);  
      }  
      public function fetch_single_user($user_id)  
      {  
           $this->db->where("id", $user_id);  
           $query=$this->db->get('db_user');  
           return $query->result();  
      }  
      public function update_user($user_id, $data)  
      {  
           $this->db->where("id", $user_id);  
           $this->db->update("db_user", $data);  
      }  
}