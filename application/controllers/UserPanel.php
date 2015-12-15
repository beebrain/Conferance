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

        if ($result = $this->paper_abstract->viewAbstract($citeria)) {
            $abstract = $result[0];
            $data_result["abstract"] = $abstract;
            $this->load->model('paper');

            $condition["abstract_id"] = $abstract->abstract_id;

            if ($result = $this->paper->viewPaper($condition)) {
                $paper_detail = $result[0];
                $data_result["paper"] = $paper_detail;
            }
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
        $result = $this->user->getuser($this->user_login['user_id']);
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
        $this->load->model('paper_abstract');
        $result = $this->user->getuser($this->user_login['user_id']);
        $data = $result->result();
        $data_user = $data[0];

        $citeria["user_id"] = $data_user->user_id;
        $result = $this->paper_abstract->viewAbstract($citeria);
        $data_result["paticipation"] = null;
        $data_result["paper"] = null;
        if ($result <> null) {
            $paticipation = $result[0];
            $data_result["paticipation"] = $paticipation;
            $this->load->model('paper');
            $condition["abstract_id"] = $paticipation->abstract_id;
            $result = $this->paper->viewPaper($condition);
            if ($result <> null) {
                $paper_detail = $result[0];
                $data_result["paper"] = $paper_detail;
            }
        }

        $this->load->view('template/login_header.php');
        $this->load->view('full_Article.php', $data_result);
        $this->load->view('template/login_footer.php');
    }

    public function listArticle() {
        $this->load->model('user');
        $this->load->model('paper_abstract');
        $result = $this->user->getuser($this->user_login['user_id']);
        $data = $result->result();
        $data_user = $data[0];
        $result = $this->paper_abstract->viewAbstract();
        $data_result["abstract"] = null;
        if ($result <> null) {
            $data_result["abstract"] = $result;
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

        $citeria['user_id'] = $user_data->user_id;
        $all_data['payment_data'] = null;
        $all_data['follower_data'] = null;
        if ($datapayment = $this->paymentmodel->searchPayment($citeria)) {
            $datapayment = $datapayment[0];

            $condition['pay_id'] = $datapayment->pay_id;
            $datafollower = $this->followermodel->searchfollower($condition);

            $all_data['payment_data'] = $datapayment;
            $all_data['follower_data'] = $datafollower;
        }

        $this->load->view('template/login_header.php');
        $this->load->view('payment.php', $all_data);
        $this->load->view('template/login_footer.php');
    }

}
