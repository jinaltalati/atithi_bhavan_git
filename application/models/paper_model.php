<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paper_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function addRecord()
    {
        $data = $this->input->post('data');
        $data['created'] = getCurrentTime();

        $this->db->where("gsm", $data['gsm']);
        $this->db->where("paper_name", $data['paper_name']);
        $query = $this->db->get("paper");

        if ($query->num_rows == 0)
        {
            $query = $this->db->insert('paper', $data);
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
    
        $this->db->where("gsm", $data['gsm']);
        $this->db->where("paper_name", $data['paper_name']);
        $this->db->where("id <>", $id);
        $query = $this->db->get("paper");

        if ($query->num_rows == 0)
        {
            $this->db->where('id', $id);
            $query = $this->db->update('paper',$data);
            return $query;
        }
        else
        {
            return '0';
        }
    }

    function listRecords()
    {
        $this->db->from("paper");
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
        $query=$this->db->get("paper");
        $data = "";
        foreach($query->result() as $rows)
            {                
                $data = $rows;
            }
            return $data;
    }

    function addSale()
    {
        $data = $this->input->post();

        $lastRecord = $this->getLastEntry($data['paper'],$data['size'],$data['press']);
        $data['rate_per_sheet'] = $lastRecord['rate_per_sheet'];
        $data['total_amt'] = $lastRecord['rate_per_sheet'] * $data['sale'];
        unset($data['submit']);
        $data['trans_type'] = 'Sale';
        $data['created'] = getCurrentTime();
        $query = $this->db->insert('paper_ledger', $data);
        return $query;
    }
    function addPurchase()
    {
        $data = $this->input->post();
        $lastRecord = $this->getLastEntry($data['paper'],$data['size'],$data['press']);
        $data['opening'] = $lastRecord['closing'];
        $data['closing'] = $lastRecord['closing'] + $data['purchase'];
        unset($data['submit']);
        //$data['total_amt'] = $data['purchase'] * $data['rate_per_sheet'];
        $data['trans_type'] = 'Purchase';
        $data['created'] = getCurrentTime();
        $query = $this->db->insert('paper_ledger', $data);
        return $query;
    }
    public function listPaperLedgerRecords($type,$trans_date)
    {
        /*if ($this->session->userdata('role_id') != "1")
        {
            $this->db->where("trans_type","Sale");
        }*/
        $this->db->where("trans_type",$type);

        if($type != 'purchase')
        {
            $this->db->where("trans_date",$trans_date);
        }  

        if(trim($this->input->post('paper')) !='')
        {
           $this->db->where("paper",$this->input->post('paper')); 
        } 

        if(trim($this->input->post('size')) !='')
        {
           $this->db->where("size",$this->input->post('size')); 
        }

        $this->db->select("paper_ledger.*,paper.paper_name,paper.gsm,press.press_name,size.size_w,size.size_h");
        $this->db->from("paper_ledger");
        $this->db->join("paper","paper.id = paper_ledger.paper");
        $this->db->join("press","press.id = paper_ledger.press");
        $this->db->join("size","size.id = paper_ledger.size");
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }

    public function getLastEntry($paper,$size,$press='')
    {
        if(trim($paper) != '' && trim($size) != '')
        {
            $this->db->select("*");
            $this->db->from("paper_ledger");
            $this->db->where("paper",$paper);
            $this->db->where("size",$size);
            if($press != ''){
                $this->db->where("press",$press);
            }
            $this->db->order_by("id", "DESC");

            $query = $this->db->get();
            $data = $query->row_array();
            return $data;
        }
        return '';
        
    }


    public function getLastPurchase($paper,$size,$press='')
    {
        if(trim($paper) != '' && trim($size) != '')
        {
            $this->db->select("*");
            $this->db->from("paper_ledger");
            $this->db->where("trans_type",'Purchase');
            $this->db->where("paper",$paper);
            $this->db->where("size",$size);
            if($press != ''){
                $this->db->where("press",$press);
            }
            $this->db->order_by("id", "DESC");

            $query = $this->db->get();
            $data = $query->row_array();
            return $data;
        }
        return '';
        
    }

    public function updateBillNo()
    {
        $id = $this->input->post('pk');
        if(trim($id) != '')
        {
            $name = $this->input->post('name');
            $data[$name] = $this->input->post('value');
            if($name == 'stock_arrival_date' && trim($this->input->post('value')) == ''){
                $data[$name] = NULL;
            }
            $this->db->where('id', $id);
            $query = $this->db->update('paper_ledger',$data);
            return $query;
        } else {
            return 0;
        }
    }

    public function last_entry($type)
    {
        $this->db->from("paper_ledger");
        $this->db->where("trans_type",$type);
        $this->db->order_by("id", "DESC");

        $query = $this->db->get();
        $data = $query->row_array();
        return $data;
    }

    /*
    function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('paper');
        return $query;
    }*/
}
?>