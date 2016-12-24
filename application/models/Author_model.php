<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Author_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('author', array('firstname' => $data['firstname'], 'lastname' => $data['lastname'], 'email' => $data['email']));
    }

    public function select() {
        return $this->db->get('author')->result_array();
    }

    public function select_id($author_id) {
        return $this->db->get_where('author', array('author_id' => $author_id))->row_array();
    }

    public function update($author_id, $data) {
        $this->db->update('author', array('firstname' => $data['firstname'], 'lastname' => $data['lastname'], 'email' => $data['email']), array('author_id' => $author_id));
    }

    public function delete($author_id) {
        $this->db->delete('author', array('author_id' => $author_id));
    }

}

?>
