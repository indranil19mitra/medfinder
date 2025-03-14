<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('send_password_set_link'))
{
	function send_password_set_link($email,$rand_num,$baseurl,$username,$name)
	{
		
		$CI =& get_instance();
		$CI->load->library(array('mailgun'));
		$CI->load->library(array('parser'));
		###########################################################
		$data['url'] 	   		= $baseurl."auth/setPassword/".$rand_num;
		$data['username'] = $username;
		$data['name'] = $name;
		// print_r($data);die();
		
		$email_txt = $CI->parser->parse('email/onboarding_mail_template_doctor',$data,true);

		// echo $email_txt; exit();

		if ($CI->mailgun->send([
            'from' => "mymdindia.com team <no-reply@mymdindia.com>",
            'to' => $email,
            'subject' => "Welcome to myMD Healthcare",
            'html' => $email_txt
        ])) {

            return true;
			// echo 'sent'; exit;

        } else {

            return false;
			// echo 'Not sent'; exit;
        }
		
	}
}


if ( ! function_exists('send_mail_user'))
{
	function send_mail_user($email,$rand_num,$baseurl,$username,$name,$pass)
	{
		
		$CI =& get_instance();
		$CI->load->library(array('mailgun'));
		$CI->load->library(array('parser'));
		###########################################################
		$data['url'] 	   		= $baseurl."auth/setPassword/".$rand_num;
		$data['username'] = $username;
		$data['name'] = $name;
        $data['password'] = $pass;
		
		
		$email_txt = $CI->parser->parse('email/onboarding_mail_template',$data,true);

		// echo $email_txt; exit();

		if ($CI->mailgun->send([
            'from' => "mymdindia.com team <no-reply@mymdindia.com>",
            'to' => $email,
            'subject' => "Welcome to myMD Healthcare",
            'html' => $email_txt
        ])) {

            return true;
			// echo 'sent'; exit;

        } else {

            return false;
			// echo 'Not sent'; exit;
        }
		
	}
}
if ( ! function_exists('send_mail_doctor_frontend'))
{
	function send_mail_doctor_frontend($email,$rand_num,$baseurl,$username,$name,$pass)
	{
		
		$CI =& get_instance();
		$CI->load->library(array('mailgun'));
		$CI->load->library(array('parser'));
		###########################################################
		$data['url'] 	   		= $baseurl."auth/setPassword/".$rand_num;
		$data['username'] = $username;
		$data['name'] = $name;
        $data['password'] = $pass;
        $data['email'] = $email;
        $data['login_url'] = $baseurl."auth/login";
		
		
		$email_txt = $CI->parser->parse('email/doctor_onboard_frontend_mail_template',$data,true);

		// echo $email_txt; exit();

		if ($CI->mailgun->send([
            'from' => "mymdindia.com team <no-reply@mymdindia.com>",
            'to' => $email,
            'subject' => "Welcome to myMD Healthcare",
            'html' => $email_txt
        ])) {

            return true;
			// echo 'sent'; exit;

        } else {

            return false;
			// echo 'Not sent'; exit;
        }
		
	}
}
if ( ! function_exists('send_mail_doctor_frontend_verifyemail'))
{
	function send_mail_doctor_frontend_verifyemail($email, $rand_num, $baseurl, $user_name,$verify_email)
	{
		
		$CI =& get_instance();
		$CI->load->library(array('mailgun'));
		$CI->load->library(array('parser'));
		###########################################################
		$data['url'] 	   		= $baseurl."auth/setPassword/".$rand_num;
		$data['username'] = $user_name;
		$data['verify_email_link'] = $verify_email;
        // $data['password'] = $pass;
		
		
		$email_txt = $CI->parser->parse('email/frontend_doctor_email_verification',$data,true);

		// echo $email_txt; exit();

		if ($CI->mailgun->send([
            'from' => "mymdindia.com team <no-reply@mymdindia.com>",
            'to' => $email,
            'subject' => "Welcome to myMD Healthcare",
            'html' => $email_txt
        ])) {

            return true;
			// echo 'sent'; exit;

        } else {

            return false;
			// echo 'Not sent'; exit;
        }
		
	}
}

if ( ! function_exists('send_mail_doctor_approve'))
{
	function send_mail_doctor_approve($email,$name)
	{
      
		$CI =& get_instance();
		$CI->load->library(array('mailgun'));
		$CI->load->library(array('parser'));

		$data['name'] = $name;
        
		$email_txt = $CI->parser->parse('email/doctor_onboard_frontend_mail_template_admin_confirmation',$data,true);

		if ($CI->mailgun->send([
            'from' => "mymdindia.com team <no-reply@mymdindia.com>",
            'to' => $email,
            'subject' => "Welcome to myMD Healthcare",
            'html' => $email_txt
        ])) {

            return true;
			// echo 'sent'; exit;

        } else {

            return false;
			// echo 'Not sent'; exit;
        }
		
	}
}

if ( ! function_exists('send_mail_user_forgot_password')) 
{
	function send_mail_user_forgot_password($email,$rand_num,$baseurl,$username)
	{
		// echo $email.'   '.$email;
		// exit;
		// $order_id_string = make_order_id( $order_id ,$media_id,$advt_type_id); // parameters => order_id, media_id, advt_type_id
		###########################################################
		//This below part should be common for all notification functions
		###########################################################
		$CI =& get_instance();
		$CI->load->library(array('mailgun'));
		$CI->load->library(array('parser'));
		###########################################################
		$data['url'] 	   		= $baseurl."auth/setPassword/".$rand_num;
		$data['username'] = $username;
		// $data['name'] = $name;
        // $data['password'] = $pass;
		
		// print_r($data);die();
		$email_txt = $CI->parser->parse('email/forgot_password_for_all_user',$data,true);

		// echo $email_txt; exit();

		if ($CI->mailgun->send([
            'from' => "mymdindia.com team <no-reply@mymdindia.com>",
            'to' => $email,
            'subject' => "Welcome to myMD Healthcare",
            'html' => $email_txt
        ])) {

            return true;
			// echo 'sent'; exit;

        } else {

            return false;
			// echo 'Not sent'; exit;
        }
		
	}
}








