<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
       $this->load->model('Register_model');
    }

    public function index() {
        $data['titulo'] = 'Registro de usuarios con ajax';
        $this->load->view('register/register_view', $data);
    }

	//validamos el username con ajax
    public function comprobar_usuario_ajax() {
        $username = $this->input->post('username');
        $comprobar_username = $this->register_model->verifica_username($username);
        if ($comprobar_username == $username) {
            $this->form_validation->set_message('comprobar_usuario_ajax', '%s: ya existe en la base de datos');
            return FALSE;
        } else {
            echo '<div style="display:none">1</div>';
            return TRUE;
        }
    }

	//validamos el email con ajax
    public function comprobar_email_ajax() {
        $email = $this->input->post('email');
        $comprobar_email = $this->register_model->verifica_email($email);
        if ($comprobar_email) {
            $this->form_validation->set_message('comprobar_email_ajax', '%s: ya existe en la base de datos');
            return FALSE;
        } else {
            echo '<div style="display:none">1</div>';
            return TRUE;
        }
    }

    public function validar() {
        if ($this->input->post('registro')) {
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[100]');
            $this->form_validation->set_rules('apellido', 'Apellidos', 'required|min_length[6]|max_length[100]');
            //aquí llamamos al callback comprobar_email_ajax
            $this->form_validation->set_rules('email', 'Email', 'required|min_length[6]|max_length[100]');
            //aquí llamamos al callback comprobar_username_ajax
            $this->form_validation->set_rules('username', 'Usuario', 'required|trim|min_length[2]|max_length[100]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|max_length[100]');

            //lanzamos mensajes de error si es que los hay
            $this->form_validation->set_message('required', '%s: es requerido');
            $this->form_validation->set_message('min_length', '%s: debe tener al menos %s carácteres');
            $this->form_validation->set_message('max_length', '%s: debe tener al menos %s carácteres');
            $this->form_validation->set_message('valid_email', '%s: debe escribir un email válido');

            if ($this->form_validation->run() == FALSE) {
                $this->index();
            } else {
                $nombre = $this->input->post('nombre');
                $apellidos = $this->input->post('apellido');
                $email = $this->input->post('email');
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));
                $insertar = $this->register_model->nuevo_usuario($nombre, $apellidos, $email, $username, $password);
                if ($insertar) {
                    $this->session->set_flashdata('registrado', 'EL registro ha sido realizado');
                    redirect(base_url() . 'register/register/', 'refresh');
                }
            }
        }
    }
}

