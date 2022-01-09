<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Size_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function addRecord()
    {
        $data = $this->input->post('data');
        $data['created'] = getCurrentTime();

        $this->db->where("size_w", $data['size_w']);
        $this->db->where("size_h", $data['size_h']);
        $query = $this->db->get("size");

        if ($query->num_rows == 0)
        {
            $query = $this->db->insert('size', $data);
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
    
        $this->db->where("size_w", $data['size_w']);
        $this->db->where("size_h", $data['size_h']);
        $this->db->where("id <>", $id);
        $query = $this->db->get("size");

        if ($query->num_rows == 0)
        {
            $this->db->where('id', $id);
            $query = $this->db->update('size',$data);
            return $query;
        }
        else
        {
            return '0';
        }
    }

    function listRecords()
    {
        $this->db->from("size");
        $this->db->order_by("seq", "ASC");
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
        $query=$this->db->get("size");
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
        $query = $this->db->delete('size');
        return $query;
    }*/
}
?>