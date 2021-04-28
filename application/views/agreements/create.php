
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>var $j = jQuery.noConflict(true);</script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add New Agreement</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo site_url('Controller_Agreements') ?>">Agreement</a></li>
            <li class="breadcrumb-item active ">Add Agreement</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('errors')): ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('errors'); ?>
          </div>
        <?php endif; ?>


        <div class="box">
         
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('users/create') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">

                  <label for="agreement_file">File</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="agreement_file" name="agreement_file" type="file">
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="product_name">Agreement name</label>
                  <input type="text" class="form-control" id="agreement_name" name="agreement_name" placeholder="Enter agreement name" autocomplete="off"/>
                </div>

                <div class="form-group">
                  <label for="product_name">Supplier name</label>
                  <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Enter supplier name" autocomplete="off"/>
                </div>

                <div class="form-group">
                  <label for="min">Start Date</label>
                  <input type="date" class="form-control" id="start" name="start" placeholder="Enter start date" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="min">End Date</label>
                  <input type="date" class="form-control" id="end" name="end" placeholder="Enter end date" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter 
                  description" autocomplete="off">
                  </textarea>
                </div>

                <div class="form-group">
                  <label for="section">Section</label>
                  <select class="form-control" id="section" name="section" required>
                  <option value=""></option>
                  <?php foreach($section as $rs):?>
                    <option value="<?=$rs->section?>"><?=$rs->section?></option>
                  <?php endforeach;?>
                  </select>
                </div

                <div class="form-group">
                  <label for="store">Reminder</label>
                  <select class="form-control " id="store" name="store">
                    <option value="30">1 Month</option>
                    <option value="14">14 Days</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="store">Availability</label>
                  <select class="form-control" id="status" name="status">
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                  </select>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('Controller_Products/') ?>" class="btn btn-warning">Back</a>
              </div>
            </form>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view("templates/js.php") ?>

<script type="text/javascript">
  $(document).ready(function() {
    $(".select_group").select2();
    // $("#description").wysihtml5();
    $('#description').summernote()

    $("#mainProductNav").addClass('active');
    $("#addProductNav").addClass('active');
    
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="fa fa-tag"></i>' +
        '</button>'; 
    $("#agreement_file").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="fa fa-folder-open "></i>',
        removeIcon: '<i class="fa fa-times"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["pdf"]
    });

  });
</script>
