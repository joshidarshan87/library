<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
//        date_default_timezone_set('Asia/Dhaka');
    }

    public function signin() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('site/signin');
        } else {
            $query = $this->user_model->check_login($_POST);
            if ($query) {
                $user = array(
                    'email' => $query['email'],
                    'password' => $query['password'],
                    'user_id' => $query['user_id'],
                );
                $this->session->set_userdata($user);
                redirect('dashboard');
            } else {
                $data['msg'] = "Invalid UserName or Password";
                $this->load->view('site/signin', $data);
            }
        }
    }

    public function signup() {
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email Address', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('birthday', 'Date of Birth', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('site/signup');
        } else {
            $this->user_model->insert($_POST);
            redirect('user/signin');
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('user/signin');
    }

}

?>
