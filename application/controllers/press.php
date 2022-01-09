<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Press extends CI_Controller
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
        $this->load->model('press_model');
    }

    public function index($error = "")
    {
        $result = $this->press_model->listRecords();

        $data['arrData'] = $result;

        $data['title'] = "Press List";
        $data['error'] = $error;
        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("press/list.php", $data);
        $this->load->view('footer_view');
    }

    public function add($error = "")
    {
        $data['title'] = "Add Press";
        $data['error'] = $error;

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("press/add.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->press_model->addRecord();
            if ($result)
            {
                $message = "Press added Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'press');
            }
            else
            {
                $message = "Press already exists.";
                $this->session->set_flashdata($this->router->class, $this->input->post('data'));
                $this->session->set_userdata('message_error', $message);
                redirect(base_url() . 'press/add');
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

        $result = $this->press_model->findByID($id);
        $data['arrData'] = $result;

        $data['title'] = "Edit Press";
        $data['error'] = $error;

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("press/edit.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->press_model->editRecord($id);
            if ($result)
            {
                $message = "Press updated Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'press/');
            }
            else
            {
                $message = "Press already exists.";
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
        $result = $this->press_model->delete($id);
        if ($result == '1')
        {
            $message = "Press deleted Successfully.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'press');
        }
        else
        {
            $message = "Error in deleting Press.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'press/');
        }
    }*/
}
?>