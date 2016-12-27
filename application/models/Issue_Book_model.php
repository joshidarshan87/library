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

    public function insert_book_by_user($book_id,$user_id){
      $issue_date = date('Y-m-d');
      $renew_date = date('Y-m-d',strtotime($issue_date . "+1 days"));
      $this->db->insert('issue_book', array('user_id' => $user_id, 'book_id' => $book_id, 'issue_date' => $issue_date, 'renew_date' => $renew_date));   
    
      // get Total Book qty
     $this->db->select('*');
     $this->db->from('book');
     $this->db->where('book_id',$book_id);
     $total_book_qty = $this->db->get()->row_array();
    
     //get issue book count
     $this->db->select('*');
     $this->db->from('issue_book');
     $this->db->where('book_id',$book_id);
     $this->db->where('status',1);
    $count_row= $this->db->get()->result_array();
    $issue_qty=  count($count_row);
    
    $avilabel_qty=$total_book_qty['quantity']-$issue_qty;
    return $avilabel_qty;
    }
    
    public function get_issue_book($user_id){
        $this->db->select('*');
        $this->db->from('issue_book');
        $this->db->join('book','issue_book.book_id=book.book_id');
        $this->db->where('issue_book.user_id',$user_id);
        $this->db->where('issue_book.status',1);
        $this->db->order_by('issue_book_id','DESC');
       return $this->db->get()->result_array();
    }
    
    public function update_status($issue_book_id,$status){
        $this->db->update('issue_book',array('status'=>$status),array('issue_book_id'=>$issue_book_id));
    }
    
    
   

}

?>