<script>
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
	
</script>

<?php

$uid = $this->session->userdata("user_id");
$oid = $this->uri->segment(3);
	
	
$odata = $this->db->get_where("orders",array("user_id"=>$uid,"order_id"=>$oid))->row();
$udata = $this->db->get_where("shreeja_users",array("userid"=>$uid))->row();

$total_amount = $odata->total_amount;
$order_id = $oid;


?>


<div class="container" style="display: none">
    <div class="row">
      <div class="col-md-12">
		<form method="post" name="customerData" action="<? echo base_url() ?>payment/paytmRequest">

		<table width="40%" height="100" border='1' align="center">
			<table width="40%" height="100"  align="center" class="table" style="border:1px solid blue;">
				<center><h2 style="color:green;">CCavenue Payment Gateway Integration In PHP</h2></center>
				
				<tr>
					<td>TID	:</td><td><input type="hidden" name="tid" id="tid" readonly /></td>
				</tr>
				<tr>
					<td>Merchant Id	:</td><td><input type="hidden" name="merchant_id" value="393266"/></td>
				</tr>
				<tr>
					<td>Order Id	:</td><td><input type="hidden" name="order_id" value="<?php echo $order_id; ?>"/></td>
				</tr>
				<tr>
					<td>Amount	:</td><td><input type="hidden" name="amount" value="<?php echo $total_amount ?>"/></td>
				</tr>
				<tr>
					<td>Currency	:</td><td><input type="hidden" name="currency" value="INR"/></td>
				</tr>
				<tr>
					<td>Redirect URL	:</td><td><input type="hidden" name="redirect_url" value="<? echo base_url() ?>payment/paytmResponse"/></td>
				</tr>
			 	<tr>
			 		<td>Cancel URL	:</td><td><input type="hidden" name="cancel_url" value="<? echo base_url() ?>payment/paytmResponse"/></td>
			 	</tr>
			 	<tr>
					<td>Language	:</td><td><input type="hidden" name="language" value="EN"/></td>
				</tr>
		     	
		        <tr>
		        	<td colspan="2">Shipping information(optional)</td>
		        </tr>
		        <tr>
		        	<td>Shipping Name	:</td><td><input type="hidden" name="delivery_name" value="<?php echo $udata->user_name ?>"/></td>
		        </tr>
		        <tr>
		        	<td>Shipping Address	:</td><td><input type="hidden" name="delivery_address" value="room no.701 near bus stand"/></td>
		        </tr>
		        <tr>
		        	<td>shipping City	:</td><td><input type="hidden" name="delivery_city" value="Hyderabad"/></td>
		        </tr>
		        <tr>
		        	<td>shipping State	:</td><td><input type="hidden" name="delivery_state" value="Andhra"/></td>
		        </tr>
		        <tr>
		        	<td>shipping Zip	:</td><td><input type="hidden" name="delivery_zip" value="425001"/></td>
		        </tr>
		        <tr>
		        	<td>shipping Country	:</td><td><input type="hidden" name="delivery_country" value="India"/></td>
		        </tr>
		        <tr>
		        	<td>Shipping Tel	:</td><td><input type="hidden" name="delivery_tel" value="9876543210"/></td>
		        </tr>
		        <tr>
		        	<td></td><td><INPUT TYPE="submit" value="CheckOut"></td>
		        </tr>
	      	</table>
	      </form>
	    </div>
	</div>
</INPUT>
<script type="text/javascript">
	
	setTimeout(submit(),5000);
	
	function submit(){
		
		document.forms.customerData.submit();
	}
</script>


