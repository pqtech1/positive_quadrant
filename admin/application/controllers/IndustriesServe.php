<?php

defined('BASEPATH') or exit('No direct script access allowed');


class IndustriesServe extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('IndustriesServeModel');
    }

    public function index()
    {
        $data['title'] = 'Industries Serve';

        $data['mast_load'] = 'ALOAD';

        $this->load->master_template('IndustriesServe/index', $data);
    }

    public function fetch_all() {
        
    }
}
