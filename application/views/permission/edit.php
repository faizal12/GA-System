<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Permission</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo site_url('Controller_Permission') ?>">Permission</a></li>
            <li class="breadcrumb-item active ">Edit Permission</li>
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
        <?php elseif ($this->session->flashdata('errors')) : ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('errors'); ?>
          </div>
        <?php endif; ?>

        <div class="box">
          <div class="box-header">

          </div>
          <form role="form" action="<?php base_url('Controller_Permission/update') ?>" method="post">
            <div class="box-body">

              <?php echo validation_errors(); ?>

              <div class="form-group">
                <label for="group_name">Permission Name</label>
                <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter permission name" value="<?php echo $group_data['group_name']; ?>">
              </div>
              <div class="form-group">
                <label for="permission">Permission</label>

                <?php $serialize_permission = unserialize($group_data['permission']); ?>

                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Create</th>
                      <th>Update</th>
                      <th>View</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Members</td>
                      <td><input type="checkbox" class="minimal" name="permission[]" id="permission" class="minimal" value="createUser" <?php if ($serialize_permission) {if (in_array('createUser', $serialize_permission)) { echo "checked";} } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateUser" <?php if ($serialize_permission) { if (in_array('updateUser', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewUser" <?php if ($serialize_permission) { if (in_array('viewUser', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteUser" <?php if ($serialize_permission) { if (in_array('deleteUser', $serialize_permission)) {  echo "checked"; } } ?>></td>
                    </tr>
                    <tr>
                      <td>Permission</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createGroup" <?php if ($serialize_permission) { if (in_array('createGroup', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateGroup" <?php if ($serialize_permission) { if (in_array('updateGroup', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewGroup" <?php if ($serialize_permission) { if (in_array('viewGroup', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteGroup" <?php if ($serialize_permission) { if (in_array('deleteGroup', $serialize_permission)) { echo "checked"; } } ?>></td>
                    </tr>
                    <tr>
                      <td>Items</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createBrand" <?php if ($serialize_permission) { if (in_array('createBrand', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateBrand" <?php if ($serialize_permission) { if (in_array('updateBrand', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewBrand" <?php if ($serialize_permission) { if (in_array('viewBrand', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteBrand" <?php if ($serialize_permission) { if (in_array('deleteBrand', $serialize_permission)) { echo "checked"; } } ?>></td>
                    </tr>
                    <tr>
                      <td>Category</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createCategory" <?php if ($serialize_permission) { if (in_array('createCategory', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateCategory" <?php if ($serialize_permission) { if (in_array('updateCategory', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewCategory" <?php if ($serialize_permission) { if (in_array('viewCategory', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteCategory" <?php if ($serialize_permission) { if (in_array('deleteCategory', $serialize_permission)) { echo "checked";  } } ?>></td>
                    </tr>
                    <tr>
                      <td>Warehouse</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createStore" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('createStore', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateStore" <?php if ($serialize_permission) { if (in_array('updateStore', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewStore" <?php if ($serialize_permission) { if (in_array('viewStore', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteStore" <?php if ($serialize_permission) { if (in_array('deleteStore', $serialize_permission)) { echo "checked"; } } ?>></td>
                    </tr>
                    <tr>
                      <td>Elements</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createAttribute" <?php if ($serialize_permission) { if (in_array('createAttribute', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateAttribute" <?php if ($serialize_permission) { if (in_array('updateAttribute', $serialize_permission)) {  echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewAttribute" <?php if ($serialize_permission) { if (in_array('viewAttribute', $serialize_permission)) {  echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteAttribute" <?php if ($serialize_permission) { if (in_array('deleteAttribute', $serialize_permission)) {echo "checked"; } } ?>></td>
                    </tr>
                    <tr>
                      <td>Products</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createProduct" <?php if ($serialize_permission) { if (in_array('createProduct', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateProduct" <?php if ($serialize_permission) { if (in_array('updateProduct', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewProduct" <?php if ($serialize_permission) { if (in_array('viewProduct', $serialize_permission)) { echo "checked";  } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteProduct" <?php if ($serialize_permission) { if (in_array('deleteProduct', $serialize_permission)) {  echo "checked"; } } ?>></td>
                    </tr>
                    <tr>
                      <td>Orders</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createOrder" <?php if ($serialize_permission) { if (in_array('createOrder', $serialize_permission)) { echo "checked";  } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateOrder" <?php if ($serialize_permission) { if (in_array('updateOrder', $serialize_permission)) { echo "checked";} } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewOrder" <?php if ($serialize_permission) { if (in_array('viewOrder', $serialize_permission)) { echo "checked";} } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteOrder" <?php if ($serialize_permission) { if (in_array('deleteOrder', $serialize_permission)) {   echo "checked"; } } ?>></td>
                    </tr>
                    <tr>
                      <td>Requests</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createRequest" <?php if ($serialize_permission) {if (in_array('createRequest', $serialize_permission)) { echo "checked";} } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateRequest" <?php if ($serialize_permission) { if (in_array('updateRequest', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewRequest" <?php if ($serialize_permission) { if (in_array('viewRequest', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteRequest" <?php if ($serialize_permission) { if (in_array('deleteRequest', $serialize_permission)) { echo "checked"; } } ?>></td>
                    </tr>
                    <tr>
                      <td>Agreements</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createAgreement" <?php if ($serialize_permission) { if (in_array('createAgreement', $serialize_permission)) { echo "checked";  } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateAgreement" <?php if ($serialize_permission) { if (in_array('updateAgreement', $serialize_permission)) { echo "checked";  } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewAgreement" <?php if ($serialize_permission) { if (in_array('viewAgreement', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteAgreement" <?php if ($serialize_permission) { if (in_array('deleteAgreement', $serialize_permission)) {  echo "checked"; } } ?>></td>
                    </tr>
                    <tr>
                      <td>Section</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createSection" <?php if ($serialize_permission) { if (in_array('createSection', $serialize_permission)) { echo "checked";  } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateSection" <?php if ($serialize_permission) { if (in_array('updateSection', $serialize_permission)) { echo "checked";  } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewSection" <?php if ($serialize_permission) { if (in_array('viewSection', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteSection" <?php if ($serialize_permission) { if (in_array('deleteSection', $serialize_permission)) {  echo "checked"; } } ?>></td>
                    </tr>

                    <tr>
                      <td>Recipients</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createRecipients" <?php if ($serialize_permission) { if (in_array('createRecipients', $serialize_permission)) { echo "checked";  } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateRecipients" <?php if ($serialize_permission) { if (in_array('updateRecipients', $serialize_permission)) { echo "checked";  } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewRecipients" <?php if ($serialize_permission) { if (in_array('viewRecipients', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteRecipients" <?php if ($serialize_permission) { if (in_array('deleteRecipients', $serialize_permission)) {  echo "checked"; } } ?>></td>
                    </tr>
                    <tr>
                      <td>Reminder</td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createReminder" <?php if ($serialize_permission) { if (in_array('createReminder', $serialize_permission)) { echo "checked";  } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateReminder" <?php if ($serialize_permission) { if (in_array('updateReminder', $serialize_permission)) { echo "checked";  } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewReminder" <?php if ($serialize_permission) { if (in_array('viewReminder', $serialize_permission)) { echo "checked"; } } ?>></td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteReminder" <?php if ($serialize_permission) { if (in_array('deleteReminder', $serialize_permission)) {  echo "checked"; } } ?>></td>
                    </tr>

                    <tr>
                      <td>Company</td>
                      <td> - </td>
                      <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateCompany" <?php if ($serialize_permission) {
                                                                                                                              if (in_array('updateCompany', $serialize_permission)) {
                                                                                                                                echo "checked";
                                                                                                                              }
                                                                                                                            } ?>></td>
                      <td> - </td>
                      <td> - </td>
                    </tr>

                  </tbody>
                </table>

              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Update & Close</button>
              <a href="<?php echo base_url('Controller_Permission/') ?>" class="btn btn-warning">Back</a>
            </div>
          </form>
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
    $("#mainGroupNav").addClass('active');
    $("#manageGroupNav").addClass('active');

    $('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
  });
</script>