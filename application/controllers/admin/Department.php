<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('department_model');
    }

    public function index() {
        $admin_id = $this->session->userdata('admin_id');
        if(!empty($admin_id)){
        $data = array(
            'page_title' => 'Department',
            'page_name' => 'department/index',
            'result' => $this->department_model->select()
        );
        $this->load->view('admin/template', $data);
    }else{
       redirect('admin/Login');
    }
    }

    public function add() {
        $admin_id = $this->session->userdata('admin_id');
        if(!empty($admin_id)){
        $this->form_validation->set_rules('department_name', 'Department Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'page_title' => 'Add Department',
                'page_name' => 'department/add'
            );
            $this->load->view('admin/template', $data);
        } else {
            $this->department_model->insert($_POST);
            redirect('admin/department/index');
        }
    }else{
       redirect('admin/Login'); 
    }
    }

    public function edit($department_id) {
        $admin_id = $this->session->userdata('admin_id');
        if(!empty($admin_id)){
        $this->form_validation->set_rules('department_name', 'Department Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'page_title' => 'Edit Department',
                'page_name' => 'department/edit',
                'result' => $this->department_model->select_id($department_id),
                'id' => $department_id
            );
            $this->load->view('admin/template', $data);
        } else {
            $this->department_model->update($department_id, $_POST);
            redirect('admin/department/index');
        }
    }else{
         redirect('admin/Login');  
    }
    }

    public function delete($department_id) {
        $admin_id = $this->session->userdata('admin_id');
        if(!empty($admin_id)){
        $this->department_model->delete($department_id);
        redirect('admin/department/index');
    }else{
        redirect('admin/Login');  
    }
    }

}
?>

