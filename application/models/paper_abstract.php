<?php

class paper_abstract extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('abstract', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update($data) {

        $this->db->where('user_id', $data['user_id']);
        $this->db->update('abstract', $data);
    }

    public function viewAbstract($data = null) {
        if ($data <> null) {
            $this->db->where($data);
        }
        
        $query = $this->db->get('abstract_view');

        return $query->result();
    }

}
