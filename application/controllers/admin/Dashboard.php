<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $admin_id = $this->session->userdata('admin_id');
        if(!empty($admin_id)){
        $data=array(
            'page_title'=>'Dashboard',
            'page_name'=>'dashboard/index'
        );
        $this->load->view('admin/template',$data);
    }else{
         redirect('admin/Login');
    }
    }

}

?>