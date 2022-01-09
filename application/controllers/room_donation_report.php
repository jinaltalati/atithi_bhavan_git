<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Room_donation_report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         
        $this->session->set_userdata('redirect', $this->uri->uri_string());
        if (($this->session->userdata('user_id') == ""))
            redirect(base_url());

        // if (($this->session->userdata('role_id') != "1"))
        //     redirect(base_url().'dailyentry/');

        $this->load->library('form_validation');
        $this->load->model('room_donation_report_model');
    }

    public function index($error = "")
    {
        $data['title'] = 'Room Donation report';
        $data['type'] = "report";

        $result = $this->room_donation_report_model->listRecords();

        $data['arrData'] = $result;
        $data['error'] = $error;
        $this->load->view('header_view', $data);
        //$this->load->view('left_view');
        $this->load->view("room_donation_report/list.php", $data);
        $this->load->view('footer_view');
    }

   
}
?>