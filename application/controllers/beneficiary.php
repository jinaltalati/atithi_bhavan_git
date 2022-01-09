<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Beneficiary extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         
        $this->session->set_userdata('redirect', $this->uri->uri_string());
        if (($this->session->userdata('user_id') == ""))
            redirect(base_url());
        if (($this->session->userdata('role_id') != "1"))
            redirect(base_url().'dailyentry/');
        //$this->load->library('form_validation');
        //$this->load->model('booking_model');
    }

    public function checkIsExists()
    {
        $mobile = $this->input->post('mobile');
        $row = $this->db->where('mobile',$mobile)->get("beneficiaries")->row_array();
        echo json_encode($row);
    }
}
?>