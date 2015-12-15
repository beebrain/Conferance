<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    private $user_login;

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_data')) {
            $this->user_login = $this->session->userdata('user_data');
        }
    }

    public function index() {
        $this->load->view('Admin/login_header.php');
        $this->load->view('Admin/Admin.php');
    }

    public function fullpaperChange($change,$id) {

        $this->load->model('paper');
        
        $condition['paper_id'] = $id;
        $data['status'] = $change;
        $this->paper->update($condition,$data);
        redirect(base_url('index.php/AdminPanel/fullArticle'));
    }

}
