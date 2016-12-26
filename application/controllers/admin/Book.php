<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('book_model');
        $this->load->model('department_model');
        $this->load->model('publication_model');
        $this->load->model('author_model');
        //  $this->load->helper('file');
    }

    public function index() {
        $data = array(
            'page_title' => 'Book',
            'page_name' => 'book/index',
            'result' => $this->book_model->select()
        );
        $this->load->view('admin/template', $data);
    }

    public function add() {
        $this->form_validation->set_rules('bookname', 'Book Name', 'required');
        $this->form_validation->set_rules('ISBN_no', 'ISBN No', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('edition', 'Edition', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('purchase_date', 'Purchase Date', 'required');
        $this->form_validation->set_rules('department_name', 'Department Name', 'required');
        $this->form_validation->set_rules('publication_name', 'Publication Name', 'required');
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'page_title' => 'Add Book',
                'page_name' => 'book/add',
                'get_department' => $this->department_model->select(),
                'get_publication' => $this->publication_model->select(),
                'get_author' => $this->author_model->select()
            );
            $this->load->view('admin/template', $data);
        } else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $data = array(
                    'page_title' => 'Add Book',
                    'page_name' => 'book/add',
                    'error' => $this->upload->display_errors()
                );
                $this->load->view('admin/template', $data);
            } else {
                $_POST['imageUrl'] = 'uploads/' . $this->upload->data('file_name');
                $this->book_model->insert($_POST);
                redirect('admin/book/index');
            }
        }
    }

    public function edit($book_id) {
        $this->form_validation->set_rules('bookname', 'Book Name', 'required');
        $this->form_validation->set_rules('ISBN_no', 'ISBN No', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('edition', 'Edition', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('purchase_date', 'Purchase Date', 'required');
        $this->form_validation->set_rules('department_name', 'Department Name', 'required');
        $this->form_validation->set_rules('publication_name', 'Publication Name', 'required');
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'page_title' => 'Edit Book',
                'page_name' => 'book/edit',
                'get_department' => $this->department_model->select(),
                'get_publication' => $this->publication_model->select(),
                'get_author' => $this->author_model->select(),
                'result' => $this->book_model->select_id($book_id),
                'id' => $book_id,
            );

            $this->load->view('admin/template', $data);
        } else {
            $this->update($book_id);
//            $this->book_model->update($_POST, $book_id);
//            redirect('admin/book/index');
        }
    }

    public function update($book_id) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if (!empty($_FILES['userfile']['name'])) {
            if (!$this->upload->do_upload('userfile')) {
                $data = array(
                    'page_title' => 'Edit Book',
                    'page_name' => 'book/edit',
                    'error' => $this->upload->display_errors()
                );
                $this->load->view('admin/template', $data);
            } else {
                $_POST['imageUrl'] = 'uploads/' . $this->upload->data('file_name');
            }
        }
        
        $this->book_model->update($_POST, $book_id);
        redirect('admin/book/index');
    }

    public function delete($book_id) {
        $this->book_model->delete($book_id);
        redirect('admin/book/index');
    }

}

?>
