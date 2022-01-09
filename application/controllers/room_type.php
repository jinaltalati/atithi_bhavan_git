<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Room_type extends CI_Controller
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
        $this->load->model('room_type_model');
    }

    public function index($error = "")
    {
        $result = $this->room_type_model->listRecords();
        $data['building_data'] = $this->room_type_model->getlistBuilding();

        $data['arrData'] = $result;

        $data['title'] = "Room Type List";
        $data['type'] = 'accomo';
        $data['error'] = $error;
        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("room_type/list.php", $data);
        $this->load->view('footer_view');
    }

    public function add($error = "")
    {
        $data['title'] = "Add Room Type";
        $data['type'] = 'accomo';
        $data['error'] = $error;
        $data['building_data'] = $this->room_type_model->getlistBuilding();

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("room_type/add.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->room_type_model->addRecord();
            if ($result)
            {
                $message = "Room Type added Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'room_type');
            }
            else
            {
                $message = "Room Type already exists.";
                $this->session->set_flashdata($this->router->class, $this->input->post('data'));
                $this->session->set_userdata('message_error', $message);
                redirect(base_url() . 'room_type/add');
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

        $result = $this->room_type_model->findByID($id);
        $data['arrData'] = $result;

        $data['title'] = "Edit Room Type";
        $data['type'] = 'accomo';
        $data['error'] = $error;
        $data['building_data'] = $this->room_type_model->getlistBuilding();

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("room_type/edit.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->room_type_model->editRecord($id);
            if ($result)
            {
                $message = "Room Type updated Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'room_type/');
            }
            else
            {
                $message = "Room Type already exists.";
                $this->session->set_userdata('message_error', $message);  
                redirect(base_url() . 'room_type/edit/'.$id);
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
        $result = $this->room_type_model->delete($id);
        if ($result == '1')
        {
            $message = "room_type deleted Successfully.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'room_type');
        }
        else
        {
            $message = "Error in deleting room_type.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'room_type/');
        }
    }*/
}
?>