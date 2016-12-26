<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Issue_Book_model extends CI_Model {

    function __construct() {
        parent::__construct();
        
    }

    public function insert($data) {
     $this->db->insert('issue_book', array('user_id' => $data['username'], 'book_id' => $data['bookname'], 'issue_date' => $data['issue_date'], 'renew_date' => $data['renew_date']));
   
     // get Total Book qty
     $this->db->select('*');
     $this->db->from('book');
     $this->db->where('book_id',$data['bookname']);
     $total_book_qty = $this->db->get()->row_array();
    
     //get issue book count
     $this->db->select('*');
     $this->db->from('issue_book');
     $this->db->where('book_id',$data['bookname']);
     $this->db->where('status',1);
    $count_row= $this->db->get()->result_array();
    $issue_qty=  count($count_row);
    
    $avilabel_qty=$total_book_qty['quantity']-$issue_qty;
    return $avilabel_qty;
    }
    
    public function select() {
        return $this->db->get('issue_book')->result_array();
    }

    public function select_id() {

    }

    public function update() {

    }

    public function delete() {

    }
    
    
   

}

?>