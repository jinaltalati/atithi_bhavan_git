<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PaperLedger extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         
        $this->session->set_userdata('redirect', $this->uri->uri_string());
        if (($this->session->userdata('user_id') == ""))
            redirect(base_url());

        if ($this->session->userdata('role_id') != "1" && $this->session->userdata('role_id') != "4" ) 
        {
            $message = "You are not authorised to access this page.";
            $this->session->set_userdata('message_error', $message);
            redirect(base_url() . 'dailyentry/add');
        }

        $this->load->library('form_validation');
        $this->load->model(array('paper_model','press_model','size_model'));
    }

    public function index($type = "sale")
    {
        $data['title'] = "Sale Ledger";
        if($type != 'sale')
        {
            $data['title'] = "Purchase Ledger";
            /*if (($this->session->userdata('role_id') != "1"))
            {
                $message = "You are not authorised to access this page.";
                $this->session->set_userdata('message_error', $message);
                redirect(base_url() . 'paperledger/sale');
            }*/
        }
        if ($this->input->post('submit') == 'Add Sale')
        {
            $addSale = $this->paper_model->addSale();
            if ($addSale)
            {
                $message = "Sale added Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'paperledger/'.$type);
            }
            else
            {
                $message = "There was an error. Please try again.";
                $this->session->set_flashdata($this->router->class, $this->input->post('data'));
                $this->session->set_userdata('message_error', $message);
                redirect(base_url() . 'paperledger/'.$type);
            }
        }
        else if($this->input->post('submit') == 'Add Purchase')
        {
            $addPurchase = $this->paper_model->addPurchase();
            if ($addPurchase)
            {
                $message = "Purchase added Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'paperledger/'.$type);
            }
            else
            {
                $message = "There was an error. Please try again.";
                $this->session->set_flashdata($this->router->class, $this->input->post('data'));
                $this->session->set_userdata('message_error', $message);
                redirect(base_url() . 'paperledger/'.$type);
            }
        }

        $trans_date = date('Y-m-d');
        if(trim($this->input->post('trans_date')) != '')
        {
            $trans_date = $this->input->post('trans_date');
        }
        $data['trans_date'] = $trans_date;

        $result = $this->paper_model->listPaperLedgerRecords($type,$trans_date);

        if($type == 'sale')
        {
            $last_entry = $this->paper_model->last_entry('Sale');
            $data['last_entry_date'] = $last_entry['trans_date'];
        }
        else
        {
            $data['last_entry_date'] = date('Y-m-d');
        }

        $data['arrData'] = $result;

        $data['paper'] = $this->paper_model->listRecords();
        $data['press'] = $this->press_model->listRecords();
        $data['size'] = $this->size_model->listRecords();
        $data['type'] = $type;
        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("paper_ledger/list.php", $data);
        $this->load->view('footer_view');
    }

    public function getOpening()
    {
        $paper = $this->input->post('paper');
        $size = $this->input->post('size');
        $press = $this->input->post('press');
        $result = $this->paper_model->getLastEntry($paper,$size,$press);

        $lastPurchase = $this->paper_model->getLastPurchase($paper,$size,$press);

        $arr = array('closing'=>'','rate_lot'=>'');
        if(isset($result['closing']))
        {
            $arr['closing'] =  $result['closing'];
        }
        if(isset($lastPurchase['rate_lot']))
        {
            $arr['rate_lot'] =  $lastPurchase['rate_lot'];
        }
        echo json_encode($arr);
    }

    public function updateBillNo()
    {
        echo $this->paper_model->updateBillNo();
    }

   /* public function add($error = "")
    {
        if (($this->session->userdata('role_id') == "1"))
        {
            redirect(base_url().'dailyentry/');
        }

        $data['title'] = "Add Daily Entry";
        $data['error'] = $error;

        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("dailyentry/add.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
            $result = $this->dailyentry_model->addRecord();
            if ($result)
            {
                $message = "Daily Entry added Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'dailyentry/add');
            }
            else
            {
                $message = "Daily Entry already exists.";
                $this->session->set_flashdata($this->router->class, $this->input->post('data'));
                $this->session->set_userdata('message_error', $message);
                redirect(base_url() . 'dailyentry/add');
            }
        }
    }*/
}
?>