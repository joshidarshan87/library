<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $user_id = $this->session->userdata('user_id');
        if(!empty($user_id)){
        $data=array(
            'page_title'=>'Dashboard',
            'page_name'=>'dashboard/index'
        );
        $this->load->view('site/template',$data);
    }else{
        redirect('user/signin');
    }
  }
}
?>
