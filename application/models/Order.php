<?php

Class Order extends CI_Model {
    public $id;
    public $address_deliviry;
    public $address_billing;
    public $username;
    public $order_state;
    public $price;

    function addOrder($address_deliviry, $address_billing, $username, $order_state, $price) {
        $this->db->set('id', 0);
        $this->db->set('address_address_deliviry', $address_deliviry);
        $this->db->set('address_address_billing', $address_billing);
        $this->db->set('user_username', $username);
        $this->db->set('order_state_state', $order_state);
        $this->db->set('price', $price);
        $this->db->insert('order');
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
    
    function editOrder($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('order', $data);
    }
}