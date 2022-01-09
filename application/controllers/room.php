<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Room extends CI_Controller
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
        $this->load->model('room_model');
    }

    public function index($error = "")
    {
        $result = $this->room_model->listRecords();

        $data['arrData'] = $result;

        $data['title'] = "Room List";
        $data['type'] = 'accomo';
        $data['error'] = $error;
        $data['building_data'] = $this->room_model->getlistBuilding();
        $data['floor_data'] = $this->room_model->getlistRoom();
        $data['room_type_data'] = $this->room_model->getlistRoomType();
        
        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("room/list.php", $data);
        $this->load->view('footer_view');
    }

    public function get_floor_roomtype($building_id = "")
    {
        
        $data['floor_data'] = $this->room_model->getlistFloor($building_id);
        $data['room_type_data'] = $this->room_model->getlistRoomType($building_id);
        echo json_encode($data);
    }

    public function add($error = "")
    {
        $data['title'] = "Add Room";
        $data['type'] = 'accomo';
        $data['error'] = $error;
        $data['building_data'] = $this->room_model->getlistBuilding();
        $data['floor_data'] = $this->room_model->getlistRoom();

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("room/add.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->room_model->addRecord();
            if ($result)
            {
                $message = "Room added Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'room');
            }
            else
            {
                $message = "Room already exists.";
                $this->session->set_flashdata($this->router->class, $this->input->post('data'));
                $this->session->set_userdata('message_error', $message);
                redirect(base_url() . 'room/add');
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

        $result = $this->room_model->findByID($id);
        $data['arrData'] = $result;

        $data['title'] = "Edit Room";
        $data['type'] = 'accomo';
        $data['error'] = $error;
        $data['building_data'] = $this->room_model->getlistBuilding();
        // $data['floor_data'] = $this->room_model->getlistRoom();
        $data['floor_data'] = $this->room_model->getlistFloor($result->building_id);
        $data['room_type_data'] = $this->room_model->getlistRoomType($result->building_id);
        // pre($data);

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("room/edit.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->room_model->editRecord($id);
            if ($result)
            {
                $message = "Room updated Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'room/');
            }
            else
            {
                $message = "Room already exists.";
                $this->session->set_userdata('message_error', $message);  
                redirect(base_url() . 'room/edit/'.$id);
            }
        }
    }

    // public function delete($id = "")
    // {
    //     if($this->session->userdata('role_id') != '1')
    //     {
    //         $this->session->set_userdata('message_error', "You are not authorized to access this module.");
    //         redirect(base_url().'');  
    //     }
    //     $result = $this->room_model->delete($id);
    //     if ($result == '1')
    //     {
    //         $message = "room deleted Successfully.";
    //         $this->session->set_userdata('message_success', $message);
    //         redirect(base_url() . 'room');
    //     }
    //     else
    //     {
    //         $message = "Error in deleting room.";
    //         $this->session->set_userdata('message_success', $message);
    //         redirect(base_url() . 'room/');
    //     }
    // }
}
?>