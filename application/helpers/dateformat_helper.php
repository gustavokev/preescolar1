<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('dateformat()')) {

   function dateformat($date)
    {
        $date_format = strftime("%d/%m/%Y", strtotime($date));
        return $date_format;
    }

}