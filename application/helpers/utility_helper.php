<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/**
 * @package     CLIRENT 1.0
 * @subpackage  utility helper for frontend
 *
 * @copyright   Copyright (C) 2016 CLIRENT, Inc. All rights reserved.
 */
/**
 *
 * //constractor checking for login and signup section,
 * //if get true then it will not come to sign/login page again,
 * //it will redirect to the account page
 * //start
 */
if (!function_exists('get_address')) {
    function get_address()
    {
        $CI = &get_instance();
        $qry = "SELECT clinic_id, clinic_address, clinic_name, map_embeded_src FROM clinic WHERE is_deleted = 0";
        $query = $CI->db->query($qry);

        return $query->result();
    }
}

if (!function_exists('get_medicine_name_fororder')) {
    function get_medicine_name_fororder($med_id)
    {
        $CI = &get_instance();
        $qry = " SELECT GROUP_CONCAT(name ORDER BY name ASC SEPARATOR ',') AS name  FROM medicine WHERE  id IN (" . $med_id . ")";

        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->row();
    }
}

if (!function_exists('brekup_bill_membership')) {
    function brekup_bill_membership($record_id)
    {
        $CI = &get_instance();
        $qry = "  SELECT * FROM `arogya_bandhu_billing` WHERE `registration_id` = " . $record_id . "";

        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->result();
    }
}
if (!function_exists('ABcard_type_TotalAmount')) {
    function ABcard_type_TotalAmount($card_type, $start_date, $end_date, $clinic_id)
    {
        $CI = &get_instance();
        if ($clinic_id != 0) {
            $query_string = "AND cl.clinic_id=" . $clinic_id . "";
        }
        $qry = "  SELECT * FROM `arogya_bandhu_registrations` abr
                      LEFT JOIN arogya_bandhu_billing abb ON abr.record_id = abb.registration_id
                      LEFT JOIN clinic cl ON abb.clinic_id = cl.ion_user_id
                      LEFT JOIN service_category sc ON sc.service_name=abr.card_type 
                      LEFT JOIN service_amount sa ON sc.id=sa.service_id 
                      WHERE abr.card_type = '" . $card_type . "' 
                      " . $query_string . "
                      AND abr.start_date BETWEEN '" . $start_date . "' AND '" . $end_date . "' and abb.status = 0 GROUP BY abb.registration_id";

        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->result();
    }
}
if (!function_exists('ABFcard_type_TotalAmount')) {
    function ABFcard_type_TotalAmount($card_type, $start_date, $end_date, $clinic_id)
    {
        $CI = &get_instance();
        if ($clinic_id != 0) {
            $query_string = "AND cl.clinic_id=" . $clinic_id . "";
        }
        $qry = "  SELECT * FROM `arogya_bandhu_registrations` abr
                      LEFT JOIN arogya_bandhu_billing abb ON abr.record_id = abb.registration_id
                      LEFT JOIN clinic cl ON abb.clinic_id = cl.ion_user_id
                      LEFT JOIN service_category sc ON sc.service_name=abr.card_type 
                      LEFT JOIN service_amount sa ON sc.id=sa.service_id 
                      WHERE abr.card_type = '" . $card_type . "' 
                      " . $query_string . "
                      AND abr.start_date BETWEEN '" . $start_date . "' AND '" . $end_date . "' and abb.status = 0 GROUP BY abb.registration_id";

        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->result();
    }
}
if (!function_exists('ABPcard_type_TotalAmount')) {
    function ABPcard_type_TotalAmount($card_type, $start_date, $end_date, $clinic_id)
    {
        $CI = &get_instance();
        if ($clinic_id != 0) {
            $query_string = "AND cl.clinic_id=" . $clinic_id . "";
        }
        $qry = "  SELECT * FROM `arogya_bandhu_registrations` abr
                     LEFT JOIN arogya_bandhu_billing abb ON abr.record_id = abb.registration_id
                     LEFT JOIN clinic cl ON abb.clinic_id = cl.ion_user_id
                     LEFT JOIN service_category sc ON sc.service_name=abr.card_type 
                     LEFT JOIN service_amount sa ON sc.id=sa.service_id 
                     WHERE abr.card_type = '" . $card_type . "' 
                     " . $query_string . "
                     AND abr.start_date BETWEEN '" . $start_date . "' AND '" . $end_date . "' and abb.status = 0 GROUP BY abb.registration_id";

        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->result();
    }
}
if (!function_exists('ABPFcard_type_TotalAmount')) {
    function ABPFcard_type_TotalAmount($card_type, $start_date, $end_date, $clinic_id)
    {
        $CI = &get_instance();
        if ($clinic_id != 0) {
            $query_string = "AND cl.clinic_id=" . $clinic_id . "";
        }
        $qry = "  SELECT * FROM `arogya_bandhu_registrations` abr
                     LEFT JOIN arogya_bandhu_billing abb ON abr.record_id = abb.registration_id
                     LEFT JOIN clinic cl ON abb.clinic_id = cl.ion_user_id
                     LEFT JOIN service_category sc ON sc.service_name=abr.card_type 
                     LEFT JOIN service_amount sa ON sc.id=sa.service_id 
                     WHERE abr.card_type = '" . $card_type . "' 
                     " . $query_string . "
                     AND abr.start_date BETWEEN '" . $start_date . "' AND '" . $end_date . "' and abb.status = 0 GROUP BY abb.registration_id";

        $query = $CI->db->query($qry);
        //    echo $qry;
        return $query->result();
    }
}

