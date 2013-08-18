<?php

class Mcats extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function get_categories() {
        $data = array();

        $this->db->order_by('id', 'asc');
        $q = $this->db->get('categories');

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    function get_current_cat($id) {
        $data = array();

        $options = array('id' => $id);
        $q = $this->db->get_where('categories', $options, 1);

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data = $row;
            }
        }

        $q->free_result();
        return $data;
    }

}
