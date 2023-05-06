<?php

//require_once(APPPATH.'libraries/sendinblue/Mailin.php');
date_default_timezone_set('Asia/Kolkata');

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
//require_once(APPPATH.'libraries/paytm_library/config_paytm.php');
//require_once(APPPATH.'libraries/paytm_library/encdec_paytm.php');

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

//
//
//print_r($paramList);
//
//echo $paytmChecksum;


$order_id = $_POST["ORDERID"];
$bank_ref_no = $_POST["BANKTXNID"];
$tracking_id = $_POST["TXNID"];

$uid = $this->session->userdata("user_id");
$odata = $this->db->get_where("orders",array("order_id"=>$order_id,"user_id"=>$uid))->row();


if($isValidChecksum == "TRUE") {
//	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
	
//		$mailin = new Mailin('https://api.sendinblue.com/v2.0','gD1KRk5p6w8VZaxs');
//		
//			$data = array( "to" => array($semail=>$sdid->student_name),
//				"from" => array("rsat@rankerslearning.com","RSAT2019"),
//				"subject" => "Student Login Details",
//				"html" => '<div class="container">
//							<h3>Hai '.$sdid->student_name.' please find your login credentials</h3>
//						    
//							<table class="bordered">
//							  <thead>
//								<tr>
//									<th>Registration ID</th>
//									<th>Username </th>
//									<th>Password </th>
//								</tr>
//							  </thead>
//							  <tbody>
//							    <tr>
//									<td>'.$sdid->student_registration_id.'</td>
//									<td>'.$semail.'</td>
//									<td>'.$this->login_model->app_password_crypt($sdid->password,'d').'</td>
//								</tr>
//							  </tbody>
//							  
//							</table>
//						  </div>',
//
//			);
//
//			$mailin->send_email($data);
		
		
		$this->session->set_flashdata(array("payment_status"=>'<div class="alert alert-success alert-dismissible">Your Order ID of '.$odata->order_id.' Payment Has Been Successfully Done.</div>'));
		
		
		$data = array("txn_id"=>$tracking_id,"bank_ref_no"=>$bank_ref_no,"payment_status"=>"Success","date_of_payment"=>date("Y-m-d H:i:s"),"order_status"=>"Success");
		
		$this->db->set($data);
		$this->db->where("order_id",$odata->order_id);
		$this->db->update("orders");
		
		
		
		if($odata->order_type == "subscribe"){
				 
			 $begin = new DateTime( $odata->sub_start_date );
			 $end   = new DateTime( $odata->sub_end_date );

				for($i = $begin; $i <= $end; $i->modify('+1 day')){

					$ddate = $i->format("Y-m-d");

					$data = array("delivery_date"=>$ddate,"order_id"=>$odata->order_id,"user_id"=>$uid);

					$this->db->insert("tbl_subscribed_deliveries",$data);

				}

		 }
		
		
		$this->cart->destroy();
		
		redirect("cart");
		
		
		
	}
	else {
		
		$this->session->set_flashdata(array("payment_status"=>'<div class="alert alert-danger alert-dismissible" style="margin-top:15%">Payment Failed</div>'));
		
		$data = array("payment_status"=>"Failed","order_status"=>"Cancelled");
		
		$this->db->set($data);
		$this->db->where("order_id",$odata->order_id);
		$this->db->update("orders");
		
		redirect("cart");
		
	}

	/*if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}*/
	
	

}
//else {
//	echo "<b>Checksum mismatched.</b>";
//	//Process transaction as suspicious.
//}

?>