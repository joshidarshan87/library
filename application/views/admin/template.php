<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/include/header');
$this->load->view("admin/{$page_name}");
$this->load->view('admin/include/footer');
?>