<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admins extends CI_Controller
{
    public function __construct()
    {
        //test
        parent::__construct();
        $this->session->set_userdata('redirect', $this->uri->uri_string());
        if (($this->session->userdata('user_id') == ""))
            redirect(base_url());

        if (($this->session->userdata('role_id') != "1"))
            redirect(base_url().'dailyentry/');
        
        $this->load->library('form_validation');
        $this->load->model('admin_model');       
    }

    public function index($error = "")
    {
        if($this->session->userdata('role_id') != '1')
        {
            $this->session->set_userdata('message_error', "You are not authorized to access this module.");
            redirect(base_url());  
        }
        $result = $this->admin_model->listAdmins();

        $data['userData'] = $result;

        $data['title'] = "Admin List";
        $data['error'] = $error;
        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("admin/admin_list.php", $data);
        $this->load->view('footer_view');
    }

    public function add($error = "")
    {
        if($this->session->userdata('role_id') != '1')
        {
            $this->session->set_userdata('message_error', "You are not authorized to access this module.");
            redirect(base_url());  
        }
        
        $data['title'] = "Add Admin";
        $data['error'] = $error;
        
        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("admin/add.php", $data);
        $this->load->view('footer_view');

        if ($this->input->post('submit'))
        {
           /* $uploadData = parent::do_upload_single('profile_image', './assets/files/admin/', 'gif|jpg|png|jpeg', '10000', 1, 30, 30);*/
            
            /*if(isset($uploadData))
            {
                @unlink('./assets/files/admin/'.$result->profile_image);
                @unlink('./assets/files/admin/thumb/'.$result->profile_image);
            }*/
            
            $result = $this->admin_model->add(); //$uploadData
            if ($result)
            {
                $message = "Admin added Successfully.";
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'admins/');
            }
            else
            {
                $message = "Email address already exists.";
                $this->session->set_flashdata($this->router->class, $this->input->post('data'));
                $this->session->set_userdata('message_error', $message);
                redirect(base_url() . 'admins/add');
            }
        }
    }
    
    public function editProfile()
    {
        $this->edit();
    }
    
    public function edit($id = "", $error = "")
    {
        if($this->session->userdata('role_id') != '1' && strpos($this->uri->uri_string, 'editProfile') == false)
        {
            $this->session->set_userdata('message_error', "You are not authorized to access this module.");
            redirect(base_url());  
        }
        //if ($this->uri->segment(1) == 'editProfile')
        if (strpos($this->uri->uri_string, 'editProfile') !== false)
        {
            $id = $this->session->userdata('user_id');
            $result = $this->admin_model->findByID($id);
            $data['userData'] = $result;
           
           

            $data['title'] = "Edit Profile";
            $data['error'] = $error;

            $this->load->view('header_view', $data);
            $this->load->view('left_view');
            $this->load->view("admin/edit.php", $data);
            $this->load->view('footer_view');


            if ($this->input->post('submit'))
            {              
                $uploadData = parent::do_upload_single('profile_image', './assets/files/admin/', 'gif|jpg|png|jpeg', '10000', 1, 30, 30);
                
                $result1 = $this->admin_model->edit($id, $uploadData);
                if ($result1)
                {
                    //add all data to session 
                    $data = $this->input->post('data');
                    $newdata = array(
                        'user_name' => $data['firstname'],
                        'user_lname' => $data['lastname'],
                        'user_email' => $data['email']
                    );
                    $this->session->set_userdata($newdata);
                    $message = "Profile updated Successfully.";
                    $this->session->set_userdata('message_success', $message);
                    redirect(base_url() . 'editProfile/');
                }
                else
                {
                    $message = "Email already exists.";
                    $this->session->set_userdata('message_error', $message);
                    redirect(base_url() . 'editProfile/');
                }
            }
        }
        else
        {
            $result = $this->admin_model->findByID($id);
            $data['userData'] = $result;
 
            $data['title'] = "Edit Admin";
            $data['error'] = $error;

            $this->load->view('header_view', $data);
            $this->load->view('left_view');
            $this->load->view("admin/edit.php", $data);
            $this->load->view('footer_view');

            if ($this->input->post('submit'))
            {
                /*if($_FILES['profile_image']['name'] != '')
                {
                    $uploadData = parent::do_upload_single('profile_image', './assets/files/admin/', 'gif|jpg|png|jpeg', '10000', 1, 30, 30);
                    if(isset($uploadData))
                    {
                        @unlink('./assets/files/admin/'.$result->profile_image);
                        @unlink('./assets/files/admin/thumb/'.$result->profile_image);
                    }
                }*/
                
                $result = $this->admin_model->edit($id); //, $uploadData
                if ($result)
                {
                    $message = "Admin updated Successfully.";
                    $this->session->set_userdata('message_success', $message);
                    redirect(base_url() . 'admins/');
                }
                else
                {
                    $message = "Email already exists.";
                    $this->session->set_userdata('message_error', $message);
                    redirect(base_url() . 'admins/edit/'.$id);
                }
            }
        }
    }

    public function delete($id = "")
    {
        $result = $this->admin_model->delete($id);
        if ($result == '1')
        {
            $message = "Admin deleted Successfully.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'admins/');
        }
        else
        {
            $message = "Error in deleting Admin.";
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'admins/');
        }
    }       
}

?>