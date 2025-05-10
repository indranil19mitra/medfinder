<?php
defined('BASEPATH') or exit('No direct script access allowed');

class medicineType extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('utility_helper');
    }

    public function index()
    {
        $data['title'] = 'Medicine Type';
        $cond = [
            'is_delete' => 1
        ];
        $data['data'] = getData("id,type,status,
        CASE
        WHEN status=1 THEN 'Active'
        ELSE 'Inactive'
        END as status_type", "medicine_type", $cond,  "", [],  "", "", "", "type", "asc");
        $this->load->view('include/header', $data);
        $this->load->view('index');
        $this->load->view('include/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('type', 'type', 'required|trim');

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
                'type' => ucwords(strtolower($this->input->post('type'))),
                'status' => !empty($this->input->post('active_button')) ? $this->input->post('active_button') : 0,
            ];

            if (empty($this->input->post('e_id'))) {
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['created_by'] = $this->session->userdata('users_id');
                $insrtId = insertData('medicine_type', $data);
            } else {
                $data['updated_at'] = date('Y-m-d H:i:s');
                $data['updated_by'] = $this->session->userdata('users_id');
                $insrtId = updateData('medicine_type', $data, ['id' => $this->input->post('e_id')]);
            }

            $return = [
                'status' => (bool) $insrtId,
                'msg' => $insrtId
                    ? "Type " . (empty($this->input->post('e_id')) ? 'Added' : 'Updated') . " Successfully"
                    : "Something went wrong",
            ];

            echo json_encode($return);
        }
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

        $update = updateData('medicine_type', $data, $cond);

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

    public function edit()
    {
        // echo "<pre>";
        $id = $this->input->post('id');
        $cond = [
            'id' => $id
        ];
        $data = getData("id,type,status", "medicine_type", $cond, "", "", "2");

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
        $update = updateData('medicine_type', $data, $cond);
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
