<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('utility_helper');
    }

    public function userRole()
    {
        $data['title'] = 'User Role';
        $cond = [
            'name_slag !=' => 'super_admin',
            'is_delete' => 1
        ];
        $data['data'] = getData("id,name,status,
        CASE
        WHEN status=1 THEN 'Active'
        ELSE 'Inactive'
        END as status_type", "users_roles", $cond,  "", [],  "", "", "", "name", "asc");
        $this->load->view('include/header', $data);
        $this->load->view('userRole');
        $this->load->view('include/footer');
    }

    // public function addRole()
    // {
    //     // echo "<pre>";
    //     // print_r($this->input->post());
    //     // exit;
    //     // $this->form_validation->set_rules('role', 'Role', 'required|trim|is_unique[users_roles.name]');
    //     $this->form_validation->set_message('role_unique', 'The Role field must contain a unique value.');
    //     $this->form_validation->set_rules('role', 'Role', 'required|trim|callback_role_unique');

    //     if ($this->form_validation->run() === FALSE) {
    //         $postData = $this->input->post();
    //         $fieldErrors = [];

    //         foreach ($postData as $field => $value) {
    //             $error = form_error($field);
    //             if (!empty($error)) {
    //                 $fieldErrors[$field] = strip_tags($error);
    //             }
    //         }

    //         $return = [
    //             'field' => $fieldErrors,
    //             'status' => false,
    //             'msg' => 'Validation Error',
    //         ];

    //         // print_r($return);
    //         // exit;
    //         echo json_encode($return);
    //     } else {
    //         $data = [
    //             'name' => $this->input->post('role'),
    //             'name_slag' => strtolower(implode('_', explode(' ', $this->input->post('role')))),
    //             'status' => !empty($this->input->post('active_button')) ? $this->input->post('active_button') : 0,
    //         ];

    //         // print_r($data);
    //         // exit;

    //         if (empty($this->input->post('e_id'))) {
    //             $data['created_at'] = date('Y-m-d H:i:s');
    //             $data['created_by'] = $this->session->userdata('users_id');
    //             $insrtId = insertData('users_roles', $data);
    //         } else {
    //             $data['updated_at'] = date('Y-m-d H:i:s');
    //             $data['updated_by'] = $this->session->userdata('users_id');
    //             $insrtId = updateData('users_roles', $data, ['id' => $this->input->post('e_id')]);
    //         }
    //         if ($insrtId) {
    //             $return = [
    //                 'status' => true,
    //                 'msg' => "Role " . (empty($this->input->post('e_id')) ? 'Added' : 'Updated') . " Successfully",
    //             ];
    //         } else {
    //             $return = [
    //                 'status' => false,
    //                 'msg' => 'Something went wrong',
    //             ];
    //         }

    //         echo json_encode($return);
    //     }
    // }

    public function addRole()
    {
        $this->form_validation->set_message('role_unique', 'The Role field must contain a unique value.');
        $this->form_validation->set_rules('role', 'Role', 'required|trim|callback_role_unique');

        if ($this->form_validation->run() === FALSE) {
            $postData = $this->input->post();
            $fieldErrors = [];

            foreach ($postData as $field => $value) {
                $error = form_error($field);
                if (!empty($error)) {
                    $fieldErrors[$field] = strip_tags($error);
                }
            }

            $return = [
                'field' => $fieldErrors,
                'status' => false,
                'msg' => 'Validation Error',
            ];

            echo json_encode($return);
        } else {
            $data = [
                'name' => $this->input->post('role'),
                'name_slag' => strtolower(implode('_', explode(' ', $this->input->post('role')))),
                'status' => !empty($this->input->post('active_button')) ? $this->input->post('active_button') : 0,
            ];

            if (empty($this->input->post('e_id'))) {
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['created_by'] = $this->session->userdata('users_id');
                $insrtId = insertData('users_roles', $data);
            } else {
                $data['updated_at'] = date('Y-m-d H:i:s');
                $data['updated_by'] = $this->session->userdata('users_id');
                $insrtId = updateData('users_roles', $data, ['id' => $this->input->post('e_id')]);
            }

            $return = [
                'status' => (bool) $insrtId,
                'msg' => $insrtId
                    ? "Role " . (empty($this->input->post('e_id')) ? 'Added' : 'Updated') . " Successfully"
                    : "Something went wrong",
            ];

            echo json_encode($return);
        }
    }

    public function role_unique($value)
    {
        $e_id = $this->input->post('e_id');

        $cond = ['name' => $value];
        $result = getData('id', 'users_roles', $cond, "", [], "2");

        if (!empty($result)) {
            if (!empty($e_id) && $result->id == $e_id) {
                return TRUE;
            }
            return FALSE;
        }

        return TRUE;
    }



    function updateStatus()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        $data = [
            'status' => $status,
        ];

        $cond = [
            'id' => $id,
        ];

        $update = updateData('users_roles', $data, $cond);

        if ($update) {
            $return = [
                'status' => true,
                'msg' => 'Status Updated Successfully',
            ];
        } else {
            $return = [
                'status' => false,
                'msg' => 'Something went wrong',
            ];
        }
        echo json_encode($return);
    }

    function editRole()
    {
        // echo "<pre>";
        $id = $this->input->post('id');
        $cond = [
            'id' => $id
        ];
        $data = getData("id,name,status", "users_roles", $cond, "", "", "2");

        if (!empty($data)) {
            $result = [
                'status' => true,
                'data' => $data
            ];
        } else {
            $result = [
                'status' => false,
                'data' => ""
            ];
        }

        echo json_encode($result);
    }

    function delete()
    {
        $id = $this->input->post('id');
        $cond = [
            'id' => $id
        ];
        $data = [
            'is_delete' => 0
        ];
        $update = updateData('users_roles', $data, $cond);
        if ($update) {
            $return = [
                'status' => true,
                'msg' => 'Deleted Successfully',
            ];
        } else {
            $return = [
                'status' => false,
                'msg' => 'Something went wrong',
            ];
        }
        echo json_encode($return);
    }
}
