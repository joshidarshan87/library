<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller{
  
            function __construct() {
        parent::__construct();
        $this->load->model('book_model');
    }
    
//    public function index(){
//       
//        $data=array(
//            'page_title'=>'Search',
//            'page_name'=>'search/index',
//            'get_book'=>  $this->book_model->select(),
//            'search_bookname'=>  $this->book_model->search_by_bookname($_POST)
//            
//        );
//        $this->load->view('admin/template',$data);
//    }
    
 
    public function index(){
        $data=array(
           'page_title'=>'search',
            'page_name'=>'search/index',   
        );
         $this->load->view('admin/template',$data);
    }

    public function autosearch($search){
      $result = $this->book_model->autosearch($search);
      echo json_encode($result);
    }
}
?>
