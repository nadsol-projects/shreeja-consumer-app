<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Shreeja_api extends REST_Controller 

{

 public function __construct() 

       {

        parent::__construct();

       

           $this->load->helper(array('form', 'url','date'));

		   $this->load->database();

		   $this->load->model('user_model');

		    $this->load->model('offers_api');

		   date_default_timezone_set('Asia/Kolkata');

	    }

	

	public function pbanner_get(){

	

		$data = $this->user_model->offer_banners();

// 		$this->response($data, REST_Controller::HTTP_OK); exit();

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

	

	

	public function consolidation_post(){

		$aid = $this->input->post('userid');

		$date = $this->input->post('date');

		$shift = $this->input->post('shift');

		$data = $this->user_model->consolidation_data($aid,$date,$shift);

		//$this->response($data, REST_Controller::HTTP_OK); exit();

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

	

	

	 public function deliveredorders_post(){

	

		$data = $this->user_model->delivered_orders($this->input->post('userid'));

		//$this->response($data, REST_Controller::HTTP_OK); exit();

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

	

	public function pdqty_post(){

	

		$data = $this->user_model->allProductquantity($this->input->post('userid'));

		//$this->response($data, REST_Controller::HTTP_OK); exit();

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

	

		public function filterpdqty_post(){

	

		$data = $this->user_model->filterProductquantity($this->input->post());

		//$this->response($data, REST_Controller::HTTP_OK); exit();

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

	

	

	

	    

    public function subscribestatusupdate_post(){

	

		$data = $this->user_model->sstatus_update($this->input->post());

		//$this->response($data, REST_Controller::HTTP_OK); exit();

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

      

     public function viewindent_post(){

	

		$data = $this->user_model->indent_view($this->input->post());

		//$this->response($data, REST_Controller::HTTP_OK); exit();

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

	

	public function indentupdate_post(){

	

		$data = $this->user_model->indent_update($this->input->post());

		//$this->response($data, REST_Controller::HTTP_OK); exit();

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

	

    public function myindents_post(){

	

		$data = $this->user_model->my_indents($this->input->post());

		//$this->response($data, REST_Controller::HTTP_OK); exit();

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

	

	public function cancleindent_post(){

	

		$data = $this->user_model->cancle_indent($this->input->post());

		

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

	

    public function logo_get(){

	

		$data = base_url()."uploads/general/logo/header/aa455fae43079744dca18f00127a8cad.jpg";

		$this->response($data, REST_Controller::HTTP_OK); exit();

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

	

	public function indentorder_post(){

        $data = $this->user_model->indent_order($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

	

	

	public function step1_post(){

		$num = $this->input->post("mobile");

		

		$data = $this->user_model->insert_number($num);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

	

	public function passwordotp_post(){

		$num = $this->input->post("mobile");

		$data = $this->user_model->forgot_otp($num);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

	

	public function check_forgototp_post(){

		$num = $this->input->post("mobile");

		$otp = $this->input->post("otp");



		$data = $this->

		user_model->check_forgototp($num,$otp);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

	

	public function login_post(){

		$num = $this->input->post("mobile");

		$pass = $this->input->post("password");

		$data = $this->user_model->do_login($num,$pass);

		if($data['status'])

		{

			$this->response($data, REST_Controller::HTTP_OK);

		}else

		{

			$this->response($data, REST_Controller::HTTP_OK);

		}

	}

	public function agentlogin_post(){

		$num = $this->input->post("mobile");

		$pass = $this->input->post("password");

		$data = $this->user_model->agent_login($num,$pass);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

    

    

    public function resendotp_post(){

        $num = $this->input->post("mobile");

        $data = $this->user_model->resend_otp($num);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

    }

	public function checkotp_post(){

		$num = $this->input->post("mobile");

		$otp = $this->input->post("otp");



		$data = $this->

		user_model->check_otp($num,$otp);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

	}

	



	public function shreejalocations_get(){



		$data = $this->user_model->shreeja_locations();

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}



	public function locationupdate_post(){

		$userid = $this->input->post("userid");

		$locid = $this->input->post("location");

		$data = $this->user_model->location_update($userid,$locid);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}



	public function personaldataupdate_post(){



		$data = $this->

		user_model->personal_update($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}

	

	public function passwordupdate_post(){



		$data = $this->

		user_model->password_update($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}



	public function userdata_post(){

		$userid = $this->input->post("userid");

		$data = $this->user_model->get_user($userid);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}

	

	public function shreeja_areas_post(){

		$lid = $this->input->post("location");

		$data = $this->user_model->areas($lid);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}



	public function products_post(){

		$lid = $this->input->post("location");

		$uid = $this->input->post("userid");

		$data = $this->user_model->all_products($lid,$uid);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}

    

    public function product_view_post(){

		$pid = $this->input->post("productid");

		$data = $this->user_model->product_view($pid);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}

    

    public function sproduct_view_post(){

        $id = $this->input->post("id");

		$data = $this->user_model->sample_product_view($id);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

        

    }

	public function freesample_post(){

		$userid = $this->input->post("userid");

		$data = $this->user_model->free_sample($userid);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}

	public function order_freesample_post(){

	    $id = $this->input->post("id");

	     $uid = $this->input->post("userid");

	  $ddate = $this->input->post("delivery_date");

	  $address = $this->input->post("shipping_address"); 

	  $shift = $this->input->post("shift");

	    $data = $this->user_model->insertSampleOrder($uid,$ddate,$address,$id,$shift);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}

	

	public function orderproduct_post(){

	    

	    $data = $this->user_model->order_product($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

			

			

	}

	public function paymentstatus_post(){

	    

	    $data = $this->user_model->order_status();

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

			

			

	}

	

	public function pauseorder_post(){

	    

	    $data = $this->user_model->pausesubscribtion($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

			

			

	}

	public function myorders_post(){

	    $uid = $this->input->post("userid");

	    $data = $this->user_model->my_orders($uid);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

			

			

	}

	

	public function mypayments_post(){

	    $uid = $this->input->post("userid");

	    $data = $this->user_model->my_payments($uid);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

			

			

	}

	

	public function subscribeproduct_details_post(){

	    $uid = $this->input->post("userid");

	    $oid = $this->input->post("orderid");

	    $data = $this->user_model->subscribe_dates($uid,$oid);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}

			

			

	}

	



	public function addtocart_post(){

	    header('Content-type: application/json');

	    $uid = $this->input->post('userid');

	    $object = $this->input->post('object');

	    

	      $data = $this->user_model->add_cart($object,$uid);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}

	

	public function getcart_post(){

	    $userid = $this->input->post('userid');

	      $data = $this->user_model->get_cart($userid);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}

	

	public function updatecart_post(){

	    $userid = $this->input->post('userid');

	      $data = $this->user_model->update_cart($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}

	

	public function emptycart_post(){

	    $userid = $this->input->post('userid');

	      $data = $this->user_model->empty_cart($userid);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}

	

	public function offers_post(){

	    

	      $data = $this->user_model->my_offers();

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}

	

	public function agentorders_post(){

	    $userid = $this->input->post('userid');

	     $date = ($this->input->post('date'))?$this->input->post('date'):"";

	      $data = $this->user_model->active_agent_list($userid, $date);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}

	

	public function filteractive_post(){

	    $userid = $this->input->post('userid');

	     $date = ($this->input->post('date'))?$this->input->post('date'):"";

	      $data = $this->user_model->filter_active_orders($userid, $date);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}

	public function filterdelivered_post(){

	    $userid = $this->input->post('userid');

	     $date = ($this->input->post('date'))?$this->input->post('date'):"";

	      $data = $this->user_model->filter_delivered_orders($userid, $date);

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	

	}

	

	public function agentdeliveryonce_post(){

       

	      $data = $this->user_model->deliveryonce_orders($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	 

    }

    

    public function agentfreesample_post(){

       

	      $data = $this->user_model->freesample_orders($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	 

    }

	 

    public function agentsubscribeorders_post(){

       

	      $data = $this->user_model->agent_subscribed_orders($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	 

    }   

    public function checkpromocode_post(){

       

	      $data = $this->user_model->checkPromo($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	 

    }

	

	 public function viewagentorder_post(){

       

	      $data = $this->user_model->viewagent_order($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	 

    }

    

     public function viewagentfreesample_post(){

       

	      $data = $this->user_model->viewagent_freesample($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	 

    }

    

	 public function agentprofile_post(){

       

	      $data = $this->user_model->agent_profile($this->input->post('userid'));

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	 

    }

     public function agentprofileupdate_post(){

       

	      $data = $this->user_model->agent_profile_update($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	 

    }

    

     public function agentpasswordupdate_post(){

       

	      $data = $this->user_model->agent_password_update($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	 

    }

    

    public function agentdeliverystatus_post(){

       

	      $data = $this->user_model->updateDeliverystatus($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	 

    }

    

    public function cancleorder_post(){

       

	      $data = $this->user_model->cancle_order($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	 

    }

    

     public function getgst_post(){

       

	      $data = $this->user_model->get_gst($this->input->post());

		if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	 

    }

    

    

    

     
	public function generateInvoice_get(){

		$oid = $this->input->get('orderid');

        $odata = $this->db->get_where("orders",array("order_id"=>$oid,"payment_status"=>"Success"))->row();
		
		if($odata){
			
			$data["o"] = $odata;
			
		}else{
			
			$data["o"] = $this->db->get_where("tbl_free_sample_orders",array("order_id"=>$oid,"order_status"=>"Success"))->row();
			
		}
	
		$view = $this->load->view('orders/invoice',$data);		
			

	    $this->response($view, REST_Controller::HTTP_OK); exit();

	     //$this->response($data, REST_Controller::HTTP_OK); 

	    	if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	 

	}



    

    public function agentproducts_post(){

		$location = $this->input->post('location');

		$aid = $this->input->post("userid");

	     $data = $this->user_model->agent_products($location,$aid);

	    	if($data['status'])

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}else

			{

				$this->response($data, REST_Controller::HTTP_OK);

			}	 

	}

	

	public function userNotifications_post(){

		

		$uid = $this->input->post("uid");

		

		$data = $this->db->order_by("id","desc")->get_where("tbl_user_notifications",array("user_id"=>$uid))->result_array();

		

		if(count($data) > 0)

		{

			$ndata = array("status"=>true, "data"=>$data);

			$this->response($ndata, REST_Controller::HTTP_OK);

		}else

		{

			$ndata = array("status"=>false, "data"=>"");

			$this->response($ndata, REST_Controller::HTTP_OK);

		}

		

	}

	

	public function renewSubscription_post(){

		

		$oid = $this->input->post("order_id");

		$uid = $this->input->post("user_id");

		

		$ordChk = $this->db->get_where("orders",array("order_id"=>$oid,"user_id"=>$uid,"is_renew"=>"Inactive"))->num_rows();

		

		

		if($ordChk == 1){

			

			$odata = $this->db->get_where("orders",array("order_id"=>$oid,"user_id"=>$uid,"is_renew"=>"Inactive"))->row();

			$opdata = $this->db->get_where("order_products",array("order_id"=>$oid))->result();

			

			if(count($opdata) > 0){

				

				$this->db->where("userid",$uid)->delete("tbl_cart");

	    

				foreach($opdata as $op){

				    

				    if($op->orderRef != "offer"){

				        

				        $pdata = json_decode($this->db->get_where("tbl_products",array("id"=>$op->product_id))->row()->product_quantity);

				        

				        $price = "";

				        

				        foreach($pdata->quantity as $k => $qty){

				            

				            if($qty == $op->category){

				                

				                $pr = $pdata->price[$k];

				                

				            }

				            

				        }

				        

				        if($this->products_model->productDiscountprice($op->product_id) != ""){

				            

				            $price = $this->products_model->productDiscountprice($op->product_id);

				            

				        }else{

				            

				            $price = $pr;

				            

				        }

				        

				    

    					$data = array("userid"=>$uid, "product_id"=>$op->product_id,"product_cat"=>$op->category,"qty"=>$op->qty,"price"=>$price);  

    	        

    					$d = $this->db->insert("tbl_cart",$data);

	        

				    }

				}

				

				

				if($d){

					$ndata = array("status"=>true, "msg"=>"successfully added to cart");

					$this->response($ndata, REST_Controller::HTTP_OK);

				}else

				{

					$ndata = array("status"=>false, "data"=>"error occured");

					$this->response($ndata, REST_Controller::HTTP_OK);

				}

			}else{

			    

			    $ndata = array("status"=>false, "data"=>"error occured");

					$this->response($ndata, REST_Controller::HTTP_OK);

			}

			

		}else{

			

			$ndata = array("status"=>false, "msg"=>"Already renewed");

			$this->response($ndata, REST_Controller::HTTP_OK);

			

		}

		

		

	}

	

	public function notification_icon_get(){

		

		$ndata = array("status"=>true, "icon"=>base_url()."assets/icon.ico");

		$this->response($ndata, REST_Controller::HTTP_OK);

		

	}

	

	public function updateAccountdetails_post(){

		

		$uid = $this->input->post("uid");

		$udata = $this->db->get_where("shreeja_users",["userid"=>$uid])->row();

		

		$account_number = $this->input->post("account_number");

		$confirm_account_number = $this->input->post("confirm_account_number");

		$ifsc_code = $this->input->post("ifsc_code");

		$account_holder_name = $this->input->post("account_holder_name");

		$account_mobile_number = $this->input->post("account_mobile_number");

		$account_nick_name = $this->input->post("account_bank_name");

		$branch_name = $this->input->post("branch_name");

		$bank_city = $this->input->post("bank_city");

		$ref = $this->input->post("ref");

		

		if($ref != "web"){

			if($account_number != $confirm_account_number){



				$ndata = array("status"=>false, "data"=>"Account Number Not Matched");

				$this->response($ndata, REST_Controller::HTTP_OK);



			}

		}

		

			if($_FILES['bank_passbook']['size']!='0'){

				$config['upload_path']          = "uploads/user_bank_details/";

				$config['allowed_types']        = 'gif|jpg|png|jpeg';



				$this->load->library('upload', $config);



				if($this->upload->do_upload("bank_passbook")){



					$d=$this->upload->data();

					$icon = "uploads/user_bank_details/".$d['file_name'];

					unlink($udata->bank_passbook);

					

				}else{



//					$ndata = array("status"=>false, "data"=>"Please select valid image");

//					$this->response($ndata, REST_Controller::HTTP_OK);

					$icon = $udata->bank_passbook;	

				}



			}else{

				$icon = $udata->bank_passbook;

			}

		

		$data = [

			"account_number" => $account_number,

			"ifsc_code" => $ifsc_code,

			"account_holder_name" => $account_holder_name,

			"account_mobile_number" => $account_mobile_number,

			"account_bank_name" => $account_nick_name,

			"bank_city" => $bank_city,

			"branch_name" => $branch_name,

			"bank_passbook" => $icon,

			"bank_details_updated_date" => date("Y-m-d H:i:s")

		];

		

		$data = $this->db->where("userid",$uid)->update("shreeja_users",$data);

		

		if($data)

		{

			$ndata = array("status"=>true, "data"=>"Account details updated");

			$this->response($ndata, REST_Controller::HTTP_OK);

		}else

		{

			$ndata = array("status"=>false, "data"=>"");

			$this->response($ndata, REST_Controller::HTTP_OK);

		}

		

	}

	

	public function getrsa_post(){

	    $this->load->view("ccavenue/mobile/GetRSA");

	}

	

	public function mobileResponse_post(){



		require_once('assets/ccavenue/Crypto.php');

	    $workingKey='9EDFB872C0112FA119CE0BCF6EEADD05';//'3827A52CEA61B0DDC2C73E46C5EC1C20';		//Working Key should be provided here.

		$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server

		$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.

		$order_status="";

		$decryptValues=explode('&', $rcvdString);

		$dataSize=sizeof($decryptValues);





		$order_status="";

		$tracking_id = "";

		$bank_ref_no = "";

		$order_id = "";

		$payment_mode = "";

		

		$data = [];

		for($i = 0; $i < $dataSize; $i++) 

		{

			$information=explode('=',$decryptValues[$i]);

			if($i==0) $order_id = $information[1];

			if($i==1) $tracking_id = $information[1];

			if($i==2) $bank_ref_no = $information[1];

			if($i==3) $order_status = $information[1];

			if($i==5) $payment_mode = $information[1];

			$data[$information[0]]=$information[1];

		}



		if($order_status==="Success"){

			$order_status = "100";

		}else{

		    

		    if($order_status = "Aborted"){

		        $order_status = "101";

		    }else{

		        $order_status = "102";    

		    }

		    

		}

log_message('error', 'mobileResponse_post'.$order_id);

		//$this->user_model->get_gst($order_id,$tracking_id,$order_status);
		if($tracking_id == ""){
			$odata = $this->getOrderStatus($order_id,$date);
			log_message('$odata',$odata);
			if($odata){
				$tracking_id=$odata->reference_no;
				if($odata->order_status=="Shipped"){
					$order_status="Success";
				}
				else if($odata->order_status!=null && $odata->order_status!=""){
					$order_status="Failed";
				}
			}
		}
		$this->user_model->order_status($order_id,$tracking_id,$order_status);



		$this->response($data, REST_Controller::HTTP_OK);



	}

public function updateorderstatus_post(){
		$orderid = $this->input->post("orderid");
$date = $this->input->post("odate");//"21-10-2023";// date("d-m-Y");
if( is_null($date) || $date == ''){
	$date = date("d-m-Y");
}

	$odata = $this->getOrderStatus($orderid,$date);

		$data= $this->user_model->update_order_status($odata);
		$this->response($data, REST_Controller::HTTP_OK);
	}


	public function getorderstatus_get(){
$orderid = $this->input->get("orderid");
$date = $this->input->get("odate");//"21-10-2023";// date("d-m-Y");
if( is_null($date) || $date == ""){
	$date = date("d-m-Y");
}

	
	$odata = $this->getOrderStatus($orderid,$date);
	
$this->response($odata, REST_Controller::HTTP_OK);
		
	}

	private function getOrderStatus1($orderid,$date){
		require_once('assets/ccavenue/Crypto.php');

$oData = json_encode(array("order_no"=> $orderid, "from_date"=> $date));
$access_code="AVYV92KG93CE78VYEC";//"AVBI09IE19BN38IBNB";
$workingKey='9EDFB872C0112FA119CE0BCF6EEADD05';//'3827A52CEA61B0DDC2C73E46C5EC1C20';	
		$enq_req = encrypt($oData,$workingKey);
//$this->response($enq_req, REST_Controller::HTTP_OK);
	$ch = curl_init();
	$url = 'https://api.ccavenue.com/apis/servlet/DoWebTrans?enc_request='.$enq_req.'&access_code='.$access_code.'&command=orderLookup&request_type=json&response_type=JSON&version=1.2';
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch, CURLOPT_POSTFIELDS,"enc_request='.$enq_req.'&access_code='.$access_code.'&command=orderLookup&request_type=json&response_type=JSON&version=1.2");
	//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$odata = curl_exec($ch);
	curl_close($ch);
	$encResponse=explode('&', $odata);
	$encResponse=explode('=', $encResponse[1]);
	$encResponse=str_replace("\n", "", $encResponse[1]);
	$encResponse=str_replace("\r", "", $encResponse);
	$odata=decrypt($encResponse,$workingKey);
	$odata = json_decode($odata);
	//return ($odata);
	if(count($odata->order_Status_List) > 0){
return $odata->order_Status_List[count($odata->order_Status_List)-1];
	}
	else{
return $odata->order_Status_List[0];
	}
	}

private function getOrderStatus($orderid,$date){
		require_once('assets/ccavenue/Crypto.php');

$oData = json_encode(array("order_no"=> $orderid));
$access_code="AVYV92KG93CE78VYEC";//"AVBI09IE19BN38IBNB";
$workingKey='9EDFB872C0112FA119CE0BCF6EEADD05';//'3827A52CEA61B0DDC2C73E46C5EC1C20';	
		$enq_req = encrypt($oData,$workingKey);
//$this->response($enq_req, REST_Controller::HTTP_OK);
	$ch = curl_init();
	$url = 'https://api.ccavenue.com/apis/servlet/DoWebTrans?enc_request='.$enq_req.'&access_code='.$access_code.'&command=orderStatusTracker&request_type=json&response_type=JSON';
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch, CURLOPT_POSTFIELDS,"enc_request='.$enq_req.'&access_code='.$access_code.'&command=orderStatusTracker&request_type=json&response_type=JSON");
	//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$odata = curl_exec($ch);
	curl_close($ch);
	$encResponse=explode('&', $odata);
	$encResponse=explode('=', $encResponse[1]);
	$encResponse=str_replace("\n", "", $encResponse[1]);
	$encResponse=str_replace("\r", "", $encResponse);
	$odata=decrypt($encResponse,$workingKey);
	$odata = json_decode($odata);
	return ($odata->Order_Status_Result);
	}

	public function subscriptionoffers_post()
	{
		$subscriptionType = $this->input->post('subscriptionType');
		$productid = $this->input->post('product_id');

		$data = $this->user_model->subscriptionoffers_get($subscriptionType, $productid);
		$this->response($data, REST_Controller::HTTP_OK);
		
	}

	

	

}