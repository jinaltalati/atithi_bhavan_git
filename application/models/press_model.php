<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class press_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function addRecord()
    {
        $data = $this->input->post('data');
        $data['created'] = getCurrentTime();

        $this->db->where("press_name", $data['press_name']);
        $query = $this->db->get("press");

        if ($query->num_rows == 0)
        {
            $query = $this->db->insert('press', $data);
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
    
        $this->db->where("press_name", $data['press_name']);
        $this->db->where("id <>", $id);
        $query = $this->db->get("press");

        if ($query->num_rows == 0)
        {
            $this->db->where('id', $id);
            $query = $this->db->update('press',$data);
            return $query;
        }
        else
        {
            return '0';
        }
    }

    function listRecords()
    {
        $this->db->from("press");
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
        $query=$this->db->get("press");
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
        $query = $this->db->delete('press');
        return $query;
    }*/
}
?>