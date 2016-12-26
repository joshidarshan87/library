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
     
    }

    public function index() {
        $data = array(
            'page_title' => 'Issue Book',
            'page_name' => 'IssueBook/index'
        );
        $this->load->view('admin/template', $data);
    }

    public function add() {
      //  $this->output->enable_profiler();
        $this->form_validation->set_rules('username', 'User', 'required');
        $this->form_validation->set_rules('bookname', 'Book', 'required');
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
          redirect('admin/book/index');
        }
    }

}

?>
