<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
                
    }
    
    public function index(){
        $admin_id = $this->session->userdata('admin_id');
        if(!empty($admin_id)){
        $data=array(
            'page_title'=>'User',
            'page_name'=>'user/index',
            'result'=>  $this->user_model->select()
        );
        $this->load->view('admin/template',$data);
    }else{
        redirect('admin/Login');
    }
    }
    
    public function add(){
        $admin_id = $this->session->userdata('admin_id');
        if(!empty($admin_id)){
        $this->form_validation->set_rules('firstname','First Name','required');
        $this->form_validation->set_rules('lastname','Last Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('birthday','Birthday','required');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('city','City','required');
        $this->form_validation->set_rules('phone','Phone','required');
        if($this->form_validation->run()==FALSE){
            $data=array(
                'page_title'=>'Add User',
                'page_name'=>'user/add'
            );
            $this->load->view('admin/template',$data);
        }else{
            $this->user_model->insert($_POST);
            redirect('admin/user');
        }
    }else{
         redirect('admin/Login');
    }
    }
    
    public function edit($user_id){
        $admin_id = $this->session->userdata('admin_id');
         if(!empty($admin_id)){
        $this->form_validation->set_rules('firstname','First Name','required');
        $this->form_validation->set_rules('lastname','Last Name','required');
        $this->form_validation->set_rules('birthday','Birthday','required');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('city','City','required');
        $this->form_validation->set_rules('phone','Phone','required');
        if($this->form_validation->run()==FALSE){
            $data=array(
            'page_title'=>'Edit User',
            'page_name'=>'user/edit',
            'result'=>  $this->user_model->get_user_profile($user_id)
        );
        $this->load->view('admin/template',$data);
        }else{
        $this->user_model->update($_POST,$user_id);
        redirect('admin/user');  
        }  
    }else{
       redirect('admin/Login'); 
    }
    }

        public function delete($user_id){
        $admin_id = $this->session->userdata('admin_id');
        if(!empty($admin_id)){
        $this->user_model->delete($user_id);
        redirect('admin/user');
    }else{
        redirect('admin/Login');
    }
    }
}
?>
