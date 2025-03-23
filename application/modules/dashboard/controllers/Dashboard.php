<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('include/header', $data);
        $this->load->view('dashboard');
        $this->load->view('include/footer');
    }
}
