<?php

class paper extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('paper', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update($condition, $data) {
        $this->db->where($condition);
        $this->db->update('paper', $data);
        return $this->db->affected_rows();
    }

    public function viewPaper($data = null) {
        if ($data <> null) {
            $this->db->where($data);
        }
        $this->db->order_by("paper_id", "desc");
        $query = $this->db->get('paper_view');

        return $query->result();
    }

    public function paper_except($data = null) {
        if ($data <> null) {
            $this->db->where($data);
        }
        $query = $this->db->get('paper_except');
        return $query->result();
    }

    public function getField() {
        $query = $this->db->get("field");
        return $query->result();
    }

    public function getIdfield($field) {
        $this->db->where('field_type', $field);
        $this->db->from('paper');
        return $this->db->count_all_results();
    }

    public function getpaper($data = null) {
        if ($data <> null) {
            $this->db->where($data);
        }
        $this->db->order_by("paper_id", "desc");
        $query = $this->db->get('paper');

        return $query->result();
    }

}
