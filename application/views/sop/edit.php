

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Agreement</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo site_url('Controller_Reminder') ?>">Agreement</a></li>
            <li class="breadcrumb-item active ">Edit Agreement</li>
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
          <form role="form" action="<?php base_url('users/update') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <!-- <div class="form-group">
                  <label>File Preview: </label>
                  <img src="<?php echo base_url() . $reminder_data['file'] ?>" width="150" height="150" class="img-circle">
                </div> -->

                <div class="form-group">
                  <label for="agreement_file">Update File</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="agreement_file" name="agreement_file" type="file">
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="product_name">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="<?php echo $reminder_data['title']; ?>" placeholder="Enter agreement name" autocomplete="off"/>
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter 
                  description" autocomplete="off">
                    <?php echo $reminder_data['description']; ?>
                  </textarea>
                </div>

                <div class="form-group">
                  <label for="store">Reminder</label>
                  <select class="form-control " id="reminder" name="reminder" required>
                    <?php foreach($hari as $k => $rs):?>
                        
                        <option value="<?=$rs['value']?>" <?=($reminder_data['reminder']==$rs['value']) ? "selected" : ""?> ><?=$rs['name']?></option>
                    <?php endforeach;?>
                   
                     </select>
                </div>

                <div class="form-group">
                  <label for="section">Section</label>
                  <select class="form-control" id="section" name="section" required>
                  <?php foreach($section as $k => $rs):?>
                        
                        <option value="<?=$rs['section_cd']?>" <?=($reminder_data['section']==$rs['section_cd']) ? "selected" : ""?> ><?=$rs['section_name']?></option>
                    <?php endforeach;?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="section">Frequen</label>
                  <select class="form-control" id="freq" name="freq" onchange="frequen_date();" required>
                  <?php foreach($freq as $k => $rs):?>
                        
                        <option value="<?=$rs['value']?>" <?=($reminder_data['freq']==$rs['value']) ? "selected" : ""?> ><?=$rs['name']?></option>
                    <?php endforeach;?>
                  </select>
                </div>

                <div class="form-group" id="frequen_date_form">
                  <?php $conter=0;?>
                  <?php foreach($frequen as $value):?>
                    <?php $conter++;?>
                  <label>Date <?=$conter?></label>
                  <input type="date" class="form-control" name="frequent_date[]" placeholder="Date 1" value="<?=date('Y-m-d',strtotime($value->REMINDER_DT))?>" required>

                  <?php endforeach;?>
                </div>

                <div class="form-group">
                  <label for="section">Recipients Notification</label>
                  <select class="form-control select_group select2" id="recipients" name="recipients[]" multiple required>
                  <option value=""></option>
                  <?php foreach($recipients_id as $keys => $value):?>
                    
                      <?php
                        if($value['CN']>1){
                          $select="selected";
                        }else{
                          $select="";
                        } 

                      ?>
                      <option value="<?=$value['id']?>" <?=$select?>><?=$value['name']." - ".$value['email']?></option>
                    <?php endforeach;?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="store">Availability</label>
                  <select class="form-control" id="status" name="status">
                    <option value="1" <?php if($reminder_data['status'] == 1) { echo "selected='selected'"; } ?>>Yes</option>
                    <option value="2" <?php if($reminder_data['status'] != 1) { echo "selected='selected'"; } ?>>No</option>
                  </select>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('Controller_Reminder/') ?>" class="btn btn-warning">Back</a>
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
    $("#manageProductNav").addClass('active');
    
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="fa fa-tag"></i>' +
        '</button>'; 
    $("#agreement_file").fileinput({
        overwriteInitial: true,
        maxFileSize: 15000,
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

  function frequen_date(){
    var frequen = document.getElementById('freq').value;
    $('#frequen_date_form').html("");
    //Looping
    for (var i = 1; i <= frequen; i++) {
      
      $('#frequen_date_form').append( 
            '<label>Date '+i+'</label>'
        );

      $('#frequen_date_form').append( 
          $("<input>", 
              { type:'date', 
                placeholder:'DATE '+i, 
                name:'frequent_date[]',
                class:'form-control',
                required:'', 
                style:'width:100%' }
          )
      );
    }
  }
</script>