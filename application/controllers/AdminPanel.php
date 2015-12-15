<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPanel extends CI_Controller {

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

    public function user() {
        $this->load->model('user');
        $result = $this->user->getuser();
        $result = $result->result();
        $data["user"] = $result;


        $this->load->view('Admin/login_header.php');
        $this->load->view('Admin/user.php', $data);
    }

    public function payment() {
        $this->load->model('paymentmodel');
        $payment = $this->paymentmodel->getpayment();

        $this->load->model('followermodel');
        foreach ($payment as $key => $value) {
            $condition['pay_id'] = $value->pay_id;
            $payment[$key]->follower = $this->followermodel->getfollower($condition);
        }
        $data['payment'] = $payment;

        $this->load->view('Admin/login_header.php');
        $this->load->view('Admin/payment.php', $data);
    }

    public function fullArticle() {
        $this->load->model('paper');
        $condition = null;
        $citeria = $this->input->get("citeria");
        if ($citeria != 0) {
            $condition["status"] = $citeria;
        } else {
            $condition["status"] = 0;
        }

        if ($condition["status"] == 0) {
            $status = "Wait Review";
        } else if ($condition["status"] == 1) {
            $status = "Resubmit";
        } else if ($condition["status"] == 2) {
            $status = "Approved";
        } else {
            $status = "Reject";
        }

        $paper = $this->paper->viewPaper($condition);
        $data['paper'] = $paper;
        $data['status'] = $status;
        $this->load->view('Admin/login_header.php');
        $this->load->view('Admin/fullpaper.php', $data);
    }

}
