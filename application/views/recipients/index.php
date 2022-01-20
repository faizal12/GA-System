<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Recipients</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active ">Recipients</li>
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

        <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif ($this->session->flashdata('errors')) : ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('errors'); ?>
          </div>
        <?php endif; ?>

        <?php if (in_array('createRecipients', $user_permission)) : ?>
          <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Recipients</button>
          <br /> <br />
        <?php endif; ?>

        <div class="box">

          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Section</th>
                  <th>Status</th>
                  <?php if (in_array('updateRecipients', $user_permission) || in_array('deleteRecipients', $user_permission)) : ?>
                    <th>Action</th>
                  <?php endif; ?>
                </tr>
              </thead>

            </table>
          </div>
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

<?php if (in_array('createRecipients', $user_permission)) : ?>
  <!-- create brand modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Recipients</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>

        <form role="form" action="<?php echo base_url('Controller_Recipients/create') ?>" method="post" id="createForm">

          <div class="modal-body">

            <div class="form-group">
              <label for="brand_name">Recipients Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="brand_name">Recipients Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="brand_name">Recipients Section</label>
              <select class="form-control" id="section" name="section">
                <option value=""></option>
                <?php foreach($section as $rs => $key): ?>
                  <option value="<?=$key['section_cd']?>"><?=$key['section_cd']?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="form-group">
              <label for="active">Status</label>
              <select class="form-control" id="active" name="active">
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>

        </form>


      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<?php endif; ?>

<?php if (in_array('updateRecipients', $user_permission)) : ?>
  <!-- edit brand modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Recipients</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>

        <form role="form" action="<?php echo base_url('Controller_Recipients/update') ?>" method="post" id="updateForm">

          <div class="modal-body">
            <div id="messages"></div>

            <div class="form-group">
              <label for="brand_name">Recipients Name</label>
              <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Enter name" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="brand_name">Recipients Email</label>
              <input type="text" class="form-control" id="edit_email" name="edit_email" placeholder="Enter email" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="brand_name">Recipients Section</label>
              <select class="form-control" id="edit_section" name="edit_section">
                <option value=""></option>
                <?php foreach($section as $rs => $key): ?>
                  <option value="<?=$key['section_cd']?>"><?=$key['section_cd']?></option>
                <?php endforeach;?>
              </select>
              <!-- <input type="text" class="form-control" id="edit_section" name="edit_section" placeholder-->
              
            </div>
            <div class="form-group">
              <label for="edit_active">Status</label>
              <select class="form-control" id="edit_active" name="edit_active">
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>

        </form>


      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<?php endif; ?>

<?php if (in_array('deleteRecipients', $user_permission)) : ?>
  <!-- remove brand modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Remove Warehouse</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>

        <form role="form" action="<?php echo base_url('Controller_Recipients/remove') ?>" method="post" id="removeForm">
          <div class="modal-body">
            <p>Do you really want to remove?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </form>


      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<?php endif; ?>

<?php $this->load->view("templates/js.php") ?>


<script type="text/javascript">
  var manageTable;

  $(document).ready(function() {

    $("#RecipientsNav").addClass('active');

    // initialize the datatable 
    manageTable = $('#manageTable').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'print'
      ],
      'ajax': 'fetchRecipientsData',
      'order': []
    });

    // submit the create from 
    $("#createForm").unbind('submit').on('submit', function() {
      var form = $(this);

      // remove the text-danger
      $(".text-danger").remove();

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(), // /converting the form data into array and sending it to server
        dataType: 'json',
        success: function(response) {

          manageTable.ajax.reload(null, false);

          if (response.success === true) {
            $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
              '</div>');


            // hide the modal
            $("#addModal").modal('hide');

            // reset the form
            $("#createForm")[0].reset();
            $("#createForm .form-group").removeClass('has-error').removeClass('has-success');

          } else {

            if (response.messages instanceof Object) {
              $.each(response.messages, function(index, value) {
                var id = $("#" + index);

                id.closest('.form-group')
                  .removeClass('has-error')
                  .removeClass('has-success')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success');

                id.after(value);

              });
            } else {
              $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                '</div>');
            }
          }
        }
      });

      return false;
    });

  });

  // edit function
  function editFunc(id) {
    $.ajax({
      url: 'fetchRecipientsDataById/' + id,
      type: 'post',
      dataType: 'json',
      success: function(response) {

        $("#edit_name").val(response.name);
        $("#edit_email").val(response.email);
        $("#edit_section").val(response.section);
        $("#edit_active").val(response.active);

        // submit the edit from 
        $("#updateForm").unbind('submit').bind('submit', function() {
          var form = $(this);

          // remove the text-danger
          $(".text-danger").remove();

          $.ajax({
            url: form.attr('action') + '/' + id,
            type: form.attr('method'),
            data: form.serialize(), // /converting the form data into array and sending it to server
            dataType: 'json',
            success: function(response) {

              manageTable.ajax.reload(null, false);

              if (response.success === true) {
                $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                  '</div>');


                // hide the modal
                $("#editModal").modal('hide');
                // reset the form 
                $("#updateForm .form-group").removeClass('has-error').removeClass('has-success');

              } else {

                if (response.messages instanceof Object) {
                  $.each(response.messages, function(index, value) {
                    var id = $("#" + index);

                    id.closest('.form-group')
                      .removeClass('has-error')
                      .removeClass('has-success')
                      .addClass(value.length > 0 ? 'has-error' : 'has-success');

                    id.after(value);

                  });
                } else {
                  $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                    '</div>');
                }
              }
            }
          });

          return false;
        });

      }
    });
  }

  // remove functions 
  function removeFunc(id) {
    if (id) {
      $("#removeForm").on('submit', function() {

        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action'),
          type: form.attr('method'),
          data: {
            Recipients_id: id
          },
          dataType: 'json',
          success: function(response) {

            manageTable.ajax.reload(null, false);

            if (response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                '</div>');

              // hide the modal
              $("#removeModal").modal('hide');

            } else {

              $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                '</div>');
            }
          }
        });

        return false;
      });
    }
  }
</script>