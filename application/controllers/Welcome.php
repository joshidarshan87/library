<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->view('welcome_message');
    }

//          public function image_upload() {
//        $config['upload_path'] = '../uploads/vendor/';
//        $config['allowed_types'] = 'jpg|jpeg';
//        $config['encrypt_name'] = TRUE;
//        $config['max_size'] = 1000; // 1 mb
//        $this->load->library('upload', $config);
//        if (!$this->upload->do_upload('vendor_image')) {
//            $this->form_validation->set_message('image_upload', $this->upload->display_errors());
//            return false;
//        } else {
//            $_POST['vendor_img_url'] = 'uploads/vendor/' . $this->upload->data('file_name');
//            $this->vendor_model->insert($_POST);
//            return true;
//        }
//    }
//    if ($this->form_validation->run() == TRUE) {
//            redirect('vendor/add');
//        }
//        $data = array(
//            'page_title' => 'Add New Vendor',
//            'page_name' => 'vendor/add',
//            'result' => $this->category_model->list_all()
//        );
//        $this->load->view('template', $data);
}
