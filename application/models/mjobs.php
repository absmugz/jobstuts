<?php

class Mjobs extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function get_listings($category) {
        $data = array();

        //$this->db->order_by('id', 'desc');
        //$q = $this->db->get('jobs');

        if ($category) {
            $options = array('category' => $category);
            $this->db->order_by('id', 'desc');
            $q = $this->db->get_where('jobs', $options);
        } else {
            $this->db->order_by('id', 'desc');
            $q = $this->db->get('jobs');
        }

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        $q->free_result();
        return $data;
    }

    function get_details($id) {
        $data = array();

        $options = array('id' => $id);
        $q = $this->db->get_where('jobs', $options, 1);

        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data = $row;
            }
        }

        $q->free_result();
        return $data;
    }

	function submit_listing() {
		$this->form_validation->set_rules('title', 'Title', 'required|max_length[250]|htmlspecialchars');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('body', 'Job Description', 'required|htmlspecialchars');
		$this->form_validation->set_rules('type', 'Job Type', 'required|max_length[30]');
		$this->form_validation->set_rules('location', 'Location', 'required|max_length[100]');
		$this->form_validation->set_rules('company', 'Your/Company Name', 'required|max_length[100]');
		$this->form_validation->set_rules('url', 'URL', 'max_length[100]|prep_url');
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[100]|valid_email');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('add');
		}
		else {
			$data = array(
				'title'		=>	$this->input->post('title'),
				'category'	=>	$this->input->post('category'),
				'body'		=>	$this->input->post('body'),
				'type'		=>	$this->input->post('type'),
				'location'	=>	$this->input->post('location'),
				'company'	=>	$this->input->post('company'),
				'url'		=>	$this->input->post('url'),
				'email'		=>	$this->input->post('email'),
				'ipaddress'	=>	$this->input->ip_address(),
				'posted'	=>	time()
			);
			$this->db->insert('jobs', $data);
			redirect('jobs/listings');
		}
	}

}
