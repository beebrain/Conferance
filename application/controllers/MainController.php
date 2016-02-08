<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

    public function index() {
        $this->load->model('user');
        $member = $this->user->getuser()->result();
        $data['member'] = $member;
        
        $this->load->view('template/head.php');
        $this->load->view('template/nav.php');
        $this->load->view('index.php',$data);
        $this->load->view('template/footer.php');
    }

    public function main() {
        $this->load->view('Map.php');
    }

    public function signup() {
        $this->load->library('Recaptcha');
        $data['captcha'] = $this->recaptcha->getWidget();
        $data['script_captcha'] = $this->recaptcha->getScriptTag();
        $this->load->view('signup.php',$data);
    }

    public function login() {
        $this->load->view('template/login_header.php');
        $this->load->view('template/login_body.php');
        $this->load->view('template/login_footer.php');
    }

}
