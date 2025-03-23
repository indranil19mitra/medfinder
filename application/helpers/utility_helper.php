<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!defined('getData')) {
    function getData($selection, $table, $cond = [], $group_by_col = "", $join = [], $fetch_type = "", $where_in_data = "", $where_in_field = "", $order_by_col = "", $order_by_type = "", $limit = "", $start = "", $search_in_data = [], $search_in_field = "")
    {
        $CI = &get_instance();

        if (!empty($selection)) {
            $CI->db->select($selection);
        }
        $CI->db->from($table);
        if (!empty($cond)) {
            $CI->db->where($cond);
        }
        if (!empty($group_by_col)) {
            $CI->db->group_by($group_by_col);
        }
        if (!empty($join)) {
            foreach ($join as $val) {
                if (empty($val['type'])) {
                    $CI->db->join($val['table'], $val['condition'], 'left');
                } else {
                    $CI->db->join($val['table'], $val['condition'], $val['type']);
                }
            }
        }

        if (!empty($where_in_field) && !empty($where_in_data)) {
            $CI->db->where_in($where_in_field, explode(',', $where_in_data));
        }

        if (!empty($order_by_col) && !empty($order_by_type)) {
            $CI->db->order_by($order_by_col, $order_by_type);
        }

        if (!empty($search_in_field) && !empty($search_in_data)) {
            foreach ($search_in_data as $key => $val) {
                if ($key == 0) {
                    $CI->db->like($search_in_field, $val);
                } else {
                    $CI->db->or_like($search_in_field, $val);
                }
            }
        }

        if (!empty($limit) && !empty($start)) {
            $CI->db->limit($limit, $start);
        } else {
            if (!empty($limit)) {
                $CI->db->limit($limit);
            }
        }

        $query = $CI->db->get();

        // echo $CI->db->last_query();

        if ($fetch_type == "1") {
            return $query->num_rows();
        } elseif ($fetch_type == "2") {
            return $query->row();
        } else {
            return $query->result();
        }
    }

    if (!function_exists('updateData')) {
        function updateData($table = "", $data = "", $cond = "")
        {
            $CI = &get_instance();

            $CI->db->where($cond);
            $CI->db->update($table, $data);

            // echo $CI->db->last_query();
            return ($CI->db->affected_rows() > 0) ? true : false;
        }
    }

    if (!function_exists('insertData')) {
        function insertData($table = "", $data = "")
        {
            $CI = &get_instance();

            if (empty($table) || empty($data)) {
                return false;
            }

            $CI->db->insert($table, $data);

            // echo $CI->db->last_query();
            return $CI->db->insert_id();
        }
    }
}