if (!function_exists('get_membership_amount')) {
    function get_membership_amount($card_type)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM `service_category` sc left join service_amount sa on sc.id=sa.service_id WHERE sc.`service_name` = '" . $card_type . "'";

        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->row();
    }
}

if (!function_exists('get_prescriptionData_forDownload')) {
    function get_prescriptionData_forDownload($appointment_id)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM prescription WHERE appointment_id = " . $appointment_id . "";
        $query = $CI->db->query($qry);

        return $query->row();
    }
}
if (!function_exists('get_handprescriptionData_forDownload')) {
    function get_handprescriptionData_forDownload($appointment_id)
    {
        $CI = &get_instance();
        $qry = "SELECT hand_write_prescription FROM appointment WHERE id = '" . $appointment_id . "'";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->row();
    }
}

if (!function_exists('check_eprescription')) {
    function check_eprescription($appointment_id)
    {
        $CI = &get_instance();
        $qry = "SELECT id FROM prescription WHERE appointment_id = '" . $appointment_id . "'";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->row();
    }
}
if (!function_exists('get_doctor_schdule_byClinic')) {
    function get_doctor_schdule_byClinic($clinic_id, $doctor_id, $ap_date)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM time_schedule WHERE clinic = " . $clinic_id . " AND doctor=" . $doctor_id . " AND date='" . $ap_date . "'  GROUP by s_time";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->result();
    }
}
if (!function_exists('getschdule_doctor')) {
    function getschdule_doctor($doctor_id)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM time_schedule WHERE  doctor=" . $doctor_id . "";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->num_rows();
    }
}
if (!function_exists('check_arogyasetu_membership')) {
    function check_arogyasetu_membership($patient_id)
    {
        $CI = &get_instance();
        $qry = "SELECT pt.*,abr.* FROM patient pt
            LEFT JOIN arogya_bandhu_registrations abr ON abr.patient_id = pt.id
            WHERE abr.patient_id = '" . $patient_id . "' ";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->row();
    }
}
if (!function_exists('avaliable_data_byDate')) {
    function avaliable_data_byDate($date, $doc_id)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM time_schedule WHERE doctor = '" . $doc_id . "' and date='" . $date . "' ";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->row();
    }
}

if (!function_exists('avaliable_data_byDate_ownschdule')) {
    function avaliable_data_byDate_ownschdule($date, $doc_id,$cllinic_id)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM time_schedule WHERE doctor = '" . $doc_id . "' and date='" . $date . "' and clinic = '".$cllinic_id."'";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->row();
    }
}


if (!function_exists('get_VitalData_forEntry')) {
    function get_VitalData_forEntry($appointment_id)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM patient_vitals WHERE appointment_id = " . $appointment_id . "";
        $query = $CI->db->query($qry);

        return $query->row();
    }
}


