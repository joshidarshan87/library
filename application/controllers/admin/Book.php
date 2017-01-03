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
        $this->load->library("pagination");
        //  $this->load->helper('file');
      
    }

       public function index(){
        $admin_id = $this->session->userdata('admin_id');
        if(!empty($admin_id)){
            $config = array();
            $config["base_url"] = base_url() . "admin/Book/index";
            $total_row = $this->book_model->record_count();
            $config["total_rows"] = $total_row;
            $config["per_page"] = 1;
            $config["uri_segment"] = 4;
            $config['num_links'] = $total_row;
            $config['cur_tag_open'] = '&nbsp;<a class="current">';
            $config['cur_tag_close'] = '</a>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Previous';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
           
          $data = array(
            'page_title' => 'Book',
            'page_name' => 'book/index',
            'result' => $this->book_model->select2($config["per_page"],$page)
        );
        $data["links"] = $this->pagination->create_links();
        $this->load->view('admin/template', $data);
        }else{
           redirect('admin/Login');     
        }
        
    }
    
    public function search(){
        $search = ($this->input->post("search"))? $this->input->post("search") : "NIL";
        $search = ($this->uri->segment(4)) ? $this->uri->segment(4) : $search;
        $config = array();
        $config['base_url']=  base_url()."admin/Book/search/$search";
        $total_row = $this->book_model->get_book_count($search);
        $config["total_rows"] = $total_row;
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data=array(
            'page_title' => 'Book',
            'page_name'=>'book/index',
            'result'=>$this->book_model->get_books($config["per_page"],$page,$search)
        );
        $data['links']=  $this->pagination->create_links();
        $this->load->view('admin/template',$data);
        }

    public function add() {
        $admin_id = $this->session->userdata('admin_id');
        if(!empty($admin_id)){
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
    }else{
      redirect('admin/Login');  
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
      $admin_id = $this->session->userdata('admin_id');
      if(!empty($admin_id)){
        $this->book_model->delete($book_id);
        redirect('admin/book/index');
    }else{
       redirect('admin/Login');   
    }
    }
    
    public function autocomplete(){
       $search = $this->input->post('search');
      $result= $this->book_model->autosearch($search);
      echo json_encode($result);
       
       
    }

}

?>
