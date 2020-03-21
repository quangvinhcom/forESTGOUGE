<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends CI_Controller
{

     public function __construct() {
        Parent::__construct();
        $this->load->model("calendar_model");
        $this->load->helper('date');
    }

     public function index()
     {
          $this->load->view("calendar/index.php", array());
     }
public function get_events()
 {
     // Our Start and End Dates
     $start = $this->input->get("start");
     $end = $this->input->get("end");

     $startdt = new DateTime('now'); // setup a local datetime
     $startdt->setTimestamp($start); // Set the date based on timestamp
     $start_format = $startdt->format('Y-m-d');

     $enddt = new DateTime('now'); // setup a local datetime
     $enddt->setTimestamp($end); // Set the date based on timestamp
     $end_format = $enddt->format('Y-m-d');

     $events = $this->calendar_model->get_events($start_format, $end_format);

     $data_events = array();

     foreach($events->result() as $r) {

         $data_events[] = array(
             "id" => $r->id,
             "title" => $r->title,
             "start" => $r->start,                          
             "end" => $r->end,
             "description" => $r->description,
         );
     }

     echo json_encode(array("events" => $data_events));
     exit();
 }
 public function add_event() 
    {
        /* Our calendar data */
        $name = $this->input->post("name");
        $desc = $this->input->post("description");
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");

        if(!empty($start_date)) {
            $start_date = date("Y-m-d", strtotime($start_date));
        } else {
            $start_date = date("Y-m-d", time());
            $start_date_timestamp = time();
        }

        if(!empty($end_date)) {
            $end_date = date("Y-m-d", strtotime($end_date));
        } else {
            $end_date = date("Y-m-d", time());
            $end_date_timestamp = time();
        }

        $this->calendar_model->add_event(array(
            "title" => $name,
            "start" => $start_date,
            "end" => $end_date,
              "description" => $desc            
            )
        );

        redirect(site_url("calendar"));
    }

    public function edit_event() 
    {
        $eventid = intval($this->input->post("eventid"));
        $event = $this->calendar_model->get_event($eventid);
        if($event->num_rows() == 0) {
            echo"Invalid Event";
            exit();
        }

        $event->row();

        /* Our calendar data */
        $name = $this->input->post("name");
        $desc = $this->input->post("description");
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");
        $delete = intval($this->input->post("delete"));

        if(!$delete) {

              if(!empty($start_date)) {
            $start_date = date("Y-m-d", strtotime($start_date));
        } else {
            $start_date = date("Y-m-d", time());
            $start_date_timestamp = time();
        }

        if(!empty($end_date)) {
            $end_date = date("Y-m-d", strtotime($end_date));
        } else {
            $end_date = date("Y-m-d", time());
            $end_date_timestamp = time();
        }

            $this->calendar_model->update_event($eventid, array(
                "title" => $name,
                "start" => $start_date,
                "end" => $end_date,
                "description" => $desc                
                )
            );
            
        } else {
            $this->calendar_model->delete_event($eventid);
        }

        redirect(site_url("calendar"));
    }
 
}

?>