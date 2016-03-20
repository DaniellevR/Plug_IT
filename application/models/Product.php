<?php

Class Product extends CI_Model {
    public $id;
    public $name;
    public $description;
    public $price;
    public $brand;
    public $supplier;
    public $amount;
    public $category_id;
    
    function getProduct() {
        $this->db->select('*')
                ->from('product');

        $result = $this->db->get();

        $products = array();

        foreach ($result->result() as $row) {
            $product = new Product();
            $product->id = $row->id;
            $product->name = $row->name;
            $product->description = $row->description;
            $product->price = $row->price;
            $product->brand = $row->brand;
            $product->supplier = $row->supplier;
            $product->amount = $row->amount;
            $product->category_id = $row->category_id;
            $products[] = $product;
        }
        
        return $products;
    }

    function addProduct($name, $description, $price, $brand, $supplier, $amount, $category_id) {
        $this->db->set('id', 0);
        $this->db->set('name', $name);
        $this->db->set('description', $description);
        $this->db->set('price', $price);
        $this->db->set('brand', $brand);
        $this->db->set('supplier', $supplier);
        $this->db->set('amount', $amount);
        $this->db->set('category_id', $category_id);
        $this->db->insert('product');
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
    
    function removeProduct($id) {
        $this->db->where('id', $id);
        $this->db->delete('product');
    }
    
    function editProduct($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('product', $data);
    }
}