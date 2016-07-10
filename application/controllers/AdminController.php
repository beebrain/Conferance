<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    private $user_login;

    function __construct() {
        parent::__construct();
       $admin = $this->uri->segment(3);
        if ($admin == "beebrain") {
            $this->session->set_userdata('admin', "beebrain");
        }
        if ($this->session->userdata('admin')) {
            $this->admin = $this->session->userdata('admin');
        } else {
            redirect(base_url('index.php/MainController/index/#login'));
        }

        if ($this->session->userdata('user_data')) {
            $this->user_login = $this->session->userdata('user_data');
        }
    }

    public function index() {
        $this->load->view('Admin/login_header.php');
        $this->load->view('Admin/Admin.php');
    }

    public function fullpaperChange($change, $id) {

        $this->load->model('paper');

        $condition['paper_id'] = $id;
        $data['status'] = $change;
        $this->paper->update($condition, $data);
        redirect(base_url('index.php/AdminPanel/fullArticle'));
    }

    public function logingod($id) {
        $this->load->model('user');
        $user_data = $this->user->getuser($id);
        $result = $user_data->result_array();
        $user_data = $result[0];
        $this->session->set_userdata('user_data', $user_data);
        redirect(base_url('index.php/UserPanel/index'));
    }

    public function UpdateField() {
        $data = $this->input->post();
        $condition['article_code'] = $data['article_code'];
        $this->load->model('paper');
        $dataupdate = array(
            'field_major' => $data['field_major'],
        );
        $paper_update = $this->paper->update($condition, $dataupdate);
        //echo $this->db->last_query();
        $paper_view = $this->paper->viewPaper($data);
        $message["major"] = "";
        if ($paper_view <> NULL) {
            $message["major"] = $paper_view[0]->field_major;
            //echo $message["major"];
        }
        //$message["field_major"] = $this->db->last_query();//$data['field_major'];
        echo json_encode($message);
    }

}
