<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// --------------------------------------------------------------------

/**
 * Object to Array
 */
if (!function_exists('object_to_array'))
{

    function object_to_array($object)
    {
        if (is_object($object))
        {
            // Gets the properties of the given object with get_object_vars function
            $object = get_object_vars($object);
        }

        return (is_array($object)) ? array_map(__FUNCTION__, $object) : $object;
    }

}

// --------------------------------------------------------------------

/**
 * Array to Object
 */
if (!function_exists('array_to_object'))
{

    function array_to_object($array)
    {
        return (is_array($array)) ? (object) array_map(__FUNCTION__, $array) : $array;
    }

}


// --------------------------------------------------------------------

/**
 * Give format for javascript 
 * We passes php date format
 */
if (!function_exists('get_js_date_format'))
{
    function get_js_date_format($php_date_format)
    {
        $arr = array('F j, Y' => 'MM dd, yy', 'Y/m/d' => 'yy/mm/dd', 'm/d/Y' => 'mm/dd/yy', 'd/m/Y' => 'dd/mm/yy');
        return $arr[$php_date_format];
    }
}

/**
 * Give format for javascript 
 * We passes php time format
 */
if (!function_exists('get_js_time_format'))
{
    function get_js_time_format($php_time_format)
    {
        $arr = array('g:i a' => 'h:mm tt', 'g:i A' => 'h:mm TT', 'H:i' => 'H:mm');
        return $arr[$php_time_format];
    }
}
?>