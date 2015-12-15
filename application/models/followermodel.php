<?php

class followerModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('follower', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function searchfollower($data = null) {
        if ($data <> null) {
            $this->db->where($data);
        }
        $this->db->order_by("follower_id", "asc");
        $query = $this->db->get('follower');

        return $query->result();
    }

    public function getfollower($data = null) {
        if ($data <> null) {
            $this->db->where($data);
        }
        $this->db->order_by("follower_id", "asc");
        $query = $this->db->get('follower');

        return $query->result();
    }

}
