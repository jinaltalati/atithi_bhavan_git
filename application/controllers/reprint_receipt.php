<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reprint_receipt extends CI_Controller
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
        $this->load->model('reprint_receipt_model');
    }

    public function index($error = "")
    {
        $result = $this->reprint_receipt_model->listRecords();

        $data['arrData'] = $result;

        $data['title'] = "Reprint Receipt List";
        $data['error'] = $error;
        $this->load->view('header_view', $data);
        //$this->load->view('left_view');
        $this->load->view("reprint_receipt/list.php", $data);
        $this->load->view('footer_view');
    }

   
}
?>