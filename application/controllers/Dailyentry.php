<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dailyentry extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         
        $this->session->set_userdata('redirect', $this->uri->uri_string());
        if (($this->session->userdata('user_id') == ""))
            redirect(base_url());

        $this->load->library('form_validation');
        $this->load->model('dailyentry_model');
    }

    public function index($error = "")
    {
        $year = date('Y');
        $month = date('m');
        if(trim($this->input->post('year')) != '')
        {
            $year = $this->input->post('year');
        }
        if(trim($this->input->post('month')) != '')
        {
            $month = $this->input->post('month');
        }
        $data['year'] = $year;
        $data['month'] = $month;

        $result = $this->dailyentry_model->listRecords($year,$month);

        $data['arrData'] = $result;
        $data['year'] = $year;
        $data['month'] = $month;
        $data['title'] = "Daily Entry List";
        $data['error'] = $error;
        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("dailyentry/list.php", $data);
        $this->load->view('footer_view');
    }

    public function add($error = "")
    {
        if ($this->session->userdata('role_id') == "1")
        {
            redirect(base_url().'dailyentry/');
        }
        else if ($this->session->userdata('role_id') == "4")
        {
            redirect(base_url().'paperledger/sale/');
        }

        $data['title'] = "Add Daily Entry";
        $data['error'] = $error;

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("dailyentry/add.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->dailyentry_model->addRecord();
            if ($result)
            {
                $message = "Daily Entry added Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'dailyentry/add');
            }
            else
            {
                $message = "Daily Entry already exists.";
                $this->session->set_flashdata($this->router->class, $this->input->post('data'));
                $this->session->set_userdata('message_error', $message);
                redirect(base_url() . 'dailyentry/add');
            }
        }
    }

/*    public function edit($id = "", $error = "")
    {
        if($this->session->userdata('role_id') != '1')
        {
            $this->session->set_userdata('message_error', "You are not authorized to access this module.");
            redirect(base_url().'');  
        }

        $result = $this->dailyentry_model->findByID($id);
        $data['arrData'] = $result;

        $data['title'] = "Edit Daily Entry";
        $data['error'] = $error;

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("dailyentry/edit.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->dailyentry_model->editRecord($id);
            if ($result)
            {
                $message = "Daily Entry updated Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'dailyentry/');
            }
            else
            {
                $message = "Daily Entry already exists.";
                $this->session->set_userdata('message_error', $message);  
            }
        }
    }*/

   /* public function delete($id = "")
    {
        if($this->session->userdata('role_id') != '1')
        {
            $this->session->set_userdata('message_error', "You are not authorized to access this module.");
            redirect(base_url().'');  
        }
        $result = $this->dailyentry_model->delete($id);
        if ($result == '1')
        {
            $message = "Daily Entry deleted Successfully.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'dailyentry');
        }
        else
        {
            $message = "Error in deleting Daily Entry.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'dailyentry/');
        }
    }*/
}
?>