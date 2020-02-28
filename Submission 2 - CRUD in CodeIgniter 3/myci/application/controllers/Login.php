<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $data['judul'] = 'Login Page';
        var_dump($data);
        $this->load->view('templates/header', $data);
        $this->load->view('login/login', $data);
        $this->load->view('templates/footer');
    }
}