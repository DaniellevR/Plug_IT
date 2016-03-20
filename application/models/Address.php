<?php

Class Address extends CI_Model {

    public $id;
    public $streetname;
    public $housenumber;
    public $city;
    public $housenumber_suffix;
    public $postal_code;

    function addAddress($streetname, $housenumber, $city, $housenumber_suffix, $postal_code) {
        $this->db->set('address_id', 0);
        $this->db->set('streetname', $streetname);
        $this->db->set('housenumber', $housenumber);
        $this->db->set('city', $city);
        $this->db->set('housenumber_suffix', $housenumber_suffix);
        $this->db->set('postal_code', $postal_code);
        $this->db->insert('address');
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    function editAddress($id, $data) {
        $this->db->where('address_id', $id);
        $this->db->update('address', $data);
    }
}