if (!function_exists('get_appointmentcount_foreports')) {
    function get_appointmentcount_foreports($clinic_id, $start_date, $end_date)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM appointment WHERE clinic_id = " . $clinic_id . " and add_date BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->num_rows();
    }
}
if (!function_exists('get_appointmentcount_checked_in_foreports')) {
    function get_appointmentcount_checked_in_foreports($clinic_id, $start_date, $end_date)
    {
        $Inarr_in = implode("','", explode(',', "3,8,5,6"));
        $CI = &get_instance();
        $qry = "SELECT * FROM appointment WHERE clinic_id = " . $clinic_id . " and add_date BETWEEN '" . $start_date . "' AND '" . $end_date . "' AND status IN('" . $Inarr_in . "')";
        $query = $CI->db->query($qry);
        // echo $qry;
        // exit;
        return $query->num_rows();
    }
}
if (!function_exists('get_cancelappointmentcount_foreports')) {
    function get_cancelappointmentcount_foreports($clinic_id, $start_date, $end_date)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM appointment WHERE clinic_id = " . $clinic_id . " and add_date BETWEEN '" . $start_date . "' AND '" . $end_date . "' and status=7";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->num_rows();
    }
}
if (!function_exists('get_doctorcount_foreports')) {
    function get_doctorcount_foreports($clinic_id, $start_date, $end_date)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM time_schedule WHERE clinic = " . $clinic_id . " and date BETWEEN '" . $start_date . "' AND '" . $end_date . "' GROUP BY doctor";
        $query = $CI->db->query($qry);
        // echo $qry;
        // exit;
        return $query->num_rows();
    }
}
if (!function_exists('get_doctor_checked_in_count_foreports')) {
    function get_doctor_checked_in_count_foreports($clinic_id, $start_date, $end_date)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM time_schedule WHERE is_time=1 and clinic = " . $clinic_id . " and date BETWEEN '" . $start_date . "' AND '" . $end_date . "' GROUP BY doctor";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->num_rows();
    }
}
if (!function_exists('get_patientMembership_foreports')) {
    function get_patientMembership_foreports($clinic_id, $start_date, $end_date,$patient_id)
    {
        $final_patID = implode(",",$patient_id);
        // echo $final_patID;   
        $CI = &get_instance();
      
         $qry = "SELECT * FROM arogya_bandhu_registrations abr WHERE  abr.patient_id IN ( '" . implode( "', '", $patient_id ) . "' )";
        $query = $CI->db->query($qry);
        // echo $qry;die();
        return $query->num_rows();
    }
}
if (!function_exists('get_Membershipcount_foreAgent')) {
    function get_Membershipcount_foreAgent($mem_id)
    {
     
        $CI = &get_instance();

        $qry = "SELECT id FROM arogya_bandhu_billing abb WHERE abb.registration_id = '" . $mem_id . "' and abb.status = 0  GROUP BY abb.registration_id";
        $query = $CI->db->query($qry);
        // echo $qry;die();
        return $query->num_rows();
    }
}
if (!function_exists('get_prescriptioncount_foreports')) {
    function get_prescriptioncount_foreports($clinic_id, $start_date, $end_date)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM prescription pr
                    LEFT JOIN appointment ap ON pr.appointment_id = ap.id
             WHERE ap.clinic_id = " . $clinic_id . " and ap.add_date BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->num_rows();
    }
}

if (!function_exists('get_uploadprescriptioncount_foreports')) {
    function get_uploadprescriptioncount_foreports($clinic_id, $start_date, $end_date)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM appointment ap
             WHERE ap.clinic_id = " . $clinic_id . " and ap.hand_write_prescription !='' and ap.add_date BETWEEN '" . $start_date . "' AND '" . $end_date . "'  ";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->num_rows();
    }
}

if (!function_exists('get_samplecollection_foreports')) {
    function get_samplecollection_foreports($clinic_id, $start_date, $end_date)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM sample_collection 
             WHERE clinic_assign = " . $clinic_id . " and date_of_collection BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->num_rows();
    }
}

if (!function_exists('get_phelboassign_foreports')) {
    function get_phelboassign_foreports($clinic_id, $start_date, $end_date)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM `phlebo_assignment` pa 
            LEFT JOIN sample_collection sc ON sc.id=pa.sample_id
             WHERE sc.clinic_assign = " . $clinic_id . " and pa.assign_date BETWEEN '" . $start_date . "' AND '" . $end_date . "'";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->num_rows();
    }
}



if (!function_exists('get_InvoiveData_forDownload')) {
    function get_InvoiveData_forDownload($appointment_id)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM payment WHERE appointment_id = " . $appointment_id . " and status = 'unpaid'";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->row();
    }
}
if (!function_exists('get_InvoiveDatatest_forDownload')) {
    function get_InvoiveDatatest_forDownload($appointment_id)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM payment WHERE appointment_id = " . $appointment_id . " and status = 'unpaid'";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->row();
    }
}



if (!function_exists('get_doctorconsultPaymentStatus')) {
    function get_doctorconsultPaymentStatus($appointment_id)
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM payment WHERE appointment_id = " . $appointment_id . "";
        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->row();
    }
}

