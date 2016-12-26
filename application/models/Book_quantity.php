<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book_quantity extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    public function insert($last_id){
        $this->db->insert('book_quantity',array('book_id'=>$last_id));
    }
    
   public function update_book_qty($qty,$data){
    $this->db->update('book_quantity',array('availabel_quantity'=>$qty),array('book_id'=>$data['bookname']));
   }
   
}
?>
