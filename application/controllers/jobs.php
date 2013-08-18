<?php

class Jobs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mjobs');
        $this->load->model('mcats');
        //$this->firephp->log("FirePHP is working!");
        $data['sitetitle'] = 'Nettuts Job Board';
        $data['categories'] = $this->mcats->get_categories();
        $this->load->vars($data);
    }

    function index() {
        redirect('jobs/listings');
    }

    function listings() {
        //$data['listings'] = $this->mjobs->get_listings();
        $data['listings'] = $this->mjobs->get_listings($this->uri->segment(3));
        $this->load->view('listings', $data);
    }

    function details() {
        $data['details'] = $this->mjobs->get_details($this->uri->segment(3));
        $this->load->view('details', $data);
    }

    function add() {
        $this->load->view('add');
    }

    function submit() {
        $this->mjobs->submit_listing();
    }

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


