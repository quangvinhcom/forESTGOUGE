<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/m_dashboard');
    }
    public function index()
    {
        $data['title'] = 'Homepage';
        $this->load->view('backend/v_dashboard', $data);
    }
}
