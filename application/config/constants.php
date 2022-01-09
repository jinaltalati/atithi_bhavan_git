<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/* End of file constants.php */
/* Location: ./application/config/constants.php */

define('SITE_TITLE', 'Shahji Audit');

define('DEVELOPER_EMAIL', 'sandip79patel@gmail.com');
define('LEAVE_BLANK_MSG', '(If You Leave Blank it will take Current Datetime.)');


define('QUESTION_IMG', FCPATH.'assets/files/questions/');
/*************************************************** UDF ***************************************************/
function pr($arr)
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
function pre($arr)
{
    pr($arr);
    die;
}
function  getCurrentTime()
{
    return date('Y-m-d H:i:s', time());
}

 function genCombo($arrval, $val, $title, $name, $id, $attributes = "",$selvalue="")
{
    $strCombo = '<select  id="' . $id . '" name="' . $name . '" ' . $attributes . ' >';
    $strCombo .= '<option value="" >Select</option>';
    foreach ($arrval as $key => $value)
    {
        if($selvalue == $value->$val)
        {
         $strCombo .= '<option selected="selected" value="' . $value->$val . '">' . $value->$title . '</option>';   
        }
        else
        {
         $strCombo .= '<option  value="' . $value->$val . '">' . $value->$title . '</option>';   
        }
    }
    $strCombo .= '</select>';
    return $strCombo;
}

function genGroupCombo($arrval, $val="", $title="", $name, $id, $attributes = "",$selvalue="")
{
    $strCombo = '<select  id="' . $id . '" name="' . $name . '" ' . $attributes . ' >';
    
    foreach ($arrval as $key => $value)
    {
        $strCombo .= '<optgroup   label="'.$key.'" >';
            foreach ($value as $key1 => $value1)
            {
                if(trim($val) == "" || trim($val) == $title )
                {    
                    if($selvalue == $key1)
                    {
                         $strCombo .= '<option selected="selected" label="'.$value1.'" title="'.$key1.'"  value="' . $key1 . '">' . $value1 . '</option>';
                    }
                    else
                    {
                        $strCombo .= '<option label="'.$value1.'" title="'.$key1.'"  value="' . $key1 . '">' . $value1 . '</option>';
                    }
                }
                else
                {
                    if($selvalue == $value1[$val])
                    {
                        $strCombo .= '<option  selected="selected" label="'.$value1.'"  value="' . $value1[$val] . '">' . $value1[$title] . '</option>';
                    }
                    else
                    {
                        $strCombo .= '<option label="'.$value1.'"  value="' . $value1[$val] . '">' . $value1[$title] . '</option>';
                    }
                }
            }
        $strCombo .= '</optgroup>';
    }
     $strCombo .= '</select>';
   return $strCombo;
}

function getTimeZoneList()
{
    $zones = timezone_identifiers_list();
    foreach ($zones as $zone)
    {
        $zone = explode('/', $zone); // 0 => Continent, 1 => City
        // Only use "friendly" continent names
        if ($zone[0] == 'Africa' || $zone[0] == 'America' || $zone[0] == 'Antarctica' || $zone[0] == 'Arctic' || $zone[0] == 'Asia' || $zone[0] == 'Atlantic' || $zone[0] == 'Australia' || $zone[0] == 'Europe' || $zone[0] == 'Indian' || $zone[0] == 'Pacific')
        {
            if (isset($zone[1]) != '')
            {
                $locations[$zone[0]][$zone[0] . '/' . $zone[1]] = str_replace('_', ' ', $zone[1]); // Creates array(DateTimeZone => 'Friendly name')
            }
        }
    }
    $locations['UTC'] = array('UTC' => 'UTC');

    return $locations;
}


function get_time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}

define('DATE_FORMAT','Y/m/d');
define('TIME_FORMAT','g:i A');

define('PROVIDER_IMAGE_PATH','assets/files/providers/');
define('USER_IMAGE_PATH','assets/files/users/');

define('SURVEY_IMAGE_PATH','assets/files/surveys/');