if (!function_exists('is_logged_in_profile')) {
    function is_logged_in_profile()
    {
        $CI = &get_instance();
        $is_logged_in = $CI->session->userdata('is_logged_in_mr');
        //print_r($CI->session);
        //echo $is_logged_in;
        //exit;
        if ($is_logged_in == true) {
            redirect('session');
        } else {
        }
    }
}
/*
//constractor checking for login and signup section,
//if get true then it will not come to sign/login page again,
//it will redirect to the account page
//end
*/
/**
 * //constractor checking for all page where user session is requried
 * start
 */
if (!function_exists('is_register_profile')) {
    function is_register_profile()
    {
        $CI = &get_instance();
        $is_register_in = $CI->session->userdata('is_register_in');
        //print_r($CI->session);
        //echo $is_register_in;
        //exit;
        if ($is_register_in == true) {
            redirect('registration/terms');
        } else {
        }
    }
}
/**
 *
 */
if (!function_exists('is_register_in')) {
    function is_register_in()
    {
        $CI = &get_instance();
        $is_register_in = $CI->session->userdata('is_register_in');
        if (!isset($is_register_in) || $is_register_in == false) {
            //redirect('home');
            redirect('registration');
        }
    }
}




if (!function_exists('update_button_click_record_with_order_id')) {
    function update_button_click_record_with_order_id($order_id, $update_id)
    {
        $CI = &get_instance();
        $CI->db->select(
            '
		'
        );
        $qry = "UPDATE master_button_click_track SET order_id='" . $order_id . "' WHERE matter_id=" . $update_id . "";
        $query = $CI->db->query($qry);
        return true;
    }
}


if (!function_exists('get_meeting_category')) {
    function get_meeting_category()
    {
        $CI = &get_instance();
        $CI->db->select(
            '
		'
        );
        $qry = "SELECT master_category_id,category_name FROM master_category WHERE status";
        $query = $CI->db->query($qry);
        $result = $query->result();
        return $result;
    }
}
if (!function_exists('check_user_to_parent_data')) {
    function check_user_to_parent_data()
    {
        $CI = &get_instance();
        if ($CI->session->userdata('user_type') == 3) {
            // echo "Please";die();
            return 0;
        } else {

            $qry = "SELECT * FROM user_to_parent WHERE user_id = " . $CI->session->userdata('user_master_id_mr') . " AND parent_id !=0";
            $query = $CI->db->query($qry);
            // echo $qry;die();
            // $query->num_rows();
            // $result = $query->result();
            if ($query->num_rows() != 0) {
                return 0;
                // return $CI->session->set_userdata('check_userId','0'); 
            } else {
                return 1;
                // return $CI->session->set_userdata('check_userId','1'); 
            }
        }
    }
}

if (!function_exists('get_all_parent_data')) {
    function get_all_parent_data()
    {
        $CI = &get_instance();
        $qry = "SELECT * FROM econnect_user WHERE promo_user_id !=" . $CI->session->userdata('user_master_id_mr') . " ORDER BY first_name ASC";
        $query = $CI->db->query($qry);

        return $query->result();
    }
}

if (!function_exists('get_participant_count')) {
    function get_participant_count($session_id)
    {
        $CI = &get_instance();
        $CI->db->select(
            '
		'
        );
        $qry = "SELECT count(participant_id) as count_total FROM session_participant WHERE session_id=" . $session_id . "";
        //echo $qry; exit();
        $query = $CI->db->query($qry);
        $result = $query->row();

        //echo $result->count_total; exit();
        return $result->count_total;
    }
}

if (!function_exists('get_session_attened_participant')) {
    function get_session_attened_participant($ph_no)
    {
        //  echo $ph_no;
        $CI = &get_instance();
        $CI->db->select(
            '
		'
        );
        $qry = "SELECT DISTINCT session_id FROM `session_participant` WHERE phone_no =" . $ph_no . "";
        //    echo $qry;die();
        $query = $CI->db->query($qry);
        $result = $query->num_rows();

        // echo $result; 
        // exit();
        return $result;
    }
}

if (!function_exists('get_reporting_head')) {
    function get_reporting_head($child_user)
    {
        //  echo $ph_no;
        $CI = &get_instance();
        $CI->db->select(
            '
		'
        );
        $qry = " SELECT eu.first_name,eu.last_name FROM `user_to_parent` utp
        LEFT JOIN  econnect_user eu ON eu.promo_user_id = utp.parent_id
        WHERE utp.user_id =" . $child_user . "";

        //    echo $qry;die();
        $query = $CI->db->query($qry);
        $result = $query->row();

        // echo $result; 
        // exit();
        return $result;
    }
}









