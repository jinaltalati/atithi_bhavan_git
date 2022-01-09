<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         
        $this->session->set_userdata('redirect', $this->uri->uri_string());
        if (($this->session->userdata('user_id') == ""))
            redirect(base_url());

        $this->load->library('form_validation');
        $this->load->model(array('press_model','paper_model','size_model'));
    }

    public function index($error = "")
    {
        $rows = array();
        $trans_date_1 = $trans_date_2 = '';
        if ($this->input->post('submit'))
        {
            $press = $this->input->post('press');
            $paper = $this->input->post('paper');
            $size = $this->input->post('size');
            $trans_date_1 = $this->input->post('trans_date_1');
            $trans_date_2 = $this->input->post('trans_date_2');
            /*$this->db->where("press", $press);
            $this->db->group_by('size,paper');
            $rows = $this->db->get("paper_ledger")->result_array();*/
            $strWhere = ' 1=1 ';
            if(trim($press) != '')
            {
                $strWhere .= " AND press = '".$press."'";
            }

            if(trim($paper) != '')
            {
                $strWhere .= " AND paper = '".$paper."'";
            }

            if(trim($size) != '')
            {
                $strWhere .= " AND size = '".$size."'";
            }

            if($trans_date_1 == '' && $trans_date_2 == ''){
                $q = "SELECT * FROM paper_ledger 
                    join paper on paper.id = paper_ledger.paper
                    join size on size.id = paper_ledger.size
                    WHERE paper_ledger.id IN (
                        SELECT MAX(id) AS max_id FROM paper_ledger WHERE press = '".$press."' AND".$strWhere."   GROUP BY size,paper
                        ) ORDER BY 
                paper.seq ASC, size.seq ASC";    
            }else{
                if($trans_date_1 != '')
                {
                    $strWhere .= " AND trans_date >= '".$trans_date_1."'";
                }
                if($trans_date_2 != '')
                {
                    $strWhere .= " AND trans_date <= '".$trans_date_2."'";
                }

                $q = "SELECT * FROM paper_ledger 
                join paper on paper.id = paper_ledger.paper
                join size on size.id = paper_ledger.size
                WHERE press = '".$press."' AND".$strWhere.' ORDER BY 
                paper.seq ASC, size.seq ASC , trans_date ASC';   
            }
            

            $rows = $this->db->query($q)->result_array();
        }

        $data['title'] = "Report";
        $data['error'] = $error;

        $data['press'] = $this->press_model->listRecords();

        $data['papers'] = $this->paper_model->listRecords();
        $data['sizes'] = $this->size_model->listRecords();

        $data['trans_date_1'] = $trans_date_1;
        $data['trans_date_2'] = $trans_date_2;

        $data['rows']  = $rows;
        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("report/list.php", $data);
        $this->load->view('footer_view');
    }
}
?>