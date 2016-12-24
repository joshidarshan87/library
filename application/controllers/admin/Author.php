<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('author_model');
    }

    public function index() {
        $data = array(
            'page_title' => 'Author',
            'page_name' => 'author/index',
            'result' => $this->author_model->select()
        );
        $this->load->view('admin/template', $data);
    }

    public function add() {
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'page_title' => 'Add Author',
                'page_name' => 'author/add'
            );
            $this->load->view('admin/template', $data);
        } else {
            $this->author_model->insert($_POST);
            redirect('admin/author/index');
        }
    }

    public function edit($author_id) {
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'page_title' => 'Edit Author',
                'page_name' => 'author/edit',
                'result' => $this->author_model->select_id($author_id),
                'id' => $author_id
            );
            $this->load->view('admin/template', $data);
        } else {
            $this->author_model->update($author_id, $_POST);
            redirect('admin/author/index');
        }
    }

    public function delete($author_id) {
        $this->author_model->delete($author_id);
        redirect('admin/author/index');
    }

}

?>
