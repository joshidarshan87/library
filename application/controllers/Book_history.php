<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book_history extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Issue_Book_model');
    }
    
    public function index(){
        $user_id = $this->session->userdata('user_id');
        if(!empty($user_id)){
        $data=array(
            'page_title'=>'Book History',
            'page_name'=>'bookhistory/index',
            'get_book_history_by_user'=>  $this->Issue_Book_model->book_history_by_user($user_id)
        );
        $this->load->view('site/template',$data);
    }else{
        redirect('user/logout');
    }
  }
}
?>

