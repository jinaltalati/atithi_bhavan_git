<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function check_logged_in()
    {
        if ($this->session->userdata('logged_in') != 1)
        {
            redirect(site_url());
        }
    }

    function login($email, $password)
    {
        // pre($this->input->post());
        // die;
        // if ($this->input->post('admin_login'))
        // {
            $this->db->where("email", $email);
            $query = $this->db->get("admins");

            if ($query->num_rows() > 0)
            {
                $userData = $query->result();
                $userData = $userData[0];

                if (md5($userData->salt . $password) == $userData->password)
                {
                    //add all data to session 
                    $newdata = array(
                        'user_id' => $userData->id,
                        'user_name' => $userData->firstname,
                        'user_lname' => $userData->lastname,
                        'user_email' => $userData->email,
                        'role_id' => $userData->role_id,
                        'code' => $userData->code,
                        'logged_in' => TRUE,
                    );
                    $this->session->set_userdata($newdata);

                    
                    return true;
                }
                else
                {
                    return false;
                }
            }
            return false;
        // }
        // else
        // {
        //     return false;
        // }
    }

    function add() //$uploadData
    {
        $data = $this->input->post('data');
        if (!empty($uploadData) && $uploadData['file_name'] != "")
            $data['profile_image'] = $uploadData['file_name'];

        $data['created'] = getCurrentTime();
        
        $this->db->where("email", $data['email']);
        $query = $this->db->get("admins");

        $salt = rand() * time();
        $data['salt'] = $salt;
        $data['password'] = md5($salt . $data['password']);

        if ($query->num_rows == 0)
        {
            $query = $this->db->insert('admins', $data);
            return $query;
        }
        else
        {
            return '0';
        }
    }

    function findByID($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get("admins");
        $data = "";
        foreach ($query->result() as $rows)
        {
            $data = $rows;
        }
        return $data;
    }

    function edit($id = "") //$uploadData
    {
        $data = $this->input->post('data');
        $this->db->where("email", $data['email']);
        $this->db->where("id <>", $id);
        $query = $this->db->get("admins");

        if ($data['password'] != "")
        {
            $salt = rand() * time();
            $data['salt'] = $salt;
            $data['password'] = md5($salt . $data['password']);
        }
        else
        {
            unset($data['password']);
        }

        if ($query->num_rows == 0)
        {
            $this->db->where('id', $id);
            $query = $this->db->update('admins', $data);
            return $query;
        }
        else
        {
            return '0';
        }
    }

    function listAdmins()
    {
        $this->db->from("admins");
        $this->db->order_by("firstname , lastname", "Asc");
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

    function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('admins');
        return $query;
    }

//    Added By Hardik Sonchhabda
    public function checkEmail($email)
    {
        $this->db->where("email", $email);
        $query = $this->db->get("admins");

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $rows)
            {
                $result = $rows;
            }
        }
        else
        {
            $result = "no";
        }
        return $result;
    }

    public function insertSalt($email, $random_name)
    {
        $ins_array = array(
            "forgot_pwd_salt" => $random_name
        );

        $this->db->where('email', $email);
        $query = $this->db->update('admins', $ins_array);
        return $query;
    }

    public function checkSalt($salt)
    {
        $this->db->where("forgot_pwd_salt", $salt);
        $query = $this->db->get("admins");

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $rows)
            {
                $result = $rows;
            }
        }
        else
        {
            $result = "no";
        }
        return $result;
    }

    public function changePassword($salt, $forget_salt, $password)
    {
        $upd_pwd_array = array(
            "forgot_pwd_salt" => "",
            "password" => md5($salt . $password)
        );

        $this->db->where('forgot_pwd_salt', $forget_salt);
        $query = $this->db->update('admins', $upd_pwd_array);
        return $query;
    }

    /**
     * 
     * @param type $role_id
     * @return arry of perons having particaular role id
     */
    public function getRolePersonList($role_id)
    {
        $this->db->select('admins.id, admins.firstname, admins.lastname');
        $this->db->where("role_id", $role_id);
        $query = $this->db->get("admins");
        $deliveryPersonData = "";
        foreach ($query->result() as $row)
        {
            $row->full_name = $row->firstname. ' ' .$row->lastname;
            $deliveryPersonData[$row->id] = $row;
        }
        return $deliveryPersonData;
    }

}

?>