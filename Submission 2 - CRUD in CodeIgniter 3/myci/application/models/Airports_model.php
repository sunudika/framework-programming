<?php

class Airports_model extends CI_Model {

    function getAirportsByCode($id)
    {
        $query = $this->db->get_where('airports', array('id' => $id));
        return $query->row_array();
    }
    function getAirports($tableName) {
        $this->db->limit(100);
        // $this->db->order_by('id', 'desc');
        $query = $this->db->get($tableName);
        return $query->result_array();
    }

    function addAirports($data) {
        $newData = array(
            'code' => $data['code'],
            'name' => $data['name'],
            'cityCode' => $data['cityCode'],
            'cityName' => $data['cityName'],
            'countryName' => $data['countryName'],
            'countryCode' => $data['countryCode'],
            'timezone' => $data['timezone'],
            'lat' => $data['lat'],
            'lon' => $data['lon'],
            'numAirports' => $data['numAirports'],
            'city' => $data['city']
        );

        return $this->db->insert('airports', $newData);
    }

    function updateAirports($data) {
        $newData = array(
            'id' => $data['id'],
            'code' => $data['code'],
            'name' => $data['name'],
            'cityCode' => $data['cityCode'],
            'cityName' => $data['cityName'],
            'countryName' => $data['countryName'],
            'countryCode' => $data['countryCode'],
            'timezone' => $data['timezone'],
            'lat' => $data['lat'],
            'lon' => $data['lon'],
            'numAirports' => $data['numAirports'],
            'city' => $data['city']
        );

        return $this->db->replace('airports', $newData);
    }

    function deleteAirports($id) {
        return $this->db->delete('airports', array('id' => $id));
    }

    function findAirports() {
        $keyword = $_POST['keyword'];
        $this->db->select('*');
        $this->db->from('airports');
        $this->db->like('name', $keyword);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getAirportsList($limit, $start) {
        return $this->db->get('airports', $limit, $start)->result_array();
    }
}