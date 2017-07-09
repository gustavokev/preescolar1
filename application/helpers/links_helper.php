<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('links()')) {

   function links($url, $texto)
    {

       $link = '<a href="'.$url.'" >'.$texto.'</a>';
       return $link;
    }

}