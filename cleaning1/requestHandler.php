<?php
/**
 * Created by PhpStorm.
 * User: Binary Tech Resonance Pvt. Ltd.
 * Date: 02-01-2019
 * Time: 01:41 PM
 */

require 'common-for-all.php';

if(isset($_POST['enquire_submitter'])){
    $date = date('d.m.Y H:i:s');
	$_name = trim($_POST['enquiry_name']);
	$_phone = trim($_POST['enquiry_mobile']);
	$_email = trim($_POST['enquiry_email']);
	$_message = trim($_POST['enquiry_message']);

	$data = array(
		'name' => $_name,
		'email' => $_email,
		'phone' => $_phone,
		'date' => $date,
		'message' => $_message?$_message:NULL
	);

	if($obj->quickEnquiry($data)) {
		$obj->setAlertMessage('msg', 'Your Enquiry has been received successfully.')
		    ->redirect('thank-you');
		return true;
	}else{
		$obj->setAlertMessage('err', 'Error Occured! Something went wrong. Please try again after sometime.')
		    ->redirect($_SERVER['HTTP_REFERER'], false);
		return false;
	}
}

echo 'Access Forbidden';
exit;