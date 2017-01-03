<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Issue_Book extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('issue_Book_model');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->model('book_model');
        $this->load->model('book_quantity');
        $this->load->model('Issue_book_model');
     
    }
    public function add() {
         $admin_id = $this->session->userdata('admin_id');
         if(!empty($admin_id)){
        //$this->output->enable_profiler();
        $this->form_validation->set_rules('username', 'User', 'required');
        $this->form_validation->set_rules('bookname', 'Book', 'required');
        $this->form_validation->set_rules('issue_date', 'Issue Date', 'required');
        $this->form_validation->set_rules('renew_date', 'Renew Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'page_title' => 'Issue Book',
                'page_name' => 'IssueBook/add',
                'get_user' => $this->user_model->select(),
                'get_book' => $this->book_model->select()
            );
            $this->load->view('admin/template', $data);
        } else {
          $result=$this->issue_Book_model->insert($_POST);
          $this->book_quantity->update_book_qty($result,$_POST);
          redirect('admin/Issue_Book/add');
        }
    }else{
       redirect('admin/Login');
    }
    }
    
   
}

?>
