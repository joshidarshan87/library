<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Issue_Book_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert($data) {
      $this->db->insert('issue_book', array('user_id' => $data['username'], 'book_id' => $data['bookname'], 'issue_date' => $data['issue_date'], 'renew_date' => $data['renew_date']));
      
      $get_quantity= $this->db->get_where('book',array('quantity'),array('book_id'=>$data['bookname']))->row_array();
      
       $countrow = $this->db->get_where('issue_book',array('book_id'=>$data['bookname'],'status'=>1))->result_array();
       $issue_quantity = count($countrow);
       
       //$quantity=$get_quantity['quantity']-$issue_quantity;
       //var_dump($quantity);
     //  var_dump($countrow);
      $res= $this->db->get_where('issue_book',array('status'),array('book_id'=>$data['bookname']))->row_array();
      var_dump($res);
      if($res['status']==1){
          $quantity=$get_quantity['quantity']-$issue_quantity; 
          var_dump($quantity);
           $this->db->insert('book_quantity',array('book_id'=>$data['bookname'],'quantity'=>$quantity)); 
      }
      
      if($res['status']==0){
          $quantity=$get_quantity['quantity']+$issue_quantity; 
          var_dump($quantity);
      }
        
//     $get_book_quantity=$this->db->get('book_quantity')->row_array();
//     if(empty($get_book_quantity['book_quantity_id'])){
//         $this->db->insert('book_quantity',array('book_id'=>$data['bookname'],'quantity'=>$quantity)); 
//     }else{
//         $this->db->update('book_quantity',array('quantity'=>$quantity),array('book_id'=>$data['bookname']));
//     }
     
       
       
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