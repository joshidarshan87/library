<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Book_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('book_quantity');
    }

    public function insert($data) {
        $this->db->insert('book', array('name' => $data['bookname'], 'ISBN_no' => $data['ISBN_no'], 'quantity' => $data['quantity'], 'edition' => $data['edition'], 'price' => $data['price'], 'purchase_date' => $data['purchase_date'], 'department_id' => $data['department_name'], 'publication_id' => $data['publication_name'], 'author_id' => $data['author_name'], 'image_url' => $data['imageUrl']));
        $last_id=$this->db->insert_id();
        $this->book_quantity->insert($last_id);
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
    
    public function search_by_bookname($data){
        $this->db->select('*');
        $this->db->from('book');
        $this->db->join('book_quantity','book.book_id=book_quantity.book_id');
        $this->db->join('publication', 'book.publication_id=publication.publication_id');
        $this->db->join('author','book.author_id=author.author_id');
        $this->db->where('book.book_id',$data['bookname']);
        return $this->db->get()->row_array();
    }
    
    public function autosearch($search){
//     $this->db->like('name',$search,'both');
//      return $this->db->get('book')->result_array();
        
        $this->db->select('*');
        $this->db->from('book');
        $this->db->join('publication','book.publication_id=publication.publication_id');
        $this->db->join('author', 'book.author_id=author.author_id');
        $this->db->join('book_quantity','book.book_id=book_quantity.book_id');
        $this->db->like('name',$search,'both');
        $this->db->or_like('publication.publication_name',$search,'both');
        $this->db->or_like('author.firstname',$search,'both');
       return $this->db->get()->result_array();
    
    }
    
    public function record_count(){
        return $this->db->count_all("book");
    }
    
    public function select2($limit,$id){
        //$this->db->limit($limit,$id);
       //return $this->db->get('book')->result_array();
      $this->db->select('*');
        $this->db->from('book');
        $this->db->join('department', 'book.department_id=department.department_id');
        $this->db->limit($limit,$id);
        return $this->db->get()->result_array();
    }
    
    public function autocomplete($searchterm){
        $this->db->select('*');
        $this->db->from('book');
        $this->db->like('name',$searchterm,'both');
        return $this->db->get()->result_array();
      
    }
    
    public function get_book_detail($book_id){
        $this->db->select('*');
        $this->db->from('book');
        $this->db->join('publication','book.publication_id=publication.publication_id');
        $this->db->join('author', 'book.author_id=author.author_id');
        $this->db->join('book_quantity', 'book.book_id=book_quantity.book_id');
        $this->db->where('book.book_id',$book_id);
        return $this->db->get()->row_array();
    }
    

}
?>

