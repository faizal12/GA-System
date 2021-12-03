<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Members</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active ">Members</li>
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

        <?php if ($this->session->flashdata('success')) : ?>
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

        <?php if (in_array('createUser', $user_permission)) : ?>
          <a href="<?php echo base_url('Controller_Members/create') ?>" class="btn btn-primary">Add New</a>
          <br /> <br />
        <?php endif; ?>


        <div class="box">

          <!-- /.box-header -->
          <div class="box-body">
            <table id="userTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Permission</th>

                  <?php if (in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>
                    <th>Action</th>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php if ($user_data) : ?>
                  <?php foreach ($user_data as $k => $v) : ?>
                    <tr>
                      <td><?php echo $v['user_info']['username']; ?></td>
                      <td><?php echo $v['user_info']['email']; ?></td>
                      <td><?php echo $v['user_info']['firstname'] . ' ' . $v['user_info']['lastname']; ?></td>
                      <td><?php echo $v['user_info']['phone']; ?></td>
                      <td><?php echo $v['user_group']['group_name']; ?></td>

                      <?php if (in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>

                        <td>
                          <?php if (in_array('updateUser', $user_permission)) : ?>
                            <a href="<?php echo base_url('Controller_Members/edit/' . $v['user_info']['id']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                          <?php endif; ?>
                          <?php if (in_array('deleteUser', $user_permission)) : ?>
                            <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_users<?php echo $v['user_info']['id']; ?>"><i class="fa fa-trash"></i></a>

                            <div class="modal fade" id="delete_users<?php echo $v['user_info']['id']; ?>" role="dialog">
                              <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Are You Sure ? </h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Want to delete <?php echo $v['user_info']['firstname'] . ' ' . $v['user_info']['lastname']; ?></p>
                                  </div>
                                  <div class="modal-footer">
                                    <form action="<?php echo base_url('Controller_Members/delete/' . $v['user_info']['id']) ?>" method="post">

                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <input type="submit" class="btn btn-danger" name="confirm" value="Delete">
                                    </form>

                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>
                    </tr>
                  <?php endforeach ?>
                <?php endif; ?>
              </tbody>
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

<?php $this->load->view("templates/js.php") ?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#userTable').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'print'
      ]
    });


    $("#mainUserNav").addClass('active');
    $("#manageUserNav").addClass('active');
  });
</script>