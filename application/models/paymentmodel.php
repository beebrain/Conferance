<?php

class paymentmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('payment', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update($condition,$data) {
        $this->db->where($condition);
        $this->db->update('payment', $data);
    }

    public function searchPayment($data = null) {
        if ($data <> null) {
            $this->db->where($data);
        }
        $this->db->order_by("pay_id", "desc");
        $query = $this->db->get('payment');

        return $query->result();
    }

    public function getpayment($data = null) {
        if ($data <> null) {
            $this->db->where($data);
        }
        $this->db->order_by("pay_id", "desc");
        $query = $this->db->get('pay_view');

        return $query->result();
    }

}
