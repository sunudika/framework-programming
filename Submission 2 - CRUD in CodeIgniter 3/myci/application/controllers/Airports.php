<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Airports extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Airports_model');
    }
    public function index() {
        $_SESSION['judul']= 'Airports Data';
        $config = $this->paginationSettings("airports/index");
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        $data['airports'] = $this->Airports_model->getAirportsList($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
 
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

    public function search(){
        $_SESSION['judul']= 'Airports Data';
        $data['airports'] = $this->Airports_model->findAirports();
        
        $this->load->view('templates/header', $_SESSION);
        $this->load->view('airports/airports', $data);
        $this->load->view('templates/footer');
    }

    private function paginationSettings($urlRightNow)
    {
        $config['base_url'] = site_url($urlRightNow); //site url
        $config['total_rows'] = $this->db->count_all('airports'); //total row
        $config['per_page'] = 500;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        return $config;
    }
}