<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active ">Dashboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <?php //if ($is_admin == true) : ?>

      <?php if ($total_low) : ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <?php echo $total_low; ?> Products low qty !!!
        </div>
      <?php endif; ?>
      <?php if ($total_empty) : ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <?php echo $total_empty; ?> Products out of stock !!!
        </div>
      <?php endif; ?>
      <div class="row">
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $total_products ?></h3>

              <p>Total Products</p>
            </div>
            <div class="icon">
              <i class="fa fa-cube"></i>
            </div>
            <a href="<?php echo base_url('Controller_Products/') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $total_paid_orders ?></h3>

              <p>Total Orders</p>
            </div>
            <div class="icon">
              <i class="fa fa-sign-in-alt"></i>
            </div>
            <a href="<?php echo base_url('Controller_orders/') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $total_requests ?></h3>

              <p>Total Requests</p>
            </div>
            <div class="icon">
              <i class="fa fa-sign-out-alt"></i>
            </div>
            <a href="<?php echo base_url('Controller_requests/') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?=$total_agreements?></h3>

              <p>Total Agreements</p>
            </div>
            <div class="icon">
              <i class="ion ion-document-text"></i>
            </div>
            <a href="<?php echo base_url('Controller_Agreements/') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?=$total_reminder?></h3>

              <p>Total SOP</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper"></i>
            </div>
            <a href="<?php echo base_url('Controller_Reminder/') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      
      <!-- /.row -->
    <?php //endif; ?>
    <div class="card card-primary">
      <div class="card-header">
        <h5 class="card-title">Current Stock</h5>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Product Name</th>
                  <th>Qty</th>
                  <th>Minimum</th>
                  <th>Warehouse</th>
                </tr>
              </thead>

            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- ./card-body -->
      <div class="card-footer">
        <!-- /.row -->
      </div>
      <!-- /.card-footer -->
    </div>

    

  </section>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view("templates/js.php") ?>

<script type="text/javascript">
  var manageTable;
  var base_url = "<?php echo base_url(); ?>";
  $(document).ready(function() {
    // initialize the datatable 
    manageTable = $('#manageTable').DataTable({
      'ajax': base_url + 'Controller_Products/fetchCurrentStock',
      'order': []
    });

  });
</script>