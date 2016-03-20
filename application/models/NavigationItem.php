<?php

Class NavigationItem extends CI_Model {
    public $id;
    public $name;
    public $url;
    public $location;
    public $parent;

    function getNavigationItems() {
        $this->db->select('*')
                ->from('navigationItem');

        $result = $this->db->get();

        $navigationItems = array();

        foreach ($result->result() as $row) {
            $navigationItem = new NavigationItem();
            $navigationItem->id = $row->id;
            $navigationItem->name = $row->name;
            $navigationItem->url = $row->url;
            $navigationItem->location = $row->location;
            $navigationItem->parent = $row->parent;
            $navigationItems[] = $navigationItem;
        }

        return $navigationItems;
    }
}