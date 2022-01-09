<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Room_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function addRecord()
    {
        $data = $this->input->post('data');
        $data['created'] = getCurrentTime();

        $this->db->where("building_id", $data['building_id']);
        $this->db->where("floor_id", $data['floor_id']);
        $this->db->where("room_type_id", $data['room_type_id']);
        $this->db->where("room_name", $data['room_name']);
        $query = $this->db->get("room");

        if ($query->num_rows == 0)
        {
            $query = $this->db->insert('room', $data);
            return $query;
        }
        else
        {
            return '0';
        }
    }
    
    function editRecord($id="")
    {
        $data = $this->input->post('data');
        
        $this->db->where("building_id", $data['building_id']);
        $this->db->where("floor_id", $data['floor_id']);
        $this->db->where("room_type_id", $data['room_type_id']);
        $this->db->where("room_name", $data['room_name']);
        $this->db->where("id != ", $id);
        $query = $this->db->get("room");

        if ($query->num_rows == 0)
        {
            $this->db->where('id', $id);
            $query = $this->db->update('room',$data);
            return $query;
        }
        else
        {
            return false;
        }
    }

    function listRecords()
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
            }
        }
        return $data;
    }
    
    function findByID($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("room");
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
        $query = $this->db->delete('room');
        return $query;
    }*/

     function getlistBuilding()
    {
        $this->db->from("building");
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

     function getlistRoom()
    {
        $this->db->from("floor");
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

    function getlistFloor($building_id)
    {
        $this->db->where("building_id",$building_id);
        $query=$this->db->get("floor");
        $data = $query->result_array();
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