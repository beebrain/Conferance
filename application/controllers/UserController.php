<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

    public function register() {
        $this->load->library("recaptcha");
        $data = $this->input->post();
        $recaptcha = $data["g-recaptcha-response"];
        $response = $this->recaptcha->verifyResponse($recaptcha);

        if (!isset($response['success']) || $response['success'] <> true) {
            $messageData["info"] = "Robot";
        } else {

            unset($data['g-recaptcha-response']);
            $this->load->model('user');
            if (!$this->user->checkDupUser($data['email'])) {
                $messageData["info"] = "success";
                $this->user->register($data);
                $this->load->model('sendmail');
                $this->sendmail->confirmUser($data['email'], $data['password']);
            } else { // duplicate user
                $messageData["info"] = "Duplicate User";
            }
        }
        echo json_encode($messageData);
    }

    public function updateUser() {
        $data = $this->input->post();
        $this->load->model('user');
        $user_data = $this->user->getuser($data['user_id']);
        $user_data = $user_data->result();
        $user_data = $user_data[0];

        $data["password"] = $user_data->password;
        $this->user->updateUser($data);
        redirect(base_url('index.php/UserPanel/profile'));
    }

    public function sendMailTest() {
        $this->load->model('sendmail');
        $this->sendmail->sendMail("Chanida@uru.ac.th");
    }

    public function paymentSubmit() {
        $user_data = $this->session->userdata('user_data');
        $data = $this->input->post();


        $config['upload_path'] = "upload/pay";
        $config['allowed_types'] = "jpg|gif|png|doc|docx|pdf|xlsx|xls|txt";
        $config['max_size'] = 2048;
        $config['file_name'] = $user_data['user_id'] . "_payment";
        $config['encrypt_name'] = 'true';
        $config['remove_spaces'] = 'true';

        $this->load->library("upload");
        $this->upload->initialize($config);
        // Upload payment
        if ($this->upload->do_upload("payment_copy")) {
            $data_payment = $this->upload->data();
        } else {
            $info['data'] = $this->upload->display_error();
            $info['statis'] = "error";
        }

        if ($data["student"] == "S") {
            $config['file_name'] = $user_data['user_id'] . "_student";
            $this->upload->initialize($config);
            // Upload student
            if ($this->upload->do_upload("student_copy")) {
                $data_student = $this->upload->data();
            } else {
                $info['data'] = $this->upload->display_error();
                $info['statis'] = "error";
            }
        }

        $datainsert["user_id"] = $user_data["user_id"];
        $datainsert["payment_link"] = base_url('/upload/pay/') . "/" . $data_payment["file_name"];
        //print_r($data_payment);
        $datainsert["address"] = $data["address_pay"];

        $datainsert["date"] = $data["datePay"];
        $datainsert["status"] = 0;
        if ($data["student"] == 'S') {
            $datainsert["student"] = "Student";
            $datainsert["student_link"] = base_url('/upload/pay/') . "/" . $data_student["file_name"];
        } else {
            $datainsert["student"] = "Non Student";
        }

        if ($data["nation"] == 'T') {
            $datainsert["nation"] = "Thai";
            $datainsert["totalpay"] = $data["totalpay"] . " B";
        } else {
            $datainsert["nation"] = "Foreigner";
            $datainsert["totalpay"] = "$ " . $data["totalpay"];
        }
        $this->load->model('paymentmodel');
        $pay_id = $this->paymentmodel->insert($datainsert);

        if (sizeof($data["follower"]) > 0) {
            $this->load->model('followermodel');
            $datafollower["pay_id"] = $pay_id;
            foreach ($data["follower"] as $key => $value) {
                $datafollower["follower_name"] = $value;
                $this->followermodel->insert($datafollower);
            }
        }
        redirect(base_url('index.php/UserPanel/payment'));
    }

    /**
     * Submit paper function
     */
    public function submitAbstract() {
        $user_data = $this->session->userdata('user_data');
        $data = $this->input->post();
        $name = $data["participation_type"] . $data["field_type"] . $user_data["user_id"];

        $this->load->model('paper_abstract');

        $config['upload_path'] = "upload/";
        $config['allowed_types'] = "jpg|gif|png|doc|docx|pdf|xlsx|xls|txt";
        $config['max_size'] = 2048;
        $config['file_name'] = $name . "_abstract";
        $config['encrypt_name'] = 'true';
        $config['remove_spaces'] = 'true';

        $this->load->library("upload");
        $this->upload->initialize($config);
        $info['status'] = "success";
        // Upload abstract
        if ($this->upload->do_upload("abstract")) {
            $data_ab = $this->upload->data();
        } else {
            $info['data'] = $this->upload->display_error();
            $info['statis'] = "error";
        }
        $data_insert['article_code'] = 0;
        $data_insert["abstract_link"] = base_url('upload/' . $data_ab["file_name"]);
        $data_insert["paper_title"] = $data["paper_title"];
        $data_insert["field_type"] = $data["field_type"];
        $data_insert["participation_type"] = $data["participation_type"];
        $data_insert["user_id"] = $user_data["user_id"];
        $data_insert["status"] = 1;

        $id_paper = $this->paper_abstract->insert($data_insert);
        $data_insert['article_code'] = $data["participation_type"] . $data["field_type"] . $id_paper;
        $this->paper_abstract->update($data_insert);

        redirect(base_url('index.php/UserPanel/AbArticle'));
    }

    public function submitPaper() {
        $user_data = $this->session->userdata('user_data');
        $this->load->model('user');
        $this->load->model('paper_abstract');
        $this->load->model('paper');

        $data = $this->input->post();
        $result = $this->user->getuser($user_data['user_id']);
        $data_user = $result->result();
        $data_user = $data_user[0];

        $citeria["user_id"] = $data_user->user_id;
        $result = $this->paper_abstract->viewAbstract($citeria);
        $data_abstract = $result[0];
        $abstract_id = $data_abstract->abstract_id;


        $config['upload_path'] = "upload/";
        $config['allowed_types'] = "jpg|gif|png|doc|docx|pdf|xlsx|xls|txt";
        $config['max_size'] = 2048;
        $config['file_name'] = $data_user->user_id . "_paper";
        $config['encrypt_name'] = 'true';

        $this->load->library("upload");
        $this->upload->initialize($config);
        $info['status'] = "success";


        // Upload abstract
        if ($this->upload->do_upload("paper")) {
            $data_ab = $this->upload->data();
        } else {
            // echo $this->upload->display_error();
            // $info['statis'] = "error";
        }


        $data_insert['abstract_id'] = $abstract_id;
        $data_insert["paper_link"] = base_url('upload/' . $data_ab["file_name"]);
        $data_insert["paper_type"] = $data["paper_type"];
        $data_insert["status"] = 0;

        $id_paper = $this->paper->insert($data_insert);
        redirect(base_url('index.php/UserPanel/fullArticle'));
    }

    public function confirmUser($code) {
        $email = base64_decode($code);
        $this->load->model('user');
        $citeria["email"] = $email;
        $citeria["status"] = 1;
        $result = $this->user->activate($citeria);
        redirect(base_url('index.php/MainController/index/#login'));
    }

    public function login() {
        $data = $this->input->post();
        $this->load->model('user');
        $user_data = $this->user->checkuser($data['email'], $data['password']);
        if ($user_data <> NULL) {
            $this->session->set_userdata('user_data', $user_data);
            $message["url"] = base_url('index.php/UserPanel/index');
            //redirect(base_url('index.php/UserPanel/'));
        } else {
            $message["url"] = "";
        }
        echo json_encode($message);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('index.php/MainController/index/#login'));
    }

}
