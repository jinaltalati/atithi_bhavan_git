<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Size extends CI_Controller
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
        $this->load->model('size_model');
    }

    public function index($error = "")
    {
        $result = $this->size_model->listRecords();

        $data['arrData'] = $result;

        $data['title'] = "Size List";
        $data['error'] = $error;
        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("size/list.php", $data);
        $this->load->view('footer_view');
    }

    public function add($error = "")
    {
        $data['title'] = "Add Size";
        $data['error'] = $error;

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("size/add.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->size_model->addRecord();
            if ($result)
            {
                $message = "Size added Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'size');
            }
            else
            {
                $message = "Size already exists.";
                $this->session->set_flashdata($this->router->class, $this->input->post('data'));
                $this->session->set_userdata('message_error', $message);
                redirect(base_url() . 'size/add');
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

        $result = $this->size_model->findByID($id);
        $data['arrData'] = $result;

        $data['title'] = "Edit Size";
        $data['error'] = $error;

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("size/edit.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->size_model->editRecord($id);
            if ($result)
            {
                $message = "Size updated Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'size/');
            }
            else
            {
                $message = "Size already exists.";
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
        $result = $this->size_model->delete($id);
        if ($result == '1')
        {
            $message = "Size deleted Successfully.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'size');
        }
        else
        {
            $message = "Error in deleting Size.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'size/');
        }
    }*/
}
?>