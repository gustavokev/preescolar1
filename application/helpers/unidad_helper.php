<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('unidad()')) {

   function unidad($dato)
    {
        $unidad_format = number_format($dato, 0, '', '.');
        return $unidad_format;
    }

}