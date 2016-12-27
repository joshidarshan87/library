<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Renewbook extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Issue_Book_model');
    }
    
    public function index(){
        $user_id = $this->session->userdata('user_id');
        if(!empty($user_id)){
        $data=array(
            'page_title'=>'Renew Book',
            'page_name'=>'Renewbook/index',
            'get_issue_book'=>  $this->Issue_Book_model->get_issue_book($user_id)
        );
        $this->load->view('site/template',$data);
    }  else {
        redirect('user/signin');    
    }
  }
  
  public function status($issue_book_id,$status){
      $this->Issue_Book_model->update_status($issue_book_id,$status);
  }
}
?>


