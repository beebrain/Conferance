<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

    public function index() {
        $this->load->view('template/head.php');
        $this->load->view('index.php');
    }

}
