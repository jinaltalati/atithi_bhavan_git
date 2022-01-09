<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking extends CI_Controller
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
        $this->load->model('booking_model');
    }

    public function index($error = "")
    {
        $result = $this->booking_model->listRecords();
        $data['type'] = 'accomo';
        $data['arrData'] = $result;

        $data['title'] = "Booking List";
        $data['error'] = $error;
        $data['building_data'] = $this->booking_model->listBuilding();
        //$data['floor_data'] = $this->booking_model->getlistFloor();
        $data['room_data'] = $this->booking_model->listRoom();
        
        $this->load->view('header_view', $data);
        //$this->load->view('left_view');
        $this->load->view("booking/list.php", $data);
        $this->load->view('footer_view');
    }

    public function add($building_id="",$floor_id, $room_id="", $error = "")
    {
        $data['title'] = "Add Booking";
        $data['type'] = 'accomo';
        $data['error'] = $error;
        $data['building_id'] = $building_id;
        $data['floor_id'] = $floor_id;
        $data['room_id'] = $room_id;
        $data['building_data'] = $this->booking_model->getlistBuilding($building_id);
        $data['floor_data'] = $this->booking_model->getlistFloor($floor_id);
        $data['room_data'] = $this->booking_model->getlistRoom($room_id);
        $data['room_type_data'] = $this->booking_model->getlistRoomType($building_id);

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("booking/add.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->booking_model->addRecord($building_id,$room_id);
            if ($result)
            {
                $message = "Room Booked Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'dashboard/room_listing');
            }
            else
            {
                $message = "Booking already exists.";
                $this->session->set_flashdata($this->router->class, $this->input->post('data'));
                $this->session->set_userdata('message_error', $message);
                redirect(base_url() . 'booking/add/'.$building_id.'/'.$room_id);
            }
        }
    }

    public function edit($building_id="", $floor_id="", $room_id="", $error = "")
    {
        if($this->session->userdata('role_id') != '1')
        {
            $this->session->set_userdata('message_error', "You are not authorized to access this module.");
            redirect(base_url().'');  
        }

        $result = $this->booking_model->findByID($building_id, $room_id);
        $data['arrData'] = $result;

        //pre($data);

        $data['title'] = "Edit Booking";
        $data['type'] = 'accomo';
        $data['error'] = $error;
        //$data['building_data'] = $this->booking_model->getlistBuilding($building_id);
        //$data['floor_data'] = $this->booking_model->getlistFloor();
        // $data['room_data'] = $this->booking_model->getlistRoom($building_id,$room_id);
        $data['building_id'] = $building_id;
        $data['floor_id'] = $floor_id;
        $data['room_id'] = $room_id;
        $data['building_data'] = $this->booking_model->getlistBuilding($building_id);
        $data['floor_data'] = $this->booking_model->getlistFloor($floor_id);
        $data['room_data'] = $this->booking_model->getlistRoom($room_id);
        $data['room_type_data'] = $this->booking_model->getlistRoomType($building_id);
        $data['booking_data'] = $this->booking_model->getlistBooking($building_id,$floor_id,$room_id);
    
        $this->load->view('header_view', $data);
        //$this->load->view('left_view');
        $this->load->view("booking/edit.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->booking_model->editRecord($building_id,$floor_id,$room_id);
            if ($result)
            {
                $message = "Checkout Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'dashboard/room_listing');
            }
            else
            {
                $message = "Booking already exists.";
                $this->session->set_userdata('message_error', $message);  
                redirect(base_url() . 'booking/edit/'.$building_id.'/'.$room_id);
            }
        }
    }

    public function getFloorRoomTypes()
    {
        $building_id = $this->input->post('building_id');

        $floors = $this->db->where("building_id", $building_id)->from("floor")->get()->result_array();
        $types = $this->db->where("building_id", $building_id)->from("room_type")->get()->result_array();

        $strFloors = $strTypes = '';
        
        foreach($floors as $floor){
            $strFloors .= '<option value="'.$floor['id'].'">'.$floor['floor_name'].'</option>';
        }

        foreach($types as $type){
            $strTypes .= '<option value="'.$type['id'].'">'.$type['room_type_name'].'</option>';
        }

        $arr = array();
        $arr['strFloors'] = $strFloors;
        $arr['strTypes'] = $strTypes;

        echo json_encode($arr);
    }
}
?>