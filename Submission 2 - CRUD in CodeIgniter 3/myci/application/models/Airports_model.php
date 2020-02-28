<?php

class Airports_model extends CI_Model {

    function getAirportsByCode($code)
    {
        $query = $this->db->get_where('airports', array('code' => $code));
        return $query->row_array();
    }
    function getAirports($tableName) {
        $this->db->limit(100);
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

    }

    function deleteAirports($code) {
        return $this->db->delete('airports', array('code' => $code));
    }
}