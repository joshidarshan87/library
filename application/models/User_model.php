<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('user', array('firstname' => $data['firstname'], 'lastname' => $data['lastname'], 'email' => $data['email'], 'password' => sha1($data['password']), 'birthday' => $data['birthday'], 'gender' => $data['gender'], 'address' => $data['address'], 'city' => $data['city'], 'phone' => $data['phone']));
    }

    public function check_login($data) {
        return $this->db->get_where('user', array('email' => $data['email'], 'password' => $data['password']))->row_array();
    }

    public function select() {
        return $this->db->get('user')->result_array();
    }

}

?>