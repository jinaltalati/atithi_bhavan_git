<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller
{

    private static $instance;

    /**
     * Constructor
     */
    public function __construct()
    {
        self::$instance = & $this;

        // Assign all the class objects that were instantiated by the
        // bootstrap file (CodeIgniter.php) to local class variables
        // so that CI can run as one big super object.
        foreach (is_loaded() as $var => $class)
        {
            $this->$var = & load_class($class);
        }

        $this->load = & load_class('Loader', 'core');

        $this->load->initialize();

        log_message('debug', "Controller Class Initialized");

        /** Set Settings array in session * */
        //$this->session->unset_userdata('siteSettings');
//        if (!$this->session->userdata('siteSettings'))
//        {
//            $this->load->model('settings_model');
//            $settingsData = $this->settings_model->getSiteSettings();
//            $arrSettingsData = array();
//            foreach ($settingsData as $key => $seting)
//            {
//                $arrSettingsData[$seting->setting_key] = $seting->setting_value;
//            }
//            $this->session->set_userdata('siteSettings', json_encode($arrSettingsData));
//        }
    }

    public static function &get_instance()
    {
        return self::$instance;
    }
    
    function do_upload_single($fieldName = "", $uploadDirPath = "", $allowExtensions = "", $maxFileSize = "", $isThumb = "", $thumbWidth = "", $thumbHeight = "")
    {
        
        //$this->load->helper('form');

        $config['upload_path'] = (isset($allowExtensions)) ? $uploadDirPath : './assets/files/default/' ;
        $config['allowed_types'] = (isset($allowExtensions)) ? $allowExtensions : 'gif|jpg|png|jpeg' ;
        $config['max_size'] = (isset($allowExtensions)) ? $maxFileSize : '20000' ;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $arrUploadedData = array();

        if (!$this->upload->do_upload($fieldName))
        {
            //return $this->upload->display_errors();
        }
        else
        {
           $arrUploadedData = $this->upload->data();
           if(isset($isThumb) && $isThumb == '1')
           {
                $this->createThumbnail($uploadDirPath,$arrUploadedData['file_name'], $thumbWidth, $thumbHeight);
           }
        }
        
        return $arrUploadedData;
    }
    
    function createThumbnail($uploadDirPath,$image, $width, $height)
    {
        $this->load->library('image_lib');
        
        $config['image_library'] = 'gd2';
        $config['source_image']  = $uploadDirPath.$image;
        $config['new_image']     = $uploadDirPath.'thumb/'.$image;
        $config['maintain_ratio'] = TRUE;
        $config['width']	 = $width;
        $config['height']	 = $height;

        $this->image_lib->initialize($config); 

        $this->image_lib->resize();
    }

}