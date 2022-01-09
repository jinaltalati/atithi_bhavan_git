<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paper extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         
        $this->session->set_userdata('redirect', $this->uri->uri_string());
        if (($this->session->userdata('user_id') == ""))
            redirect(base_url());

        if (($this->session->userdata('role_id') != "1"))
            redirect(base_url().'dailyentry/');

        $this->load->library('form_validation');
        $this->load->model('paper_model');
    }

    public function index($error = "")
    {
        $result = $this->paper_model->listRecords();

        $data['arrData'] = $result;

        $data['title'] = "Paper List";
        $data['error'] = $error;
        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("paper/list.php", $data);
        $this->load->view('footer_view');
    }

    public function add($error = "")
    {
        $data['title'] = "Add Paper";
        $data['error'] = $error;

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("paper/add.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->paper_model->addRecord();
            if ($result)
            {
                $message = "Paper added Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'paper');
            }
            else
            {
                $message = "Paper already exists.";
                $this->session->set_flashdata($this->router->class, $this->input->post('data'));
                $this->session->set_userdata('message_error', $message);
                redirect(base_url() . 'paper/add');
            }
        }
    }

    public function edit($id = "", $error = "")
    {
        if($this->session->userdata('role_id') != '1')
        {
            $this->session->set_userdata('message_error', "You are not authorized to access this module.");
            redirect(base_url().'');  
        }

        $result = $this->paper_model->findByID($id);
        $data['arrData'] = $result;

        $data['title'] = "Edit Paper";
        $data['error'] = $error;

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("paper/edit.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->paper_model->editRecord($id);
            if ($result)
            {
                $message = "Paper updated Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'paper/');
            }
            else
            {
                $message = "Paper already exists.";
                $this->session->set_userdata('message_error', $message);  
            }
        }
    }

   /* public function delete($id = "")
    {
        if($this->session->userdata('role_id') != '1')
        {
            $this->session->set_userdata('message_error', "You are not authorized to access this module.");
            redirect(base_url().'');  
        }
        $result = $this->paper_model->delete($id);
        if ($result == '1')
        {
            $message = "Paper deleted Successfully.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'paper');
        }
        else
        {
            $message = "Error in deleting Paper.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'paper/');
        }
    }*/
}
?>