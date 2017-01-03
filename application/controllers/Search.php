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
      $user_id= $this->session->userdata('user_id');
      if(!empty($user_id)){
      $result = $this->book_model->autosearch($search);
      echo json_encode($result);
    }else{
        redirect('user/signin');
    }
   }
   
//   public function autocomplete(){
//       $search = $this->input->post('search');
//      $result = $this->book_model->autosearch($search);
//      echo json_encode($result);
//     
//   }
    

   public function autocomplete2(){
       $searchterm=$_GET['term'];
       $result=$this->book_model->autocomplete($searchterm);
       foreach ($result as $key=>$value):
        $newrow['label']=$value['name'];
        //$newrow['value']=$value['book_id'];
       $newrow['label_id']=$value['book_id'];
        $row_set[]=$newrow;
       endforeach;
       echo json_encode($row_set);
               
   }
   
   public function get_book_detail($book_id){
      $result = $this->book_model->get_book_detail($book_id);
      echo json_encode($result);
   }
    
}
?>


