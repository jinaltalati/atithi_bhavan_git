<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function addRecord($building_id="",$room_id="")
    {
        
        $data = $this->input->post('data');
        $data['created'] = getCurrentTime();


        $this->db->where("mobile", $data['mobile']);
        $query = $this->db->get("beneficiaries");
        if ($query->num_rows == 0)
        {
            $arrUser = array();
            $arrUser['customer_name'] = $data['customer_name'];
            $arrUser['email'] = $data['email'];
            $arrUser['mobile'] = $data['mobile'];
            $arrUser['address'] = $data['address'];
            $arrUser['id_proof'] = $data['id_proof'];
            $arrUser['created'] = date('Y-m-d H:i:s');
            $this->db->insert('beneficiaries', $arrUser);

            $data['beneficiary_id'] = $this->db->insert_id();
        }
        else{
            $row = $query->row_array();
            $data['beneficiary_id'] = $row['id'];

                $arrUser = array();
                $arrUser['customer_name'] = $data['customer_name'];
                $arrUser['email'] = $data['email'];
                $arrUser['mobile'] = $data['mobile'];
                $arrUser['address'] = $data['address'];
                $arrUser['id_proof'] = $data['id_proof'];
                $arrUser['created'] = date('Y-m-d H:i:s');

                $this->db->where('mobile', $data['mobile']);
                $this->db->update('beneficiaries', $arrUser);
        }
        // $this->db->where("mobile", $data['mobile']);
        // $query = $this->db->get("booking");

        // if ($query->num_rows == 0)
        // {
            

            $query = $this->db->insert('booking', $data);

            $update_data = array('status' => 'Booked');
            $this->db->where('id', $room_id);
            $query = $this->db->update('room',$update_data);

            return $query;
        // }
        // else
        // {
        //     return '0';
        // }
    }
    
    function editRecord($building_id="", $floor_id="", $room_id="")
    {
        $data = $this->input->post('data');
    
        // $this->db->where("mobile", $data['mobile']);
        // $query = $this->db->get("booking");

        // if ($query->num_rows == 0)
        // {
            $update_data = array('status' => 'In Cleaning');
            $this->db->where('id', $room_id);
            $query = $this->db->update('room',$update_data);

            $data['modified'] = getCurrentTime();
            $data['check_out'] = date('Y-m-d H:i:s');
            $data['status'] = 'Checkout';
            $this->db->where('room_id', $room_id);
            $this->db->where('building_id', $building_id);
            $this->db->where('floor_id', $floor_id);
            $query = $this->db->update('booking',$data);
            return $query;
        // }
        // else
        // {
        //     return '0';
        // }
    }

    function listRecords()
    {
        $this->db->from("booking");
        $this->db->order_by("id", "ASC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $rows)
            {
                $data[$rows->id] = $rows;
            }
        }
        return $data;
    }
    
    function findByID($building_id="", $room_id="")
    {
        $this->db->where("building_id",$building_id);
        $this->db->where("room_id",$room_id);
        $query=$this->db->get("booking");
        $data = "";
        foreach($query->result() as $rows)
            {                
                $data = $rows;
            }
            return $data;
    }
    /*
    function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('customer');
        return $query;
    }*/

    function getlistBuilding($building_id="", $room_id="")
    {
        $this->db->from("building");
        $this->db->where("id", $building_id);
        $this->db->order_by("id", "ASC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $rows)
            {
                //$data[$rows->id] = $rows;
                $data[] = $rows;
            }
        }
        return $data;
    }

     function getlistFloor($floor_id)
    {
        $this->db->from("floor");
         $this->db->where("id", $floor_id);
        $this->db->order_by("id", "ASC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $rows)
            {
                //$data[$rows->id] = $rows;
                $data[] = $rows;
            }
        }
        return $data;
    }

    function getlistRoom($room_id="")
    {
        $this->db->from("room");
        $this->db->where("id", $room_id);
        $this->db->order_by("id", "ASC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $rows)
            {
                //$data[$rows->id] = $rows;
                $data[] = $rows;
            }
        }
        return $data;
    }


    function listBuilding()
    {
        $this->db->from("building");
        $this->db->order_by("id", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $rows)
            {
                $data[$rows->id] = $rows;
            }
        }
        return $data;
    }

    function listRoom()
    {
        $this->db->from("room");
        $this->db->order_by("id", "ASC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $rows)
            {
                $data[$rows->id] = $rows;
                //$data[] = $rows;
            }
        }
        return $data;
    }

    function getlistBooking($building_id="",$floor_id, $room_id="")
    {
        $this->db->from("booking");
        $this->db->where("building_id", $building_id);
        $this->db->where("floor_id", $floor_id);
        $this->db->where("room_id", $room_id);
        $this->db->order_by("id", "ASC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $rows)
            {
                $data[] = $rows;
                //$data[] = $rows;
            }
        }
        return $data;
    }

    function getlistRoomType($building_id = "")
    {
        if($building_id) {
            $this->db->where("building_id",$building_id);
        }
        
        $query=$this->db->get("room_type");
        $data = $query->result_array();
        return $data;
    }
}
?>