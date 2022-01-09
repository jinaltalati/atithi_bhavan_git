<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends CI_Controller
{
  public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('redirect', $this->uri->uri_string());
        if(($this->session->userdata('user_id') == ""))
              redirect(base_url());

        if (($this->session->userdata('role_id') != "1"))
          redirect(base_url().'dailyentry/');
        
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('settings_model');  
    }

    public function index($error = "")
    { 
        $postData = $this->input->post('data');

        $data['title'] = "Site Settings";
        $data['error'] = $error;
        
        $SettingData = $this->settings_model->getSiteSettings();
      
        $arrSettingData = object_to_array($SettingData);
       
        $settingData = array();
        $attributeData = array();
       
        foreach ($arrSettingData as $key => $value)
        {
            $settingData[$value['setting_key']] = $value['setting_value'];
            if (trim($value['setting_attribute']) != "")
            {
                $attributeData[$value['setting_key']] = $value['setting_attribute'];
            }
        }
        $attribute = array();
        foreach ($attributeData as $attrKey => $arrVal)
        {
            $attribute[$attrKey] = json_decode($arrVal);
        }
        
        $data['setting'] = $settingData;
        $data['attribute'] = $attribute;
        
        $data['listTimeZone'] = getTimeZoneList();
      
        if($this->input->post('submit') && isset($postData) && $postData != "")
        {
           $flag = true;
           if(isset($postData['email_me_when']))
           $email_me_when = json_encode($postData['email_me_when']);
         
           foreach ($postData as $key => $val)
           {
               $value = ($key == 'email_me_when') ? $email_me_when : $val;
               
               $this->db->where('setting_key', $key);  
               $data = $this->db->update('site_settings',array('setting_value' => $value));
               if(!$data)
                   $flag = false;
           }
           
           if(!empty($_FILES))
           {
               foreach ($_FILES as $key => $file)
               {
                   if ($file['tmp_name'] != "")
                   {
                        list($width, $height) = getimagesize($file['tmp_name']);
                        if (($file["type"] == "image/gif") || ($file["type"] == "image/jpeg") || ($file["type"] == "image/jpg") || ($file["type"] == "image/png")  || ($file["type"] == "image/x-icon"))
                        {  
                            //Image File
                             if($attribute[$key]->width >= $width  && $attribute[$key]->height  >= $height)
                            {
                               $success = $this->do_upload($key,$attribute[$key]->width,$attribute[$key]->height);
                               if($success == '1')
                               {
                                    $data = $this->db->get_where('site_settings',array('setting_key' => $key))->row();
                                    @unlink('./assets/files/default/'.trim($data->setting_value));
                                    $this->db->where('setting_key', $key);  
                                    $this->db->update('site_settings',array('setting_value' => $file['name']));
                               }
                               else
                               {
                                   $flag = false;
                               }
                            }
                            else
                            {
                                
                                $setting = array('setting_'.$key => 'Image size is larger');
                                $this->session->set_userdata($setting);
                                $flag = false;
                                
                            }
                        }
                        else
                        {
                            //Not an image file
                            $setting = array('setting_'.$key => 'Please upload valid  Image file');
                            $this->session->set_userdata($setting);
                            $flag = false;
                        }
                        
                   }

               }
               
           }
           if($flag)
           {
               $url = $this->uri->segment(2);
               $message = 'Settings updated successfully';
               $this->session->set_userdata('message_success', $message);
               redirect(site_url('settings/'.$url));
           }
           else
           {
               $url = $this->uri->segment(2);
               $message = 'Some error occurred';
               $this->session->set_userdata('message_error', $message);
               redirect(site_url('settings/'.$url));
           }
        }
       
        $this->load->view('header_view', $data);
        $this->load->view('left_view');
        $this->load->view("settings/settings.php", $data);
        $this->load->view('footer_view');
    }
    
    public function do_upload($name,$width,$height) 
    {
        $this->load->helper('form');

        $config['upload_path'] = "./assets/files/default/";
        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG|ico';
        $config['max_size'] = '9000';
        $config['max_width'] = $width;
        $config['max_height'] = $height;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

            if ( ! $this->upload->do_upload($name))
            {
                 return 0;     
            }
            else
            {
                 return 1;
            }

        }
    
}
?>