<?php

Class Supplier extends CI_Model {
    public $name;
    public $address_id;
    public $email;
    public $telephonenumber;

    function getSuppliers() {
        $this->db->select('*')
                ->from('supplier');

        $result = $this->db->get();

        $suppliers = array();

        foreach ($result->result() as $row) {
            $supplier = new Supplier();
            $supplier->name = $row->name;
            $supplier->address_id = $row->adddress_id;
            $supplier->email = $row->email;
            $supplier->telephonenumber = $row->telephonenumber;
            $suppliers[] = $supplier;
        }

        return $suppliers;
    }

    function addSupplier($name, $address_id, $email, $telephonenumber) {
        $this->db->set('name', $name);
        $this->db->set('address_address_id', $address_id);
        $this->db->set('email', $email);
        $this->db->insert('telephonenumber', $telephonenumber);
    }
}