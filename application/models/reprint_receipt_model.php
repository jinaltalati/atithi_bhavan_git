<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reprint_receipt_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function addRecord()
    {
        $data = $this->input->post('data');
        $data['created'] = getCurrentTime();

        $this->db->where("building_name", $data['building_name']);
        $query = $this->db->get("building");

        if ($query->num_rows == 0)
        {
            $query = $this->db->insert('building', $data);
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
        
        $this->db->where("building_name", $data['building_name']);
        $this->db->where("id <>", $id);
        $query = $this->db->get("building");

        if ($query->num_rows == 0)
        {
            $this->db->where('id', $id);
            $query = $this->db->update('building',$data);
            return $query;
        }
        else
        {
            return '0';
        }
    }

    function listRecords()
    {

        $this->db->select("building.building_name,booking.*,floor.floor_name,room.room_name");
        $this->db->from("booking");
        $this->db->join('building', 'building.id = booking.building_id'); // this is second table name with both table ids
        $this->db->join('floor', 'floor.id = booking.floor_id'); // this is second table name with both table ids
        $this->db->join('room', 'room.id = booking.room_id'); // this is second table name with both table ids
        $query = $this->db->get();
        $data =  $query->result();

        //pre($data);
        return $data;
    }
    
    function findByID($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("building");
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
        $query = $this->db->delete('building');
        return $query;
    }*/
}
?>