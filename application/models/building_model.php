<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Building_model extends CI_Model
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