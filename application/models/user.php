<?php

class user extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function updateUser($data) {
        $this->db->where('user_id', $data["user_id"]);
        $this->db->update('user', $data);
        return $this->db->affected_rows();
    }
    
    public function updatepassword($data) {
        $this->db->where('email', $data["email"]);
        $this->db->update('user', $data);
        return $this->db->affected_rows();
    }

    public function getUserView($user_id = null) {
        if ($user_id <> NULL) {
            $this->db->where('user_id', $user_id);
            $this->db->where_not_in('status', "-1");
        }
        $query = $this->db->get('user_view');
        return $query;
    }

    public function register($data) {
        $data["password"] = md5($data["password"]);
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }

    public function activate($data) {
        $this->db->where('email', $data["email"]);
        $this->db->update('user', $data);
    }

    public function getuser($user_id = null) {
        if ($user_id <> NULL) {
            $this->db->where('user_id', $user_id);
            $this->db->where_not_in('status', "-1");
        }
        $query = $this->db->get('user');
        return $query;
    }

    public function checkuser($user, $password) {
        if ($user <> NULL && $password <> NULL) {
            $this->db->where('email', $user);
            $this->db->where_not_in('status', "-1");
        }
        /*$this->db->where('status', "1");*/
        $query = $this->db->get('user');
        if ($query == null) {
            return NULL;
        }
        
        $result = $query->result_array();
        $MD5_password = md5($password);
        if ($result <> NULL && $result[0]['password'] == md5($password)) {
            return $result[0];
        } else {
            return NULL;
        }
    }

    public function checkDupUser($user) {
        if ($user == 'admin') {
            return True;
        }
        $this->db->where('email', $user);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

}
