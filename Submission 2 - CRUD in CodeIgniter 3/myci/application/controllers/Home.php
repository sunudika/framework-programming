<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
    {
        $data['judul'] = 'HomePage';
        $this->load->view('templates/header', $data);
        $this->load->view('home/home', $data);
        $this->load->view('templates/footer');
    }
}
