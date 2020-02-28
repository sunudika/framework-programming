<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Airports extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->model('Airports_model');
    }
    public function index() {
        $_SESSION['judul']= 'Airports Data';
        $data['airports'] = $this->Airports_model->getAirports('airports');
        $this->load->view('templates/header', $_SESSION);
        $this->load->view('airports/airports', $data);
        $this->load->view('templates/footer');
    }

    public function add($data) {

    }

    public function delete($code) {
        $this->Airports_model->deleteAirports($code);
        redirect(base_url('airports'));
    }
}