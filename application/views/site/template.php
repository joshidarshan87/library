<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('site/include/header');
$this->load->view("site/{$page_name}");
$this->load->view('site/include/footer');
?>