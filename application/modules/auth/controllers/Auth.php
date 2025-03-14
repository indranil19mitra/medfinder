<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->library('session'); // Just load it, don't assign it to a variable
        // $this->load->model('auth_model');
    }

    public function index()
    {
        // $this->load->view('login');
        echo "abcd";
    }

    public function logout()
    {
        $this->session->sess_destroy(); // This will now work
        redirect('auth');
    }
}
