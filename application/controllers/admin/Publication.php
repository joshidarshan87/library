<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Publication extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('publication_model');
    }

    public function index() {
        $data = array(
            'page_title' => 'Publication',
            'page_name' => 'publication/index',
            'result' => $this->publication_model->select()
        );
        $this->load->view('admin/template', $data);
    }

    public function add() {
        $this->form_validation->set_rules('publication_name', 'Publication Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'page_title' => 'Add Publication',
                'page_name' => 'publication/add'
            );
            $this->load->view('admin/template', $data);
        } else {
            $this->publication_model->insert($_POST);
            redirect('admin/publication/index');
        }
    }

    public function edit($publication_id) {
        $this->form_validation->set_rules('publication_name', 'Publication Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'page_title' => 'Edit Publication',
                'page_name' => 'publication/edit',
                'result' => $this->publication_model->select_id($publication_id),
                'id' => $publication_id
            );
            $this->load->view('admin/template', $data);
        } else {
            $this->publication_model->update($publication_id, $_POST);
            redirect('admin/publication/index');
        }
    }

    public function delete($publication_id) {
        $this->publication_model->delete($publication_id);
        redirect('admin/publication/index');
    }

}
?>

