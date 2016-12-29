<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Renewbook extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Issue_Book_model');
    }
    
    public function index(){
        $admin_id = $this->session->userdata('admin_id');
        if(!empty($admin_id)){
        $data=array(
            'page_title'=>'Renew Book',
            'page_name'=>'RenewBook/index',  
        );
        $this->load->view('admin/template',$data);
    }else{
         redirect('admin/Login');
    }
    }
     
    public function search($search){
       $result = $this->Issue_Book_model->get_issue_book_by_user($search);
       echo json_encode($result);
    }
    
    public function return_book($user_id,$book_id){
        $this->Issue_Book_model->return_book($user_id,$book_id);
        redirect('admin/Renewbook/index');
    }
    
    public function renew_book($user_id,$book_id){
        $this->Issue_Book_model->return_book($user_id,$book_id);
        redirect('admin/Issue_Book/add');
    }
   
}
?>

