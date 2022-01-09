<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->session->set_userdata('redirect', $this->uri->uri_string());
        require_once(BASEPATH.'mail/phpmailer/class.phpmailer.php');
        require_once(BASEPATH.'mail/sendEmail.php');
        
        $this->load->library('form_validation');
        $this->load->model('admin_model');
        $this->load->library('pagination');
    }

    public function index($error = "")
    {
        //if user is logged in this will redirect to dashboard page
        if (($this->session->userdata('user_name') != ""))
        {
            $this->welcome();
        }
        else
        {
            $data['title'] = "Login";
            $data['error'] = $error;
            $this->load->view("login_view.php", $data);
        }
    }

    public function accomodation()
    {
        $data['title'] = 'Room Listing';

        $this->load->model('room_model');
        $data['building_data'] = $this->db->from("building")->order_by("id", "ASC")->get()->result_array();

        $this->load->view('header_view', $data);
        //$this->load->view('left_view');
        $this->load->view('room_booking_view.php');
        $this->load->view('footer_view');
    }

    public function report()
    {
        $data['title'] = 'Reports';

        $this->load->model('room_model');
        $data['building_data'] = $this->db->from("building")->order_by("id", "ASC")->get()->result_array();

        $this->load->view('header_view', $data);
        //$this->load->view('left_view');
        $this->load->view('room_booking_view.php');
        $this->load->view('footer_view');
    }

    //When User Is Logged In... Show dashboard
    public function welcome()
    {
        $data['title'] = 'Home';

        // $this->load->model('room_model');
        // $data['building_data'] = $this->db->from("building")->order_by("id", "ASC")->get()->result_array();
        // $data['floor_data'] = $this->db->from("floor")->order_by("id", "ASC")->get()->result_array();
        // $rooms = $this->db->from("room")->order_by("id", "ASC")->get()->result_array();

        // $arrRooms = array();
        // foreach($rooms as $k=>$room){
        //     $arrRooms[$room['building_id']][$room['id']] = $room;
        // }
        // $data['arrRooms'] = $arrRooms;

        $this->load->view('header_view', $data);
        //$this->load->view('left_view');
        $this->load->view('home.php');
        $this->load->view('footer_view');
    }

    public function room_listing()
    {
        $data['title'] = 'Room Listing';

        $this->load->model('room_model');
        $data['building_data'] = $this->db->from("building")->order_by("id", "ASC")->get()->result_array();
        /*$data['floor_data'] = $this->db->from("floor")->order_by("id", "ASC")->get()->result_array();
        $data['room_type_data'] = $this->db->from("room_type")->order_by("id", "ASC")->get()->result_array();
        $rooms = $this->db->where('building_id', '1')->from("room")->order_by("id", "ASC")->get()->result_array();

        $arrRooms = array();
        foreach($rooms as $k=>$room){
            $arrRooms[$room['building_id']][$room['floor_id']][$room['id']] = $room;
        }
        $data['arrRooms'] = $arrRooms;*/

        $this->load->view('header_view', $data);
        //$this->load->view('left_view');
        $this->load->view('room_booking_view', $data);
        $this->load->view('footer_view');
    }


    public function get_floorplan_html($building_id)
    {
        $data['floor_data'] = $this->db->from("floor")->order_by("id", "ASC")->get()->result_array();
        $data['room_type_data'] = $this->db->from("room_type")->order_by("id", "ASC")->get()->result_array();

        $rooms = $this->db->where('building_id',$building_id)->from("room")->order_by("id", "ASC")->get()->result_array();
        $arrRooms = array();
        foreach($rooms as $k=>$room){
            $arrRooms[$room['floor_id']][$room['id']] = $room;
        }
        $data['arrRooms'] = $arrRooms;

        $this->load->view('get_floorplan_html', $data);
    }



    public function change_room_status()
    {
       $data = $this->input->post();

       $this->db->where('building_id', $data['building_id']);
       $this->db->where('id', $data['room_id']);
       $this->db->where('status', $data['room_status']);
       $query = $this->db->get("room");

        if ($query->num_rows != 0)
        {
            $update_data = array('status' => $data['status']);
            $this->db->where('id', $data['room_id']);
            $query = $this->db->update('room',$update_data);
            echo "Room status change sucessfully.";
        } else {
            echo "Your room status is not change.";
        }
       
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');


        $result = $this->admin_model->login($email, $password);

        if ($result)
        {
            if($this->session->userdata('redirect'))
            {
             redirect(base_url().$this->session->userdata('redirect'));   
            }   
            else
            {
                if($this->session->userdata('role_id') == '1')
                {
                    redirect(base_url());
                }
                else if($this->session->userdata('role_id') == '4')
                {
                    redirect(base_url());
                }
                else
                {
                    redirect(base_url());
                }
            }
        }
        else
        {
            $message = "Email or Password Is incorrect";
            $this->session->set_flashdata($this->router->class, $this->input->post('data'));
            $this->session->set_userdata('message_error', $message);
            redirect(base_url() . 'dashboard');
        }
    }
    
    public function forgotPassword()
    {
        $email = $this->input->post('email');

        $is_exist_email = $this->admin_model->checkEmail($email);

        if($is_exist_email == "no")
        {
            $message = "This email-id doesn't exist on our system, Try again.";
            $this->session->set_flashdata($this->router->class, $this->input->post('data'));
            $this->session->set_userdata('message_error', $message);
            redirect(base_url() . 'dashboard');
        }            
        else 
        {              
            $user_name = $is_exist_email->firstname;
            $random_name = random_string('alnum', 12);
            $is_inserted = $this->admin_model->insertSalt($email, $random_name);

            if($is_inserted)
            {
                $subject = "Forgot Password";

                $user_forgot_data = array(
                    'user' => $user_name,
                    'salt' => $random_name                    
                    );

                $message = $this->load->view('email_templates/send_forgot_link', $user_forgot_data, true);   

                sendEmail($email, $subject, $message);

                $message = "An Email has been sent. Please check your mail and visit the link to change your password. Thank you!";
                $this->session->set_flashdata($this->router->class, $this->input->post('data'));
                $this->session->set_userdata('message_success', $message);
                redirect(base_url() . 'dashboard');                    

            }
            else 
            {
                $message = "Failed to progress change password, Try again.";
                $this->session->set_flashdata($this->router->class, $this->input->post('data'));
                $this->session->set_userdata('message_error', $message);
                redirect(base_url() . 'dashboard');
            }
         }

    }
    
    public function getEmail($salt)
    {
        $is_exist_salt = $this->admin_model->checkSalt($salt);
        if($is_exist_salt == "no")
        {
            $message = "This link is either used or it is not a valid link.";
            $this->session->set_flashdata($this->router->class, $this->input->post('data'));
            $this->session->set_userdata('message_error', $message);
            redirect(base_url() . 'dashboard');
        }
        else 
        {   
            $data['user_email'] = $is_exist_salt->email;
            $data['pass_salt'] = $is_exist_salt->forgot_pwd_salt;
            $data['title'] = "Change Password";                
            $this->load->view("password_change_view.php",$data);
        }

    }

    public function changePassword()
    {               
        $forget_salt = $this->input->post('password_salt');
        $password = $this->input->post('cpassword');

        $is_exist_salt = $this->admin_model->checkSalt($forget_salt);

        $email = $is_exist_salt->email;
        $user_name = $is_exist_salt->firstname;
        $salt = $is_exist_salt->salt;

        $is_updated_password = $this->admin_model->changePassword($salt, $forget_salt, $password);

        if($is_updated_password)
        {
            $subject = "Password Changed";

            $user_password_data = array(
                'email' => $email,
                'user' => $user_name,
                'password' => $password
                );

            $mail_message = $this->load->view('email_templates/new_password_mail', $user_password_data, true);                           
            sendEmail($email, $subject, $mail_message);

            $message = "An Email has been sent. Please check your mail to see your changed password. Thank you!";
            $this->session->set_flashdata($this->router->class, $this->input->post('data'));
            $this->session->set_userdata('message_success', $message);
            redirect(base_url() . 'dashboard');                

        }
        else 
        {
            $message = "Failed to change your password. Please try again later.";
            $this->session->set_flashdata($this->router->class, $this->input->post('data'));
            $this->session->set_userdata('message_error', $message);
            redirect(base_url() . 'dashboard');
        }

    }
    
    public function logout()
    {
        $newdata = array(
            'user_id' => '',
            'user_name' => '',
            'user_lname' => '',
            'user_email' => '',
            'permissions'=>'',
            'logged_in' => FALSE,
        );
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        $this->index();
    }

    private function array_mode($arr) {
        $count = array();
        foreach ((array)$arr as $val) {
          if (!isset($count[$val])) { $count[$val] = 0; }
          $count[$val]++;
        }
        arsort($count);
        return key($count);
    }
    private function format($number)
    {
        return number_format((float)$number, 2, '.', '');
    }
 
}
?>