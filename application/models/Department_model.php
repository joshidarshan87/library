<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('department', array('department_name' => $data['department_name']));
    }

    public function select() {
        return $this->db->get('department')->result_array();
    }

    public function select_id($department_id) {
        return $this->db->get_where('department', array('department_id' => $department_id))->row_array();
    }

    public function update($department_id, $data) {
        $this->db->update('department', array('department_name' => $data['department_name']), array('department_id' => $department_id));
    }

    public function delete($department_id) {
        $this->db->delete('department', array('department_id' => $department_id));
    }

}

?>