#################################################################
#################################################################
#################################################################
// if (!function_exists('is_logged_in')) {
//     function is_logged_in()
//     {
//         $CI =& get_instance();
//         $is_logged_in = $CI->session->userdata('is_logged_in_mr');
//         if (!isset($is_logged_in) || $is_logged_in == false) {
//             //echo "asasaa"; exit();
//             //redirect('home');
//             redirect(base_url());
//         } else {
//             $CI->session->set_userdata('is_setting_in', false);
//         }
//     }
// }

if (!function_exists('is_logged_in')) {
    function is_logged_in()
    {
        $CI = &get_instance();
        $is_logged_in = $CI->session->userdata('is_logged_in_mr');
        if (!isset($is_logged_in) || $is_logged_in == false) {

            $class_name = $CI->router->fetch_class();
            $method_name = $CI->router->fetch_method();
            if ($class_name == "session" && $method_name == "session_details") {
                //echo "sasasasa"; exit();
                $CI->session->set_userdata('redirect_detail_id', $CI->uri->segment(3));
            } else {
                $CI->session->set_userdata('redirect_detail_id', '0');
            }
            //echo "asasaa"; exit();
            //redirect('home');
            redirect(base_url());
        } else {
            $CI->session->set_userdata('redirect_detail_id', '0');
            $CI->session->set_userdata('is_setting_in', false);
        }
    }
}
if (!function_exists('get_collectionPaymentStatus')) {
    function get_collectionPaymentStatus($collection_id)
    {
        $CI = &get_instance();

        $qry = "SELECT * FROM `payment` WHERE sample_collection_id =" . $collection_id . "";
        $query = $CI->db->query($qry);
        // echo "<pre>";
        // echo $qry;
        // echo "</pre>";
        // exit;
        return $query->row();
    }
}

// modification by Indranil 2023-10-12
if (!function_exists('get_arogya_bndhu_reports')) {
    function get_arogya_bndhu_reports($clinic_id = "", $start_date = "", $end_date = "", $type = "")
    {
        $CI = &get_instance();

        if (empty($start_date) && empty($end_date)) {
            $query = " Where cl.clinic_id=" . $clinic_id . " and abr.card_type='$type' GROUP BY abb.registration_id";
        } else {
            $query = " Where cl.clinic_id=" . $clinic_id . " and abr.card_type='$type' and abr.start_date BETWEEN '" . $start_date . "' AND '" . $end_date . "' GROUP BY abb.registration_id";
        }

        $qry = "SELECT * FROM `arogya_bandhu_registrations` abr
        JOIN arogya_bandhu_billing abb ON abr.record_id=abb.registration_id 
        LEFT JOIN clinic cl ON cl.ion_user_id=abb.clinic_id" . $query;
        $query = $CI->db->query($qry);
        return $query->num_rows();
    }
}
// end

// modification by Indranil 31-10-2023
if (!function_exists('membership_details_report_on_filter')) {
    function membership_details_report_on_filter($start_date = "", $end_date = "", $data_source = "", $return_type = "", $specified_teammember = "")
    {
        $CI = &get_instance();

        if (empty($start_date) && empty($end_date)) {
            $query = " Where abb.status=0";
        } elseif (!empty($start_date) && (empty($end_date) || $end_date == "undefined")) {
            $query = " Where  abr.start_date= '" . $start_date . "' AND abb.status=0";
        } else {
            $query = " Where  abr.start_date BETWEEN '" . $start_date . "' AND '" . $end_date . "' AND abb.status=0";
        }


        
        if (!empty($specified_teammember)) {
            if (!empty($query)) {
                $query1 = $query . " and abb.created_by=" . $specified_teammember;
                $query = $query1;
            } else {
                $query1 = "abb.created_by=" . $specified_teammember;
                $query = $query1;
            }
        }

        if (!empty($data_source) && $data_source != "null") {
            $query1 = $query . " and abr.data_source ='" . $data_source . "'";
        } else {
            $query1 = $query;
        }
       
        $qry = "SELECT *,sum(abb.payment_amount) as ttl_amnt,users.username as created_by,agent.designation,agent.team FROM `arogya_bandhu_billing` abb
        JOIN arogya_bandhu_registrations abr ON abr.record_id=abb.registration_id 
        JOIN users ON users.id=abr.mem_created_by
        LEFT JOIN agent ON agent.ion_user_id=users.id
        LEFT JOIN clinic cl ON cl.ion_user_id=abb.clinic_id 
        JOIN patient psnt ON psnt.id=abr.patient_id " . $query1 . " GROUP BY abb.registration_id,abb.patient_id";
        $query = $CI->db->query($qry);
        // echo $qry;
       
        if ($return_type == 1) {
            return $query->num_rows();
        } else {
            return $query->result();
        }
    }
}

