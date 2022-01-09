<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getSiteSettings($arrKey = array())
    {
        if (empty($arrKey))
        {
            $result = $this->db->get("site_settings")->result();
        }
        else
        {
            $this->db->from("site_settings");
            $this->db->where_in('site_settings.setting_key', array_values($arrKey));
            $data = $this->db->get();
        
            foreach ($data->result() as $key=>$val)
            {
               $result[$val->setting_key] =  $val->setting_value;
            }
        }
        return $result;
    }

}

?>