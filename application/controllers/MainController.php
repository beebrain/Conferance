<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

    public function index() {
        $this->load->view('template/head.php');
        $this->load->view('template/nav.php');
        $this->load->view('index.php');
        $this->load->view('template/footer.php');
    }
    
    public function signup(){
        $this->load->view('template/head.php');
        $this->load->view('template/nav_sub.php');
        $this->load->view('signup.php');
        $this->load->view('template/footer.php');
        
    }

}
