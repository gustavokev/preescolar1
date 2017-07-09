<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hola extends CI_Controller {

    public function __construct()
    {
        parent::__construct();


    }
    public function index()
    {
        $title = 'Hola';
        $this->twig->display('hola', compact('title'));
    }

    public function prueba()
    {
        $title = 'Prueba';
        $this->twig->display('prueba', compact('title'));
    }

}
