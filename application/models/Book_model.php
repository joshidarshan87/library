<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Book_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('book', array('name' => $data['bookname'], 'ISBN_no' => $data['ISBN_no'], 'quantity' => $data['quantity'], 'edition' => $data['edition'], 'price' => $data['price'], 'purchase_date' => $data['purchase_date'], 'department_id' => $data['department_name'], 'publication_id' => $data['publication_name'], 'author_id' => $data['author_name'], 'image_url' => $data['imageUrl']));
    }

    public function select() {
        $this->db->select('*');
        $this->db->from('book');
        $this->db->join('department', 'book.department_id=department.department_id');
        return $this->db->get()->result_array();
    }

    public function select_id($book_id) {
        $this->db->select('*');
        $this->db->from('book');
        $this->db->join('department', 'book.department_id=department.department_id');
        $this->db->where('book.book_id', $book_id);
        return $this->db->get()->row_array();
    }

    public function update($data, $book_id) {
        $update_data = array('name' => $data['bookname'], 'ISBN_no' => $data['ISBN_no'], 'quantity' => $data['quantity'], 'edition' => $data['edition'], 'price' => $data['price'], 'purchase_date' => $data['purchase_date'], 'department_id' => $data['department_name'], 'publication_id' => $data['publication_name'], 'author_id' => $data['author_name']);
        if (!empty($data['imageUrl'])) {
            $update_data['image_url'] = $data['imageUrl'];
        }
        $this->db->where('book_id', $book_id);
        $this->db->update('book', $update_data);
    }

    public function delete($book_id) {
        $this->db->delete('book', array('book_id' => $book_id));
    }

}
?>

