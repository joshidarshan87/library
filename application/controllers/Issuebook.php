<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Issuebook extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Issue_Book_model');
        $this->load->model('book_model');
    }
    
    public function add($book_id,$user_id){
        $availabel_qty=$this->Issue_Book_model->insert_book_by_user($book_id,$user_id);
        $this->book_quantity->update_book_by_user($availabel_qty,$book_id);
        redirect('search');    
    }
}
?>

