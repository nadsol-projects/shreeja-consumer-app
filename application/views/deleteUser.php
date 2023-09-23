<?php front_inner_header() ?>
<!-- Main Content Started -->

<div class="main-content">

	<!-- Login Form Starts-->

	<h4 class="customer-head">Delete User</h4>
	<div class="sign-in">

		<div class="cup">
			<img src="<?php echo base_url("admin/assets/front/") ?>assets/images/register.jpg" alt="" />
		</div>
		<div class="customer-login">
			<h4 class="pt-4 text-light">Delete User</h4>


			<div class="derror"></div>

			<!-- <div class="customer-circle"></div> -->
			<div class="checkDeluser">
				<form class="col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 mx-auto mt-4 bg-light pb-5 mb-4" id="checkDeluser" method="post">

					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fas fa-mobile text-dark"></i></div>
						</div>
						<input type="text" name="mobile" class="form-control getMobile" placeholder="Enter Mobile Number" required>
					</div>
					<input type="submit" class="btn btn-block mt-4 login-submit" value="Submit" />

				</form>
			</div>
			
			<div class="checkDelotp" style="display: none;">
				<form class="col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12 mx-auto mt-4 bg-light pb-5 mb-4" id="checkDelotp" method="post">

					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fas fa-mobile text-dark"></i></div>
						</div>
						<input type="text" name="otp" class="form-control" placeholder="Enter OTP" required>
						<input type="hidden" name="mobile_number" class="form-control setMobile" required>
					</div>
					<input type="submit" class="btn btn-block mt-4 login-submit" value="Submit" />

				</form>
			</div>
		</div>

	</div>
	<script type="text/javascript">

		$("#checkDeluser").submit(function(e){
			e.preventDefault();

			var fdata = $(this).serialize();
			$.ajax({
				method: 'post',
				url: '<?php echo base_url("home/checkDeluser") ?>',
				data: fdata,
				dataType: 'json',
				success: function(data){
					if(data.status){

						var mobile = $(".getMobile").val();

						$(".derror").html(data.msg);
						$(".checkDeluser").hide();
						$(".checkDelotp").show();
						$(".setMobile").val(mobile);

					}else{
						$(".derror").html(data.msg);
						$(".checkDeluser").show();
						$(".checkDelotp").hide();
					}
				},
				error: function(data){

				}
			})
		})

		$("#checkDelotp").submit(function(e){
			e.preventDefault();
			var fdata = $(this).serialize();
			$.ajax({
				method: 'post',
				url: '<?php echo base_url("home/checkDelotp") ?>',
				data: fdata,
				dataType: 'json',
				success: function(data){
					if(data.status){

						$(".derror").html(data.msg);
						setTimeout(function(){
							location.reload();
						}, 3000);
						
					}else{
						$(".derror").html(data.msg);
					}
				},
				error: function(data){

				}
			})
		})

		$(".show-password").click(function() {
			$("#password").attr("type", "text");
			$(".show-password").hide();
			$(".hide-password").show();
		});
		$(".hide-password").click(function() {
			$("#password").attr("type", "password");
			$(".hide-password").hide();
			$(".show-password").show();
		});
	</script>
	<?php front_inner_footer() ?>