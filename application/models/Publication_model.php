<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Publication_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('publication', array('name' => $data['publication_name']));
    }

    public function select() {
        return $this->db->get('publication')->result_array();
    }

    public function select_id($publication_id) {
        return $this->db->get_where('publication', array('publication_id' => $publication_id))->row_array();
    }

    public function update($publication_id, $data) {
        $this->db->update('publication', array('name' => $data['publication_name']), array('publication_id' => $publication_id));
    }

    public function delete($publication_id) {
        $this->db->delete('publication', array('publication_id' => $publication_id));
    }

}

?>
