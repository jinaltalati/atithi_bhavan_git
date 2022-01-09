<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cron extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('cron_model');
    }

    public function setPaperTotal()
    {
    	$lastDate = date('t');

    	for($intI =1 ; $intI<=$lastDate;$intI++){

    		$trans_date = date('Y-m-').$intI;
    		

    		$this->db->select("trans_date,SUM(total_amt) as total");
	        $this->db->from("paper_ledger");
	        $this->db->where('trans_date',$trans_date);
	        $this->db->where('trans_type','Sale');
	        $this->db->group_by("trans_date");
	        $this->db->order_by("trans_date", "ASC");
	        $query = $this->db->get();
	        $data = $row = $query->row_array();

	        //foreach ($data as $key => $row) {
	            $arr = array();
	            $arr['entry_date'] = $trans_date;
	            $arr['paper'] = round($row['total'],2);

	            $this->db->from("daily_entry");
	            $this->db->where('entry_date',$trans_date);
	            $query = $this->db->get();

	            if ($query->num_rows == 0)
	            {
	            	$arr['created_by'] = '19';
	            	$arr['created'] = date('Y-m-d H:i:s');
	                $query = $this->db->insert('daily_entry', $arr);
	            }
	            else
	            {
	                $arr['modified'] = date('Y-m-d H:i:s');
	                $row = $query->row_array();
	                $this->db->where('id', $row['id']);
	                $query = $this->db->update('daily_entry', $arr);
	            }
	        //}
    	}
    } 

    public function setCount(){
        $this->db->from("paper_ledger");
        $this->db->order_by("id", "ASC");
        $query = $this->db->get();
        $rows = $query->result_array();

        $arrLastClosing = array();
        foreach($rows as $k=>$v){
            $str = $v['size'].'-'.$v['paper'].'-'.$v['press'];
            $intLastClosing = 0;
            if(isset($arrLastClosing[$str])){
                $intLastClosing = $arrLastClosing[$str];
            }

            $arrUpdate['opening'] = $intLastClosing;
            $arrUpdate['closing'] = $arrLastClosing[$str] = $intLastClosing + $v['purchase'] - $v['sale'];
            
            $this->db->where('id', $v['id']);
            $query = $this->db->update('paper_ledger',$arrUpdate);

        }
    }
}
?>