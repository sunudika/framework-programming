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

    public function add() {
        $this->Airports_model->addAirports($_POST);
        redirect(base_url('airports'));
    }

    public function update() {
        $this->Airports_model->updateAirports($_POST);
        redirect(base_url('airports'));
    }

    public function getUpdate() {
        echo json_encode($this->Airports_model->getAirportsByCode($_POST['id']));
    }

    public function delete($id) {
        $this->Airports_model->deleteAirports($id);
        redirect(base_url('airports'));
    }
}