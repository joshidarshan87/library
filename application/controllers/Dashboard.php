<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $data=array(
            'page_title'=>'Dashboard',
            'page_name'=>'dashboard/index'
        );
        $this->load->view('site/template',$data);
    }
}
?>
