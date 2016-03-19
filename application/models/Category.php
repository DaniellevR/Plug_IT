<?php

Class Category extends CI_Model {
    public $id;
    public $name;
    public $description;
    public $parent;
    
    function getCategories() {
        $this->db->select('*')
                ->from('category');

        $result = $this->db->get();

        $categories = array();

        foreach ($result->result() as $row) {
            $category = new Category();
            $category->id = $row->id;
            $category->name = $row->name;
            $category->description = $row->description;
            $category->parent = $row->category_id;
            $categories[] = $category;
        }
        
        return $categories;
    }

    function addCategory($name, $description, $parent) {
        $this->db->set('id', 0);
        $this->db->set('name', $name);
        $this->db->set('description', $description);
        $this->db->set('category_id', $parent);
        $this->db->insert('category');
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

}