// end

// modification by Indranil 01-11-2023
if (!function_exists('diagnostic_collection_on_filter')) {
    function diagnostic_collection_on_filter($select_clinic = "", $start_date = "", $end_date = "", $check_data_status = "")
    {
        $CI = &get_instance();

        if ($check_data_status == "page_reload") {
            // echo "abcd";
            if (empty($start_date) && empty($end_date) && empty($select_clinic)) {
                $query = " Where Order By sc.id desc";
            } elseif (empty($start_date) && empty($end_date) && !empty($select_clinic)) {
                $query = " Where sc.clinic_assign='" . $select_clinic . "' Order By sc.id desc";
            } elseif (!empty($start_date) && (empty($end_date) || $end_date == "undefined") && empty($select_clinic)) {
                $query = " Where  sc.date_of_collection= '" . $start_date . "' Order By sc.id desc";
            } elseif (!empty($start_date) && (empty($end_date) || $end_date == "undefined") && !empty($select_clinic)) {
                $query = " Where  sc.date_of_collection= '" . $start_date . "' AND sc.clinic_assign='" . $select_clinic . "' Order By sc.id desc";
            } elseif (!empty($start_date) && !empty($end_date) && empty($select_clinic)) {
                $query = " Where  sc.date_of_collection BETWEEN '" . $start_date . "' AND '" . $end_date . "' Order By sc.id desc";
            } else {
                $query = " Where  sc.date_of_collection BETWEEN '" . $start_date . "' AND '" . $end_date . "' AND sc.clinic_assign='" . $select_clinic . "' Order By sc.id desc";
            }
        } else {
            // echo "abcd1";
            if (!empty($start_date) && (empty($end_date) || $end_date == "undefined") && empty($select_clinic)) {
                // echo "abcd2";
                $query = " Where  sc.date_of_collection>= '" . $start_date . "' Order By sc.id desc";
            }

            if (!empty($start_date) && (empty($end_date) || $end_date == "undefined") && !empty($select_clinic)) {
                // echo "abcd3";
                $query = " Where  sc.date_of_collection>= '" . $start_date . "' AND sc.clinic_assign='" . $select_clinic . "' Order By sc.id desc";
            }
        }

        $qry = "SELECT sc.*, psnt.name as patient_name, psnt.phone as patient_phone,ph.name as phlebo_name,pa.schedule_time,pa.phlebo_id, pa.schedule_time, pa.remarks, ph.name, ph.mobile,cl.clinic_address,cl.clinic_name,cl.clinic_id FROM sample_collection sc
        LEFT JOIN phlebo_assignment pa ON sc.id = pa.sample_id 
        LEFT JOIN phlebotomist ph ON sc.phlebo_id = ph.id 
        LEFT JOIN clinic cl ON cl.clinic_id=sc.clinic 
        JOIN patient psnt ON psnt.id=sc.patient " . $query;

        $query = $CI->db->query($qry);
        return $query->result();
    }
}

if (!function_exists('diagnostic_collection_test')) {
    function diagnostic_collection_test($test_ids = "")
    {
        $CI = &get_instance();
        $test_ids = implode(',', $test_ids);
        $qry = "SELECT GROUP_CONCAT(test_name) as test_name FROM test WHERE id IN ($test_ids)";
        $query = $CI->db->query($qry);
        // echo $qry;
        // exit;
        return $query->row();
    }
}
if (!function_exists('get_membershipDetails')) {
    function get_membershipDetails($patID)
    {
        $CI = &get_instance();
        $qry = "  SELECT card_type,registration_no,end_date FROM `arogya_bandhu_registrations` WHERE `patient_id` = " . $patID . "";

        $query = $CI->db->query($qry);
        // echo $qry;
        return $query->row();
    }
}

// if (!function_exists('appointment_details_on_filter')) {
//     function appointment_details_on_filter($select_clinic = "", $start_date = "", $end_date = "", $check_data_status = "")
//     {
//         if ($check_data_status == "page_reload") {
//             echo "abcd";
//         } else {
//             echo "abcd1";
//         }
//     }
// }
// end