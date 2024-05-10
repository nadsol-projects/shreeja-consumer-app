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
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<? echo base_url('dashboard') ?>">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="<? echo base_url('backup') ?>">Backup</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Restore Order</li>
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
            
            <div class="row clearfix">  
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">Restore Order</div>
						
					<div class="card-body">
                        <? echo $this->session->flashdata('err')  ?>
						<form class="form p-t-20" method="post" action="<?php echo base_url() ?>backup/restoreOrder" enctype="multipart/form-data">
							<div class="form-group">
								<label>Order ID</label>
								<div class="input-group mb-3">
									<input type="text" class="form-control" placeholder="Order ID" aria-label="Username" name="order_id" aria-describedby="basic-addon11">
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Date</label>
								<div class="input-group mb-3">
									<input type="date" class="form-control" placeholder="Email" aria-label="Email" name="date" aria-describedby="basic-addon22"> 
								</div>
							</div>
							
							<button type="submit" class="btn btn-success m-r-10 pull-right">Submit</button>
						</form>
					</div>
					</div>
				</div>

		</div>
	</div>	
</div>

<?php admin_footer(); ?>

<script>
    
    $(".dataTable").dataTable();
    
</script>
