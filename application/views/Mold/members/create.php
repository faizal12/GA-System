<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add New Member</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo site_url('Controller_Members') ?>">Members</a></li>
            <li class="breadcrumb-item active ">Add New Member</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">


        <div class="box-tools pull-right">
          <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
          <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
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


            <form role="form" action="<?php base_url('Controller_Members/create') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="groups">Permission</label>
                      <select class="form-control" id="groups" name="groups">
                        <option value="">Select Permission</option>
                        <?php foreach ($group_data as $k => $v) : ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['group_name'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="fname">First name</label>
                      <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" autocomplete="off">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
                    </div>
                  </div>

                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="section">Section</label>
                    <select class="form-control  select2" id="section" name="section" placeholder="Section"  required>
                      <option></option>
                      <?php foreach($section as $k => $rs):?>
                        
                        <option value="<?=$rs['section_cd']?>"><?=$rs['section_name']?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="lname">Last name</label>
                      <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" autocomplete="off">
                    </div>
                  </div>








                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                    </div>
                  </div>

                  <div class="col-md-6">

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cpassword">Confirm password</label>
                      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                    </div>
                  </div>



                  <div class="col-md-6">

                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="gender">Gender</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="male" value="1">
                      Male
                    </label>
                    <label>
                      <input type="radio" name="gender" id="female" value="2">
                      Female
                    </label>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save & Close</button>
                <a href="<?php echo base_url('Controller_Members/') ?>" class="btn btn-warning">Back</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->

</div>
<!-- /.box -->



</section>
<?php $this->load->view("templates/js.php") ?>