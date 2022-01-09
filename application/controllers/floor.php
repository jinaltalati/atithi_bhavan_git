<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Floor extends CI_Controller
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
        $this->load->model('floor_model');
    }

    public function index($error = "")
    {
        $result = $this->floor_model->listRecords();
        $data['building_data'] = $this->floor_model->getlistBuilding();

        $data['arrData'] = $result;

        $data['title'] = "Floor List";
        $data['error'] = $error;
        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("floor/list.php", $data);
        $this->load->view('footer_view');
    }

    public function add($error = "")
    {
        $data['title'] = "Add Floor";
        $data['error'] = $error;
        $data['building_data'] = $this->floor_model->getlistBuilding();

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("floor/add.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->floor_model->addRecord();
            if ($result)
            {
                $message = "Floor added Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'floor');
            }
            else
            {
                $message = "Floor already exists.";
                $this->session->set_flashdata($this->router->class, $this->input->post('data'));
                $this->session->set_userdata('message_error', $message);
                redirect(base_url() . 'floor/add');
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

        $result = $this->floor_model->findByID($id);
        $data['arrData'] = $result;

        $data['title'] = "Edit Floor";
        $data['error'] = $error;
        $data['building_data'] = $this->floor_model->getlistBuilding();

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("floor/edit.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->floor_model->editRecord($id);
            if ($result)
            {
                $message = "Floor updated Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'floor/');
            }
            else
            {
                $message = "Floor already exists.";
                $this->session->set_userdata('message_error', $message);  
                redirect(base_url() . 'floor/edit/'.$id);
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
        $result = $this->floor_model->delete($id);
        if ($result == '1')
        {
            $message = "floor deleted Successfully.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'floor');
        }
        else
        {
            $message = "Error in deleting floor.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'floor/');
        }
    }*/
}
?>