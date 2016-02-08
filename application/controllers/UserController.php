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
            if (!$this->user->checkDupUser(strtolower($data['email']))) {
                $email = $data['email'];
                $data['email'] = strtolower($data['email']);
                $messageData["info"] = "success";
                $this->user->register($data);
                $this->load->model('sendmail');
                $this->sendmail->confirmUser($email, $data['password']);
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

        $datainsert["user_id"] = $user_data["user_id"];
        $datainsert["address"] = $data["address_pay"];
        $datainsert["submit_date"] =  date("Y-m-d h:i:s A");
        $datainsert["status"] = 0;

        if ($data["student"] == 'S') {
            $datainsert["student"] = "Student";
        } else {
            $datainsert["student"] = "Regular";
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

    public function paymentComfirm() {
        $user_data = $this->session->userdata('user_data');
        $data = $this->input->post();
        

        $config['upload_path'] = "upload/pay";
        $config['allowed_types'] = "jpg|gif|png|pdf";
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

        if ($data["student"] == "Student") {
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
        $datainsert["payment_link"] = "/upload/pay/" . $data_payment["file_name"];


        $datainsert["confirm_date"] = $data["datePay"]." ".$data["time"];
        $datainsert["status"] = 1;
        if ($data["student"] != "Regular") {
            $datainsert["student_link"] = "/upload/pay/" . $data_student["file_name"];
        } 


        $this->load->model('paymentmodel');
        
        $condition["user_id"] = $user_data["user_id"];
        $condition["status"] = "0";
        $this->paymentmodel->update($condition,$datainsert);

        redirect(base_url('index.php/UserPanel/payment'));
    }

    public function submitPaper() {
        $user_data = $this->session->userdata('user_data');
        $this->load->model('user');
        $this->load->model('paper');

        $data = $this->input->post();
        $result = $this->user->getUser($user_data['user_id']);
        $data_user = $result->result();
        $data_user = $data_user[0];


        $config['upload_path'] = "upload/";
        $config['allowed_types'] = "jpg|gif|png|doc|docx|pdf|xlsx|xls|txt";
        $config['max_size'] = 2048;
        $config['file_name'] = $data_user->user_id . "_paper";
        $config['encrypt_name'] = 'true';

        $this->load->library("upload");
        $this->upload->initialize($config);
        // $info['status'] = "success";
        // Upload abstract
        if ($this->upload->do_upload("paper")) {
            $data_fp = $this->upload->data();

            $data_insert['user_id'] = $data_user->user_id;
            $data_insert["field_type"] = $data["field_type"];
            $data_insert['paper_title'] = $data['paper_title'];
            $data_insert["paper_link"] = $data_fp["file_name"];
            $data_insert["status"] = 0;
            $this->paper->insert($data_insert);
            $id_paper = $this->db->insert_id();
            
            $id_field = $this->paper->getIdfield($data["field_type"]);
            // Update Article_code
            $data_insert["article_code"] = $data_user->participation . $data["field_type"] .$id_paper."-".$this->fullIdArtic($id_field);

            $condition["paper_id"] = $id_paper;
            $this->paper->update($condition, $data_insert);
        } else {
            // echo $this->upload->display_error();
            // $info['statis'] = "error";
        }

        redirect(base_url('index.php/UserPanel/fullArticle'));
    }

    public function UpdatePaper() {
        $user_data = $this->session->userdata('user_data');
        $this->load->model('user');
        $this->load->model('paper');

        $data = $this->input->post();
        $result = $this->user->getUser($user_data['user_id']);
        $data_user = $result->result();
        $data_user = $data_user[0];


        $config['upload_path'] = "upload/";
        $config['allowed_types'] = "jpg|gif|png|doc|docx|pdf|xlsx|xls|txt";
        $config['max_size'] = 2048;
        $config['file_name'] = $data_user->user_id . "_paper";
        $config['encrypt_name'] = 'true';

        $this->load->library("upload");
        $this->upload->initialize($config);

        if ($this->upload->do_upload("paper")) {
            $data_fp = $this->upload->data();

            $data_insert['user_id'] = $data_user->user_id;
            $data_insert['paper_title'] = $data['paper_title'];
            $data_insert["paper_link"] = $data_fp["file_name"];
            $data_insert["status"] = 0;

            $condition['user_id'] = $data_user->user_id;
            $this->paper->update($condition, $data_insert);
        } else {
            // echo $this->upload->display_error();
            // $info['statis'] = "error";
        }

        redirect(base_url('index.php/UserPanel/fullArticle'));
    }

    public function fullIdArtic($id) {
        $ida = $id;
        for ($i = 1000; $i >= $ida; $i = $i / 10) {
            $id = "0" . $id;
        }
        return $id;
    }

    public function confirmUser($code) {
        $email = base64_decode($code);

        $this->load->model('user');
        $citeria["email"] = strtolower($email);

        $citeria["status"] = '1';
        //print_r($citeria);
        $result = $this->user->activate($citeria);
        $this->load->view('Activate');
        //redirect(base_url('index.php/MainController/index/#login'));
    }

    public function login() {
        $data = $this->input->post();
        $data['email'] = strtolower($data['email']);
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

    public function forgotPass() {
        redirect(base_url('index.php/MainController/index/#login'));
    }

}
