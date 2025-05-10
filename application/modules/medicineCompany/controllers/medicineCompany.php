<?php
defined('BASEPATH') or exit('No direct script access allowed');

class medicineCompany extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('utility_helper');
    }

    public function index()
    {
        $data['title'] = 'Medicine Company';
        $cond = [
            'is_delete' => 1
        ];
        $data['data'] = getData("id,company_name,status,
        CASE
        WHEN status=1 THEN 'Active'
        ELSE 'Inactive'
        END as status_type", "medicine_company", $cond,  "", [],  "", "", "", "company_name", "asc");
        $this->load->view('include/header', $data);
        $this->load->view('index');
        $this->load->view('include/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('company_name', 'company name', 'required|trim');

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
        } else {
            $data = [
                'company_name' => ucwords(strtolower($this->input->post('company_name'))),
                'status' => !empty($this->input->post('active_button')) ? $this->input->post('active_button') : 0,
            ];

            if (empty($this->input->post('e_id'))) {
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['created_by'] = $this->session->userdata('users_id');
                $insrtId = insertData('medicine_company', $data);
            } else {
                $data['updated_at'] = date('Y-m-d H:i:s');
                $data['updated_by'] = $this->session->userdata('users_id');
                $insrtId = updateData('medicine_company', $data, ['id' => $this->input->post('e_id')]);
            }

            $return = [
                'status' => (bool) $insrtId,
                'msg' => $insrtId
                    ? "Company Name " . (empty($this->input->post('e_id')) ? 'Added' : 'Updated') . " Successfully"
                    : "Something went wrong",
            ];
        }
        
        echo json_encode($return);
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

        $update = updateData('medicine_company', $data, $cond);

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
        $data = getData("id,company_name,status", "medicine_company", $cond, "", "", "2");

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
        $update = updateData('medicine_company', $data, $cond);
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
