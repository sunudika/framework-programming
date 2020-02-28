<?php

class Airports_model extends CI_Model {

    function getAirports($tableName) {
        $this->db->limit(100);
        $query = $this->db->get($tableName);
        return $query->result_array();
    }

    function addAirports($data) {

    }

    function updateAirports($data) {

    }

    function deleteAirports($code) {
        return $this->db->delete('airports', array('code' => $code));
    }
}