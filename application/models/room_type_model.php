<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Room_type_model extends CI_Model
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
        $this->db->where("room_type_name", $data['room_type_name']);
        $query = $this->db->get("room_type");

        if ($query->num_rows == 0)
        {
            $query = $this->db->insert('room_type', $data);
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
        $this->db->where("room_type_name", $data['room_type_name']);
        $this->db->where("id <>", $id);
        $query = $this->db->get("room_type");

        if ($query->num_rows == 0)
        {
            $this->db->where('id', $id);
            $query = $this->db->update('room_type',$data);
            return $query;
        }
        else
        {
            return '0';
        }
    }

    function listRecords()
    {
        $this->db->from("room_type");
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
    
    function findByID($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("room_type");
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
        $query = $this->db->delete('room_type');
        return $query;
    }*/
}
?>