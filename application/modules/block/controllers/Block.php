<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Block extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('utility_helper');
    }
    public function index()
    {
        // echo "<pre>";
        // print_r($this->session->userdata());
        // exit;
        $data['title'] = 'Block';
        $cond = [
            'is_delete' => 1,
            'shop_id' => $this->session->userdata('shop_id')
        ];
        $data['data'] = getData("id,block_name,status,
        CASE
        WHEN status=1 THEN 'Active'
        ELSE 'Inactive'
        END as status_type", "shop_wise_block", $cond,  "", [],  "", "", "", "block_name", "asc");
        $this->load->view('include/header', $data);
        $this->load->view('index');
        $this->load->view('include/footer');
    }

    public function addShopWiseBlock()
    {
        // echo "<pre>";
        // print_r($this->session->userdata());
        $this->form_validation->set_rules('block_name', 'block name', 'required|trim|min_length[1]|max_length[5]|alpha_numeric_spaces');

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
                'shop_id' => $this->session->userdata('shop_id'),
                'block_name' => $this->input->post('block_name'),
                'status' => !empty($this->input->post('active_button')) ? $this->input->post('active_button') : 0,
            ];

            // print_r($data);
            // exit;
            if (empty($this->input->post('e_id'))) {
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['created_by'] = $this->session->userdata('users_id');
                $insrtId = insertData("shop_wise_block", $data);
            } else {
                $data['updated_at'] = date('Y-m-d H:i:s');
                $data['updated_by'] = $this->session->userdata('users_id');
                $insrtId = updateData("shop_wise_block", $data, ['id' => $this->input->post('e_id')]);
            }

            $return = [
                'status' => (bool) $insrtId,
                'msg' => $insrtId
                    ? "Block " . (empty($this->input->post('e_id')) ? 'Added' : 'Updated') . " Successfully"
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
            'shop_id' => $this->session->userdata('shop_id')
        ];

        $update = updateData("shop_wise_block", $data, $cond);

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

    function editShopWiseBlock()
    {
        // echo "<pre>";
        $id = $this->input->post('id');
        $cond = [
            'id' => $id,
            'shop_id' => $this->session->userdata('shop_id')
        ];
        $data = getData("id,block_name,status", "shop_wise_block", $cond, "", "", "2");

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
            'id' => $id,
            'shop_id' => $this->session->userdata('shop_id')
        ];
        $data = [
            'is_delete' => 0
        ];
        $update = updateData("shop_wise_block", $data, $cond);
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
