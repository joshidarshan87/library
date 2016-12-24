<?php

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $this->load->view('upload_form', array('error' => ' '));
    }

    public function fupd() {
        try {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            //$config['max_size'] = 100;
            // $config['max_width'] = 1024;
            // $config['max_height'] = 768;

            $this->load->library('upload', $config);
            var_dump($_FILES['userfile']);
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
                $this->load->view('upload_form', $error);
            } else {

                $data = array('upload_data' => $this->upload->data());
                var_dump($data);
                $this->load->view('upload_success', $data);
            }
            throw new Exception('hello');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
?>