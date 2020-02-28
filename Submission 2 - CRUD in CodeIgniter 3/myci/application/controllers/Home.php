<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
    {
        $_SESSION['judul'] = 'HomePage';
        $this->load->view('templates/header', $_SESSION);
        $this->load->view('home/home');
        $this->load->view('templates/footer');
    }
}
