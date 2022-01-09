<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Building extends CI_Controller
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
        $this->load->model('building_model');
    }

    public function index($error = "")
    {
        $result = $this->building_model->listRecords();

        $data['arrData'] = $result;

        $data['title'] = "Building List";
        $data['type'] = 'accomo';
        $data['error'] = $error;
        $this->load->view('header_view', $data);
        //$this->load->view('left_view');
        $this->load->view("building/list.php", $data);
        $this->load->view('footer_view');
    }

    public function add($error = "")
    {
        $data['title'] = "Add Building";
        $data['type'] = 'accomo';
        $data['error'] = $error;

        $this->load->view('header_view', $data);
        //$this->load->view('left_view');
        $this->load->view("building/add.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->building_model->addRecord();
            if ($result)
            {
                $message = "Building added Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'building');
            }
            else
            {
                $message = "Building already exists.";
                $this->session->set_flashdata($this->router->class, $this->input->post('data'));
                $this->session->set_userdata('message_error', $message);
                redirect(base_url() . 'building/add');
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

        $result = $this->building_model->findByID($id);
        $data['arrData'] = $result;

        $data['title'] = "Edit Building";
        $data['type'] = 'accomo';
        $data['error'] = $error;

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("building/edit.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->building_model->editRecord($id);
            if ($result)
            {
                $message = "Building updated Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'building/');
            }
            else
            {
                $message = "Building already exists.";
                $this->session->set_userdata('message_error', $message);  
                redirect(base_url() . 'building/edit/'.$id);
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
        $result = $this->building_model->delete($id);
        if ($result == '1')
        {
            $message = "building deleted Successfully.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'building');
        }
        else
        {
            $message = "Error in deleting building.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'building/');
        }
    }*/
}
?>