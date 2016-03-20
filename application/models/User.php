<?php

Class User extends CI_Model {

    public $username;
    public $password;
    public $firstname;
    public $prefix;
    public $lastname;
    public $email;
    public $telephonenumber;
    public $role_name;

    function login($username, $password) {
        $this->db->select('*')
                ->from('user')
                ->where('username', $username)
                ->limit(1);

        $result = $this->db->get();

        $user = new User();

        $row = $result->result();
        $user->username = $row->username;
        $user->firstname = $row->firstname;
        $user->prefix = $row->prefix;
        $user->lastname = $row->lastname;
        $user->email = $row->email;
        $user->telephonenumber = $row->telephonenumber;
        $user->role_name = $row->role_name;

        return $user;
    }

    function addUser($username, $password, $firstname, $prefix, $lastname, $email, $telephonenumber, $role_name) {
        $this->db->set('username', $username);
        $this->db->set('password', $password);
        $this->db->set('firstname', $firstname);
        $this->db->set('prefix', $prefix);
        $this->db->set('lastname', $lastname);
        $this->db->set('email', $email);
        $this->db->set('telephonenumber', $telephonenumber);
        $this->db->set('role_name', $role_name);
        $this->db->insert('user');
        return true;
    }

    function editUser($username, $data) {
        $this->db->where('username', $username);
        $this->db->update('user', $data);
    }

}


