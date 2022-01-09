<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dailyentry_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function addRecord()
    {
        $data = $this->input->post('data');
        $data['created'] = getCurrentTime();
        $data['created_by'] = $this->session->userdata('user_id');

        $this->db->where("created_by", $this->session->userdata('user_id'));
        $this->db->where("entry_date", $data['entry_date']);
        $query = $this->db->get("daily_entry");

        if ($query->num_rows == 0)
        {
            $query = $this->db->insert('daily_entry', $data);
            return $query;
        }
        else
        {
            return '0';
        }
    }
    
  /*  function editRecord($id="")
    {
        $data = $this->input->post('data');
        $category_name = $this->input->post('category_name');
        $this->db->where("category_name", $category_name);
        $this->db->where("id <>", $id);
        $query = $this->db->get("daily_entry");

        if ($query->num_rows == 0)
        {
            $this->db->where('id', $id);
            $query = $this->db->update('daily_entry',array('category_name'=>$category_name,'status'=>$data['status']));
            return $query;
        }
        else
        {
            return '0';
        }
    }
*/
    function listRecords($year,$month)
    {
        $this->db->select("daily_entry.*,admins.code");
        $this->db->join("admins","admins.id = daily_entry.created_by");
        $this->db->from("daily_entry");

        $this->db->where("year(entry_date)",$year);
        $this->db->where("month(entry_date)",$month);

        $this->db->order_by("entry_date", "DESC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $rows)
            {
                $data[$rows['id']] = $rows;
            }
        }
        return $data;
    }
    
    function findByID($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("daily_entry");
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
        $query = $this->db->delete('daily_entry');
        return $query;
    }*/
}
?>