<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function check_login($data) {
        return $this->db->get_where('admin', array('username' => $data['username'], 'password' => $data['password']))->row_array();
    }

}

?>
