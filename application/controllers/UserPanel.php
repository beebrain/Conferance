<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserPanel extends CI_Controller {

    private $user_login;

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_data')) {
            $this->user_login = $this->session->userdata('user_data');
        } else {
            redirect(base_url('index.php/MainController/index/#login'));
        }
    }

    public function index() {
        $this->load->model('user');
        $result = $this->user->getuser($this->user_login['user_id']);
        $data = $result->result();
        $user_data = $data[0];
        $all_data['user_data'] = $user_data;

        $this->load->model('paper_abstract');
        $citeria["user_id"] = $user_data->user_id;
        $data_result["abstract"] = null;
        $data_result["paper"] = null;
        $data_result["payment"] = null;


        $this->load->model('paper');
        if ($result = $this->paper->viewPaper($citeria)) {
            $paper_detail = $result[0];
            $data_result["paper"] = $paper_detail;
        }

        $this->load->model('paymentmodel');
        if ($datapayment = $this->paymentmodel->searchPayment($citeria)) {
            $datapayment = $datapayment[0];
            $data_result["payment"] = $datapayment;
        }


        $this->load->view('template/login_header.php');
        $this->load->view('Main.php', $data_result);
        $this->load->view('template/login_footer.php');
    }

    public function profile() {
        $this->load->model('user');
        $result = $this->user->getUserView($this->user_login['user_id']);
        $data = $result->result();
        $all_data['user_data'] = $data[0];
        $this->load->view('template/login_header.php');
        $this->load->view('Profile.php', $all_data);
        $this->load->view('template/login_footer.php');
    }

    public function AbArticle() {
        $this->load->model('user');
        $this->load->model('paper_abstract');
        $result = $this->user->getuser($this->user_login['user_id']);
        $data = $result->result();
        $data_user = $data[0];

        $citeria["user_id"] = $data_user->user_id;
        $result = $this->paper_abstract->viewAbstract($citeria);
        $data_result["paticipation"] = null;
        if ($result <> null) {
            $data_result["paticipation"] = $result[0];
        }

        $this->load->view('template/login_header.php');
        $this->load->view('AbStractArticle.php', $data_result);
        $this->load->view('template/login_footer.php');
    }

    public function fullArticle() {
        $this->load->model('user');
        $this->load->model('paper');
        $result = $this->user->getUserView($this->user_login['user_id']);
        $data = $result->result();
        $data_user = $data[0];

        $citeria["user_id"] = $data_user->user_id;
        $data_result["paper"] = null;

        $this->load->model('paper');
        $result = $this->paper->viewPaper($citeria);
        if ($result <> null) {
            $paper_detail = $result[0];
            $data_result["paper"] = $paper_detail;
        }
        $result = $this->paper->getField();
        $field = $result;
        $data_result["field"] = $field;
        $data_result["user"] = $data_user;
        $this->load->view('template/login_header.php');
        $this->load->view('full_Article.php', $data_result);
        $this->load->view('template/login_footer.php');
    }

    public function listArticle() {
        $this->load->model('user');
        $this->load->model('paper');
        $result = $this->user->getuser($this->user_login['user_id']);
        $data = $result->result();
        $data_user = $data[0];
        $citeria['status !='] = '-1';
        $result = $this->paper->viewPaper($citeria);
        $data_result["paper"] = null;
        if ($result <> null) {
            $data_result["paper"] = $result;
        }


        $this->load->view('template/login_header.php');
        $this->load->view('ListAbstract.php', $data_result);
        $this->load->view('template/login_footer.php');
    }

    public function payment() {
        $this->load->model('user');
        $result = $this->user->getuser($this->user_login['user_id']);
        $data = $result->result();
        $user_data = $data[0];

        $all_data['user_data'] = $user_data;
        $this->load->model('paymentmodel');
        $this->load->model('followermodel');


        $all_data['payment_data'] = null;
        $all_data['follower_data'] = null;

        $citeria['user_id'] = $user_data->user_id;
        $this->load->model('paper');
        $paper = $this->paper->getpaper($citeria);
        if ($paper[0]->approve == "1") {
            $page = "completepay.php";
            $datapayment = $this->paymentmodel->getpayment($citeria);

            $all_data['payment_data'] = $datapayment;
            
            
        } else {
            // $citeria['status'] = '0';
            $page = "payment.php";
            if ($datapayment = $this->paymentmodel->getpayment($citeria)) {
                $datapayment = $datapayment[0];

                $day1 = strtotime($datapayment->submit_date);
                $day2 = strtotime(date("Y-m-d H:i:s A"));
                $cal24 = $day2 - $day1;

                if ($datapayment->status <= '0' && $cal24 > (48 * 60 * 60)) {
                    $dataup['status'] = '-1';
                    $this->paymentmodel->update($citeria, $dataup);
                    $page = "payment.php";
                } else {
                    $condition['pay_id'] = $datapayment->pay_id;
                    $resultFollow = $this->followermodel->searchfollower($condition);
                    $all_data['payment_data'] = $datapayment;
                    $all_data['follower_data'] = $resultFollow;
                    $page = "comfirmpayment.php";
                }
            }
        }

        $this->load->view('template/login_header.php');
        $this->load->view($page, $all_data);
        $this->load->view('template/login_footer.php');
    }

    public function forgotPass() {
        $this->load->view('ForgotPass.php');
    }

}
