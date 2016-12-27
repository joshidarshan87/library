<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('book_model');
    }
    
    public function index(){
       $user_id= $this->session->userdata('user_id');
       if(!empty($user_id)){
        $data=array(
            'page_title'=>'Search',
            'page_name'=>'search/index',
            'user_id'=>$user_id
        );
        $this->load->view('site/template',$data);
       }else{
           redirect('user/signin');
       }
    }
    
    public function autosearch($search){
      $result = $this->book_model->autosearch($search);
      echo json_encode($result);
    }
    
    
}
?>


