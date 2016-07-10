<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPanel extends CI_Controller {

    private $user_login;
    private $admin;

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

    public function billPayment() {
        $this->load->model('paper');
        $this->load->model('paymentmodel');
        $this->load->model('user');
        $citeria['approve'] = 1;
        $paper = $this->paper->viewPaper($citeria);
        //print_r($paper);

        foreach ($paper as $key => $value) {
            $userciteria = $value->user_id;
            $user_d = $this->user->getUserView($userciteria)->result();
            $user_d = $user_d[0];
            $datauser[$key]['user'] = $user_d;
            $datauser[$key]['paper'] = $value;
            $citeriapayment['status'] = 1;
            $citeriapayment['user_id'] = $userciteria;
            $payment = $this->paymentmodel->searchPayment($citeriapayment);
            if ($payment <> null && $payment[0]->address <> "") {
                $datauser[$key]['Address'] = $payment[0]->address;
            } else {
                $datauser[$key]['Address'] = $user_d->department." ".$user_d->faculty." ".$user_d->university." ".$user_d->country." ".$user_d->postcode;
            }
        }
        $data['datauser'] = $datauser;
        $this->load->view('Admin/login_header.php');
        $this->load->view('Admin/billview.php',$data);
    }

    public function index($admin = null) {
        // echo $admin;
        $this->load->view('Admin/login_header.php');
        $this->load->view('Admin/Admin.php');
    }

    public function Confirmpayment($user_id = NULL) {
        $this->load->model('paper');
        $condition['user_id'] = $user_id;
        $data['approve'] = '1';
        $this->paper->update($condition, $data);
        $this->listpaper();
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

    public function listpaper() {
        $this->load->model('paper');
        $condition["status"] = 0;
        $paper = $this->paper->viewPaper($condition);
        $data['paper'] = $paper;
        $this->load->view('Admin/login_header.php');
        $this->load->view('Admin/listFull.php', $data);
    }

    public function listuser() {
        $this->load->model('paper');
        $result = $this->paper->paper_except();
        $data['user'] = $result;
        $this->load->view('Admin/login_header.php');
        $this->load->view('Admin/listuser.php', $data);
    }

    public function listpayment() {
        $this->load->model('paymentmodel');
        $payment = $this->paymentmodel->getpayment();

        $this->load->model('followermodel');
        foreach ($payment as $key => $value) {
            $condition['pay_id'] = $value->pay_id;
            $payment[$key]->follower = $this->followermodel->getfollower($condition);
        }
        $data['payment'] = $payment;

        $this->load->view('Admin/login_header.php');
        $this->load->view('Admin/listpayment.php', $data);
    }

}
