<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('utility_helper');
        // $this->load->library('session'); // Just load it, don't assign it to a variable
        // $this->load->model('auth_model');
    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('include/header', $data);
        $this->load->view('login');
        $this->load->view('include/footer');
        // echo "abcd";
    }

    public function logout()
    {
        $this->session->sess_destroy(); // This will now work
        redirect('auth');
    }

    public function authLogin()
    {
        // echo "<pre>";
        // print_r($_POST);

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Get user data from database
        $cond = array('users_name' => $username);
        $join1 = ["table" => "users", "condition" => "users.id=users_auth.users_id"];
        $join2 = ["table" => "users_roles", "condition" => "users_roles.id=users.roles"];
        $join = [$join1, $join2];

        $userData = getData("users_auth.id as users_auth_id,users_auth.users_id as users_id,users_auth.users_pass,users.name,users.phone,users.shop as shop_id,users_roles.name_slag as url_name_slag,users.email", "users_auth", $cond, "", $join, "2");

        if ($userData) {
            $hashedPassword = $userData->users_pass; // Get stored hash from DB

            // Verify password using password_verify()
            if (password_verify($password, $hashedPassword)) {
                // echo "Login successful!";
                // You can now start a session or redirect the user

                // print_r($userData);
                $sessionData = [
                    'users_auth_id'   => $userData->users_auth_id,
                    'users_id'  => $userData->users_id,
                    'name'      => $userData->name,
                    'phone'      => $userData->phone,
                    'url_name_slag'      => $userData->url_name_slag,
                    'shop_id'      => $userData->shop_id,
                    'logged_in' => true
                ];

                $this->session->set_userdata($sessionData);

                // print_r($this->session->all_userdata());
                // if ($userData->url_name_slag == "super_admin") {

                // }
                // redirect('dashboard');
                $rslt = ["status" => 101, "msg" => "Login successful!"];
            } else {
                echo "Invalid username or password.";
                $rslt = ["status" => 102, "msg" => "Invalid username or password."];
            }
        } else {
            echo "User not found.";
            $rslt = ["status" => 103, "msg" => "User not found."];
        }

        // exit;
        echo json_encode($rslt);
    }
}
