<?php admin_header(); ?>

        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
       
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
<?php admin_sidebar() ?> 
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
       
   <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">
<!--
                          <a href="<?php echo base_url() ?>users/create-user">	
							<button class="btn btn-success waves-effect waves-light">Create User</button>
						  </a>	
-->
                        </h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Order Information</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                    <form method="post" id="getorderinfo">   
                        <div class="row">   
                            <div class="col-md-4">   
                                <div class="form-group">
                                    <label>Order ID :</label>
                                    <input type="text" class="form-control" name="order_id" placeholder="Order ID" autocomplete="off"  required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                
                                <button type="submit" class="btn btn-info waves-effect waves-light m-t-30">Submit</button>
                                
                            </div> 
                            </div>
                                
                        </div>
                    </form>    

                       
                       
                        <div class="card" style="border: 0px">
                            <div class="card-body">
                                <div class="orderinfo">
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>





            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
<?php admin_footer(); ?>
<script type="text/javascript">

$("#getorderinfo").submit(function(e){
	
    e.preventDefault();
    var fdata = $(this).serialize();
    $.ajax({
        type: 'post',
        url: '<? echo base_url('orders/invoiceorders/getCCavenueOrderinfo') ?>',
        data: fdata,
        success:function(data){
            $(".orderinfo").html(data.result);
            console.log(data);
        },
        error:function(data){
            console.log(data);
        }
    })
	
})	
	
</script>

            <!-- End footer -->