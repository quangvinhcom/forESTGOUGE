<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
class User_list extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
         $this->load->model('backend/m_user_list','listusers');
    }
    public function index()
    {
        $data['title'] = 'Account List';
        $this->load->view('backend/v_user_list', $data);
    }
     public function fetch_user(){  
          // $this->load->model("crud_model");  
           //$this->load->model('backend/m_user_list','listusers');
           $fetch_data = $this->listusers->make_datatables();  
           $data = array();  
           $avatar_user='';
           $action_user = '';
           $edit_user='';
           $delete_user='';
           foreach($fetch_data as $row)  
           {   
            $avatar_user = '<img src="'.base_url().'public/images/avatar/'.$row->avatar_user.'" class="img-thumbnail" width="50" height="35" />';
            if($row->hide_show == 'show'){
            $action_user = '<button type="button" name="hideshow" id="'.$row->id.'" class="btn btn-info btn-xs hideshow"><i class="fas fa-eye"></i></button>';
            }else{
               $action_user = '<button type="button" name="hideshow" id="'.$row->id.'" class="btn btn-info btn-xs hideshow"><i class="fa fa-eye-slash"></i></button>'; 
            }
            $edit_user = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs updateit"><i class="fa fa-anchor"></i></button>';
            $delete_user = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs deleteit"><i class="fas fa-trash"></i></button>';
            $data[] = array(
    		"stt" => $row->id,
			"avatar_user" => $avatar_user,
			"user_name"  => $row->user_name,
			"level_access" => $row->level_access,
			"action_user" => $action_user,
            "edit_user" => $edit_user,
            "delete_user" => $delete_user,
        	);
           }  
        $response = array(
        "draw" => intval($_POST["draw"]),
        "iTotalRecords" => $this->listusers->get_all_data(),
        "iTotalDisplayRecords" => $this->listusers->get_filtered_data(),
        "aaData" => $data
        );
        echo json_encode($response); 
      }  
     public function user_action(){  
           if($_POST['action'] == 'Add')  
           {  
            $hide_show = "show";
                $insert_data = array(  
                   "user_name" => $this->input->post("user_name"),  
                     "pass_word" => $this->input->post("pass_word"),  
                    "level_access" => $this->input->post("level_access"),
                     "avatar_user" => $this->upload_image(),
                     "hide_show" => $hide_show
              );  
                //$this->load->model('backend/m_user_list','listusers');
               $this->listusers->insert_user($insert_data); 
                echo 'Data Inserted';  
           }  
           if($_POST["action"] == "Edit")  
           {  
                $user_image = '';  
                if($_FILES["avatar_user"]["name"] != '')  
                {  
                     $user_image = $this->upload_image();  
                }  
                else  
                {  
                     $user_image = $this->input->post("hidden_user_image");  
                }  
                $updated_data = array(  
                    'user_name' => $this->input->post('user_name'),  
                     'pass_word' => $this->input->post("pass_word"),  
                     'level_access' => $this->input->post("level_access"),
                     'avatar_user' => $user_image  
                );  
               
                $this->listusers->update_user($this->input->post("user_id"), $updated_data);  
                echo 'Data Updated';  
           }  
      }  
    public function upload_image()  
      {  
           if(isset($_FILES["avatar_user"]))  
           {  
                $extension = explode('.', $_FILES['avatar_user']['name']);  
                $new_name = rand() . '.' . $extension[1];  
                $destination = 'public/images/avatar/'.$new_name;  
                move_uploaded_file($_FILES['avatar_user']['tmp_name'], $destination);  
                return $new_name;  
           }  
      }  
      public function fetch_single_user()  
      {  
           $output = array();  
           //$this->load->model('backend/m_user_list','listusers');
           $data = $this->listusers->fetch_single_user($_POST["user_id"]);  
           foreach($data as $row)  
           {  
                $output['user_name'] = $row->user_name;  
                $output['pass_word'] = $row->pass_word;
                $output['level_access'] = $row->level_access;  
                if($row->avatar_user != '')  
                {  
                     $output['avatar_user'] = '<img src="'.base_url().'public/images/avatar/'.$row->avatar_user.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->avatar_user.'" />';  
                }  
                else  
                {  
                     $output['avatar_user'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }  
}