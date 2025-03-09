    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Auth extends MY_Controller
    {  // If using HMVC, extend MY_Controller
        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            // echo "Auth Controller is Working!";
            $this->load->view('login');
        }
    }
