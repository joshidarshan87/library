<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->form_validation->set_rules('username', 'UserName', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login');
        } else {
            $query = $this->admin_model->check_login($_POST);
            if ($query) {
                $user = array(
                    'username' => $query['username'],
                    'password' => $query['password'],
                    'admin_id' => $query['admin_id']
                );
                $this->session->set_userdata($user);
                // redirect();
            } else {
                $data['msg'] = "Invalid UserName or Password";
                $this->load->view('admin/login', $data);
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
    }

}

?>