<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_payment extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_payment_model');
    }
    
    public function index(){
      $admin_id = $this->session->userdata('admin_id');
      if(!empty($admin_id)){
      $data=array(
          'page_title'=>'User Payment',
          'page_name'=>'user_payment/index',
          'result'=>  $this->user_payment_model->select()
      );
      $this->load->view('admin/template',$data);
    }else{
        redirect('admin/Login');
    }
  }
    
    public function add(){
        $admin_id = $this->session->userdata('admin_id');
        if(!empty($admin_id)){
        $this->form_validation->set_rules('username', 'User', 'required');
        $this->form_validation->set_rules('bookname', 'Book', 'required');
        $this->form_validation->set_rules('issue_date', 'Issue Date', 'required');
        $this->form_validation->set_rules('renew_date', 'Renew Date', 'required');
        $this->form_validation->set_rules('payment_date', 'Payment Date', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        if($this->form_validation->run()==FALSE){
            $data=array(
                'page_title'=>'Add User Payment',
                'page_name'=>'user_payment/add'
            );
            $this->load->view('admin/template',$data);
        }else{
            $this->user_payment_model->insert($_POST);
            redirect('admin/User_payment');
        }
        
    }else{
      redirect('admin/Login');
    }
  }
    
    public function edit($user_payment_id){
        $admin_id = $this->session->userdata('admin_id');
        if(!empty($admin_id)){
        $this->form_validation->set_rules('username', 'User', 'required');
        $this->form_validation->set_rules('bookname', 'Book', 'required');
        $this->form_validation->set_rules('issue_date', 'Issue Date', 'required');
        $this->form_validation->set_rules('renew_date', 'Renew Date', 'required');
        $this->form_validation->set_rules('payment_date', 'Payment Date', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        if($this->form_validation->run()==FALSE){
            $data=array(
                'page_title'=>'Edit User Payment',
                'page_name'=>'user_payment/edit',
                'result'=>  $this->user_payment_model->select_id($user_payment_id)
            );
            $this->load->view('admin/template',$data);
        }else{
            $this->user_payment_model->update($_POST,$user_payment_id);
            redirect('admin/User_payment');
        }
    }else{
     redirect('admin/Login');   
    }
  }
    public function delete($user_payment_id){
        $admin_id = $this->session->userdata('admin_id');
        if(!empty($admin_id)){
        $this->user_payment_model->delete($user_payment_id);
        redirect('admin/User_payment');
        }else{
            redirect('admin/Login'); 
        }
    }
}
?>

